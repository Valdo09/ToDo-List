<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ToDo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="bg-dark">
                <div class="container">
                    <nav class="navbar navbar-expand bg-dark">
                    <a class="navbar-brand " href="index.php">To Do List
                    <img src="logojpg.jpg" alt="logo" width="40" height="30"/>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                                <a class="nav-link" href="menu.php">Menu Principal</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="#">Ajouter une tâche</a>
                        </li>
                    </ul>
                    </nav>
                 </div>
             </div>
        
           
            <form method="post" action="">
                <div class="container">
                    <div class="form-group row mx-auto mt-5" >
        
                            <input type="text" name="task" placeholder="Saisissez la tâche ici"  class="form-control col-12 col-lg-4 " required>
                            <input type="submit" name="buton" value="Ajouter" class="btn btn-success" class="form-control col-4 ">
                    </div>
                    <div class="form-group row">
                        <input type="time" name="hour" placeholder="Ajouter une heure">
                    </div>
                 </div>
                
             </form>
        
        
                  <?php 
            if (isset($_POST['buton'])){


                $task=htmlentities($_POST['task']);
                $id=$_SESSION['id'];
                include("dbconnect.php");
            

                    $req=$bdd->prepare("INSERT INTO tasks(iduser,task) VALUES (:userId,:task) ");
                    $req->execute(array('userId' =>$_SESSION['id'],'task'=>$task));
                    header("location:menu.php");
                
                
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

    
      
        
    <body>
</html>