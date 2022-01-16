<?php session_start();
$_SESSION = array();//Ecrase tableau de session 
session_unset(); //Detruit toutes les variables de la session en cours
session_destroy();//Destruit la session en cours

// redirige l'utilisateur
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signing up</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		table{
			border-spacing: 50px;
			margin: auto;
		}
		span{
			position: absolute;
			left:50%;
			top:0px;
			font-style: italic;
			font-size:35px;
		}
		#forms {
			margin-left:45%;
			margin-top:10%;
			/*border:1px solid black;
			height:400px;
			width:300px;*/

		}
	</style>
</head>
<body >
	<div class="bg-dark">
		<div class="container">
	<nav class="navbar navbar-expand">
		<a class="navbar-brand " href="index.php">
			<img src="logojpg.jpg" alt="logo" width="30" height="40"/>
			To Do List
		</a>
	</nav>
</div>
</div>


	<form method="post" action="">
	<div class="container" id="forms">
		<div class="form-group row">
			<input type="text" name="name" placeholder="Entrez votre nom" required="required" class="form-control col-12 col-lg-4"/>
		</div>
		<div class="form-group row">
			<input type="text" name="surname" placeholder="Entrez votre prénom" required="required" class="form-control col-12 col-lg-4"/>
		</div>
	
		<div class="form-group row" id="boxmailenter">
			<input type="email" name="email" placeholder="Entrez votre mail" required="required" class="form-control col-12 col-lg-4" id="mailenter"  />

		</div>
		<div class="form-group row" >
			<input type="password" name="password" placeholder="Entrez le mot de passe" required="required" class="form-control col-12 col-lg-4" id="paswd" />
		</div>
		<div class="form-group row" id="passenter">
			
			<input type="password" name="cpassword" placeholder="Confirmez le mot de passe" required="required" class="form-control col-12 col-lg-4" id="cpaswd" />
			
		</div>
		<div class="form-group">
			
			<input type="submit" class="btn btn-primary" value="S'inscrire" name="submit" />
		</div>
	</div>
		</form>
	<h5 class="alert-info text-center">Vous avez un compte? <a href="signin.php" class="alert-link">Connectez-vous</a></h5>
			
		
		<?php
		if (isset($_POST['submit'])){
		$name=htmlentities($_POST['name']);
		$surname=htmlentities($_POST['surname']);
		$email=htmlentities($_POST['email']);
		$password=htmlentities($_POST['password']);
		$confirm_password=htmlentities($_POST['cpassword']);
		include("dbconnect.php");
		
		$req=$bdd->prepare("SELECT email FROM users WHERE email=:email");
		$req->execute(array("email"=>$email));
		$donnees=$req->fetch();
		$j=$req->rowCount();

	if($j!=0){?>
		<script type="text/javascript">
			var emailunusucces=document.createElement("div");
			document.getElementById("mailenter").classList.add("is-invalid");
			emailunusucces.classList.add("invalid-feedback");
			emailunusucces.textContent="L'adresse email entrée a déjà utilisée par un autre utilsateur";
			document.getElementById("boxmailenter").appendChild(emailunusucces);

		</script>
		<?php 
		
	} 
	  if ($password !=$confirm_password){

		?>
		<script type="text/javascript">
			document.getElementById("paswd").classList.add("is-invalid");
			document.getElementById("cpaswd").classList.add("is-invalid");
			var unsucessbox=document.createElement("div");
			unsucessbox.classList.add("invalid-feedback");
			document.getElementById("passenter").appendChild(unsucessbox);
			unsucessbox.textContent="Les mots de passe ne correspondent pas!";
			console.log(unsucessbox);
		</script>
	<?php
}
	if($j==0 && $password==$confirm_password){
		$insertion=$bdd->prepare("INSERT INTO users(nom,prenom,email,MotDePasse) VALUES(?,?,?,?)");
		$insertion->execute(array($name,$surname,$email,sha1($password)));
		header("location:signin.php");
	}
	

}
	?>
	<div class="fixed-bottom">
	<?php 
		include("footer.php");
	?>
	</div>




		

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>