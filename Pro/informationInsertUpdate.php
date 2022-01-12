
<!-- La connexion entre la page d'informations et la base de donnée -->
<?php
// Create connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$userid            = $_POST['id'];
$id                = $_POST['id_information'];
$DomainCatégorie   = $_POST['DomainCatégorie'];
$NomAction	       = $_POST['NomAction'];
$DescriptionAction = $_POST['DescriptionAction'];
$Informations      = $_POST['Informations'];
$CHK_Action        = $_POST['CHK_Action'];
$DateAction        = $_POST['DateAction'];
$Ticket            = $_POST['Ticket'];

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if ($id=="") {
  // Insert Info by ID

$sql = "INSERT INTO information (userID	,DomainCatégorie, NomAction, DescriptionAction, Informations, CHK_Action, DateAction, Ticket)
VALUES 
('$userid','$DomainCatégorie', '$NomAction', '$DescriptionAction', '$Informations', '$CHK_Action', '$DateAction', '$Ticket')";

}else {
  // Otherwise update Info by ID

  $sql = "UPDATE information SET
        `DomainCatégorie`= '$DomainCatégorie',`NomAction`= '$NomAction',`DescriptionAction`= '$DescriptionAction',
        `Informations`= '$Informations',`CHK_Action`= '$CHK_Action',`DateAction`= '$DateAction',`Ticket`= '$Ticket' 
        WHERE id_information = '$id'";
}

// Execute
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
  exit;
}

mysqli_close($conn);
header("Location:index.php");
?>