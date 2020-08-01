<?php
$host = "localhost";
$username = "docom_cst8238";
$password = "cst@823870";
$database = "docom_cst8238";
$id = intval($_GET['q']);
echo $id;

            $dbConnection = mysqli_connect($host, $username, $password);

            if(!$dbConnection)
                die("Could not connect to the database. Remember this will only run on the Playdoh server.");
    
            mysqli_select_db($dbConnection, $database);

            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
            //$sqlQuery = "SELECT CONCAT(FirstName,LastName) AS FullName FROM Employee WHERE FullName='$q'";
            $sqlQuery = "SELECT * FROM Employee WHERE EmployeeId = '$id'";
            //echo $sqlQuery;
    
            $result = mysqli_query($dbConnection,$sqlQuery);
            //echo "<br><br> -".mysqli_error($dbConnection). "- <br><br>";
    
            $rowCount = mysqli_num_rows($result);
            //echo $rowCount;
//------------------------------------------------------------------//
            //$sqlQuery1 = "SELECT * FROM Employee WHERE "

            mysqli_close($dbConnection);
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<table>
                    <?php                        
                    if($rowCount == 0){
                        echo "*** There are no rows to display from the Employee table ***";
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

</body>
</html>