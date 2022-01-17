<?php session_start();
$_SESSION = array();//Ecrase tableau de session 
session_unset(); //Detruit toutes les variables de la session en cours
session_destroy();//Destruit la session en cours
//header("location: signin.php"); // redirige l'utilisateur
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="bg-dark">
			<div class="container">
				<div class="row">
					<nav class=" col navbar navbar-expand-lg bg-dark">
						<a class="navbar-brand " href="index.php">
							<img src="logojpg.jpg" alt="logo" width="40" height="30"/>
						To Do List
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse " id="navbarContent" >
							<ul class="navbar nav">
								<li class="nav-item ">
									<a class="nav-link" href="signup.php">S'inscrire</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="signin.php">Se connecter</a>
								</li>
								<li class="nav-item">
									
								</li>
							</ul>
						</div>
					</nav>
				</div>


			</div>
		</div>
		
	<div class="container bg-light p-4">
			
							<h1>Utilisez To Do List pour mieux organiser votre temps</h1>
						
		</div>
		<div class="container bg-light">
			<div class="row p-4">
				<div class="col-12 col-lg-4">
					<div class="card  mb-4 mb-lg-0">
						<img src="timeblue.jpg" class="card-top-img ">
						<div class="card-body">
							<div class="card-title">
								<h5>Le temps,une denrée rare</h5>
							</div>
							<p class="card-text">"Le Temps est la locomotive qui nous mène à une certaine gare où l'on ne donne pas de billet de retour.  " <span>Jean-Louis-Auguste Commerson </span></p>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<div class="card mb-4 mb-lg-0">
						<img src="tmeblue2jpg.jpg" class="card-top-img"  height="177">
						<div class="card-body">
							<div class="card-title">
								<h5>Organisez vos tâches suivant le temps</h5>
							</div>
							<p class="card-text">" S'organiser ou se faire organiser; se préparer ou réparer. " <span class="font-italic">François GAMONNET</span></p>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-4">
					<div class="card mb-4 mb-lg-0">
						<img src="logojpg.jpg" class="card-top-img"  height= "200">
						<div class="card-body ">
							<div class="card-title">
								<h5>Le temps passe</h5>
							</div>
							<p class="card-text"> "Le temps est la plus précieuse des propriétés, rien ne saurait le racheter. "<span class="font-italic">Jean-Louis Moré </span></p>
						</div>
					</div>
			</div>
		</div>

<?php

	include("footer.php");
?>


		






	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>