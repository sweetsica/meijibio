<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function webhook(Request $request)
    {
        $data = $request->all();
        dd($data[0]['body']['event']) ?? 'No Title';
        return response()->json(['status' => 'ok','data' => $data]);


        // $title = $data[0]['body']['event'] ?? 'No Title';
        //  Log::create([
        //     'title' => $title,
        //     'data' => $data
        // ]);

        // return response()->json(['status' => 'ok','data' => $data]);
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
