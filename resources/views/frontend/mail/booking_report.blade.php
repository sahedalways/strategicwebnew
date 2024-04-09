<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
    <style>
        /* Global reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        /* Container styles */
        .container {
            max-width: 800px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header styles */
        .header {
            text-align: center;
            padding: 30px 0;
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .header h2 {
            font-size: 24px;
        }

        /* Info styles */
        .info {
            padding: 30px;
        }

        .info p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .info p strong {
            font-weight: bold;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: #fff;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .footer p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Booking Receipt</h2>
        </div>
        <div class="info">
            <p><strong>Booking ID:</strong> {{ $data['booking_id'] }}</p>
            <p><strong>Member Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Member Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Member Phone Number:</strong> {{ $data['member_phone_number'] }}</p>
            <p><strong>Game Name:</strong> {{ $data['game_name'] }}</p>
            <p><strong>Courts:</strong> {{ $data['courts'] }}</p>
            <p><strong>Date:</strong> {{ $data['date'] }}</p>
            <p><strong>Start Time:</strong> {{ $data['start_time'] }}</p>
            <p><strong>End Time:</strong> {{ $data['end_time'] }}</p>
            <p><strong>Price:</strong> {{ $data['price'] }}</p>
            <p><strong>Tax(13%):</strong> {{ $data['tax'] }}</p>
            <p><strong>Booked By:</strong> {{ $data['booked_by'] }}</p>
            <p><strong>Used VIP Code:</strong> {{ $data['used_vip_code'] }}</p>
            <p><strong>Payment Method:</strong> By Cash</p>
        </div>
        <div class="footer">
            <p>Sportify Book</p>
        </div>
    </div>
</body>

</html>
