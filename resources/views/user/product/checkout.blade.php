<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Checkout - Visual - Mobile Phone Marketplace</title>
</head>
<body>

<div class="container">
    <h1>Checkout</h1>
    @foreach($orders as $order)
        <p>Your order will be automatically rejected after 200 seconds system if you have not made payment after checkout</p>
        <a class="card mb-3 text-decoration-none" href="{{ route('checkout.show', $order->id) }}">
            <div class="card-header">
                Order #{{ $order->id }} - Total: ${{ $order->total_price }}
            </div>
            <div class="card-body">
                <p><strong>Shipping Method:</strong> {{ $order->shipping_method }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <h5>Products:</h5>
                <ul>
                    @foreach($order->orderItems as $item)
                        <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ $item->price }}</li>
                    @endforeach
                </ul>
                <form action="{{ route('checkout.pay', $order->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Pay</button>
                </form>
            </div>
        </a>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var timer = 200;
        var interval = setInterval(function () {
            var minutes = Math.floor(timer / 60);
            var seconds = timer % 60;
            document.getElementById('timer').textContent = minutes + ":" + (seconds < 10 ? '0' + seconds : seconds);
            timer--;
            if (timer < 0) {
                clearInterval(interval);
                document.getElementById('timer').textContent = "Time's up!";
            }
        }, 1000);
    });
</script>


</body>
</html>
