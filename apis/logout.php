<?php

session_start();
session_destroy();
header("Location: http://localhost/api_ajax/index.php");
?>