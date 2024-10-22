<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="loginBody">
    <div class="login-container">
        <h1>OTP</h1>
        <form id="login-form" action="check" method="POST">
            @csrf
            <div style="color:greenyellow;">
                @if(Session::get('fail'))
                <div style="color:red;">
                    {{Session::get('fail')}}
                </div>
                @endif
            </div>
            <div class="input-group">
                <label for="email">OTP:</label>
                <input type="text" id="otp" name="otp" >
                <span style="color:red">@error('otp'){{$message}}@enderror</span>
                <a href="">resend code again</a>
            </div>

            <button type="submit" class="login-btn" >Submit</button>
        </form>
    </div>

    {{-- <script src="js/script.js"></script> --}}
</body>
</html>
