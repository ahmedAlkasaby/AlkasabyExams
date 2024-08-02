<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (App::getlocale() =="en")

      <li  class="nav-item"><a href=" {{ route('lang',['lang'=>'ar']) }} ">ع</a></li>

      @else
      <li  class="nav-item"><a href="{{ route('lang',['lang'=>'en']) }}">E</a></li>
      @endif
    </ul>

  </nav>
  <!-- /.navbar -->
