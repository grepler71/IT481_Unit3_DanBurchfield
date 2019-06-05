
<html lang="en-us">

<html>

      <head>
      <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
     
                  <div class="headborder"></div>
                  
                  <br><br>
            </header>
     <main style="position: relative;">
    
    <fieldset>
        <legend><strong>Customer Search Results</strong></legend>
    
    <div>

<?php

    if(isset($_GET['Submit'])){
   
        session_start();
   
        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
           session_unset();
           session_destroy();
           header('location:login.php');
        }


function check_input($d_ata){
    $d_ata = trim($d_ata);
    $d_ata = stripslashes($d_ata);
    $d_ata = htmlspecialchars($d_ata);
    return $d_ata;
}

if(isset($_GET['custid'])){
    $custid = check_input($_GET['custid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Customer ID: $custid</h4>";
} 

if(isset($_GET['custname'])){
    $custname = check_input($_GET['custname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for customer name: $custname</h4>";
}

if(isset($_GET['employeeid'])){
    $employeeid = check_input($_GET['employeeid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeID ID: $employeeid</h4>";
}

if(isset($_GET['efname'])){
    $efname = check_input($_GET['efname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeName ID: $efname</h4>";
}

if(isset($_GET['elname'])){
    $elname = check_input($_GET['elname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeName ID: $elname</h4>";
}

if(isset($_GET['orderid'])){
    $orderid = check_input($_GET['orderid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeName ID: $orderid</h4>";
}

if(isset($_GET['ordercustid'])){
    $ordercustid = check_input($_GET['ordercustid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeName ID: $ordercustid</h4>";
}

if(isset($_GET['emporderid'])){
    $emporderid = check_input($_GET['emporderid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeName ID: $emporderid</h4>";
}

                                          $servername = "localhost";
                                          $database = "Northwind";

                                          try {
                                            $conn = new PDO( "sqlsrv:Server=$servername;Database=$database",$_SESSION['username'],$_SESSION['password']);
                                           } catch ( Exception $e ) {
                                            die( print_r( $e->getMessage() ) );
                                           }
                                           if(isset($custid) || isset($custname)){
                                           $sql =  "SELECT * FROM Customers WHERE CompanyName = '$custname' or CustomerID = '$custid'";
                                           }
                                           if(isset($employeeid) || isset($efname) || isset($elname)){
                                            $sql =  "SELECT * FROM Employees WHERE EmployeeID = '$employeeid' OR FirstName = '$efname' OR LastName = '$elname' ";
                                            }
                                            if(isset($orderid) || isset($ordercustid) || isset($emporderid)){
                                                $sql =  "SELECT * FROM Orders WHERE OrderID = '$orderid' OR CustomerID = '$ordercustid' OR EmployeeID = '$emporderid' ";
                                                }
                                           $conn->setAttribute( PDO::SQLSRV_ATTR_DIRECT_QUERY, true );
                                           $data = $conn->query($sql);
                                           
                                           while($rows = $data->fetchAll( PDO::FETCH_BOTH )){

                                           if($rows > 0){ 
                                               foreach($rows as $row){?>
                                            <table> 
                                            <tr>
                                            <td width=10%><?php echo $row[0];?></td>
                                            <td width=30%><?php echo ""." ". $row[1];?></td>
                                            <td width=30%><?php echo $row[2];?></td>
                                           </tr>
                                           </table>
                                <?php     
                                               }
                                          }
                                        }
    }
                                ?>

 </div><br><br><br>
            </main>
                  
            
            

      </body>

     

</html>
