<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategic Web -Payment Cancelled</title>

    {{-- <link rel="icon" type="image/png"
        href="{{ asset('images/site-settings' . "/{$settings->id}-2.{$settings->favicon}") }}"> --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .payment-cancel {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* .payment-cancel i {
      font-size: 50px;
      color: #dc3545;
      margin-bottom: 20px;
    } */
        .payment-cancel h2 {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="payment-cancel text-center">
            <img style="width: 50px;" src="{{ asset('images/240x320-cross-mark_274c.gif') }}" alt="img">
            <h2 class="mt-3">Payment Cancelled!</h2>
            <p>Your payment has been cancelled.</p>
            <a href="/" class="btn btn-outline-dark">Return to Home</a>
        </div>
    </div>
</body>

</html>
