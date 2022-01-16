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
		
		
		
		 /* #add{
            position: absolute;
            left: 50%;
            top: 25%;
        }
        .taskListDisplay{
            position: absolute;;
            left: 50%;
            top: 35%;
        } */
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

	
		
<div class="container-fluid">
	<h4 class="mt-5 text-center">Liste des tâches</h4>
     	<?php 


     			while($retour=$showTaskList->fetch())

     			{

     				?>
		<div class="row my-5">
			<div class="col-8">
				<?php echo $retour['task'];?>
			</div>
			<div class="col-2">
				<button type="submit" class="btn btn-warning">Editer</button>
			</div>
			<div class="col-2">
				<form action="#" method="post">
					<input type="hidden" name="del-champ"value="<?php echo $retour['idtask'];?>">
					<button type="submit" class="btn btn-danger" name="sup" id="delete">Supprimer</button>
				</form>
				<div id="confirm" class="modal hide fade">
				<div class="modal-body">
					Etes-vous sûr de vouloir supprimer?
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-primary" id="<?php echo $retour['idtask'];?>">Oui</button>
					<button type="button" data-dismiss="modal" class="btn">Annuler</button>
				</div>
</div>
				
			</div>

	</div>
	<?php
     			}

     		
     	?>

     </div>
     	
	<div class="fixed-bottom" id="footer">
		<?php 
			include("footer.php");
		?>
	</div>
	<?php 
	if(isset($_POST['sup']))
	{
		$id=$_POST['del-champ'];
		$req=$bdd->prepare("DELETE from tasks WHERE idtask=?");
		$req->execute(array($id));
		header("location:menu.php");
	}
	
	
	?>
	<script type="text/javascript">
		$('button[name="sup"]').on('click', function(e) {
		var $form = $(this).closest('form');
		e.preventDefault();
		$('#confirm').modal({
			backdrop: 'static',
			keyboard: false
		})
		.on('click', '#delete', function(e) {
			$form.trigger('submit');
			});
		});

	</script>
	
   


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>