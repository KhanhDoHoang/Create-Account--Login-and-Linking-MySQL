<!--------->
<?php

$host = "localhost";
$username = "docom_cst8238";
$password = "cst@823870";
$database = "docom_cst8238";
$error = "";

    $dbConnection = mysqli_connect($host, $username, $password);

        if(!$dbConnection)
            die("Could not connect to the database. Remember this will only run on the Playdoh server.");

        mysqli_select_db($dbConnection, $database);
        //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
        $sqlQuery = "SELECT * FROM Employee ORDER BY EmployeeId ASC";

        $result = mysqli_query($dbConnection,$sqlQuery);
        //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";

        $rowCount = mysqli_num_rows($result);
        mysqli_close($dbConnection);
        //-------------Done Listing--------------//


?>
<html>
	<head>
		<title>CreateAccount</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script>
      function showUser($str) {
        if ($str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","GetEmployee.php?q="+str,true);
          xmlhttp.send();
        }
      }
    </script>
	</head>
	<body>
        <?php   
            include_once "Header.php";
            include_once "Menu.php";
        ?>
        <div style="margin-top: 4rem"></div>
        <div style="margin-top: 4rem"></div>
        
        <form>
        Select an employee:
        <select name="users" onchange="showUser($this.value)">
        <?php
        //using number 1
        echo "<option value=\"\">Select an employee:</option>";
        for($i=1; $i<=$rowCount; ++$i)
        {
            $row = mysqli_fetch_row($result);
            
            echo "<option value=\"$i\">$row[1] $row[2]</option>";
            
        }
        ?>
        </select>
        </form>

        <div id="txtHint"><b>Employee info will be listed here...</b></div>
        <div style="margin-bottom: 5rem;"></div>
        <?php 
			      include_once "Footer.php";
        ?>
	</body>
</html>

