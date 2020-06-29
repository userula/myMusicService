<link rel="stylesheet" href="style/main.css"></link>
<?php 
    include('User.php');
    session_start();
    if(isset($_SESSION['user']))
    {
        $u = $_SESSION['user'];
        $user = new User($u['id'], $u['fname'], $u['lname'], $u['email'], $u['pass']);
        $logout = <<<logout
        <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        logout;
    } 
    else
    {
        $user = new User(404, '', '', '', '');
        $logout = <<<auth
        <li><a href="regMain.php"><span class="glyphicon glyphicon-log-in"></span> Authentication</a></li>
        auth;
    }
?>
<nav class="navbar navbar-inverse navbar-expand-lg" id="asd">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="mainpage.php">Ulasken</a>
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
              <li><a href="mainpage.php">Home</a></li>
              <li><a href="<?php echo ($user->getId() == 404 ? 'regMain.php' : 'UserPlaylist.php'); ?>">Your Playlists</a></li>
              <li><a href="artistListLoad.php">Artists</a></li>
              <li><a href="songs.php">Songs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo ($user->getId() == 404 ? 'regMain.php' : '#') ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $user->getFname()." ".$user->getLname(); ?> </a></li>
              <?php echo $logout; ?>
            </ul>
            <form class="navbar-form navbar-left" action="find_song.php" method="get">
              <div class="form-group searchMuzz">
                <input type="text" name="findsmth" class="form-control" placeholder="Search">
              </div>
              <button type="submit" name="search" class="btn btn-default">Search</button>
            </form>
          </div>
        </div>
</nav>
<br><br>
<style type="text/css">
  .searchMuzz input[type=text] {
  transition: width 0.4s ease-in-out;
}

 .searchMuzz input[type=text]:focus {
  width: 100%;
}
</style>