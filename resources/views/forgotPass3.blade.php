<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="loginBody">
    <div class="login-container">
        <h1>Password</h1>
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
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your new password">
            </div>
            <button type="submit" class="login-btn" >Submit</button>
        </form>
    </div>
    {{-- <script src="js/script.js"></script> --}}
</body>
</html>
