<?php
include 'C:\xampp\htdocs\t\back\controller_back\questionC.php';
$questionC = new question_c();
$liste = $questionC->afficherquestion();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories Page</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Dashboard
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link " href="acceuil.html" id="navbarDropdown" role="button" aria-haspopup="true">
                                        Acceuil
                                    </a>

                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="afficherquestion.php">questions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="affichercategorie.php">answers</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="afficherproduit.php">Produits</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

            <?PHP

//pagination



//recherche

if(isset($_GET['recherche']))
{
    $search_value=$_GET["recherche"];
    $liste=$questionC->recherche($search_value);
}

//trie


if(isset($_GET['tri']))
{
    $liste = $questionC->triquestion($_GET['tri1'],$_GET['tri2']);
}

?>

            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Questions</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="ajouterquestion.php" class="btn btn-small btn-primary">Add New Question</a>
                            </div>
                        </div>

                        <select name="tri1" id="tri1" class"form-control">
           
                                                
                                                               
           <option value = texte> question </option>
           <option value = date> date </option>
           
           


   </select>
   <form method="get" action="afficherquestion.php">

   <select name="tri2" id="tri2" class"form-control">


       
           <option value = ASC> Ascendant </option>
           <option value = DESC> Descendant </option>

   </select>
       <button type="submit" class="btn btn-primary" name="trie">Trie</button>
   </form>
</th>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">Question ID</th>
                                        <th scope="col" class="text-center">Question Date</th>
                                        <th scope="col" class="text-center">Question</th>
                                        <th scope="col" class="text-center">user ID</th>
                                        <th scope="col" class="text-center">Options</th>
                                        <th colspan="2">
                                                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="afficherquestion.php">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher une question "
                                                                    aria-label="Search" aria-describedby="basic-addon2" name="recherche">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="submit" value="Chercher">
                                                                        <i class="fas fa-search fa-sm"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>
                                                    <th>
                                                        <form method="get" action="afficherquestion.php">



                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($liste as $questionC) {
                                        ?>
                                    <tr>
                                        <td><?php echo $questionC['id_question']; ?></td>
                                        <td><?php echo $questionC['date']; ?></td>
                                        <td><?php echo $questionC['texte']; ?></td>
                                        <td><?php echo $questionC['id_utilisateur']; ?></td>
                                        <td>
                                            <a href="modifierquestion.php?id=<?php echo $questionC['id_question']; ?>" class="btn">Modifier</a>
                                            <a href="supprimerquestion.php?id=<?php echo $questionC['id_question']; ?>" class="btn">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                 </tr>





                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Questions</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>

                            </tbody>
                        </table>

                        <!--<a href="add-category.html" class="btn btn-primary tm-table-mt">Add New Category</a>-->
                    </div>
                </div>
            </div>
            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018 Admin Dashboard . Created by
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
            $('.tm-product-name').on('click', function() {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>