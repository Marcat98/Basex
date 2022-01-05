<DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Projects</title>
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
              <a href="{{ route('dashboard') }}"><button class="btn" style="vertical-align:middle"><span>Account </span></button></a>
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
  
  <section>
    <div class="sidenav">
      <a href="#"><button class="prjct-btn" style="vertical-align:middle"><span>New Project </span></button></a>
      <a href="#">Your Projects</a>
      <a href="#">Shared With You</a>
    </div>

    <div class="prjct-title">
      <h1>Projects</h1>
    </div>
  </section>

  <div class="share-link">
    <a href="javascript:;" class="btn open-modal">Share Link</a>
  </div>
    <div class="modal">
      <div class="modal_head">
        <h2 class="modal_title">Share.</h2>
        <a href="javascript:;" class="modal_close">
          <i class='bx bx-x'></i>
        </a>
      </div>
      <div class="modal_body">
        <h3 class="modal_name">Share this link:</h3>
        <div class="modal_label">
          <input type="text" class="modal_input" value="file:///C:/Users/Max/Documents/Master%20DS/Projects/Project%201/Web/projects.html">
          <button class="link-btn">Copy</button>
        </div>
      </div>
    </div>
  </section>

    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
