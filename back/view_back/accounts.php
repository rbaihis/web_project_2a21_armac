<?php 
session_start();


if( !isset($_SESSION['admin_on']) ){

    
    header("Location: ../../back/view_back/loginadmin.php" );
    exit();
   
}
 else{
        
     
     require "../../back/controller_back/admincontroller.php";
     
     $adminC=new AdminController();
     
     
     
     $statment = $adminC->displayUsers();
     
     if( isset($_POST['update'] )  ){
         
         $adminC->update_one_user_with_no_password($_POST['name'],$_POST['address'],$_POST['postalcode'],$_POST['email'] );
        }
        
    if(isset($_POST['delete']) ){
            
            $adminC->delete_user_by_admin($_POST['email']);
       }
        


include "../../back/view_back/header_seif_.php" ;
include "../../back/view_back/nav_only.php" ;




?>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big">
            <div style="width:100%; max-width:60%;">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12"> 
                            <h2 class="tm-block-title d-inline-block">Accounts</h2>
                        </div>
                    </div>

                    <table style="width:100%; max-width:59%; background-color:aqua ; color:#3aabd0"  class=" table  table-hover"  >
                    <tr style="width:100%; background-color:white; color:black" >
                        <th>Nom</th><th>Email</th><th>Chose</th>
                    </tr>
                        
                        <!-- table table-hover tm-table-striped-even.table-striped  -->
                        <!-- tm-list-group ---------------------------------------------------------------------------------------->

<?php 
    $i=0;$j=0;

    while( $row = $statment->fetch( PDO::FETCH_ASSOC ))
    {  ?>
        
        <tr  class="tm-list-group-item  " id="<?= "l".$i ?>" > <td id="<?= "l".$i."r".$j++?>" >
            <?php echo( htmlentities( $row['name'] ) );   ?>  
        </td><td id="<?= "l".$i."r".$j++?>">
            <?php echo( htmlentities( $row['email'] ) );  ?>
        </td><td id="<?= "l".$i."r".$j++?>">

    <!-- passing user_id value as a get request to the destinated page to know the user we want to handle directly by his primary key -->
            <?php   echo( '<a style="color:red;"  href="../../back/view_back/accounts.php?user_id='.$row['user_id'].'&name='.$row['name'].'&address='.$row['address'].'&postalcode='.$row['postalcode'].'&email='.$row['email'].' ">SELECT</a>  '); 
            $i++; $j=0;  ?>

        </td></tr>

    <?php
    }   
?>      
                </table >

                    
                </div>
                    <!-- tm-list-group ---------------------------------------------------------------------------------------->
                    
                
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit Account</h2>
<?php
if( isset($_SESSION['aderror_delete']) && ! isset($_POST['delete'])  ) 
{
    echo('<p class="label"  style="color:red;">'."*".$_SESSION['aderror_delete']."</p>\n"); 
    unset($_SESSION['aderror_delete']);
}
if( isset($_SESSION['aderror_update']) && ! isset($_POST['update'])  ) 
{
    echo('<p class="label"  style="color:red;">'."*".$_SESSION['aderror_update']."</p>\n"); 
    unset($_SESSION['aderror_update']);
}

// if( isset($_SESSION['aderror']) &&  ! isset($_POST['password'])   ) 
// {
//     echo('<p class="label"  style="color:green;">'."*".$_SESSION['aderror']."</p>\n"); 
//     unset($_SESSION['aderror']);
// }
?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">




                            <!--======================================================================================================================================= -->
                            <form  class="tm-signup-form"  method="post">
                                <!--======================================================================================================================================= -->
                                
                                
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input  id="name" name="name" type="text" class="form-control validate"     
                                    <?php if(isset($_GET['name'])) { echo('value="'.$_GET['name'].'"'); }   ?> >

                                </div>
                                <div class="form-group">
                                    <label for="email">Address</label>
                                    <input  id="address" name="address" type="text" class="form-control validate"
                                    <?php if(isset($_GET['address'])) { echo('value="'.$_GET['address'].'"'); }   ?> >
                                </div>
                                <div class="form-group">
                                    <label for="password">Postalcode</label>
                                    <input  id="postalcode" name="postalcode" type="text" class="form-control validate"
                                    <?php if(isset($_GET['postalcode'])) { echo('value="'.$_GET['postalcode'].'"'); }   ?>>
                                </div>
                                <div class="form-group">
                                    <label for="password2"> <span>Email<b class="label"  style="color:red;">*</b> </span> </label>
                                    <input placeholder="string@address.domain" id="email" name="email" type="email" class="form-control validate"
                                    <?php if(isset($_GET['email'])) { echo('value="'.$_GET['email'].'"'); }   ?> >
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 col-sm-4 ">
                                        <button type="submit" name="update" class="btnseif btnseif-primary" >Update</button>
                                    
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                            <button type="submit" name="delete" class="btnseif btnseif-danger btnseif-primary ">Delete Account
                                                </button>
                                    </div>
                                </div>


                                <!--======================================================================================================================================= -->
                            </form>
                            <!--======================================================================================================================================= -->
                                    
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


<?php require "../../back/view_back/footer_seif.php"; 

 }


?>