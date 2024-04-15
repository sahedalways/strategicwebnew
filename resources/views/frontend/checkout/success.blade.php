<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strategic Web - Payment Successful</title>

    {{-- <link rel="icon" type="image/png"
        href="{{ asset('images/site-settings' . "/{$settings->id}-2.{$settings->favicon}") }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .payment-success {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* .payment-success i {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 20px;
        } */

        .payment-success h2 {
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="payment-success text-center">
            <img style="width: 100px" src="{{ asset('images/verified.gif') }}" alt="img">
            <h2 class="mt-3">Payment Successful!</h2>
            <p>Your payment has been successfully processed.</p>
            <p>Payment ID: #{{ $purchaseId }}</p>
            <a href="/" class="btn btn-outline-dark">Continue Buying</a>
        </div>
    </div>

</body>

</html>
