<?php
    session_start();

    if (!isset($_SESSION['name']) || $_SESSION['name'] == "")
    {
      if (isset($_COOKIE['name']))
        $_SESSION['name'] = $_COOKIE;
    }
?>
<link rel="stylesheet" href="header.css">
<?php
  require_once 'header.php';
  require_once 'element.php';
  require_once 'footer.php';
 ?>
