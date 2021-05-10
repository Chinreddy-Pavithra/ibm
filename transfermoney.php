<?php
include 'dbconn.php';

if(isset($_POST['submit']))
{
    $from = $_GET['custid'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where custid=$from";
    $query = mysqli_query($db,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where custid=$to";
    $query = mysqli_query($db,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['currentbalance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['currentbalance'] - $amount;
                $sql = "UPDATE customers set currentbalance=$newbalance where custid=$from";
                mysqli_query($db,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['currentbalance'] + $amount;
                $sql = "UPDATE customers set currentbalance=$newbalance where custid=$to";
                mysqli_query($db,$sql);
                
                $sender = $sql1['custname'];
                $receiver = $sql2['custname'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($db,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Transfer Money Page</title>
    <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css"></head>
  <style>
  table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 1em;
  min-width: 400px;
  text-align: center;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  }

thead tr {
  background-color: #009879;
  color: #ffffff;
  
  font-weight: bold;
}

th
{
	padding: 12px 7px;
}
.content-table td {
  padding: 5px 6px;
}

 tbody tr {
  border-bottom: 1px solid #dddddd;
}

tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

 tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}


</style>
</head>

<body>
 
<?php
  include 'navbar.php';
?>

        <h2 class="text-center pt-4" style="color : black;">Transaction</h2>
            <?php
                include 'dbconn.php';
                $sid=$_GET['custid'];
                $sql = "SELECT * FROM  customers where custid=$sid";
                $result=mysqli_query($db,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($db);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
				<div class="container">

        	<div class="table-responsive-sm">
            <table class="table table-hover table-striped table-condensed table-bordered">
            	<thead>
                   <tr>
						<th>Id</th>
						<th>Sender</th>
						<th>Receiver</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['custid'] ?></td>
                    <td class="py-2"><?php echo $rows['custname'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['currentbalance'] ?></td>
                </tr>
				</tbody>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'dbconn.php';
                $sid=$_GET['custid'];
                $sql = "SELECT * FROM customers where custid!=$sid";
                $result=mysqli_query($db,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table-content" value="<?php echo $rows['custid'];?>" >
                
                    <?php echo $rows['custname'] ;?> (Balance: 
                    <?php echo $rows['currentbalance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="button" name="submit" type="submit" id="myBtn" style="background-color : #009879;" >Transfer</button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>Chinreddy Pavithra</b> <br> GRIP Spark Foundation</p>
    </footer>
