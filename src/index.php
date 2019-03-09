<?php
  session_start();
  if ($_SESSION['is_login']) {
    header('Location: home/');
  } else {
    header('Location: accedi/');
  }
?>
