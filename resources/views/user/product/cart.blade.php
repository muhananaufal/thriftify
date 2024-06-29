<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Cart - Mobile Phone Marketplace</title>
</head>

<body>
<div class="container">
    <h1>Cart</h1>
    @if($cart)
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                <tr>
                    <td><input type="checkbox" name="products[]" value="{{ $id }}"></td>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>${{ $details['price'] }}</td>
                    <td>${{ $details['price'] * $details['quantity'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group">
            <label for="shipping_method">Shipping Method:</label>
            <select id="shipping_method" name="shipping_method" class="form-control">
                <option value="JNE">JNE</option>
                <option value="JNT">JNT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" class="form-control">
                <option value="BRI">BRI</option>
                <option value="BNI">BNI</option>
            </select>
        </div>
        <div class="text-right">
            <h4>Total: ${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}</h4>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
    </form>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>
</body>

</html>
