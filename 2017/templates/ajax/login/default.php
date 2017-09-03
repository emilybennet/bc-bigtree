<?
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require('post.php');
  } else {
    require('get.php');
  }