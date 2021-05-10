<!DOCTYPE html>
<html>
<head>
  <title>View Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
<style>
h2{
	text-align:center;
}
button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}
.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 1em;
  min-width: 400px;
  text-align: center;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  }

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  
  font-weight: bold;
}

.content-table th
{
	padding: 12px 7px;
}
.content-table td {
  padding: 5px 6px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>
  </head>
<body>
<?php 
 include "navbar.php"
 ?>
 <h2 align="center" class="text-center pt-4">Customer Details</h2>
<div align="center">
<table class="content-table">
  <thead>
    <tr>
      <th>Customer Id</th>
      <th>Customer Name</th>
      <th>E-Mail</th>
      <th>Current Balance</th>
	  <th>Transfer Money</th>
    </tr>
  </thead>
  <?php

include "dbconn.php";
$sql = "SELECT * FROM customers";
$result = mysqli_query($db,$sql); // Using database connection file here

//$records = mysqli_query($db,"select * from customers"); // fetch data from database

while($rows=mysqli_fetch_assoc($result)){
?>
  
    <tr>
      <td><?php echo $rows['custid']; ?></td>
    <td><?php echo $rows['custname']; ?></td>
    <td><?php echo $rows['email']; ?></td>
    <td><?php echo $rows['currentbalance']; ?></td>
	<td><a href="transfermoney.php?custid= <?php echo $rows['custid'] ;?>"> <button type="button" class="btn" style="background-color : #A569BD;">Transact</button></a></td> 

    </tr>
  </tbody>
<?php
}
?>
</table>
<?php mysqli_close($db); // Close connection ?>
</div>
<footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Chinreddy Pavithra</b> <br> GRIP Spark Foundation</p>
        </footer>
</body>
</html>
