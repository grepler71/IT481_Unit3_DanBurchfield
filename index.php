<?php
   session_start();
   
   if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
      session_unset();
      session_destroy();
      header('location:login.php');
   }
?>

<!doctype html>

<html lang="en-us">

		<head>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td{
            border: 1px solid #dddddd;
            text-align: right;
            padding: 8px;
            vertical-align: middle;
            }
            th{
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            vertical-align: middle;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
            </style>
                        <meta http-equiv=Content-Type content="text/html; charset=windows-1252">

			<link rel="stylesheet" type="text/css" href="../style/style.css">
           
		   <title>
             IT481 Advanced Software Development
           </title>
               
		</head>

				<body lang=EN-US style='tab-interval:.5in'>
						<header>
							
							<p style=textalign:center;font-size:21pt>Advanced Software Development Unit 3</p>

							<div class="headborder"></div>

						</header>

						<main style="position: relative;">
                  <div><?php echo ("Welcome " . $_SESSION['username']);?></div><br><br>
                  <a href="index1.php">Customers Table</a><br><br>
                  <a href="index2.php">Employees Table</a><br><br>
                  <a href="index3.php">Orders Table</a><br><br><br>
                  <a href='logout.php'>Logout</a>




						</main>
	
				</body>
</html>
