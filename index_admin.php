<div class="container_admin">
<?php
session_start();
require_once("admin/config/db.php");
require_once("admin/models/request.php");
require_once("admin/models/information.php");
require_once("admin/layout/header.php");
require_once("admin/layout/menu.php");
if (isset($_GET["action"]) && file_exists("admin/views/" . $_GET['action'] . ".php")) {
    require_once("admin/views/" . $_GET['action'] . ".php");
}else{
    require_once("admin/views/main.php");
}
require_once("admin/layout/footer.php");

?>
</div>