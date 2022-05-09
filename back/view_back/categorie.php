<?php include "nav-bar.php" ?>
<?php
include('../controller_back/categC.php');
$categorieC = new categC();
$response = $categorieC->afficherCateg($categorieC->conn);
?>
    <div class="row tm-content-row tm-mt-big">
    <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
    <div class="bg-white tm-block h-100">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2 class="tm-block-title d-inline-block">Categorie</h2>
            </div>
            <div class="col-md-4 col-sm-12 text-right">
                <a href="addCateg.php" class="btn btn-small btn-primary">Add Categorie</a>
            </div>
        </div>

        <div class="table-responsive">

                <table class="table table-hover table-striped tm-table-striped-even mt-3">
                    <thead>
                    <tr class="tm-bg-gray">


                        <th> Type</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($categorieC = $response->fetch()) {
                    ?>
                    <tr>

                        <td> <?php echo $categorieC['type']; ?></td>

                        <td> <form action="../core/deleteCategorie.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="type" value="<?php echo $categorieC['type']; ?> "
                                        class="btn btn-danger">Delete
                                </button>
                            </form>
                        </td>

                        <td>
                            <form action="updateCategorie.php" method="POST" enctype="multipart/form-data">
                                <button type="submit" name="type" value="<?php echo $categorieC['type']; ?>"
                                        class="btn btn-danger">Update
                                </button>

                                <div class="form-actions mt-10">
                                    <?php
                                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    if (strpos($fullUrl, "service=empty") == true) {
                                        echo "<p class='text-danger'>Vous n'avez pas rempli tous les champs !</p>";
                                        exit();
                                    } elseif (strpos($fullUrl, "service=char") == true) {
                                        echo "<p class='text-danger'>le nom ne peut contenir que des caractères!</p>";
                                        exit();
                                    }elseif (strpos($fullUrl, "service=price") == true) {
                                        echo "<p class='text-danger'>prix ne peut contenir que des chiffres!</p>";
                                        exit();
                                    }elseif (strpos($fullUrl, "service=qty") == true) {
                                        echo "<p class='text-danger'>la quantité ne peut contenir que des chiffres!</p>";
                                        exit();
                                    }
                                    ?>
                                </div>
                            </form>

                        </td>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>

        </div>

        <div class="tm-table-mt tm-table-actions-row">
            <div class="tm-table-actions-col-left">


            </div>
        </div>
    </div>

<?php include "footer_med.php" ?>