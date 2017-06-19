<html>
<head>
    <title>port of troy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-3.1.1.js"></script>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.0/css/hover-min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Raleway|Roboto|Source+Sans+Pro" rel="stylesheet">
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/menu.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" type="text/css" href="css/header.css?ver=<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<?php
include 'conn.php';

session_start();

$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT klant_ID, klant_vnaam, klant_anaam, klant_email, klant_woonplaats, klant_adres, klant_tel, klant_postcode, klant_land, klant_username, klant_password FROM klant WHERE klant_username='" . $_POST["user_name"] . "' and klant_password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["ID"] = $row['klant_ID'];
    $_SESSION["vnaam"] = $row['klant_vnaam'];
    $_SESSION["anaam"] = $row['klant_anaam'];
    $_SESSION["email"] = $row['klant_email'];
    $_SESSION["woonplaats"] = $row['klant_woonplaats'];
    $_SESSION["adres"] = $row['klant_adres'];
    $_SESSION["tel"] = $row['klant_tel'];
    $_SESSION["postcode"] = $row['klant_postcode'];
    $_SESSION["land"] = $row['klant_land'];
    $_SESSION["username"] = $row['klant_username'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["username"] = "";
	session_destroy();
}
?>
<body>
<nav class="navbar navbar-fixed-top">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="PortOfTroy">
            </a>
          </div>
          <div id="navbar1" class="navbar-collapse collapse">
            <ul class="">
              <li class="hvr-underline-reveal"><a href="index.php">Home</a></li>
              <li class="hvr-underline-reveal"><a href="park.php">Parken</a></li>
              <li class="show-test">
                    <a href="#" class="">Account</a>
                    <div class="hide-test">
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
                            <div><input type="submit" name="login" value="Login" class="form-submit-button"></div>
                        </div>       
                    </form>
                    <?php 
                    } else { 
                    $result = mysqlI_query($conn,"SELECT * FROM werknemers WHERE werknemers_username='" . $_SESSION["username"] . "'");
                    $row  = mysqli_fetch_array($result);
                    ?>
                    <form action="" method="post" id="frmLogout">
                    <div class="member-dashboard">Welcome <?php echo ucwords($row['werknemers_username']); ?>, You have successfully logged in!<br>
                    Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
                    </form>
                    <?php }
                    ?>
                    </div>
                </li>
            </ul>
          </div>
          <!--/.nav-collapse -->

    </nav>
