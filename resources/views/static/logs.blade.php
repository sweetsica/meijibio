<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1 class="mb-4">Logs</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('logs.index') }}" class="row g-2 mb-4">
        <div class="col-auto">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Tìm kiếm title hoặc data...">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tìm</button>
        </div>
    </form>

    <!-- Bảng logs -->
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Noti Data (JSON)</th>
                <th>Customer Data (JSON)</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->title }}</td>
                <td>
                    <pre class="bg-light p-2 rounded small mb-0" style="max-height: 200px; overflow:auto;">
{{ json_encode($log->noti_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                    </pre>
                </td>
                <td>
                    <pre class="bg-light p-2 rounded small mb-0" style="max-height: 200px; overflow:auto;">
{{ json_encode($log->customer_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
                    </pre>
                </td>
                <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Không có dữ liệu</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="mt-3">
        {{ $logs->links('pagination::bootstrap-5') }}
    </div>
</div>

</body>
</html>
