<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="loginBody">
    <div class="login-container">
        <h1>Email</h1>
        <form id="login-form" action="/otp-generate" method="POST">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <span style="color:red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="login-btn">Next</button>
        </form>
    </div>

    {{-- <script src="js/script.js"></script> --}}
</body>

</html>
