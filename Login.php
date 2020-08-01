<?php
     session_start();
    // $host = "localhost";
    // $username = "docom_cst8238";
    // $password = "cst@823870";
    // $database = "docom_cst8238";
    // $msg = "";
     $error = "";

    // Create connection

    if(isset($_POST['submit'])){
        $host = "localhost";
		$username = "docom_cst8238";
		$password = "cst@823870";
		$database = "docom_cst8238";

        $dbConnection = mysqli_connect($host, $username, $password);

        if(!$dbConnection)
            die("Could not connect to the database. Remember this will only run on the Playdoh server.");

        mysqli_select_db($dbConnection, $database);
		//echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
        $sqlQuery = "SELECT * FROM Employee WHERE EmailAddress='".$_POST["email"]."' AND Password1='".$_POST["pass"]."'";
        //echo $sqlQuery;
        $result = mysqli_query($dbConnection,$sqlQuery);
        //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";

        $rowCount = mysqli_num_rows($result);
        //echo $rowCount;
        mysqli_close($conn);
        if($rowCount == 1){
            $_SESSION["email"] = $username;
            header("Location: ViewAllEmployees.php");
            $_SESSION["loggedin"] = true;
            header("Location: ViewAllEmployees.php");
            $msg = "success";
        } else {
            $error = "Your email or password is invalid!";
            $_SESSION["loggedin"] = false;
            header("Location: ViewAllEmployees.php");
        }
        
        
    }
 ?>

<html>
	<head>
		<title>Login</title>
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
                <form method="post" action="Login.php">
                <fieldset>
                <legend>Login</legend>
                Please fill in all information <br>
                <label> Email Address: </label><br>
                <input type="text" name="email" required/><br>
                
                <label> Password: </label><br>
                <input type="password" name="pass" required/><br>
                
                <input type = "submit" name="submit" value = " Login "/><br />
               <?php 
                echo $msg;
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