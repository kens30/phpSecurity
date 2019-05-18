<?php
# URL末尾にパラメータでスクリプト文字列を渡される前提
# <script>alert('test')</script>などの文字列をそのままHTMLに吐き出すと実行される

$value = "";
if(isset($_GET['value']) === true) {
	$value = $_GET['value'];
}else {
	$value = "通常のGETアクセス";
}

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