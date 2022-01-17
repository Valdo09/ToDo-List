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
             <?php 
             

             include("dbconnect.php");
             $req=$bdd->prepare("SELECT * FROM tasks WHERE sha1(idtask)=?");
             $req->execute(array($_GET['task']));
             $retour=$req->fetch();
             ?>
        
             <div class="container ">
             <h5 class="my-5 text-center">Modidification de tâche</h5>
                 <div class="justify-content-center row mt-5">
                    
                     <div class="col-md-8">
                            <form method="post" action="">
                                <div class="form-group row">
                                    <label for="task" class="col-md-4 col-form-label text-md-right">Tâche</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="task" name="task" value="<?php echo $retour['task'];?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input name="buton" type="submit" class="btn btn-primary" value="Modifier">
                                        
                                        </button>
                                    </div>
                                </div>
                                    
                                    
                                    
                                    
                            </form>
                     </div>
                   
                 </div>

                   
             </div>
        
        
                  <?php 
            if (isset($_POST['buton'])){


                $newTask=$_POST['task'];
                $req=$bdd->prepare("UPDATE tasks SET task=? WHERE sha1(idtask)=?");
                $req->execute(array($newTask,$_GET['task']));
                header("location:menu.php?message=Modified");
                
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