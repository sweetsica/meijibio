<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>
    <h1>Chào {{ Auth::user()->name ?? 'Khách' }}</h1>

    <p>
        @if ($roleText === 'Chưa đăng nhập')
            Bạn chưa đăng nhập.
        @else
        <div style="color: green;">
            Bạn đã đăng nhập với quyền <b>{{ ucfirst($roleText) }}</b>.
        </div>
        @endif
    </p>

    <p>Trang này dành cho User và Admin.</p>

    @if (!empty($notice))
        <div style="color:red;">
            {{ $notice }}
        </div>
    @endif
</body>
</html>
