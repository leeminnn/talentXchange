<?php
	require_once 'api/object/favouriteDAO.php';
	$dao = new FavoriteDAO();

	if(isset($_REQUEST['v']) && isset($_REQUEST['username']) && isset($_REQUEST['favuser'])){
		$v = $_REQUEST['v'];
		$username = $_REQUEST['username'];
		$favUser = $_REQUEST['favuser'];
		if($v == 1){
			$result = $dao->addFav($username, $favUser);
		}else{
			$result = $dao->delFav($username, $favUser);
		}
	}
	// }else if(isset($_REQUEST['username'])){
	// 	$username = $_REQUEST['username'];
	// 	$result = $dao->getFavUsername($username);
	// 	foreach($result as $value){
	// 		echo $value;
	// 	}
	// 	// echo $result;
		
		

	// }
	
	

?>