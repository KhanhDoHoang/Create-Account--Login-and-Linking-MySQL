<?php
                        session_start();
                        if(isset($_POST["emaillogin"])){
                            $_SESSION["emaillogin"] = $_POST["emaillogin"];
                            header("Location: ViewAllEmployees.php");
                        } else
                            $EmailLogin = "";
                        //---------------------------------------------//
                        if(isset($_POST["passlogin"])){
                            $_SESSION["passlogin"] = $_POST["passlogin"];
                            header("Location: ViewAllEmployees.php");
                        } else
                            $PassLogin = "";
                        //--------------------------------------------//                        
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
            <form method="POST">
            <fieldset>
                <legend>Login</legend>
                <label> Email Address: </label><br>
                <input type="text" name="email" required/><br>
            
                <label> Password: </label><br>
                <input type="password" name="passwd" required/><br>

                </select>
               </select>
               <input type="submit" value="Login">
            </form>
            </div>
        </div>
        <?php 
			include_once "Footer.php";
        ?>
	</body>
</html>

