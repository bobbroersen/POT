<html>
<head>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" type="text/css" href="css/header.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body class="beheerder" style="margin-top:20px!important; color: #000!important;">
<a href="http://bobbroersen.me/beheerder.php">parken</a>
<?php
include 'conn.php';

session_start();

$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM werknemers WHERE werknemers_username='" . $_POST["user_name"] . "' and werknemers_password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["username"] = $row['werknemers_username'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["username"] = "";
	session_destroy();
}
?>
<div style="display:block;margin:0px auto;">
<?php if(empty($_SESSION["username"])) { ?>
<form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="login">Username</label></div>
		<div><input name="user_name" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>       
</form>
<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM klant WHERE klant_username='" . $_SESSION["username"] . "'");
$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($row['klant_username']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>

</div>

<div class="parken-beheerder" style="margin-top: 20px!important;">
<?php
$resulthuis = mysqlI_query($conn,"SELECT huis_ID, huis_oppervlakte, huis_prijs, huis_parkeren, park_park_ID, huis_idhuis_type, huis_image FROM huis");

if ($resulthuis->num_rows > 0) {
?>
    <form action='' method='POST'>
       <table class="admin">
            <tr>
                <th>huis_ID</th>
                <th>huis_oppervlakte</th>
                <th>huis_prijs</th>
                <th>huis_parkeren</th>
                <th>park_park_ID</th>
                <th>huis_idhuis_type</th>
                <th>huis_image</th>

                <th>delete</th>
            </tr>
            <?php
            // output data of each row
            while($row_huis = $resulthuis->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row_huis['huis_ID'] . '</td>';
                echo '<td>' . $row_huis['huis_oppervlakte'] . '</td>';
                echo '<td>' . $row_huis['huis_prijs'] . '</td>';
                echo '<td>' . $row_huis['huis_parkeren'] . '</td>';
                echo '<td>' . $row_huis['park_park_ID'] . '</td>';
                echo '<td>' . $row_huis['huis_idhuis_type'] . '</td>';
                echo '<td><img src="images/huis/' . $row_huis['huis_image'] . '" width="60px" height="auto" /></td>';
                echo "<td><input type='submit'  onclick='retrun confirm('Are you sure you want to delete this item?')' name='deletehuis' value='".$row_huis['huis_ID']."' />";
                echo '</tr>';
            }
                        ?>
        </table>
    </form>
    <?php

            if(isset($_POST['deletehuis'])){

$huis  = $_POST['delete'];

if($conn->query("UPDATE boeking SET huis_huis_ID = null WHERE huis_huis_ID = $huis") === true){
echo 'De boeking uit huis ' . $huis . ' hebben als huis_huis_ID de waarde NULL gekregen<br>';
}
if($conn->query("DELETE FROM huis WHERE huis_ID = $huis") === true){
echo 'Het huis met ID ' . $huis . ' is verwijderd';
}
}
}
else {
    echo "0 parken";
}

?>
<form action="" method="POST" id="frmhuis">
        <label for="huis_oppervlakte">Huis oppervlakte</label><br>
        <input name="huis_oppervlakte" type="text" class="input-field"><br>

        <label for="huis_prijs">Huis prijs</label><br>
        <input name="huis_prijs" type="text" class="input-field"> <br>

        <label for="huis_parkeren">Huis parkeren</label><br>
        <input name="huis_parkeren" type="text" class="input-field"> <br>

        <label for="park_park_ID">park ID</label><br>
        <input name="park_park_ID" type="text" class="input-field"> <br>

        <label for="huis_idhuis_type">Huis type ID</label><br>
        <input name="huis_idhuis_type" type="text" class="input-field"> <br>

        <label for="huis_image">Huis img</label><br>
        <input name="huis_image" type="text" class="input-field"> <br>

        <input type="submit" name="submit_park" value="Submit" class="form-submit-button">
</form>

<?php

if (isset($_POST['huis_oppervlakte']) or isset($_POST['huis_prijs']) or isset($_POST['huis_parkeren']) or isset($_POST['park_park_ID']) or isset($_POST['huis_idhuis_type']) or isset($_POST['huis_image'])){
if (!empty($_POST['huis_oppervlakte']) && !empty($_POST['huis_prijs']) && !empty($_POST['huis_parkeren']) && !empty($_POST['park_park_ID']) && !empty($_POST['huis_idhuis_type']) && !empty($_POST['huis_image'])){
$huisOppervlakte = $_POST['huis_oppervlakte'];
$huisPrijs = $_POST['huis_prijs'];
$park_park_ID = $_POST['park_park_ID'];
$huisIdhuis_type = $_POST['huis_idhuis_type'];
$huisImage = $_POST['huis_image'];
$huis_parkeren = $_POST['huis_parkeren'];

$conn->query("INSERT INTO huis (huis_oppervlakte, huis_prijs, huis_parkeren, park_park_ID, huis_idhuis_type, huis_image)
VALUES ('". $huisOppervlakte. "', '". $huisPrijs. "', '" . $huis_parkeren ."', '". $park_park_ID. "', '". $huisIdhuis_type. "', '". $huisImage. "')");
}
else{
    echo '<p style="font-color:red;">Je bent een veld vergeten</p>';
}
}
}
?>
</div>

</body>
</html>
