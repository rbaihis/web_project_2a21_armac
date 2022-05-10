<?php
   
    include_once 'C:\xampp\htdocs\t\back\controller_back\reponseC.php';
    include_once 'C:\xampp\htdocs\t\back\model_back\reponse.php';

        $error = "";
  
      $reponse = null;
      
    $reponseC = new reponseC();
    if ( 
        isset($_POST["text"]) 
        ) {
        if (
            !empty($_POST["text"])    
        ) {
            $reponse= new reponse(
                $_POST['id_utilisateur'],
                $_POST['date'],
                $_POST['text'],
                $_POST['id_question'] 
            
            );
            $reponseC->ajouterreponse($reponse);
            header('Location:afficherreponse.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Bioté center</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Bioté center
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="affichercategorie.php">reponse</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="accounts.html">forum</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.html">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add reponse</h2>
                        </div>
                    </div>
                    <div class="details">
                    <div class="recentorders">
                        <div class="cardheader">
                            <h2>Ajouter reponse</h2>
                            
                            </div>
        
        <form action="" method="POST">
            <div>

           
                
                <tr>
                    <td>
                        <label for="text"> reponse:
                        </label>
                    </td>
                    <td><input type="text" name="text" id="text" maxlength="20"></td>
                </tr>
            </div>    
            <div>

           
                
<tr>
    <td>
        <label for="id_utilisateur"> reponse:
        </label>
    </td>
    <td><input type="id_utilisateur" name="id_utilisateur" id="id_utilisateur" maxlength="20"></td>
</tr>
</div>
<div>

           
                
<tr>
    <td>
        <label for="date"> reponse:
        </label>
    </td>
    <td><input type="date" name="date" id="date" maxlength="20"></td>
</tr>
</div>
<div>

           
                
<tr>
    <td>
        <label for="id_question"> reponse:
        </label>
    </td>
    <td><input type="id_question" name="id_question" id="id_question" maxlength="20"></td>
</tr>
</div>
                
                    <tr>
                    <td>
                    <input type="submit" class="btn" value="Envoyer">
                        <input type="reset"  class="btn" value="Annuler" >
                        </td>
                </tr>
            </table>
        </form>
                        <button class="btn"><a href="afficherreponse.php">Retour au reponse</a></button>
</div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>