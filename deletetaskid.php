<?php 
	
	include('dbconnect.php');
		$id=$_POST['del-champ'];
		$req=$bdd->prepare("DELETE from tasks WHERE idtask=?");
		$req->execute(array($id));
		header("location:menu.php? message=Deleted");
	
	
	
	
	?>
	
	