
<!-- Create an page Action -->

<?php
// Create connection
$dbh=new PDO("mysql:host=localhost;dbname=test","root","");
$dbh->exec("set names utf8");

// Obtenir des information de BDD
$stmt=$dbh->prepare("SELECT * FROM `information` ORDER BY `information`.`ID` ASC");
$stmt->execute();
$listMembers=$stmt->fetchAll();

// cheak ID (isset est pour etre sûr l'existence de variables ID) and get record
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $stmt=$dbh->prepare("SELECT * FROM `information` WHERE id=:id"); //Utiliser "bin(:id)" pour la sécurité ID
    $stmt->bindValue(":id",$id);
    $stmt->execute();
    $member=$stmt->fetch(); //Get a record

}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>information</title>
</head>
<body>

<form action="InformationUpdate.php" method="post">
<input type="hidden" name="id" value="<?=@$member['id']?>"/> <!-- Send information by post method -->

    <!-- Create an Action table -->

        <table class="Info">
            <tr>
                <th><label for="DomainCatégorie">Domain Catégorie</label></th>
                <th><label for="NomAction">Nom Action</label></th>
                <th><label for="DescriptionAction">Description Action</label></th>
                <th><label for="Informations">Informations</label></th>
                <th><label for="CHK_Action">Check Action</label></th>
                <th><label for="DateAction">Date Action</label></th>
                <th><label for="Ticket">Ticket</label></th>

            </tr>
            <tr>
                <td><select type="text" name="DomainCatégorie"   id="DomainCatégorie"   class="DomainCatégorie"   value="<?=@$member['DomainCatégorie']?>">
                <?php
                    // Create connection
                    $servername = "localhost";
                    $username   = "root";
                    $password   = "";
                    $dbname     = "test";
                    $connect = mysqli_connect($servername, $username, $password, $dbname);
                    $query = "SELECT categorie FROM `categorie`";

                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php $query = "SELECT categorie FROM `categorie`";
                    $result = mysqli_query($connect, $query);?>
                    <?php while ($row = mysqli_fetch_array($result)):; ?>
                    <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php endwhile;?>
                    
                </select>
                
                </td>
                <td><input  type="text"  name="NomAction"         id="NomAction"         class="NomAction"         value="<?=@$member['NomAction']?>"></td>
                <td><input  type="text"  name="DescriptionAction" id="DescriptionAction" class="DescriptionAction" value="<?=@$member['DescriptionAction']?>"></td>
                <td><input  type="text"  name="Informations"      id="Informations"      class="Informations"      value="<?=@$member['Informations']?>"></td>
                <td><select type="text"  name="CHK_Action"        id="CHK_Action"        class="CHK_Action"        value="<?=@$member['CHK_Action']?>">
                <?php
                   
                    $query = "SELECT CheckAction FROM `check`";

                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php $query = "SELECT CheckAction FROM `check`";
                    $result = mysqli_query($connect, $query);?>
                    <?php while ($row = mysqli_fetch_array($result)):; ?>
                    <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php endwhile;?>
                    
                </select>
                
                </td>
                <td><input type="date" name="DateAction"        id="DateAction"        class="DateAction"        value="<?=@$member['DateAction']?>"></td>
                <td><input type="text" name="Ticket"            id="Ticket"            class="Ticket"            value="<?=@$member['Ticket']?>"></td>

            </tr>
            
        </table><br>
        <!-- Button submit and back -->
        <div>
            <button type="submit" class="button-S">Submit</button>
            
            <button type="submit" class="button-P"><a href="form.php">Précédent</a></button>
        </div>
        
    </form>

    <!-- Get information from mysql -->

    <form action="information.php">
        <table class="Info" border="1">
            <tr>
                <th class="Domaine">Domaine Catégorie</th>
                <th class="Nom">Nom Action</th>
                <th Class="Description">Description Action</th>
                <th class="Info">Informations</th>  
                <th Class="Check">Check Action</th>
                <th class="Date">Date Action</th>
                <th class="Ticket">Ticket</th>
                <th class="Edit">Edit</th>
                <th class="Suppr">Supprime</th>
                <th class="Button">Button</th>
            </tr>
            <?php foreach ($listMembers as $value) {?>
            <tr>
            <td><?=  $value['DomainCatégorie']?></td>
            <td><?=  $value['NomAction']?></td>
            <td><?=  $value['DescriptionAction']?></td>
            <td><?=  $value['Informations']?></td>
            <td><?=  $value['CHK_Action']?></td>
            <td><?=  $value['DateAction']?></td>
            <td><?=  $value['Ticket']?></td>

            <!-- Button Edit and Supprime --> 
            <td><a href="information.php?id= <?=@$value['id']?>" alt="edit">Edit</a></td>
            <td><a href="Supprime.php?id=    <?=@$value['id']?>" alt="suppr" style="color:red">Suppr</a></td>
            <td><a href="information.php?id=">Button</a></td>
            </tr>
            <?php 
            } ?>

        </table>
    </form>

</body>
</html>