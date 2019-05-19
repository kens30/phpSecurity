<?php
# DBから取得した値を表示させる際、スクリプトタグが埋め込まれている場合を想定
# 攻撃が成功すると、強制的にyahooポータルのトップへ遷移する

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
    <p>$rows[0]['COLUMN1']</p>
  </body>
</html>
EOM;

echo $doc;
