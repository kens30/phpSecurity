<?php

$value = "";
if(isset($_GET['value']) === true) {
	$value = $_GET['value'];
}else {
	$value = "通常のGETアクセス";
}
# 必ずエスケープ処理を実施してからHTMLに出力
$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

$doc = <<< EOM
<html>
  <head>
    <title>sample of method for dealing with ScriptInsertion</title>
  </head>
  <body>
    <p>$value</p>
  </body>
</html>
EOM;

echo $doc;