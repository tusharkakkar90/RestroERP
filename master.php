<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
<script language="JavaScript" type="text/javascript" src="javascript/bootstrap/js/jquery.min.js"></script>

</head>

<body>

<div class="header" id="myHeader">
  <a style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;
  </a> 
</div>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="javascript:void(0)" onclick="openUtilities('myOrders')">Orders</a>
  <ul id="myOrders" style="display: none;" class="list-group">
    <?php if(isset($_SESSION["email"])) { ?>
      <li class="list-group-item"><a href="index.php">Take Orders</a></li>
      <li class="list-group-item"><a href="Orders_history.php">Orders History</a></li>
    <?php } ?>
    </ul>
  <a href="javascript:void(0)" onclick="openUtilities('myUtilities')">
  Utilities
  </a>
    <ul id="myUtilities" class="list-group">
     <?php
      if(isset($_SESSION["email"])) { 
          if( $_SESSION["status"] == 1){
        echo '<li class="list-group-item"><a href="Add_Employee.php">Add Employee</a></li>'; 
        }
        echo '<li class="list-group-item"><a href="Add_Customer.php">Add Customer</a></li>';
      }
      ?>

      
    </ul>
  <a href="Graph.php">Graphs</a>

  <a href="javascript:void(0)" onclick="openUtilities('myTables')">
  Tables
  </a>
   <ul id="myTables" style="display: none;" class="list-group">
    <?php if(isset($_SESSION["email"])) {  ?>
      <li class="list-group-item"><a href="Tables.php">Menu</a></li>
      <?php
          if( $_SESSION["status"] == 1){
      ?>
      <li class="list-group-item"><a href="Tables.php?table=customer">Customer</a></li> 
      <li class="list-group-item"><a href="Tables.php?table=orders">Orders</a></li>
      <?php
          }
        }
      ?>
    </ul>
  <?php
  if(isset($_SESSION["email"])) {
  echo '<a href="Logout.php">Logout</a>'; 
  }
  else{
   echo '<a href="Login.php">Login</a>';
  }
  ?>
</div>
<div class="container-fluid">
  <div class="container-2">
    <?php 
      include($page_content);
    ?>
  </div>
</div>

<footer>
  
</footer>
<script language="JavaScript" type="text/javascript" src="javascript/app.js"></script>

<script language="JavaScript" type="text/javascript" src="javascript/bootstrap/js/bootstrap.min.js"></script>
<script >
    function SearchCustomer(){
  var phno_Array =<?php print json_encode($Phone_number); ?>;
  var phno =document.getElementById('phno').value;
  console.log(phno_Array.length);
    for(var i = 0; i < phno_Array.length; i++){ 
      if(phno == phno_Array[i]){
        var get_id = document.getElementById(phno);
        get_id.setAttribute('selected','selected');
        document.getElementById('Custom_ID').value = get_id.value;
      }
    } 
  }
</script>

</body>
</html> 