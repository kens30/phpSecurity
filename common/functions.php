<?php
// INSERT用汎用関数
function insertTableData($sql){
	global $db_m;

	if( !$db_m->insert($sql) ){
		$err = "データの登録に失敗しました。\n";
		return $err;
	}else{
		return true;
	}
}
// UPDATE用汎用関数
function updateTableData($sql){
	global $db_m;

	// UPDATE用 SQL作成
	if( !$db_m->update($sql) ){
		$err = "データの更新に失敗しました。\n";
		return $err;
	}else{
		return true;
	}
}

// DELETE用汎用関数
function deleteTableData($sql){
	global $db_m;

	if( !$db_m->update($sql) ){
		$err = "データの削除に失敗しました。\n";
	}else{
		return true;
	}
}

function selectTableData($sql)
{
	// DBｲﾝｽﾀﾝｽ
	global $db_m;

	$data = $db_m->fetch($sql);
	return $data;
}

function getUnixTimeMillSecond(){
	$arrTime = explode('.',microtime(true));
	return date('Y/m/d H:i:s', $arrTime[0]) . '.' .$arrTime[1];
}


?>