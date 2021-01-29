<?php
session_start();

if(isset($_GET['opc'])){
  switch ($_GET['opc']) {
    case 'logout':
      session_destroy();
      header("Location:login.php");
      break;
  }
}
