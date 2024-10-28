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
                <input hidden type="email" id="email" name="email" value="{{ $mail }}">
                <span style="color:red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="input-group">
                {{-- <label for="email">Email:</label> --}}
                <input hidden type="text" id="otp" name="otp" value="{{ $otp }}">
                <span style="color:red">
                    @error('otp')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            {{-- <div class="input-group">
                <label4>New Password:</label4>
                <input type="password" id="password" name="password" required placeholder="Enter your new password">
            </div> --}}
            <div class="input-group">
                <label4 for="password"> New Password:</label4>
                <input type="password" id="password" name="password" required />
                <div id="togglePassword" class="label3">
                    <img id="show-password-img" class="show-password-img" src="{{ asset('image/visibility.png') }}" alt="" />
                    <img id="hide-password-img" class="hide-password-img" src="{{ asset('image/visibility-off.png') }}"
                        alt="" />
                </div>
            </div>
            <button type="submit" class="login-btn">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
          const passwordField = document.getElementById("password");
          const showIcon = document.getElementById("show-password-img");
          const hideIcon = document.getElementById("hide-password-img");

          if (passwordField.type === "password") {
            passwordField.type = "text";
            showIcon.style.display = "none";
            hideIcon.style.display = "inline";
          } else {
            passwordField.type = "password";
            showIcon.style.display = "inline";
            hideIcon.style.display = "none";
          }
        });

        // Set initial visibility state on page load
        document.getElementById("show-password-img").style.display = "inline";
        document.getElementById("hide-password-img").style.display = "none";
      </script>
</body>


</html>
