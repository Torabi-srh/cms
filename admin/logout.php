<?php
require '../assets/functions.php';
  //sec_session_start();
  //session_start();
  sessionStart("Login");
  $mysqli = isset($mysqli) ? $mysqli : Connection();

  $sql = "UPDATE `admin` SET `login_session`='' WHERE `id`='" . $mysqli->escape_string($_SESSION['user_id']) ."'";
  if ($stmt = $mysqli->prepare($sql)) {
      $stmt->execute();
  }
  $mysqli->close();
  $_SESSION = array();
  session_unset();
  $params = session_get_cookie_params();
  setcookie(session_name(),
          '', time() - 42000,
          $params["path"],
          $params["domain"],
          $params["secure"],
          $params["httponly"]);
  ini_set('session.gc_max_lifetime', 0);
  ini_set('session.gc_probability', 1);
  ini_set('session.gc_divisor', 1);
  session_destroy();
  if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
  }
  safeRedirect("login.php");
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="alerts">
    <?PHP echo $globals["errors"]; ?>
  </div>
</body>
</html>
