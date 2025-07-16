<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function webhook(Request $request)
    {
        // Lấy toàn bộ request
        $allData = $request->all();
        $noti_data = $allData['noti_data'] ?? []; // Lấy dữ liệu cập nhật hành động
        $customer_data = $allData['customer_data'] ?? []; // Lấy thông tin khách hàng khi hành động xong
        $title = $noti_data['event'] ?? 'No Title';

        Log::create([
            'title' => $title,
            'noti_data' => $noti_data,
            'customer_data' => $customer_data,
        ]);

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
