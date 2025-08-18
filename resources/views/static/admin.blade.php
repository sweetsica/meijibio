<h1>Chào {{ Auth::user()->name }} (Admin)</h1>
<p>Trang này chỉ Admin mới được vào.</p>

@if (!empty($notice))
    <div style="color:red;">
        {{ $notice }}
    </div>
@endif
@if (session('notice'))
    <div style="color: green;">
        {{ session('notice') }}
    </div>
@endif