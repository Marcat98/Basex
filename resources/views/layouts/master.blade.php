<DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BASE/X</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
  </head>
  <body>
    <header>
    <div class="nav-container">
      <div class="wrapper">
          <nav>
            <a href="{{ route('dashboard') }}" class="logo">BASE/X</a>
            @if(!session()->has('loggedin'))
            <ul class="nav-items">
              <li><a href="#">Examples</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">About</a></li>
            </ul>
            <ul class="login-button" href="#">
              <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            <a href="{{ route('register') }}"><button class="btn" style="vertical-align:middle"><span>Register </span></button></a>
            @else
            <a href="{{ route('logout') }}"><button class="btn" style="vertical-align:middle"><span>Account </span></button></a>
            @endif
          </nav>
      </div>
    </div>
  </header>

  @isset($message)
  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ $message }}
  </div>
  @endisset

  @yield('content')

</body>
</html>
