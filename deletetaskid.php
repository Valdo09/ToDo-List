<?php 

		if(isset($_POST['idtaskdelete']))
     		{
     				include("dbconnect.php");
					$suppression=$bdd->prepare("DELETE  FROM tasks WHERE idtask=?");
					$suppression->execute(array($_POST['idtaskdelete']));
					
					$success="The task has been deleted !";
					header("location:menu.php?message=$success");
     		}
?>