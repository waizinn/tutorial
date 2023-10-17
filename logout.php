<?php
session_start();
session_unset(); // remove all global session variable;
session_destroy(); // delete entire connection;
header ("Location: index.php");
exit;