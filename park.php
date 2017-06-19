<?php
include 'header.php';
include 'conn.php';
?>

<div class="parken">
    <div class="container">
        <div class="row">
<?php
$sql = "SELECT park_ID, park_naam, park_plaats, park_land, park_image, park_omschrijving FROM park";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-sm-3 col-centered wow fadeInDown">
                <div class="park-card">
                    <div class="park-image">
                        <div style="background: url(../images/parken/<?php echo $row["park_image"]; ?>) no-repeat; background-size: cover; background-position: center;" class="img">
                        </div>
                    </div>
                    <div class="park-info">
                        <h3><?php echo "<a href='single-park.php?id=" . $row["park_ID"] . "'>" . $row["park_naam"] . "</a>"; ?></h3>
                        <h5><?php echo "Plaats: " . $row["park_plaats"] . "<br>"; ?></h5>
                        <h6><?php echo "Land: " . $row["park_land"]; ?></h6>
                        <hr>
                        <p><?php echo $row["park_omschrijving"]; ?></p>
                    </div>
                </div>
            </div>
            <?php
    }
    }
else {
    echo "0 results";
}
$conn->close();
?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>