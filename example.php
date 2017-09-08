<?php 
use Workerman\Worker;  
require_once __DIR__ . '/Workerman/Autoloader.php';
$ws_worker = new Worker("websocket://127.0.0.1:8081");
$ws_worker->count =1;

$concent_count = 0; //连接数
$ser_free=array();
$ser_on=array();
$user=array('0001','0002','0003','0004');
$ws_worker->onConnect  = function($connection)
{ 
  global $concent_count ;
  $concent_count++;
};
$ws_worker->onMessage = function($connection, $data)
{    echo $data;
   global $ws_worker;
   $ar=explode("-",$data);
   // ar[0]请求类型 ar[1]源ID ar[2]目标ID ar[3]消息体
   switch ($ar[0])
   {
	case 0:
	{
		$ser_free[]=$ar[1];
		$connection->uid=$ar[1];
	}
	case 1:
	{
		 if(empty($ser_free)) $connection->send(0);
		 else {
			 $u=array_shirt($user);
			 $connection->uid=$u;
			 $r=array_shift($ser_free);
			 	 foreach($ws_worker->connections as $conn)
				 if($conn->uid==$r) $conn->send('2-'.$u.'-'.$r.'-0'); //0代表收到请求
			 }
	}
	case 2:
	{
		 foreach($ws_worker->connections as $conn)
		 if($conn->uid==$ar[2]) $conn->send($data);
		}
	case 3;
	{
		$ser_free[]=$ar[2];
		$user[]=$ar[1];
		}
	
   }
   
};
$ws_worker->onClose = function($connection)
{  
 global $concent_count;
    $concent_count--;
};
$ws_worker->runAll();
?>
