<!-- Create an page Action -->

<?php
// Create connection
$dbh=new PDO("mysql:host=localhost;dbname=test","root","");
$dbh->exec("set names utf8");


// Obtenir des information de BDD
$stmt=$dbh->prepare("SELECT * FROM `information` WHERE userID = $ID ORDER BY `information`.`id_information` ASC");
$stmt->execute();
$listMembers=$stmt->fetchAll();

if (isset($_GET['edit'])){
    $id=$_GET['edit'];
   $stmt=$dbh->prepare("SELECT * FROM `information` WHERE id_information=$id"); //Utiliser "bin(:id)" pour la sécurité ID
   $stmt->execute();
   $member=$stmt->fetchAll(PDO::FETCH_ASSOC)[0]; //Get a record


}

?>


<form action="informationInsertUpdate.php" method="post">
<input type="hidden" name="id_information" value="<?=@$member['id_information']?>"/> <!-- Send information by post method -->
<div class="row">
    <div class="col-6 my-3">
        <select type="text" name="DomainCatégorie"  class="DomainCatégorie form-select">
            <?php
                    //Create connection
                    $servername = "localhost";
                    $username   = "root";
                    $password   = "";
                    $dbname     = "test";
                    $connect = mysqli_connect($servername, $username, $password, $dbname);
                    $query = "SELECT categorie FROM `categorie`";

                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php 
                    $query = "SELECT categorie FROM `categorie`";
                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php if ($member['DomainCatégorie']) {?>
                        <option selected value="<?= @$member['DomainCatégorie'] ?>"><?= @$member['DomainCatégorie'] ?></option>

                   <?php }?>

                    <?php 
                        while ($row = mysqli_fetch_array($result)):; 
                    ?>

                    <option value="<?php 
                    echo $row[0];
                    ?>"><?php 
                    echo $row[0];
                    ?></option>
                    <?php 
                endwhile;
                ?>

                </select>
    </div>
    <div class="col-6 my-3">
        <select  type="text" name="NomAction"   onchange="myFunction(event)"  id="NomAction" class="NomAction form-select">
            <option value="" disabled selected>Choisir</option>

            <?php
                    // Create connection
                    $servername = "localhost";
                    $username   = "root";
                    $password   = "";
                    $dbname     = "test";
                    $connect = mysqli_connect($servername, $username, $password, $dbname);

                    $query = "SELECT * FROM `nomaction`";

                    $result = mysqli_query($connect, $query);
                    ?>
                    <?php 
                    $query = "SELECT * FROM `nomaction`";
                    $result = mysqli_query($connect, $query);
                    ?>
                     <?php if ($member['NomAction']) {
                        $rowdb=new PDO("mysql:host=localhost;dbname=test","root","");
                        $query = $rowdb->prepare("SELECT * FROM `nomaction` WHERE NomAction_ID = :NomAction");
                        $query->bindValue(':NomAction', $member['NomAction']);
                        $query->execute();
                        $n = $query->fetchAll(PDO::FETCH_ASSOC);
                        var_dump($n);
                    }?>
                    <?php if ($member['NomAction']) {?>
                        <option selected value="<?= @$member['NomAction'] ?>"><?= @$n[0]['nomAction'] ?></option>

                   <?php }?>
                    <?php 
                    while ($row = mysqli_fetch_array($result)):;
                    ?>
                   
                    <option value="<?php 
                    echo $row[0];
                    ?>"><?php 
                    echo $row[1];
                    ?></option>
                    <?php 
                endwhile;
            ?>

        </select>
        
    </div>

    <div class="col-6 my-3">
        <input id="DescriptionAction" type="text" class="form-control" name="DescriptionAction"  value="<?=@$member['DescriptionAction']?>">
    </div>

    <div class="col-6 my-3">
        <input type="text" class="form-control" value="<?=@$member['Informations']?>">
    </div>

    <div class="col-6 my-3">
        
        <select type="text" name="CHK_Action"   class="CHK_Action form-select">
                    <?php
                        // Create connection
                        $servername = "localhost";
                        $username   = "root";
                        $password   = "";
                        $dbname     = "test";
                        $connect = mysqli_connect($servername, $username, $password, $dbname);

                        $query = "SELECT CheckAction FROM `check`";

                        $result = mysqli_query($connect, $query);
                        ?>
                        <?php 
                        $query = "SELECT CheckAction FROM `check`";
                        $result = mysqli_query($connect, $query);
                        ?>
                        <?php if ($member['CHK_Action']) {?>
                            <option selected value="<?= @$member['CHK_Action'] ?>"><?= @$member['CHK_Action'] ?></option>

                        <?php }?>
                        <?php 
                        while ($row = mysqli_fetch_array($result)):; 
                        ?>
                        
                        <option value="<?php 
                        echo $row[0];
                        ?>"><?php 
                        echo $row[0];
                        ?></option>
                        <?php 
                    endwhile;
                    ?>

        </select>
    </div>
    
    <div class="col-6 my-3">
        <input type="date" class="form-control" name="DateAction" value="<?=@$member['DateAction']?>">
    </div>
        <input type="hidden"   name="id" value=<?php echo $ID ?> >

    <div class="col-6 my-3">
        <input type="text" class="form-control"  value="<?=@$member['Ticket']?>">
    </div>
    <div class="col-6 my-3">
        <button class="btn btn-success w-100">Submit</button>
    </div>
</div>


</form>

    