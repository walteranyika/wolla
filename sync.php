<?php
//sync.php
 mysql_connect("localhost","root","");
 mysql_select_db("lesson17");
 if( !isset($_POST['json']) )
 {
	exit; 
 }
 extract($_POST);
 $data = json_decode($json);
 $response=array();
 for($i=0; $i<count($data); $i++)
 {
   $uid=  $data[$i]->uid;
   $names=$data[$i]->names;
   $qty=  $data[$i]->quantity;
   $sql="insert into products values('','$uid','$names','$qty')";  
   $res= mysql_query($sql);
	if($res)
	{
	  $response[]=array("uid"=>$uid, "status"=>"yes");	
	}
	else
	{
	  $response[]=array("uid"=>$uid, "status"=>"no");		
 	}
 }
 echo json_encode($response);
?>



