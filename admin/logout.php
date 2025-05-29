<?php
session_start();
session_unset();
session_destroy();
header("Location: /QuickRide/index.php"); // Back to the public index
exit;

