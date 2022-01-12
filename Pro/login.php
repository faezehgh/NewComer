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
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">

        <div class="position-relative w-100" style="top:15vh">
            <h1 class="text-center " style="font-family: 'Times New Roman'"><b>Connectez-vous à votre compte</b> </h1>
            <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
        </div>
        
        <div class="d-flex w-100 justify-content-center align-items-center vh-100">

            <form action="userAccount.php" method="post" class="p-5 login-form">
                <input type="email" name="email" placeholder="EMAIL" required="" class="form-control mb-4" autofocus>
                <input type="password" name="matricule" placeholder="MATRICULE" required="" class="form-control">
                <div class="send-button ">
                    <input type="submit" name="loginSubmit" value="LOGIN">
                </div>

                <p><a href="forgotPassword.php" class="matricule">Matricule oublié?</a></p>
                <p style="color:darkblue">Vous n'avez pas de compte ? <a href="registration.php" class="register">Register</a></p>

            </form>
        </div>
    </div>
</body>
</html>