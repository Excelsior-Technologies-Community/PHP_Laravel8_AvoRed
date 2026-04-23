<!DOCTYPE html>
<html>

<head>
    <title>Products Dashboard</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f7;
            margin: 0;
        }

        .header {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            width: 85%;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-trash {
            background: #ef4444;
        }

        .btn-trash:hover {
            background: #dc2626;
        }

        input {
            padding: 10px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        button {
            padding: 10px 14px;
            border: none;
            background: #4f46e5;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #4f46e5;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f9fafb;
        }

        .delete {
            background: #ef4444;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .delete:hover {
            background: #dc2626;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            text-align: center;
        }

        /* 🔥 MODERN PAGINATION */
        .pagination {
            margin-top: 25px;
            text-align: center;
        }

        .page {
            display: inline-block;
            margin: 4px;
            padding: 8px 14px;
            border-radius: 6px;
            background: #f1f5f9;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .page:hover {
            background: #4f46e5;
            color: white;
        }

        .page.active {
            background: #4f46e5;
            color: white;
            font-weight: bold;
        }

        .page.disabled {
            background: #e5e7eb;
            color: #aaa;
            pointer-events: none;
        }

        .no-data {
            padding: 15px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="header">📦 Product Management Dashboard</div>

    <div class="container">

        <div class="card">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            {{-- Search + Trash --}}
            <div class="top-bar">
                <form method="GET">
                    <input type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                    <button>Search</button>
                </form>

                <a href="/admin/products/trash" class="btn btn-trash">🗑 View Trash</a>
            </div>

            {{-- Table --}}
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
                            <a href="/admin/products/delete/{{ $product->id }}" class="delete"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="no-data">No products found</td>
                    </tr>
                @endforelse

            </table>

            {{-- 🔥 CUSTOM PAGINATION --}}
            <div class="pagination">

                {{-- Previous --}}
                @if ($products->onFirstPage())
                    <span class="page disabled">«</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="page">«</a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                        <span class="page active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="page">»</a>
                @else
                    <span class="page disabled">»</span>
                @endif

            </div>

        </div>
    </div>

</body>

</html>