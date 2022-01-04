<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    </head>
    <body>
      <header>
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
      </header>

      <section id="showcase">
        <div class="content">
          <h1>Hit your <br> target <u style="text-decoration-color: #0078E7"> every </u>  <br> time</h1>
          <p class="par">Never miss with our online BASE/X radar tool</p>
          <a href="{{ route('register') }}"><button class="btn" style="vertical-align:middle"><span>Join us </span></button></a>
        </div>
      </section>

      <section id="boxes">
        <div class="container">
          <div class="box">
            <div class="text">
              <p class="motto">At BASE/X Inc. it is our goal to provide you
                a flexible,<br> yet complete solution to identify,
                define and summarize your <br> service-based business model
              </p>
            </div>
          </div>
          <div class="box1">
            <div class="logo-box">
              <h3>Proud partners we have worked with:</h3>
            </div>
          </div>
        </div>
      </section>

      <footer class="footer">
        <p>BASE/X Inc. Copyright &copy; 2022</p>
      </footer>

    </body>
</html>
