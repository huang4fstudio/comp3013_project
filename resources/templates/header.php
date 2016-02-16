<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <!--Responsive Dropdown for smaller screenss-->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/index.php">EBid</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <ul class="nav navbar-nav navbar-right">
        <?php
        //db_connect();
        include_once('../modules/check_login.php');

        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        //Check if have username and password
        if(!$username && !$password){
          echo "<li class='navbar-text'>Hello Guest!</li> <li><a href='login.php'>Login</a><li> <li><a href='register.php'>Register</a><li>";
        }
        else{
          echo "<li>Hello ".$username."</li>";
        }
        ?>
      <li><a href="#">Cart</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Account</a></li>
          <li class="divider"></li>
          <li><a href="#">Bids</a></li>
          <li class="divider"></li>
          <li><a href="#">Items</a></li>
          <li class="divider"></li>
          <li><a href="#">Watchlist</a></li>
          <li class="divider"></li>
          <li><a href="#">Settings</a></li>

        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>
