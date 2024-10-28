

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
  </head>
  <style>
    /****************************** Login section ***************************** */

  </style>
  <body class="loginBody">
    <div class="login-container">
      <img class="login-image" src="image/Qalat-Logo.png" alt="" />
      @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
      <form id="login-form" action="check" method="POST">
        @csrf
        <div class="input-group">
          <label1 for="email">Email:</label1>
          <input type="email" id="email" name="email" required />
          <span style="color:red">@error('email'){{$message}}@enderror</span>
        </div>
        <div class="input-group">
          <label2 for="password">Password:</label2>
          <input type="password" id="password" name="password" required />
          <div id="togglePassword" class="label3">
            <img
            id="show-password-img"
              class="show-password-img"
              src="image/visibility.png"
              alt=""
            />
            <img
            id="hide-password-img"
              class="hide-password-img"
              src="image/visibility-off.png"
              alt=""
            />
          </div>
        </div>
        <button type="submit" class="login-btn">Login</button> <br>
        {{-- <p class="forgot-passtext">Forgot Password?</p> --}}
        <a href="/forgot-pass1" class="forgot-passtext">Forgot Password?</a>
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



































{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
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
        <h1>Login</h1>
        <form id="login-form" action="check" method="POST">
            @csrf

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
{{-- </body>
</html> --}}
