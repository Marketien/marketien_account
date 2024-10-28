<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
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
        <h1>OTP</h1>
        <form id="login-form" action="/otp-check" method="POST">
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
                <label1 for="email">OTP:</label1>
                <input type="text" id="otp" name="otp">
                <span style="color:red">
                    @error('otp')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <p class="forgot-passtext"><a href="/resend-otp/{{$mail}}">resend code again</a></p>

            <button type="submit" class="login-btn">Submit</button>
        </form>
    </div>

    {{-- <script src="js/script.js"></script> --}}
</body>

</html>
