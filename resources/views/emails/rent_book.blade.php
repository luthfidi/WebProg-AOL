<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Rental Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .footer {
            font-size: 14px;
            text-align: center;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 120px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo Section -->
        <img src="https://img.freepik.com/premium-vector/cute-funny-logo-library-company_1322560-51991.jpg" alt="Library Logo" class="logo">

        <!-- Greeting and Book Rental Information -->
        <h1>Hello, {{ $userName }}!</h1>
        <p>Thank you for renting the book <strong>"{{ $bookName }}"</strong>.</p>
        <p>We hope you enjoy reading it and find it useful!</p>

        <!-- Footer Section -->
        <div class="footer">
            <p>If you have any questions, feel free to contact us at <a href="mailto:support@library.com">support@library.com</a>.</p>
            <p>Best regards,<br>Your Library Team</p>
        </div>
    </div>
</body>

</html>
