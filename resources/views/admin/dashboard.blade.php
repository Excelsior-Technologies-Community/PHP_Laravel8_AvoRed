<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f1f5f9;
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
            width: 80%;
            margin: 40px auto;
        }

        .grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 250px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 18px;
            color: #555;
        }

        .count {
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
            color: #111827;
        }

        .product {
            border-top: 4px solid #4f46e5;
        }

        .order {
            border-top: 4px solid #22c55e;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="header">
    🛠 Admin Dashboard
</div>

<div class="container">

    <div class="grid">

        <!-- PRODUCTS CARD -->
        <div class="card product">
            <div class="icon">📦</div>
            <div class="title">Total Products</div>
            <div class="count">{{ $totalProducts }}</div>
        </div>

        <!-- ORDERS CARD -->
        <div class="card order">
            <div class="icon">🛒</div>
            <div class="title">Total Orders</div>
            <div class="count">{{ $totalOrders }}</div>
        </div>

    </div>

    <div class="footer">
        Laravel AvoRed Admin Panel
    </div>

</div>

</body>
</html>