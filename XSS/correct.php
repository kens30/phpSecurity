<?php
require '../common/common.php';

$query = "SELECT";
$query = $query . " T1.* ";
$query = $query . "FROM TEST_TABLE T1 ";
$query = $query . "WHERE T1.CONDITION_KEY = 'XSS' ";

$rows = selectTableData($query);

$doc = <<< EOM
<html>
  <head>
    <title>sample of method for dealing with XSS</title>
  </head>
  <body>
    <p>htmlspecialchars($rows[0]['COLUMN1'],ENT_QUOTES, 'UTF-8')</p>
  </body>
</html>
EOM;

echo $doc;
