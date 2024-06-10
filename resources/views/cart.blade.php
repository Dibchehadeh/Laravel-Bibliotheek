<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Your Cart</h1>
        @if(count($cart) > 0)
            <ul class="list-group mb-4">
                @foreach($cart as $id => $details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">{{ $details['title'] }}</h5>
                            <p class="mb-1">${{ $details['price'] }} x {{ $details['quantity'] }}</p>
                        </div>
                        <span class="badge badge-primary badge-pill">${{ $details['price'] * $details['quantity'] }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Total: ${{ $total }}</h4>
                <a href="/checkout" class="btn btn-success">Proceed to Checkout</a>
            </div>
            <form action="/checkout" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="payment_method">Choose a payment method:</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="Ideal">Ideal</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="PayPal">PayPal</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Checkout</button>
            </form>
        @else
            <div class="alert alert-info text-center">
                Your cart is empty.
            </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
