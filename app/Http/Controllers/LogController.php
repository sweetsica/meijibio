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
        $notiData = $allData['data']['notiData'] ?? [];
        $customerData = $allData['data']['customerData'] ?? [];
        // $title = $data['body']['event'] ?? 'No Title';
        // return response()->json(['status' => 'ok','data' => $data,'title' => $title]);



        $title = $notiData['event'] ?? 'No Title';
        // $title = $notiData['body']['event'] ?? 'No Title';
        
        Log::create([
            'title' => $title,
            'notiData' => $notiData,
            'customerData' => $customerData,
        ]);

        return response()->json([
            'status' => 'ok',
            'title' => $title,
            'data' => $allData,
            'notiData' => $notiData,
            'customerData' => $customerData
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
