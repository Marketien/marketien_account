<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="loginBody">
    <div class="login-container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
        <h1>Password</h1>
        <form id="login-form" action="/reset-pass" method="POST">
            @csrf
            <div class="input-group">
                {{-- <label for="email">Email:</label> --}}
                <input hidden type="email" id="email" name="email" value="{{$mail}}">
                <span style="color:red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="input-group">
                {{-- <label for="email">Email:</label> --}}
                <input hidden type="text" id="otp" name="otp" value="{{$otp}}">
                <span style="color:red">
                    @error('otp')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="input-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your new password">
            </div>
            <button type="submit" class="login-btn" >Submit</button>
        </form>
    </div>
    {{-- <script src="js/script.js"></script> --}}
</body>
</html>
