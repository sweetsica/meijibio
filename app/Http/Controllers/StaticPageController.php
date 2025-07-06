<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;


class StaticPageController extends Controller
{
     public function webhook(Request $request): JsonResponse
    {
        // Lấy tất cả dữ liệu gửi đến (bao gồm cả GET & POST)
        $data = $request->all();

        // Xử lý logic ở đây nếu cần, ví dụ log hoặc kiểm tra chữ ký...

        // Trả kết quả JSON
        return response()->json([
            'status' => 'success',
            'received_data' => $data,
        ]);
    }

    public function post_test(Request $request)
    {
        $data = $request->all();
        $response = Http::post(
            'https://sweetsica-n8n.onrender.com/webhook-test/137838fa-85e0-48d9-9df3-0118c1ef6538',
            $data
        );
        return $response->body();
    }
}
