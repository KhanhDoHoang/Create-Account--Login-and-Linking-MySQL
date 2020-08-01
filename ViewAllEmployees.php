<?php

        session_start();
        $first = $_SESSION["first"];
        $email = $_SESSION["email"];
        $loggedin = $_SESSION["loggedin"];

		$host = "localhost";
		$username = "docom_cst8238";
		$password = "cst@823870";
		$database = "docom_cst8238";
        if($loggedin == true){
            $dbConnection = mysqli_connect($host, $username, $password);

            if(!$dbConnection)
                die("Could not connect to the database. Remember this will only run on the Playdoh server.");
    
            mysqli_select_db($dbConnection, $database);
            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
            $sqlQuery = "SELECT * FROM Employee";
    
            $result = mysqli_query($dbConnection,$sqlQuery);
            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
    
            $rowCount = mysqli_num_rows($result);
            mysqli_close($dbConnection);
        }else {
            echo "Please log in first!";
        }
        
        
?>



<html>
	<head>
		<title>View All Employees</title>
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
            
                <form method="post" action="CreateAccount.php">
                <fieldset>
                <legend>Employee Table</legend>
                <table>
                    <?php                        
                    if($rowCount == 0){
                        echo "*** There are no rows to display from the Employee table ***";
                        echo "Please log in first!";
                    }
                    else
                    {
                        echo "<tr>";					
                                echo "<th>Id<th>";
                                echo "<th>First Name<th>";	
                                echo "<th>Last Name<th>";	
                                echo "<th>Email Address<th>";	
                                echo "<th>Telephone Number<th>";	
                                echo "<th>SIN<th>";	
                                echo "<th>Password<th>";				
                            echo "</tr>";
                        for($i=0; $i<$rowCount; ++$i)
                        {
                            $row = mysqli_fetch_row($result);
                            echo "<tr>";					
                                echo "<td>$row[0]<td>";
                                echo "<td>$row[1]<td>";	
                                echo "<td>$row[2]<td>";	
                                echo "<td>$row[3]<td>";	
                                echo "<td>$row[4]<td>";	
                                echo "<td>$row[5]<td>";	
                                echo "<td>$row[6]<td>";				
                            echo "</tr>";
                                
                        }
                    }
                    mysqli_close($dbConnection);
                ?>
                </table>
                </form>
            
            
        </div>
        <?php 
			include_once "Footer.php";
        ?>
	</body>
</html>
