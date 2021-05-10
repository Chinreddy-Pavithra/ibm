<html>
<head>
<meta charset=""UTF-8>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  
 <style>
 .sec{
	 margin-top:50px;
	 display:flex;
	 align-items:center;
	 justify-content:center;
 }
 .container{
 width:80%;
 display: grid;
 grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
 grid-gap:80px;

 }
 .box{
 height:300px
 color:white;
 border:2px solid white;
 position relative;
 align:center;
 }
 img {
  margin-top: 5px;
  vertical-align: middle;
  width: 100%;
  border-radius:7px;
}
 </style>
</head>
<body>
 <div class="heading text-center my-5">
                  <h3>Welcome to</h3>
                  <h1>BUDDY BANK</h1>
                </div>
<div class="sec">
 <div class="container" align="center">
   <div class="box" align="center">
	 <img src="bankacc.jpg"  style="width:100%">
<br><br>
   <a href="signn.html"> <button style="background-color : #2785C4;">Create a User</button></a>

   </div>
   <div class="box" align="center">
	 <img src="maketransactions.jpg"  style="width:100%">
     <br><br><a href="viewcustomers.php"><button style="background-color : #2785C4; align:center;">Make a Transaction</button></a>
  
   </div>
   <div class="box" align="center">
	 <img src="transactionhistory.jpg" alt="Mountains" style="width:100%"><br><br>
	 <a href="transactionhistory.php"><button style="background-color : #2785C4;">Transaction History</button></a>
   </div>
</div>
</div>
 </body>
</html>