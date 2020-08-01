<?php

$host = "localhost";
$username = "docom_cst8238";
$password = "cst@823870";
$database = "docom_cst8238";
//echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
$error = "";

if(!isset($_POST["email"]) || !isset($_POST["passwd"]))
{
    //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
	$error = "Please enter an email and password.";
}
else
{
    //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
	if($_POST["email"] != "" && $_POST["passwd"] != "")
	{		
		$dbConnection = mysqli_connect($host, $username, $password);	
		
		// Check connection
		if ($dbConnection->connect_error) {
            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
			die("Connection failed: " . $dbConnection->connect_error);
		}
		//echo "Connected successfully" . "<br>";		
				
		mysqli_select_db($dbConnection, $database);
		//echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
		$sqlQuery = "INSERT INTO Employee (EmployeeId, FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password1) VALUES(NULL,'".$_POST["first"]."','".$_POST["last"]."', '".$_POST["email"]."', '".$_POST["phone"]."', '".$_POST["SIN"]."', '".$_POST["passwd"]."')";
		//echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
		if (mysqli_query($dbConnection, $sqlQuery)) {
			//echo "Person Successfully Added". "<br>";
		} else {
            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
			//echo "Person Could not be added: " . $sqlQuery . "<br>" . mysqli_error($dbConnection);
		}
		//echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
		mysqli_close($dbConnection);
	}
	else	
        $error = "Please enter an email and password.";	
        
    session_start();
    $_SESSION["loggedin"] = false;
    header("Location: ViewAllEmployees.php");
    if(isset($_POST["first"])){
    $_SESSION["first"] = $_POST["first"];
    header("Location: ViewAllEmployees.php");
    } else
    $first = "";
}

?>
<html>
	<head>
		<title>CreateAccount</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
        <?php   
            include_once "Header.php";
            include_once "Menu.php";
        ?>
        <div style="margin-top: 4rem"></div>
        <div style="margin-top: 4rem"></div>
        
        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <form method="post" action="CreateAccount.php">
                <fieldset>
                <legend>Create your new account</legend>
                Please fill in all information <br>
                <label> First Name: </label><br>
                <input type="text" name="first" required/><br>
            
                <label> Last Name: </label><br>
                <input type="text" name="last" required/><br>

                <label> Email Address: </label><br>
                <input type="text" name="email" required/><br>

                <label> Phone Number: </label><br>
                <input type="number" name="phone" required/><br>

                <label> SIN: </label><br>
                <input type="number" name="SIN" required/><br>

                <label> Password: </label><br>
                <input type="password" name="passwd" required/><br>
                
                
               <input type="submit" value="Submit information"><br>
               <?php 
			    echo $error;
		        ?>
                </form>
            </div>
           
        </div>
        <?php 
			include_once "Footer.php";
        ?>
	</body>
</html>

