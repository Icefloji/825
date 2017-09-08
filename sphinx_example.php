<?php
include 'sphinxapi.php'; 
$sc = new SphinxClient();
$sc->setServer('localhost', 9312); 
$res = $sc->query('doc', 'test1');
//view construction   print_r($res);
$id=array_keys($res['matches']); //返回记录主键
//select 查询

?>