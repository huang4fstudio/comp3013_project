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
        include('../modules/check_login.php');

        $username = $_SESSION['name'];
        $password = $_SESSION['password'];

        //Check if have username and password
        if(!$username && !$password){
          echo "<li class='navbar-text'>Hello Guest!</li> <li><a href='login.php'>Login</a><li> <li><a href='register.php'>Register</a><li>";
        }
        else{
          echo "<li>Hello ".$username."</li>";
        }
        ?>
      <li><a href="newlisting.php">Sell</a></li>
      <li><a href="cart.php">Cart</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Your EBid<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="profile.php">Profile</a></li>
          <li class="divider"></li>
          <li><a href="buying.php">Buying</a></li>
          <li class="divider"></li>
          <li><a href="selling.php">Selling</a></li>
          <li class="divider"></li>
          <li><a href="watchlist.php">Watchlist</a></li>
          <li class="divider"></li>
          <li><a href="settings.php">Settings</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>
