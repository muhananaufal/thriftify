<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit User Profile - Visual - Mobile Phone Marketplace</title>
</head>

<body>
  <div class="container">
    <h1>Need Confirmation</h1>
    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-header">
                Order #{{ $order->id }} - Total: ${{ $order->total_price }}
            </div>
            <div class="card-body">
                <p><strong>Store:</strong> {{ $order->store->name }}</p>
                <p><strong>Payment Date:</strong> {{ $order->updated_at }}</p>
                <p><strong>Shipping Method:</strong> {{ $order->shipping_method }}</p>
                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
                <h5>Products:</h5>
                <ul>
                    @foreach($order->orderItems as $item)
                        <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ $item->price }} - 

                        </li>
                    @endforeach
                    <form action="{{ route('confirmation.reject', $order->id) }}" method="POST">
                      @method('put')
                        @csrf                    
                        <button type="submit" class="btn btn-primary">Rejected Order</button>
                    </form>
                </ul>
            </div>
        </div>
    @endforeach
</div>
</body>

</html>
