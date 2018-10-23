<?php
require('component/main.php');
$_SESSION['page'] = "home";
require('component/navbar.php');
?>
<div class="wrapper">
  <form action="./">
    <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
    <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
    <input type="text" name="searchInput" id="search-input" placeholder="typ hier uw zoekopdracht!">
  </form>
</div>
<?php
require('component/mainend.php');