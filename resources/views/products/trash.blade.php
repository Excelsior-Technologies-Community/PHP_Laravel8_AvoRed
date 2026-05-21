<!DOCTYPE html>
<html>
<head>
    <title>Trash Dashboard</title>
    <style>
        body { font-family: Arial; background: #f1f5f9; margin: 0; color: #1f2937; }
        .header { background: linear-gradient(90deg, #4f46e5, #6366f1); color: white; padding: 20px; text-align: center; font-size: 22px; font-weight: bold; }
        .container { width: 85%; margin: 30px auto; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05); }
        .top-bar { margin-bottom: 15px; }
        .btn-back { background: #4f46e5; padding: 10px 16px; border-radius: 6px; color: white; text-decoration: none; font-size: 14px; }
        .success { background: #ecfdf5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 10px; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { background: #4f46e5; color: white; padding: 12px; }
        td { padding: 12px; text-align: center; border-bottom: 1px solid #e5e7eb; }
        .restore { background: #10b981; padding: 7px 12px; border-radius: 6px; color: white; text-decoration: none; font-size: 13px; }
        .force-delete { background: #ef4444; padding: 7px 12px; border-radius: 6px; color: white; text-decoration: none; font-size: 13px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="header">📦 Trash Products</div>
    <div class="container">
        <div class="card">
            @if(session('success')) <div class="success">{{ session('success') }}</div> @endif
            <div class="top-bar">
                <a href="{{ route('admin.products.index') }}" class="btn-back">⬅ Back to Products</a>
            </div>
            <table>
                <tr><th>ID</th><th>Name</th><th>Action</th></tr>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <a href="{{ route('admin.products.restore', $product->id) }}" class="restore">Restore</a>
                            <form action="{{ route('admin.products.force-delete', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="force-delete" onclick="return confirm('Permanent delete?')">Delete Forever</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">No deleted products found</td></tr>
                @endforelse
            </table>
        </div>
    </div>
</body>
</html>