<?php include "nav-bar.php" ?>

<?php

include('../controller_back/categC.php');
include ('../model_back/categ.php');
$categorieC=new categC();

$response = $categorieC->getCategorieByType($_POST['type'], $categorieC->conn);
while ($categorieU = $response->fetch()) {
    $categorie=new categ($categorieU['type']);
    $categorie->setType($categorieU['type']);
}

?>
    <div class="row tm-mt-big">
        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Update Categorie</h2>
                    </div>
                </div>
                <div class="row mt-4 tm-edit-product-row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <form  action="../core/updateCategorie.php" method="post">
                            <input type="hidden" name="type" value="<?php echo $categorie->getType() ?>">

                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type </label>
                                <input   id="type" name="type" type="text" value="<?php echo $categorie->getType()?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>


                            <div class="input-group mb-3">
                                <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" style="display:none;" />
                            <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "footer_med.php" ?>