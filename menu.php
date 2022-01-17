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

	
<?php 
	if(isset($_GET['message'])){
		if($_GET['message']=='Modified')
		{
			?>
			<div class="alert alert-info fade show alert-dismissible">
			<p alert-success>Votre tâche a été bien modifée</p>
		<button role="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">x</span>
		</button>
			</div>
	
			
		<?php
		}
		else if($_GET['message']=='Deleted')
		{
			?>
			<div class="alert alert-danger fade show alert-dismissible">
			<p alert-success>Tâche supprimée</p>
		<button role="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">x</span>
		</button>
			</div>
	
			
		<?php

		}
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
				<a type="button" href="edit-task.php?task=<?php echo sha1($retour['idtask']);?>" class="btn btn-warning">Editer</a>
			</div>
			<div class="col-2">
				<form action="deletetaskid.php" method="post">
					<input type="hidden" name="del-champ"value="<?php echo $retour['idtask'];?>">
					
					<button type="submit" class="btn btn-danger  btn-xs" name="sup" value="Supprimer">Supprimer</button>
				</form>
				 </div>
				<div id="confirm" class="modal hide  mt-5">
						<div class="modal-body">
							Etes-vous sûr de vouloir supprimer?
						</div>
						<div class="modal-footer">
							
								
								<button type="button" data-dismiss="modal" class="btn btn-primary" id="Supprimer" >Oui</button>
								<button type="button" data-dismiss="modal" class="btn btn-warning" id="cancel">Annuler</button>
							
							
						</div>
				</div>
				
			

	</div>
	<?php
     			}

     		
     	?>

     </div>
     	
	<!-- <div class="bottom" id="footer">
		<?php 
			// include("footer.php");
		?>
	</div> -->
	
   


	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
		$('button[name="sup"]').on('click', function(e) {
		var $form = $(this).closest('form');
		e.preventDefault();
		
		
		
		
		

		$('#confirm').modal({
			// backdrop: 'static',
			keyboard: false
		})
		.on('click', '#Supprimer', function(e) {
			$form.trigger('submit');
			});
		});
		// $("#cancel").click(function(e){
		// 	$("#confirm").modal("hide");
		// });
		document.getElementById('cancel').onclick=function(){
			document.getElementById('confirm').style.display='none';
			
		}
		
	</script>

</body>
</html>