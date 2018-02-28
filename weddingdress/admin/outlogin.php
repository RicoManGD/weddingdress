<?php
session_destroy();
unset($_SESSION);
echo "<script>location.href='login.html';</script>";
?>