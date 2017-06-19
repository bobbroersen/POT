<?php
include 'header.php';
include 'conn.php';
?>

<form action="" method="POST" id="frmRegistreer">
		<label for="klant_vnaam">Voornaam</label><br>
		<input name="klant_vnaam" type="text" class="input-field" required><br>

		<label for="klant_anaam">Achternaam</label><br>
        <input name="klant_anaam" type="text" class="input-field" required> <br>

        <label for="klant_email">Email</label><br>
        <input name="klant_email" type="email" class="input-field" required> <br>

        <label for="klant_tel">Telefoon</label><br>
        <input name="klant_tel" type="tel" class="input-field"> <br>

        <label for="klant_adres">Straatnaam + nummer</label><br>
        <input name="klant_adres" type="text" class="input-field" required> <br>

        <label for="klant_postcode">Postcode</label><br>
        <input name="klant_postcode" type="text" class="input-field" required> <br>

        <label for="klant_woonplaats">Woonplaats</label><br>
        <input name="klant_woonplaats" type="text" class="input-field" required> <br>

        <label for="klant_land">Land</label><br>
        <input name="klant_land" type="text" class="input-field" required> <br>

        <label for="klant_username">Username</label><br>
        <input name="klant_username" type="text" class="input-field" required> <br>

        <label for="klant_password">Password</label><br>
        <input name="klant_password" type="text" class="input-field" required> <br>

        <input type="submit" name="submit_klant" value="Submit" class="form-submit-button">
</form>
<?php
if (isset($_POST['klant_vnaam']) or isset($_POST['klant_anaam']) or isset($_POST['klant_email']) or isset($_POST['klant_adres']) or isset($_POST['klant_postcode']) or isset($_POST['klant_woonplaats']) or isset($_POST['klant_land']) or isset($_POST['klant_username']) or isset($_POST['klant_password'])){
if (!empty($_POST['klant_vnaam']) && !empty($_POST['klant_anaam']) && !empty($_POST['klant_email']) && !empty($_POST['klant_adres']) && !empty($_POST['klant_postcode']) && !empty($_POST['klant_woonplaats']) && !empty($_POST['klant_land']) && !empty($_POST['klant_username']) && !empty($_POST['klant_password'])){


$klant_vnaam = $_POST['klant_vnaam'];
$klant_anaam = $_POST['klant_anaam'];
$klant_email = $_POST['klant_email'];
$klant_tel = $_POST['klant_tel'];
$klant_adres = $_POST['klant_adres'];
$klant_postcode = $_POST['klant_postcode'];
$klant_woonplaats = $_POST['klant_woonplaats'];
$klant_land = $_POST['klant_land'];
$klant_username = $_POST['klant_username'];
$klant_password = $_POST['klant_password'];

$conn->query("INSERT INTO klant (klant_vnaam, klant_anaam, klant_email, klant_tel, klant_adres, klant_postcode, klant_woonplaats, klant_land, klant_username, klant_password)
VALUES ('". $klant_vnaam. "', '". $klant_anaam. "', '". $klant_email. "', '". $klant_tel. "', '". $klant_adres. "', '". $klant_postcode. "', '". $klant_woonplaats. "', '". $klant_land. "', '". $klant_username. "', '". $klant_password. "')");
}
else{
    echo '<p style="font-color:red;">Je bent een veld vergeten</p>';
}
}
?>