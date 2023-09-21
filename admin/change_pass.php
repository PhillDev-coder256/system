<?php 

session_start();

include("../../connection.php");
include("check_authentication.php");

$email = $_SESSION['user'];
?>

<?php 
$success = "";

if(isset($_POST["change_password"])){

    $old_password = md5(htmlentities($_POST["old_password"], ENT_QUOTES, "UTF-8"));
    $new_password = md5(htmlentities($_POST["new_password"], ENT_QUOTES, "UTF-8"));
    $confirm_password = htmlentities($_POST["confirm_password"], ENT_QUOTES, "UTF-8");

    if($new_password != $confirm_password){
        $success = "false";
        $error_message = "PASSWORDS DON'T MATCH";
    }

    $password_verified = password_verify($old_password, $new_password);

    if($password_verified){

        

        $result = mysqli_query($database, "UPDATE admin SET apassword='$new_password' WHERE aemail='$email'") or die(mysqli_error($database));

        if($result){
            $success = "true";
        }else{
            $success = "false";
            $error_message = "WRONG OLD PASSWORD ENTERED";
        }
    }else{
        $success = "false";
        $error_message = "WRONG OLD PASSWORD ENTERED";
    }
}

?>

<div class="pw-form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-dark pt-5 pb-2">CHANGE PASSWORD</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Password Updated Succesfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>

    <!-- ERROR MESSAGE -->
    <?php } elseif($success == "false") { ?>
        <div class="container a-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> &nbsp; <?php echo $error_message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    <?php } ?>

    <form action="change_pass.php" method="POST" class="mt-4">


        <!-- OLD PASSWORD-->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
            </div>
        </div>

        <!-- NEW PASSWORD-->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
            </div>
        </div>

        <!-- CONFIRM PASSWORD-->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="CHANGE PASSWORD" class="btn btn-primary submit form-control" name="change_password">
        </div>
    </form>
    
    <a href="index.php" class="text-dark">Back To Home</a>

</div>



<script>
    $("#change_pw").addClass("active-tab");
</script>


<!-- <?php include("footer.php") ?> -->