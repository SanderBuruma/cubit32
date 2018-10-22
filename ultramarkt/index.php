<?php
require('component/main.php');
$_SESSION['page'] = "home";
require('component/navbar.php');
?>
<div class="wrapper">
  <form action="./">
    <input type="text" name="searchInput" id="search-input" placeholder="typ hier uw zoekopdracht!">
  </form>
</div>
<?php
require('component/mainend.php');