 <!-- Static navbar -->
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('/')}}">yukbaca</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <?php if (Confide::user()): ?>
            <li><a href="{{ URL::route('projects.index')}}">Project</a></li>
              <li><a href="{{ URL::route('books.index')}}">Store</a></li>
              <li><a href="{{ URL::route('authors.index')}}">Author</a></li>
              <li><a href="#">Online Writing</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post Project <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Cetak</a></li>
                </ul>
              </li>
          <?php else: ?>
             <li><a href="{{ URL::route('projects.index')}}">Project</a></li>
              <li><a href="{{ URL::route('books.index')}}">Store</a></li>
              <li><a href="{{ URL::route('authors.index')}}">Author</a></li>
              <li><a href="#">Online Writing</a></li>
              <li>
                <form class="navbar-form navbar-right">
                  <input type="text" placeholder="Search..." class="form-control">
                </form>
              </li>
          <?php endif ?>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (Confide::user()): ?>
          <li><a href="#">Hi! <?php echo Confide::user()->username; ?></a></li>
          <li><a href="/cart">Cart</a></li>
          <li><a href="{{ URL::route('users.logout')}}">Logout</a></li>
        <?php else: ?>
          <li><a href="{{ URL::route('users.login')}}">Login</a></li>
          <li><a href="{{ URL::route('users.signup')}}">SignUp</a></li>
        <?php endif ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>