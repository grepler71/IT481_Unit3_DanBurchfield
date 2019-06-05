
<html lang="en-us">

<html>

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
     
                  <div class="headborder"></div>
                  
                  <br><br>
            </header>
     <main style="position: relative;">
    
    <fieldset>
        <legend><strong>Customer Search Results</strong></legend>
    
    <div>

<?php

if(isset($_POST['Submit'])){
   
    session_start();

function check_input($d_ata){
    $d_ata = trim($d_ata);
    $d_ata = stripslashes($d_ata);
    $d_ata = htmlspecialchars($d_ata);
    return $d_ata;
}

if(isset($_POST['custid'])){
    $custid = check_input($_POST['custid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Customer ID: $custid</h4>";
} 

if(isset($_POST['custname'])){
    $custname = check_input($_POST['custname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for customer name: $custname</h4>";
}

if(isset($_POST['employeeid'])){
    $employeeid = check_input($_POST['employeeid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for EmployeeID ID: $employeeid</h4>";
}

if(isset($_POST['efname'])){
    $efname = check_input($_POST['efname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Employee FirstName: $efname</h4>";
}

if(isset($_POST['elname'])){
    $elname = check_input($_POST['elname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Employee LastNameD: $elname</h4>";
}

if(isset($_POST['orderid'])){
    $orderid = check_input($_POST['orderid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Order ID: $orderid</h4>";
}

if(isset($_POST['ordercustid'])){
    $ordercustid = check_input($_POST['ordercustid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Order Customer ID: $ordercustid</h4>";
}

if(isset($_POST['emporderid'])){
    $emporderid = check_input($_POST['emporderid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Order Employee ID: $emporderid</h4>";
}

if(isset($_POST['chcustname'])){
    $chcustname = check_input($_POST['chcustname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Changed Customer Name: $chcustname</h4>";
}

if(isset($_POST['chelname'])){
    $chelname = check_input($_POST['chelname']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Changed Customer LastName: $chelname</h4>";
}

if(isset($_POST['chordercustid'])){
    $chordercustid = check_input($_POST['chordercustid']);
    echo "Click <a href=index>here</a> to go back";
    echo "<h4>Search results for Changed Order Customer ID: $chordercustid</h4>";
}



                                          $servername = "localhost";
                                          $database = "Northwind";

                                          try {
                                            $conn = new PDO( "sqlsrv:Server=$servername;Database=$database",$_SESSION['username'],$_SESSION['password']);
                                           } catch ( Exception $e ) {
                                            die( print_r( $e->getMessage() ) );
                                           }
                                           
                                          
                                           if(isset($custid) || isset($custname)){
                                               try {
                                                $sql1 =  "DELETE FROM Customers WHERE CompanyName = '$custname' OR CustomerID = '$custid'";
                                                $sql2 =  "SELECT * FROM Customers WHERE CompanyName = '$custname' OR CustomerID = '$custid'";
                                                } catch ( Exception $e ) {
                                                 die( print_r( $e->getMessage() ) );
                                                }
                                               
                                           }

                                           if(isset($employeeid) || isset($efname) || isset($elname)){
                                               try {
                                               $sql1 =  "DELETE FROM Employees WHERE EmployeeID = '$employeeid' OR Firstname = '$efname' OR LastName = '$efname' ";
                                               $sql2 =  "SELECT * FROM Employeess WHERE LastName = '$elname'";
                                               } catch ( Exception $e ) {
                                                die( print_r( $e->getMessage() ) );
                                               }
                                               
                                          }

                                           if(isset($orderid) || isset($ordercustid) || isset($emporderid)){
                                               try {
                                                $sql1 =  "DELETE FROM Orders WHERE CustomerID = '$ordercustid' OR OrderID = '$orderid' OR EmployeeID = '$emporderid'";
                                                $sql2 =  "SELECT * FROM Orders WHERE CustomerID = '$ordercustid' OR OrderID = '$orderid' OR EmployeeID = '$emporderid'";
                                               } catch ( Exception $e ) {
                                                die( print_r( $e->getMessage() ) );
                                               }
                                               
                                           }

                                           $conn->setAttribute( PDO::SQLSRV_ATTR_DIRECT_QUERY, true );
                                           $insert = $conn->query($sql1);
                                           $data = $conn->query($sql2);
                                           
                                           while($rows = $data->fetchAll( PDO::FETCH_BOTH )){

                                           if($rows > 0){ 
                                               foreach($rows as $row){?>
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
    }
                                ?>

 </div><br><br><br>
            </main>
                  
            
            

      </body>

     

</html>
