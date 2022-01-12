<?php
session_start();
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!-- le code pour edit -->
<?php

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $REULT = $record->prepare("SELECT * FROM `information` WHERE id_information=$id");
    $REULT->execute();
    $n = $REULT->fetchAll(PDO::FETCH_ASSOC);


    $DomainCatégorie = $n[0]['DomainCatégorie'];
    $NomAction = $n[0]['NomAction'];
    $DescriptionAction = $n[0]['DescriptionAction'];
    $Informations = $n[0]['Informations'];
    $CHK_Action = $n[0]['CHK_Action'];
    $DateAction = $n[0]['DateAction'];
    $Ticket = $n[0]['Ticket'];

}

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.min.js">
    <title>Home</title>
</head>
<body>


<?php
if (!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])) {
    include 'users.php';
    $user = new User();
    $conditions['where'] = array(
        'id' => $sessData['userID'],
    );
    $conditions['return_type'] = 'single';
    $userData = $user->getRows($conditions);

    $ID = $userData['ID']
    ?>
    <h1 class="text-center pt-4" style="font-family: 'Times New Roman'">Welcome <?php echo $userData['prénom']; ?>!</h1>
    <div class="container-fluid">
        <div class="row">

            <div class="col-4">
                <div class="container-info">

                    <div class="regisFrm">
                        <p><b>User : </b><?php echo $userData['prénom'] . ' ' . $userData['nom']; ?></p>
                        <!--<p><b>ID: </b><?php echo $userData['ID']; ?></p>-->
                        <p><b>Email : </b><?php echo $userData['email']; ?></p>
                        <p><b>Domaine : </b><?php echo $userData['domaine']; ?></p>
                        <p><b>Hiérarchique : </b><?php echo $userData['hiérarchique']; ?></p>
                        <p><b>Poste : </b><?php echo $userData['Poste']; ?></p>

                    </div>
                    <a href="userAccount.php?logoutSubmit=1" class="btn btn-danger">Logout</a>
                </div>
            </div>
            <div class="col-8 mt-4">
                <div>
                    <?php include("information.php"); ?>
                </div>
            </div>
            <div class="col-12 mt-5 overflow-hidden">
                <?php include("info.php")?>
            </div>
        </div>
    </div>


<?php } else { ?>
    <?php header("Location:index.php"); ?>

<?php } ?>
</div>
<script src="script.js"></script>
</body>
</html>

