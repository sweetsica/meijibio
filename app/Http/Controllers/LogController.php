<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Customer;
use App\Services\CustomerService;

use Illuminate\Support\Facades\File;


class LogController extends Controller
{
    /**
     * Nhận dữ liệu từ webhook, nếu id (getfly_id) đã tồn tại thì update thay vì tạo mới, lưu file log và lưu vào bảng log
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function webhook(Request $request)
    {
        $allData = json_decode($request->getContent(), true);

        $noti_data     = $allData['noti_data'] ?? [];
        $customer_data = $allData['customer_data'] ?? [];
        $title         = $noti_data['event'] ?? 'No Title';

        // Lưu log vào DB
        Log::create([
            'title'         => $title,
            'noti_data'     => $allData['noti_data'] ?? new \stdClass(),
            'customer_data' => $allData['customer_data'] ?? new \stdClass(),
        ]);

        // --- Lưu log ra file ---
        $today = now()->format('d-m-Y');
        $todayFolder = public_path('webhook_logs/' . $today);

        // Tạo folder nếu chưa có
        if (!File::exists($todayFolder)) {
            File::makeDirectory($todayFolder, 0777, true, true);
            @chmod($todayFolder, 0777);
        }

        // Tạo file log theo ngày
        $logFile = $todayFolder . '/' . $today . '.txt';
        if (!File::exists($logFile)) {
            File::put($logFile, "");
            @chmod($logFile, 0666);
        }

        // Ghi nội dung log
        $logContent = "==== " . now()->toDateTimeString() . " ====\n" .
            json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) .
            "\n\n";
        File::append($logFile, $logContent);

        // --- Xử lý tạo/cập nhật Customer ---
        if ($title === 'customer.created') {
            if (empty($customer_data['getfly_id'])) {
                return response()->json(['status' => 'error', 'message' => 'getfly_id missing'], 400);
            }

            $customer = Customer::createOrUpdateCustomer($customer_data);

            return response()->json([
                'status' => $customer->wasRecentlyCreated ? 'created' : 'updated',
                'title'  => $title,
                'data'   => $allData
            ], $customer->wasRecentlyCreated ? 201 : 200);
        }

        return response()->json([
            'status' => 'ignored',
            'title'  => $title,
            'data'   => $allData
        ], 200);
    }

    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Log::query();

        // Tìm kiếm theo title hoặc trong json (data)
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('noti_data', 'like', "%{$search}%")
                  ->orWhere('customer_data', 'like', "%{$search}%");
        }

        // Lấy logs mới nhất trước, phân trang 50 bản ghi
        $logs = $query->orderBy('created_at', 'desc')->paginate(50);
        // $logs = Log::findorFail('table',15);
        return view('static.logs', compact('logs'));
    }
}
