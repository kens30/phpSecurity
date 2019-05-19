<?php
require 'DBUtil.class.php';

define("CONNECTION_HOST", "localhost");
define("CONNECTION_USER", "KENS30");
define("CONNECTION_PASS", "phpsecurity");
define("CONNECTION_DB", "phpsecurity");

$db_m = new DBUtil(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASS, CONNECTION_DB);
