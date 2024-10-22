<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="loginBody">
    <div class="login-container">
        <h1>Login</h1>
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
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
                <span style="color:red">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn" >Login</button>
        </form>
        <a href="/forgot-pass1">forgot your password?</a>
    </div>

    {{-- <script src="js/script.js"></script> --}}
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login">
</head>
<body class="loginBody">
    <div class="login-container">
        <h1>Login</h1>
        <form id="login-form" action="check" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn" >Login</button>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html> --}}
