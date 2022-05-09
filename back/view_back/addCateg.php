<?php include "nav-bar.php" ?>

    <div class="row tm-mt-big">
        <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add categ</h2>
                    </div>
                </div>
                <div class="row mt-4 tm-edit-product-row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <form  action="../core/addCateg.php" method="post" class="forms-sample"  >

                            <div class="input-group mb-3">
                                <label   class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Type </label>
                                <input   id="type" name="type" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
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
                                if (strpos($fullUrl, "Categ=empty") == true) {
                                    echo "<p class='text-danger'>Vous n'avez pas rempli le champs !</p>";
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