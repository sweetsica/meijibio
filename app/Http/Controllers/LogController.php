<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function webhook(Request $request)
    {
         Log::create([
            'title' => 'Cập nhật',
            'data' => $request->all()
        ]);

        return response()->json(['status' => 'ok']);
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

        return view('static.logs', compact('logs'));
    }
}
