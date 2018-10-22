<?php
require('component/main.php');
$_SESSION['page'] = "home";
require('component/navbar.php');
?>
<div class="wrapper">
  <input id="search-input" placeholder="type hier uw zoekopdracht!">
</div>
<?php
require('component/mainend.php');