<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" media="all"/>
</head>

<body>
    
<div class="container-fluid">
    <div class="position-relative w-100" style="top:20vh ">
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?> 

    </div>

        <div class="d-flex w-100 justify-content-center align-items-center vh-100">
                
            <form action="userAccount.php" method="post" class="p-5 login-form">
            <h2 id="forgotPassword" class="text-center">Entrer l'email de votre compte pour <br> réinitialiser le nouveau matricule</h2>
                <input type="email" name="email" placeholder="EMAIL" required="" class="form-control pt-1 mt-5 ">
                <div class="send-button">
                    <input type="submit" name="forgotSubmit" value="CONTINUE">
                    <?php echo !empty($statusMsg)?'<br><a class="btn btn-success w-100 text-white" href="login.php">LOGIN</a>':''; ?> 

                </div>
            </form>
        </div>
    </div>

    
</body>

</html>