<?php
include 'header.php';
include 'conn.php';

$huisID = htmlspecialchars($_GET["id"]);
?>

<?php
$sql1 = "SELECT huis_ID, huis_oppervlakte, huis_prijs, huis_parkeren, huis_idhuis_type, huis_image FROM huis WHERE huis_ID = $huisID";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        $huis_type = $row1["huis_idhuis_type"];
        ?>

<div class="parken">
    <div class="container">
        <div class="row">
            <div class="park-card">
                <div class="park-image">
                    <div style="background: url(../images/huizen/<?php echo $row1["huis_image"]; ?>) no-repeat; background-size: cover; background-position: center;" class="img">
                    </div>
                </div>
                <div class="park-info">
                    <?php
                        ?><div class="content"><?php
                        echo "<h3>Huis id: " . $row1["huis_ID"] . "</h3></a>";
                        echo "Oppervlakte: " . $row1["huis_oppervlakte"] . "<br>";
                        echo "Prijs per nacht: € " . $row1["huis_prijs"] . "<br>";
                        echo "Parkeren: " . $row1["huis_parkeren"];
                    ?>
                    <?php $myDate = date('Y-m-d'); 
            $tomorrow = date('Y-m-d', strtotime("+1 days"));
            
            ?>
            <h3 style="margin-top:20px;">Reserveren</h3>
            <?php if(empty($_SESSION["username"])) { echo 'Je moet inloggen om te reserveren of <a href="registreer.php">registreren</a>';}
            else{
            ?>
            <form action="" method="POST" id="frmReserveren">
            <?php echo '<label for="startdatum">start datum : </label><br><input name="startdatum" type="date" min="'.$myDate.'" value="'.$myDate.'"/><br>';
            echo '<label for="einddatum">eind datum : </label><br><input name="einddatum" min="'.$tomorrow.'" type="date" value="'.$tomorrow.'"/><br>'; ?>
            <input type="submit" name="submit_reservering" value="Reserveer" style="margin-top:5px;" class="">
            </form>
            <?php } ?>
            </div>

      <?php      
if (isset($_POST['startdatum']) or isset($_POST['einddatum'])){
if (!empty($_POST['startdatum']) && !empty($_POST['einddatum'])){
$startdatum = $_POST['startdatum'];
$einddatum = $_POST['einddatum'];

    $query_eind = "SELECT boeking_ID FROM boeking WHERE boeking_eind <= '$einddatum' AND boeking_begin >= '$startdatum' AND huis_huis_ID = $huisID";
    $check_eind = mysqli_query($conn,$query_eind);  
    if(mysqli_num_rows($check_eind) > 0){
            echo 'deze datum is al bezet';
    }
    else{
        $url = "/factuur.php?startdatum=". $startdatum . "&einddatum=" . $einddatum . "&huisID=" . $huisID;
        $conn->query("INSERT INTO boeking (boeking_begin, boeking_eind, huis_huis_ID, klant_klant_ID)
        VALUES ('". $startdatum. "', '". $einddatum. "', '". $huisID. "', '1')");
        echo '<script>window.location = "'.$url.'";</script>';
    }
}
else{
    
}
}
else{
}
         ?>  
            </div>
        </div>
    </div>
</div>

        <?php
    }
    }
else {
    }
?>

</div>
<?php 
include 'footer.php';
?>
    