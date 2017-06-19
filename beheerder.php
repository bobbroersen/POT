<html>
<head>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" type="text/css" href="css/header.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body class="beheerder" style="margin-top:20px!important; color: #000!important;">
<a href="http://bobbroersen.me/beheerderhuis.php">huizen</a>
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
$result_parken = mysqlI_query($conn,"SELECT park_ID, park_naam, park_plaats, park_land, park_image, park_omschrijving FROM park");

if ($result_parken->num_rows > 0) {
?>
    <form action='' method='POST'>
       <table class="admin">
            <tr>
                <th>park_ID</th>
                <th>park_naam</th>
                <th>park_plaats</th>
                <th>park_land</th>
                <th>park_image</th>
                <th>delete</th>
            </tr>
            <?php
            // output data of each row
            while($row_parken = $result_parken->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row_parken['park_ID'] . '</td>';
                echo '<td>' . $row_parken['park_naam'] . '</td>';
                echo '<td>' . $row_parken['park_plaats'] . '</td>';
                echo '<td>' . $row_parken['park_land'] . '</td>';
                echo '<td><img src="images/parken/' . $row_parken['park_image'] . '" width="60px" height="auto" /></td>';
                echo "<td><input type='submit'  onclick='retrun confirm('Are you sure you want to delete this item?')' name='delete' value='".$row_parken['park_ID']."' />";
                echo '</tr>';
            }
                        ?>
        </table>
    </form>
    <?php

            if(isset($_POST['delete'])){

$park  = $_POST['delete'];

if($conn->query("UPDATE klant SET park_park_ID = null WHERE park_park_ID = $park") === true){
echo 'De klant uit park ' . $park . ' hebben als park_park_ID de waarde NULL gekregen<br>';
}
if($conn->query("DELETE from parkfaciliteiten where park_park_ID = $park") === true){
echo 'De Parkfaciliteiten uit park ' . $park . ' zijn verwijderd<br>';
}
if($conn->query("DELETE from huis where park_park_ID = $park") === true){
echo 'De huizen in park ' . $park . ' zijn verwijderd<br>';
}
if($conn->query("DELETE FROM park WHERE park_ID = $park") === true){
echo 'Het park met ID ' . $park . ' is verwijderd';
}
}
}
else {
    echo "0 parken";
}

?>
<form action="" method="POST" id="frmPark">
		<label for="park_naam">park naam</label><br>
		<input name="park_naam" type="text" class="input-field"><br>

		<label for="park_plaats">park plaats</label><br>
        <input name="park_plaats" type="text" class="input-field"> <br>

        <label for="park_land">park land</label><br>
        <input name="park_land" type="text" class="input-field"> <br>

        <label for="park_img">park image</label><br>
        <input name="park_img" type="text" class="input-field"> <br>


        <label for="park_omschrv">park omschrijving</label><br>
        <textarea rows="4" cols="50" name="park_omschrv" form="frmPark"></textarea> <br>

        <input type="submit" name="submit_park" value="Submit" class="form-submit-button">
</form>

<?php

if (isset($_POST['park_naam']) or isset($_POST['park_plaats']) or isset($_POST['park_land']) or isset($_POST['park_img']) or isset($_POST['park_omschrv'])){
if (!empty($_POST['park_naam']) && !empty($_POST['park_plaats']) && !empty($_POST['park_land']) && !empty($_POST['park_img']) && !empty($_POST['park_omschrv'])){
$parkNaam = $_POST['park_naam'];
$parkPlaats = $_POST['park_plaats'];
$parkLand = $_POST['park_land'];
$parkImg = $_POST['park_img'];
$parkOmschrv = $_POST['park_omschrv'];

echo $parkNaam;
echo $parkPlaats;
echo $parkLand;
echo $parkImg;
echo $parkOmschrv;

$conn->query("INSERT INTO park (park_naam, park_plaats, park_land, park_image, park_omschrijving)
VALUES ('". $parkNaam. "', '". $parkPlaats. "', '". $parkLand. "', '". $parkImg. "', '". $parkOmschrv. "')");
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
