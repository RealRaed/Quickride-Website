<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Back to the public index
exit;

