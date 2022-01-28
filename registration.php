<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes
	$fullname = stripslashes($_REQUEST['fullname']);
        //escapes special characters in a string
	$fullname = mysqli_real_escape_string($con,$fullname); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $gender = stripslashes($_REQUEST['gender']);
    $gender = mysqli_real_escape_string($con,$gender);
    $address = stripslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con,$address);
    $city = stripslashes($_REQUEST['city']);
    $city = mysqli_real_escape_string($con,$city);
    $postcode = stripslashes($_REQUEST['postcode']);
    $postcode = mysqli_real_escape_string($con,$postcode);
    $state = stripslashes($_REQUEST['state']);
    $state = mysqli_real_escape_string($con,$state);
    $country = stripslashes($_REQUEST['country']);
    $country = mysqli_real_escape_string($con,$country);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `user` (fullname, password, email, gender, address, city, postcode, state, country, trn_date)
VALUES ('$fullname', '".md5($password)."', '$email', '$gender', '$address', '$city', '$postcode', '$state', '$country', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You have registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration Form</h1>
<form name="registration" action="" method="post">
<input type="text" name="fullname" placeholder="Fullname" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required /> <br><br>
<input type="radio" name="gender" value="male"> Male <br>
<input type="radio" name="gender" value="female"> Female <br><br>
<input type="address" name="address" placeholder="Address" required />
<input type="city" name="city" placeholder="City" required />
<input type="postcode" name="postcode" placeholder="Postcode" required />
<input type="state" name="state" placeholder="State" required />
<input type="country" name="country" placeholder="Country" required /><br><br>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
