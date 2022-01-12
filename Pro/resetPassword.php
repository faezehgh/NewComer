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
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <title>Recovery Password</title>
</head>
<body>
    
    <div class="container">
    <h2 style="font-family: 'Times New Roman'">Reset Your Account Matricule</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
        <div class="regisFrm">
            <form action="userAccount.php" method="post">
                <input type="password" name="matricule" placeholder="MATRICULE" required="">
                <input type="password" name="confirm_matricule" placeholder="CONFIRM MATRICULE" required="">
                <div class="send-button">
                    <input type="hidden" name="fp_code" value="<?php echo $_REQUEST['fp_code']; ?>"/>
                    <input type="submit" name="resetSubmit" value="RESET MATRICULE">
                </div>
            </form>
        </div>
    </div>

</body>
</html>