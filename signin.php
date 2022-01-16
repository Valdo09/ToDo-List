<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		/*table{
			border-spacing: 40px;
			margin: auto;
		}*/
	</style>
</head>
<body class="text-center">
	<div class="bg-dark">
		<div class="container">
	<nav class="navbar navbar-expand">
		<a class="navbar-brand" href="index.php">To Do List</a>
		<img src="logojpg.jpg" alt="logo" width="40" height="30">
	</nav>
</div>
</div>
<br/><br/><br/><br/><br/><br/>
<div class="container">
	<div class="justify-content-center row">
	<form method="post" action="" class="form-signin">
		
	
		<div class="form-group col-lg-12" >
			
				<input type="email" name="email" placeholder="Entrez votre mail" required="required" class="form-control " id="mailenter" />
		</div>
		<div class="form-group col-lg-12" id="boxpass">
				<input type="password" name="password" placeholder="Entrez le mot de passe" required="required" class="form-control " id="passenter" />
		</div>
			<div class="form-group col-lg-12">
				<input type="submit" name="submit" value="Se connecter" class="btn btn-primary" class="form-control"/>
			</div>
	
			

	
</form>
	</div>
	
	</div>
	<div class="alert-info">Vous n'avez pas un compte? <a href="signup.php" class="alert-link">Veuillez vous inscrire</a></div>
		<?php 
			if (isset($_POST['submit'])){
		$email=htmlentities($_POST['email']);
		$password=htmlentities($_POST['password']);
		include("dbconnect.php");
		$req=$bdd->prepare("SELECT email,MotDePasse FROM users WHERE email=? AND MotDePasse=?");
		$req->execute(array($email,sha1($password)));
		$donnees=$req->fetch();
		$j=$req->rowCount();

	if($j!=0){
		header("location:menu.php");
	}
	
	
	else {
		?>

		<script type="text/javascript">
			
			document.getElementById("mailenter").classList.add("is-invalid");
			document.getElementById("passenter").classList.add("is-invalid");
			var unsuccess=document.createElement("div");
			unsuccess.classList.add("invalid-feedback");
			unsuccess.textContent="L'adresse email ou le mot de passe entré est invalide";
			document.getElementById("boxpass").appendChild(unsuccess);
		</script>
		<?php
	}
		
		$req2=$bdd->prepare("SELECT * FROM users WHERE email=:email");
		$req2->execute(array('email'=>$email));
		$retour=$req2->fetch();
		$_SESSION['id']=$retour['id'];
}
		?>
	<div class="fixed-bottom">
			<?php
					include("footer.php");
			?>
	</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>