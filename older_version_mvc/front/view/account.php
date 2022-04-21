

<?php 
session_start();


if( isset($_SESSION['account']) ) 
{


        require("../controller/usercontroller.php");
        $user =new UserC();

         
        if( isset($_POST['update']) ){
            $user->updateController();
        }

        if( isset($_POST['delete']) )
        {
            $user->deleteController();
        }
        
        require "../view/header.php" ;
        require "navloggedin.php"; 
    
    
} else{ 
	header("Location:  ../view/homepage.php"); 
}

// copy the last line as well " require "footer.php"; (e5er star )
// -------------------------------------
?>


<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body"  >
            
            <p>
                <span>
                    <p class="title"  > 
                        <?= htmlentities( $_SESSION['userdatatab']['name'] )  ?>'s info  
                    <!-- privious page button -->
                         <button id="previous" style="float: right;  border-radius: 100px ; padding: 0 20px;"  class="btn btn--pill btn--green" type="button" onclick="window.location.href = '../view/homepage.php';" > Home </button>
                    </p>
                <!--  -->
                </span>
            </p>

 <?php



if( isset($_SESSION['errormsg']) && ! isset($_POST['password'])  ) 
{
    echo('<p class="label"  style="color:red;">'."*".$_SESSION['errormsg']."</p>\n"); 
    unset($_SESSION['errormsg']);
}

if( isset($_SESSION['successmsg']) &&  ! isset($_POST['password'])   ) 
{
    echo('<p class="label"  style="color:green;">'."*".$_SESSION['successmsg']."</p>\n"); 
    unset($_SESSION['successmsg']);
}

// if( isset($_SESSION['errormsg']) && ! isset($_POST['update'])  ) 
// {
//     echo('<p class="label"  style="color:red;">'."*".$_SESSION['errormsg']."</p>\n"); 
//     unset($_SESSION['errormsg']);
// }


?>
                <!-- message  -->
                <h5  style="color:green;" id="msg1"></h6>
                <!--  -->


                <form method="POST"   onload="hidefields()">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">User ID</label>
                                <input class="input--style-4 " type="text" name="user_id"  value="<?=  htmlentities( $_SESSION['userdatatab']['user_id'] ) ?>" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                            <label class="label">Full name</label>
                                <input class="input--style-4  disabled" type="text" name="name" value="<?=  htmlentities( $_SESSION['userdatatab']['name'] ) ?>" disabled>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <div class="input-group">
                                    <input class="input--style-4 disabled" type="text" name="address" value="<?=  htmlentities( $_SESSION['userdatatab']['address'] ) ?>"   disabled >
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Postalcode</label>
                                    <div class="input-group">
                                        <input class="input--style-4 disabled" type="text" name="postalcode" value="<?=  htmlentities( $_SESSION['userdatatab']['postalcode'] ) ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4 disabled " type="email" name="email" value="<?=  htmlentities( $_SESSION['userdatatab']['email'] ) ?>" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label id="pwlabel1" class="label">Password</label>
                                    <input id="pwinput1" class="input--style-4 disabled" type="password" name="password"  placeholder="Enter current password" disabled>
                                </div>
                            </div>
                        </div>


                        <!-- bottonss -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <button id="updateoption" class="btn btn--radius-2 btn--green" type="button"  onclick="enablesupdate()"> Update_ pofile</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input id="submitupdate"  class="btn btn--radius-2 btn--blue " type="submit" value="Submit update" name="update"  >


                                   

                                </div>
                            </div>
                        </div>
                        <!-- btn delete & submitdelete invisible   -->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <button id="deleteoption" class="btn btn--radius-2 btn--green" type="button"  onclick="enabledelete()"> Delete account </button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input id="submitdelete"  class="btn btn--radius-2 btn--blue " type="submit" value="Submit Delete" name="delete"  onload="hidefields()" >
                                </div>
                            </div>
                        </div>                                                                                                              
                        <!-- btn delete invisible if possible  -->
                        


                    </form>
                </div>
            </div>
        </div>
    </div>
    




<!-- seif javascript -->
<script>

window.onload = function hidefields() {
    
    hidepassword();
    hideSubmitUpdateBtn();
    hideSubmitDeleteBtn();
    
}
//---------------------
function enablesupdate( ){

    hideSubmitDeleteBtn()
    showSubmitUpdateBtn();
    showpassword();
    
    
    
    let x= document.getElementsByClassName( "disabled" );
    for( let i =0 ; i<x.length ; i++ )
    {
        x[i].disabled=false ;
        x[i].style.backgroundColor= "rgba(250,255,233)";
    } 
    
    
    let elem = document.getElementById('msg1');
    elem.innerHTML="Update mode ON :";
}
//---------------------------------------------
function enabledelete( ){
        
    hideSubmitUpdateBtn()
    showSubmitDeleteBtn();
    showpassword();
    
    
    let x= document.getElementsByClassName( "disabled" );
    for( let i =0 ; i<x.length ; i++ )
    {
        if(i<4){
            x[i].disabled=true ;
            x[i].style.backgroundColor= "rgba(60,60,60)";
        }
        else{
            x[i].disabled=false ;
            x[i].style.backgroundColor= "rgba(250,255,233)";
        }
    } 
    
    let elem = document.getElementById('msg1');
    elem.innerHTML="Delete mode ON :";
}
//----------------------
function hidepassword(){
    let pwi=document.getElementById("pwinput1");
    pwi.style.visibility="hidden";

    let pwl=document.getElementById("pwlabel1");
    pwl.style.visibility="hidden";
}
//---------------------
function showpassword(){
    let pwi=document.getElementById("pwinput1");
        pwi.style.visibility="visible";

    let pwl=document.getElementById("pwlabel1");
    pwl.style.visibility="visible";
}
//--------------------------
function hideSubmitUpdateBtn()
{
    let submitupdate=document.getElementById("submitupdate");
    submitupdate.style.visibility="hidden";
    
}
//-------------------------

function showSubmitUpdateBtn()
{
    let submitupdate=document.getElementById("submitupdate");
    submitupdate.style.visibility="visible";
    
}
//---------------------------
function hideSubmitDeleteBtn()
{
    let submitdelete=document.getElementById("submitdelete");
    submitdelete.style.visibility="hidden";
    
}
//----------------------------
function showSubmitDeleteBtn()
{
    let submitdelete=document.getElementById("submitdelete");
    submitdelete.style.visibility="visible";
    
}
//----------------------------

</script>


<?php include '../view/footer.php'; ?>
