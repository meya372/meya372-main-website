<?php
if (isset($_SESSION['meya_login']) == false) { //if the user doesn't logged in
    header('location:index.php?error=not_loggedin');
}
