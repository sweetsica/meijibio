<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

use Illuminate\Support\Facades\File;


class LogController extends Controller
{
    public function webhook(Request $request)
    {
        // Lấy toàn bộ request
        $allData = $request->all();

        return response()->json([
            'status' => 'ok',
            'data' => $allData
        ]);

        $noti_data = $allData['noti_data'] ?? []; // Lấy dữ liệu cập nhật hành động
        $customer_data = $allData['customer_data'] ?? []; // Lấy thông tin khách hàng khi hành động xong
        $title = $noti_data['event'] ?? 'No Title'; // Lấy tiêu đề từ event webhook

        Log::create([
            'title' => $title,
            'noti_data' => $noti_data,
            'customer_data' => $customer_data,
        ]);

        // --- Lưu log ra file ---
        $today = now()->format('d-m-Y');
        $todayFolder = public_path('webhook_logs/' . $today);
        // Tạo folder nếu chưa có
        if (!File::exists($todayFolder)) {
            File::makeDirectory($todayFolder, 0777, true, true);
            @chmod($todayFolder, 0777);
        }
        // Tên file theo ngày
        $logFile = $todayFolder . '/' . $today . '.txt';
        // Nếu file chưa tồn tại -> tạo rỗng + set quyền
        if (!File::exists($logFile)) {
            File::put($logFile, "");
            @chmod($logFile, 0666);
        }
        // Ghi thêm nội dung
        $logContent = "==== " . now()->toDateTimeString() . " ====\n" .
                    json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) .
                    "\n\n";
        File::append($logFile, $logContent);



        return response()->json([
            'status' => 'ok',
            'title' => $title,
            'data' => $allData,
            'noti_data' => $noti_data,
            'customer_data' => $customer_data
        ]);
    }

    public function index(Request $request)
    {
        $query = Log::query();

        // Tìm kiếm theo title hoặc trong json (data)
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('data', 'like', "%{$search}%");
        }

        // Lấy logs mới nhất trước, phân trang 50 bản ghi
        $logs = $query->orderBy('created_at', 'desc')->paginate(50);
        // $logs = Log::findorFail('table',15);
        return view('static.logs', compact('logs'));
    }
}
