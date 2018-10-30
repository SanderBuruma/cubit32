<?php
require_once('includes/main.php');
$_SESSION['page'] = "home";
require_once('includes/navbar.php');
?>
<div class="wrapper">
  <form action="index.php">
    <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
    <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
    <input type="text" name="searchInput" id="search-input" placeholder="typ hier uw zoekopdracht!">
  </form>
</div>
<?php
require_once('includes/mainend.php');