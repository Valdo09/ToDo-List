<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		
		
		
		#add{
            position: absolute;
            left: 50%;
            top: 25%;
        }
        .taskListDisplay{
            position: absolute;;
            left: 50%;
            top: 35%;
        }
        .emptydisplay{
        	opacity: 0.4;
        	text-align: center;
        	position: absolute;
        	top: 30%;
        	width: 100%;
        }

	</style>
</head>
<body data-spy="scroll" data-target="#footer">
	<div class="bg-dark">
	<div class="container">
	<nav class="navbar navbar-expand bg-dark">
		
	<a class="navbar-brand " href="index.php">
						<img src="logojpg.jpg" alt="logo" width="40" height="30"/>
					To Do List
	</a>
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">Menu Principal</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="addTask.php">Ajouter une tâche</a>
			</li>
		</ul>
	</nav>
</div>
</div>
	<?php 

	include("dbconnect.php");

	$showTaskList=$bdd->prepare("SELECT task,idtask FROM tasks INNER JOIN users ON tasks.iduser=users.id WHERE iduser=:iduser ");
	$showTaskList->execute(array("iduser"=>$_SESSION['id']));
	$j=$showTaskList->rowCount();
	if($j==0){
		?>
		<div class="emptydisplay">Vous n'avez pas de tâches dans votre liste actuellement.Cliquez sur ajouter une tâche pour en ajouter et la liste apparaîtra ici. </div>
		<?php
	}

	?>

	
		
     <div class="taskListDisplay text-left">
     	<?php 


     			while($retour=$showTaskList->fetch())

     			{

     				echo "<p class=\" taskDisplay\">".$retour['task']."&nbsp<button class=\"btn btn-danger\" onclick=\"document.getElementById('".$retour['task']."').submit()\">Supprimer</button></p>";

     				echo "<form id=\"".$retour['task']."\" action=\"deletetaskid.php\" method=\"POST\"><input type=\"hidden\" name=\"idtaskdelete\" value=\"".$retour['idtask']."\"></form><br/>";
     				
     			}

     		
     	?>

     </div>
     	
	<div class="fixed-bottom" id="footer">
		<?php 
			include("footer.php");
		?>
	</div>
   


     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>