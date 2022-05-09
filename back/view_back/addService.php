<?php include "nav-bar.php" ?>
<?php
include('../controller_back/categC.php');
$categC = new categC();
$response = $categC->afficherCateg($categC->conn);

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
                        <form  action="../core/addService.php" method="post" class="forms-sample" >

                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type </label>

                                <select name="type">
                                    <?php  while ($categ = $response->fetch()) { ?>
                                    <option name="type" > <?php echo $categ['type']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Name </label>
                                <input   id="name" name="nom" type="text"class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>

                            <div class="input-group mb-3">
                                <label  class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Price</label>
                                <input   id="prix" name="prix" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                            </div>

                            <div class="input-group mb-3">
                                <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                <textarea class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" name="description"></textarea>
                            </div>

                            <div class="input-group mb-3">
                                <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" name="submit" class="btn btn-primary">Add
                                    </button>
                                </div>
                            </div>
                            <div class="input-group mb-3">
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
                                }elseif (strpos($fullUrl, "service=desc") == true) {
                                    echo "<p class='text-danger'>la quantité ne peut contenir que des chiffres!</p>";
                                    exit();
                                }
                                ?>
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