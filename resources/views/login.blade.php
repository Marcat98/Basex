<DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
  </head>
  <body>
    <div class="nav-container">
      <div class="wrapper">
          <nav>
            <a href="{{ route('home') }}" class="logo">
              BASE/X
            </a>
            <ul class="nav-items">
              <li><a href="#">Examples</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">About</a></li>
            </ul>
            <ul class="login-button" href="#">
              <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            <a href="{{ route('register') }}"><button class="btn" style="vertical-align:middle"><span>Register </span></button></a>
          </nav>
      </div>
    </div>
    <div class="main">
      <p class="sign" align="center">Login.</p>
      <form class="form1">
        <input class="un" type="text" align="center" placeholder="Username">
        <input class="pass" type="password" align="center" placeholder="Password">
        <a href="projects.html" class="submit" align="center">Sign in</a>
        <p class="forgot" align="center"><a href="#">Forgot Password?</p>
    </div>
  </body>
</html>
