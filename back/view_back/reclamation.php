<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sahriti Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logosahriti.png" />
</head>
<body>
  <div class="container-scroller">
 
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="">
    <?php 
        require_once 'processType.php'; 
    ?> 
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); 
                ?>
        </div>
        <?php endif ?>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand display-2 fw-bold">Réclamation</a>
                
        </div>
    </nav>
    <!-- Gestion de type de réclamation -->
    <div class="container py-2 border border-dark border-3 rounded mt-3">
        <h1 class="text-center display-4 fw-bold text-dark">Gestion de type de réclamation</h1>
        <div class="justify-content-center container border border-dark border-2 rounded mt-1">
            <form class="mt-3" action="processType.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="name" class="form-label">Nom du type de reclamation</label>
                    <input required name="name" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Enter le nom du type de la réclamation" value="<?php echo $name; ?>"> 
                </div>
                <br>
                <?php if ($update == true): ?>
                <button name="update" class="btn btn-secondary fs-5 border-2">Update</button>
                <?php else : ?>
                <button name="submit" class="btn btn-primary fs-5 border-2">Save</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="container border border-dark border-2 rounded mt-3">
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInput" class="form-control" placeholder="Search">
                        <button name="searchbtn" class="btn btn-success">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="Make"
                                <option selected>Trier par</option>
                                <option value="1">ID type</option>
                                <option value="2">Nom du type de la réclamation</option>
                            </select>
                            <button class="btn btn-success" name="trier">Trier</button>
                        </div>
                    <button class="btn btn-warning px-5" name="actualiser">Actualiser</button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID type</th>
                        <th scope="col">Nom du type de la réclamation </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       if (isset($_POST['searchbtn'])){  
                        $searchInput = $_POST['searchInput'];
                        $result = $con->query("SELECT * FROM type_reclamation WHERE concat (id_type, nom_type) LIKE  '%$searchInput%';") ;  
                    }else if (isset($_POST['actualiser'])){
                        $result = $con->query("SELECT * FROM type_reclamation") ;
                    }
                    else if (isset($_POST['trier'])){
                        $makerValue = $_POST['Make'];
                        switch ($makerValue) {
                            case 1:
                                $tri_par = "id_type"; 
                                break;
                            case 2:
                                $tri_par = "nom_type"; 
                                break;
                            default:
                            echo "Erreur, veuillez choix itemName ou price";
                        }
                        $result = $con->query("SELECT * FROM type_reclamation order by $tri_par") ;
                    }else {
                        $result = $con->query("SELECT * FROM type_reclamation") ;
                    }
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)): 
                   ?>
                    <tr>
                        <td><?php echo $row['id_type']; ?></td>   
                        <td><?php echo $row['nom_type']; ?></td>
                        <td>
                            <a class="btn btn-info" href="back.php?edit=<?php echo $row['id_type']; ?>">Edit</a>
                            <a class="btn btn-danger" href="processType.php?delete=<?php echo $row['id_type']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Gestion des réclamations -->
        <div class="container border border-dark border-5 rounded mt-3">
            <h1 class="text-center display-4 fw-bold text-dark">Gestion des réclamations</h1>
            <div class="container">
                <form class="d-flex justify-content px-5 mt-3" action="" method="post">
                    <div class="input-group px-5">
                        <input name="searchInput" class="form-control" placeholder="Search">
                        <button name="searchbtn" class="btn btn-success">Search</button>
                    </div>
                        <div class="input-group btn-group px-5">
                            <select class="form-select" name="Make"
                                <option selected>Trier par</option>
                                <option value="1">ID Réclamation</option>
                                <option value="2">Username</option>
                                <option value="3">User Message</option>
                                <option value="4">Date réclamation</option>
                                <option value="5">Feedback</option>
                                <option value="6">id type réclamation</option>
                                <option value="7">Nom type réclamation</option>
                            </select>
                            <button class="btn btn-success" name="trier">Trier</button>
                        </div>
                    <button class="btn btn-warning px-5" name="actualiser">Actualiser</button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Réclamation</th>
                        <th scope="col">Username</th>
                        <th scope="col">User Message</th>
                        <th scope="col">Date récl</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">id type</th>
                        <th scope="col">Nom récl</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['searchbtn'])){  
                        $searchInput = $_POST['searchInput'];
                        $result = $con->query("SELECT * FROM reclamation inner join type_reclamation on reclamation.id_type_recl = type_reclamation.id_type WHERE concat (id_type, nom_type) LIKE  '%$searchInput%';")  ;  
                    }else if (isset($_POST['actualiser'])){
                        $result = $con->query("SELECT * FROM reclamation inner join type_reclamation on reclamation.id_type_recl = type_reclamation.id_type") ;
                    }
                    else if (isset($_POST['trier'])){
                        $makerValue = $_POST['Make'];
                        switch ($makerValue) {
                            case 1:
                                $tri_par = "id_type"; 
                                break;
                            case 2:
                                $tri_par = "username_recl"; 
                                break;
                            case 3:
                                $tri_par = "user_review_recl"; 
                                break;
                            case 4:
                                $tri_par = "date_recl"; 
                                break;
                            case 5:
                                $tri_par = "feedback_recl"; 
                                break;
                            case 6:
                                $tri_par = "id_type_recl"; 
                                break;
                            case 7:
                                $tri_par = "nom_type"; 
                                break;
                            default:
                            echo "Erreur, veuillez choix itemName ou price";
                        }
                            $result = $con->query("SELECT * FROM reclamation inner join type_reclamation on reclamation.id_type_recl = type_reclamation.id_type order by $tri_par") ;
                    }else {
                        $result = $con->query("SELECT * FROM reclamation inner join type_reclamation on reclamation.id_type_recl = type_reclamation.id_type") ;
                    }
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id_recl']; ?></td>   
                        <td><?php echo $row['username_recl']; ?></td>
                        <td><?php echo $row['user_review_recl']; ?></td>
                        
                        <td><?php echo date('l jS, F Y h:i:s A', $row["date_recl"]); ?></td>
                        <td><?php echo $row['feedback_recl']; ?></td>
                        <td><?php echo $row['id_type_recl']; ?></td>
                        <td><?php echo $row['nom_type']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="processType.php?delete2=<?php echo $row['id_recl']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                    </div>
        </div>

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

