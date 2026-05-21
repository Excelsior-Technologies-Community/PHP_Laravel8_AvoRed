<!DOCTYPE html>
<html>

<head>
    <title>Products Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body { font-family: Arial; background: #eef2f7; margin: 0; }
        .header { background: linear-gradient(90deg, #4f46e5, #7c3aed); color: white; padding: 20px; text-align: center; font-size: 22px; font-weight: bold; }
        .container { width: 85%; margin: 30px auto; }
        .card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08); }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .btn { padding: 10px 14px; border-radius: 6px; text-decoration: none; color: white; font-size: 14px; }
        .btn-trash { background: #ef4444; }
        input { padding: 10px; width: 250px; border: 1px solid #ddd; border-radius: 6px; }
        button { padding: 10px 14px; border: none; background: #4f46e5; color: white; border-radius: 6px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; border-radius: 10px; overflow: hidden; }
        th { background: #4f46e5; color: white; padding: 12px; }
        td { padding: 12px; text-align: center; border-bottom: 1px solid #eee; }
        .delete { background: #ef4444; padding: 6px 10px; border-radius: 5px; color: white; text-decoration: none; cursor: pointer; }
        .success { background: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 10px; text-align: center; }
        .pagination { margin-top: 25px; text-align: center; }
        .page { display: inline-block; margin: 4px; padding: 8px 14px; border-radius: 6px; background: #f1f5f9; color: #333; text-decoration: none; font-size: 14px; }
        .page.active { background: #4f46e5; color: white; }
    </style>
</head>

<body>

    <div class="header">📦 Product Management Dashboard</div>

    <div class="container">
        <div class="card">

            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session("success") }}',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>
            @endif

            <div class="top-bar">
                <form method="GET" action="{{ route('admin.products.index') }}">
                    <input type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                    <button type="submit">Search</button>
                </form>

                <a href="{{ route('admin.products.trash') }}" class="btn btn-trash">🗑 View Trash</a>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" id="delete-form-{{ $product->id }}">
                                @csrf
                                <button type="button" class="delete" onclick="confirmDelete('{{ $product->id }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No products found</td>
                    </tr>
                @endforelse
            </table>

            <div class="pagination">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This product will be moved to trash!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
</body>
</html>