<?php
  $sql = "select * from current_logged_user";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

?>

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="custhome.php"><b>Bhok Lagyo</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="welcome"><a href="custhome.php">Welcome <?php echo $row['email']; ?></a></li>
        <li><a href="custhome.php">Menu</a></li>
        <li><a href="custorder.php">Order</a></li>
        <li><a href="myhistorycust.php">My History</a></li>
        <li><a href="custlogout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>