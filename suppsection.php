<?php
  include 'loginBDD.php';

  $query = $pdo->prepare("DELETE FROM section WHERE `section` = '".$_POST["section"]."'");
  $query->execute();

  header('Location: section.php');
