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
            text-align: left;
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
                  <a href="index.php">Go Back</a><br><br>
                  <a href='logout.php'>Logout</a><br><br>
                                <table>
                                     <tr>
                                     <th>Search for Employees</th>
                                     <th>Change Employees</th>
                                     <th>Insert Employee</th>
                                     <th>Delete Employee</th>
                                     </tr>

                                     <tr>
                                     <td>
                                    <form action="search.php" method="get">
                                                
                                            
                                                <div>
                                                   
                                                   Employee ID: <INPUT TYPE="text" NAME=employeeid><br><br>
                                                   Employee First Name: <INPUT TYPE="text" NAME=efname><br><br>
                                                   Employee Last Name: <INPUT TYPE="text" NAME=elname><br><br>
 
                                                </div>
                                                <div><br>
                                                    <INPUT TYPE="submit" VALUE="Submit" NAME="Submit"/>
                                                 </div><br><br>

                                    </form>
                                    </td>
                                    <td>                                   
                                    <form action="change.php" method="POST">
                                                
                                                <div>
                                                   
                                                   Employee ID: <INPUT TYPE="text" NAME=employeeid><br><br>
                                                   Employee FirstName: <INPUT TYPE="text" NAME=efname><br><br>
                                                   Employee LastName: <INPUT TYPE="text" NAME=elname><br><br>
												   Change To:<br><br>
                                                   Employee LastName: <INPUT TYPE="text" NAME=chelname><br><br>
                                                  
                                                </div>

                                                <div><br>
                                                    <INPUT TYPE="submit" VALUE="Change" NAME="Submit"/>
                                                 </div><br>

                                    </form>
                                    </td>
                                    <td>
                                    <form action="insert.php" method="post">

                                                <div>
                                                   
                                                   Employee ID: <INPUT TYPE="text" NAME=employeeid><br><br>
                                                   Employee FirstName: <INPUT TYPE="text" NAME=efname><br><br>
                                                   Employee LastName: <INPUT TYPE="text" NAME=elname><br><br>
                                                </div>
                                                <div><br>
                                                    <INPUT TYPE="submit" VALUE="Submit" NAME="Submit"/>
                                                 </div><br><br>

                                    </form>
                                    </td>
                                    <td>
                                    <form action="delete.php" method="post">
                                                
                                            
                                                <div>
                                                   
                                                   Employee ID: <INPUT TYPE="text" NAME=employeeid><br><br>
                                                   Employee FirstName: <INPUT TYPE="text" NAME=efname><br><br>
                                                   Employee LastName: <INPUT TYPE="text" NAME=elname><br><br>
 
                                                </div>
                                                <div><br>
                                                    <INPUT TYPE="submit" VALUE="Submit" NAME="Submit"/>
                                                 </div><br><br>

                                    </form>
                                    </td>
                                    
                                </table>
                                <div>
                                <?php
                                  

                                ?>
                                </div><br>
                                <?php      
                                           $servername = "localhost";
                                           $database = "Northwind";

                                           try {
                                           $conn = new PDO( "sqlsrv:Server=$servername;Database=$database",$_SESSION['username'],$_SESSION['password'] );
                                           } catch ( Exception $e ) {
                                           die( print_r( $e->getMessage() ) );
                                           } 

                                           $sql =  "select * from Employees";
                                           $conn->setAttribute( PDO::SQLSRV_ATTR_DIRECT_QUERY, true );
                                           $data = $conn->query($sql);
                                           
                                           while($rows = $data->fetchAll( PDO::FETCH_BOTH )){

                                           if($rows > 0){?> 
                                               <div><h3><?php echo "Employees contains " . count($rows) . " rows.";?></div><br>
                                              <?php foreach($rows as $row){?>
                                            <table> 
                                            <tr>
                                            <td width=10%><?php echo $row[0];?></td>
                                            <td width=30%><?php echo ""." ". $row[1];?></td>
                                            <td><?php echo $row[2];?></td>
                                           </tr>
                                           </table>
                                <?php     
                                               }
                                          }
                                        }
                                    
                                ?>



						</main>
	
				</body>
</html>
