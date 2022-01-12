<!-- Get information from mysql -->

<form action="information.php">
    <div class="table-responsive">
        <table class="table table-light table-bordered table-striped" id="infoList">
            <tr>

                <!-- <th class="ID">ID</th>
                <th class="userID">User_ID</th> -->
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
                    <!-- <td><?= $value['id_information']?></td>
                    <td><?=  $value['userID']?></td> -->

                    <td><p class="table-col1-text"><?=  $value['DomainCatégorie']?></p></td>
                    <td><p class="table-col2-text"><?php

                        // Create connection
                        $servername = "localhost";
                        $username   = "root";
                        $password   = "";
                        $dbname     = "test";
                        $connect = mysqli_connect($servername, $username, $password, $dbname);
                        $NomAction = $value['NomAction'];

                        $query = "SELECT * FROM `nomaction`";
                        $result = mysqli_query($connect, $query);?>
                        <?php while ($row = mysqli_fetch_array($result)):?>
                            <?php if($row[0] == $NomAction){ ?>
                                <?php echo $row[1];?>
                            <?php } ?>

                        <?php endwhile;?>

                        </p></td>

                    <td><p class="table-col-text"><?=  $value['DescriptionAction']?></p></td>
                    <td><p class="table-col5-text"><?=  $value['Informations']?></p></td>
                    <td><p class="table-col3-text"><?=  $value['CHK_Action']?></p></td>
                    <td><p class="table-col4-text"><?=  $value['DateAction']?></p></td>
                    <td><p class="table-col6-text"><?=  $value['Ticket']?></p></td>

                    <!-- Button Edit and Supprime -->
                    <td class="edit " ><a class="btn btn-warning text-white mt-4"  href="index.php?edit=<?=@$value['id_information']?>" alt="edit">Edit</a></td>
                    <td class="supprime"><a class="btn btn-danger mt-4" onclick="return confirm('Are you sure you want to delete this item?');" href="supprime.php?id=<?=@$value['id_information']?>" alt="suppr">Suppr</a></td>
                    <td>
                        <a href="index.php" class="btn btn-outline-danger mt-4"><i class="fas fa-redo-alt"></i></a>
                    </td>
                </tr>
                <?php
            } ?>

        </table>

    </div>
    </form>