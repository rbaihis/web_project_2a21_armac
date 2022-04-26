<?php include "nav-bar.php" ?>
<?php

include('../controller_back/service_C.php');
include ('../model_back/service.php');
$service_C=new service_C();

$response = $service_C->getServieById($_POST['id'], $service_C->conn);

while ($serviceU = $response->fetch()) {
    $service=new service($serviceU['type'],$serviceU['nom'],$serviceU['prix'],$serviceU['description']);
    $service->setId($serviceU['id']);
}

?>
    <div class="row tm-mt-big">
        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Servive</h2>
                    </div>
                </div>
                <div class="row mt-4 tm-edit-product-row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <form  action="../core/updateService.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $service->getId() ?>">

                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type </label>
                                <input   id="type" name="type" type="text" value="<?php echo $service->getType()?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>

                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Name </label>
                                <input   id="name" name="nom" type="text" value="<?php echo $service->getNom()?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>

                            <div class="input-group mb-3">
                                <label  class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Price</label>
                                <input   id="prix" name="prix" type="number" value="<?php echo $service->getPrix()?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>

                            <div class="input-group mb-3">
                                <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                <input id="description" name="description" type="text"  value="<?php echo $service->getType()?>" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
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

<?php include "Footer.php" ?>