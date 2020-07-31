<?php

		$host = "localhost";
		$username = "docom_cst8238";
		$password = "cst@823870";
		$database = "docom_cst8238";

        $dbConnection = mysqli_connect($host, $username, $password);

        if(!$dbConnection)
            die("Could not connect to the database. Remember this will only run on the Playdoh server.");

        mysqli_select_db($dbConnection, $database);
		echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
        $sqlQuery = "SELECT * FROM Employee";

        $result = mysqli_query($dbConnection,$sqlQuery);
        echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";

        $rowCount = mysqli_num_rows($result);

        if($rowCount == 0)
            echo "*** There are no rows to display from the Employee table ***";
        else
        {
            for($i=0; $i<$rowCount; ++$i)
            {
                $row = mysqli_fetch_row($result);
                echo "First Name: ".$row[1]."<br />";
                echo "Last Name: ".$row[2]."<br />";
            }
        }

        mysqli_close($dbConnection);

        ?>