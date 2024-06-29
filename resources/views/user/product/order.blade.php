<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Order #{{ $order->id }} Details</h1>
    <div class="card mb-3">
        <div class="card-header">
            Order #{{ $order->id }} - Total: ${{ $order->total_price }}
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Payment Date:</strong> {{ $order->updated_at }}</p>
            <p><strong>Shipping Method:</strong> {{ $order->shipping_method }}</p>
            <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
            <h5>Products:</h5>
            <ul>
                @foreach($order->orderItems as $item)
                    <li> <img src="{{ $item->product->picture }}" alt="">    {{ $item->product->name }} -Quantity: {{ $item->quantity }} - Price: ${{ $item->price }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('checkout.index') }}" class="btn btn-primary">Back to Checkout</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
