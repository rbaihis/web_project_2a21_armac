
<?php include "nav-bar.php" ?>

    <div class="row tm-content-row tm-mt-big">
        <div class="tm-col tm-col-big"> </div>
        <div class="tm-col tm-col-big">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">

                        <h2 class="tm-block-title">Edit Service</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="" class="tm-signup-form">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input placeholder="beauty name" id="name" name="name" type="text" class="form-control validate">
                            </div>

                            <div class="form-group">
                                <label for="name"> Type</label>
                                <input placeholder="type name" id="type" name="type" type="text" class="form-control validate">
                            </div>

                            <div class="form-group">
                                <label for="name"> prix</label>
                                <input placeholder="0dt" id="prix" name="prix" type="number" class="form-control validate">
                            </div>

                            <div class="form-group">
                                <label for="name"> Description</label>
                                <input placeholder="Write message" id="description" name="description" type="text" class="form-control validate">
                            </div>


                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <button type="submit" class="btn btn-primary">Add
                                    </button>
                                </div>
                                <div class="col-12 col-sm-8 tm-btn-right">
                                    <button type="submit" class="btn btn-danger">Delete
                                    </button>
                                </div>

                                <div class="col-12 col-sm-7  tm-btn-right">
                                    <button type="submit" class="btn btn-dark">Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-col tm-col-small"> </div>

    </div>

<?php include "Footer.php" ?>