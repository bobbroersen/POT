<?php
include 'header.php';
include 'conn.php';

$hotelID = htmlspecialchars($_GET["id"]);
?>
<div class="parken">
    <div class="container">
        <div class="row" style="
    -webkit-box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.5);
    -moz-box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.5);
    box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.5);
    transition: ease-in 0.3s; padding: 10px;">
<?php
$sqlpark = "SELECT park_ID, park_naam, park_plaats, park_land, park_image, park_omschrijving FROM park WHERE park_ID = $hotelID";
$resultpark = $conn->query($sqlpark);

$sqlfac = "SELECT faciliteiten_naam FROM faciliteiten INNER JOIN parkfaciliteiten ON faciliteiten.faciliteiten_ID=parkfaciliteiten.faciliteiten_faciliteiten_ID where park_park_ID = $hotelID;";
$resultfac = $conn->query($sqlfac);



if ($resultpark->num_rows > 0) {
    // output data of each row
    while($row = $resultpark->fetch_assoc()) {
        ?>
            <div class="col-sm-4">
                <div class="park-card">
                    <div class="park-image">
                        <div style="background: url(../images/parken/<?php echo $row["park_image"]; ?>) no-repeat; background-size: cover; background-position: center;" class="img">
                        </div>
                    </div>
                    <div class="park-info">
                        
                        <h3><?php    echo $row["park_naam"]; ?></h3>
                        <?php
                            echo "<div class='info'>Plaats: " . $row["park_plaats"] . "<br>";
                            echo "Land: " . $row["park_land"] . "</div><br>";
                            echo $row["park_omschrijving"];
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
    }
else {
    echo "0 results";
}

?>
            <div class="col-sm-8">
<?php
$sql1 = "SELECT huis_ID, huis_oppervlakte, huis_prijs, huis_parkeren, huis_idhuis_type, huis_image FROM huis WHERE park_park_ID = $hotelID";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        $huis_type = $row1["huis_idhuis_type"];
        ?>
                <div class="park-card">
                    <div class="park-image">
                        <div style="background: url(../images/huizen/<?php echo $row1["huis_image"]; ?>) no-repeat; background-size: cover; background-position: center;" class="img">
                        </div>
                    </div>
                    <div class="park-info">
                        <?php
                        echo "<a href='single-huis.php?id=". $row1["huis_ID"] ."'><h3>Huis id: " . $row1["huis_ID"] . "</h3></a>" . "<hr>";
                        echo "Oppervlakte: " . $row1["huis_oppervlakte"] . "<br>" . "<hr>";
                        echo "Prijs per nacht: € " . $row1["huis_prijs"] . "<br>" . "<hr>";
                        echo "Parkeren: " . $row1["huis_parkeren"];
                        ?>
                    </div>
                </div>
        <?php
    }
    }
else {
    echo "0 results";
}
?>
            </div>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>