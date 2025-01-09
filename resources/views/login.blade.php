<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="login-container">
            <h2 class="text-center">Login Here</h2>
            <form action="{{ route('loginUser') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pwd">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-0">Submit</button>
            </form>
            <div class="footer">
                <p><a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>

</body>
</html>
