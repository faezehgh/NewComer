<?php

// Create connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    if (isset($_POST['Edit'])) {
        $userid            = $_POST['id'];
        $id                = $_POST['id_information'];
        $DomaineCatégorie  = $_POST['DomaineCatégorie'];
        $NomAction         = $_POST['NomAction'];
        $DescriptionAction = $_POST['DescriptionAction'];
        $Informations      = $_POST['Informations'];
        $CHK_Action        = $_POST['CHK_Action'];
        $DateAction        = $_POST['DateAction'];
        $Ticket            = $_POST['Ticket'];
        

        mysqli_query("UPDATE information WHERE userID = '$userid' SET
        (`DomainCatégorie`= '$DomainCatégorie',`NomAction`= '$NomAction',`DescriptionAction`= '$DescriptionAction',
        `Informations`= '$Informations',`CHK_Action`= '$CHK_Action',`DateAction`= '$DateAction',`Ticket`= '$Ticket')";
        
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
    }
?>