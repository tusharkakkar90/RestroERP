<?php
	if(isset($_POST['Order'])){
		$table='orders';
		$cid = $_POST['Custom_ID'];
		$eid=$_SESSION["eid"];
		$Total_cost = $_POST['Total_Price_h'];
		$col_names='oid,cid,eid,Total_cost,delivery_status';
	    $values="$id,$cid,$eid,$Total_cost,0";
		$sql="INSERT INTO $table ($col_names) VALUES ($values)";
		echo $sql;
	 if(mysqli_query($conn,$sql))
	 {
	 	$mid_array = $_POST['Hidden_Added_Item_id'];
	 	$quantity_array = $_POST['Hidden_Added_Quantity'];
	 	$table='orders_menu';
	 	$col_names='oid,mid,quantity';
	 	for ($i=0; $i <count($mid_array); $i++) { 
	 		$values="$id,$mid_array[$i],$quantity_array[$i]";
	 		$sql="INSERT INTO $table ($col_names) VALUES ($values)";
	 		if(mysqli_query($conn,$sql)){

	 		}
	 		else{
	 			echo "Error in orders_menu";
	 		}
	 	}
   	  header('Location:Orders_history.php');
     }
     else
     {

        echo $sql;
        die("error");
  	 }

  	}

?>

<form method="post">
    <div class="container">
    	<div class="row ">
    		<div class="col">
    			<h1 class="text-center card-header bg-info text-white">Menu</h1>
    				 <div class="form-group">
					    <label for="ItemName">Item name</label>
					    <select class="form-control custom-select" id="ItemName" name="ItemName" required>
					     	 
    				<?php
    					$item_id=array();
    				
    					if ($count_rows> 0) 
						{
							$i=0;
							while($head1 = mysqli_fetch_row($result)){
								if($head1[2]=="Available"){
								echo "<option id='$head1[0]' value='$head1[3]'>$head1[1]</option>";
								$item_id[]=$head1[0];
								}	
								
							}
						}	
						
    				?>
    				</select>
    				<label for="Quantity">Item Quantity</label>
    				<input type="number" class="form-control" id="Quantity" value="1" min="1" name="Quantity" placeholder="Quantity" required>
    				<label for="ItemName">Customer Name</label>
					    <select class="form-control custom-select" id="Customname" name="Customname" disabled >
    				<?php
    					
						$sql="select * from customer";
						$result_customer=mysqli_query($conn,$sql);
						$count_customer_rows=mysqli_num_rows($result_customer);
    					$Phone_number=array();
    					if ($count_customer_rows> 0) 
						{
							$i=0;
							while($head2 = mysqli_fetch_row($result_customer)){
								
								echo "<option id='$head2[2]' name='$head2[2]' value='$head2[0]'>$head2[1]</option>";
								$Phone_number[] = $head2[2];
								
							}
							//echo json_encode($Phone_number);
						}	
						
    				?>
    			</select>
    				<label for="ItemName">Customer Phone No</label>
					  <input type="number" class="form-control" id="phno" min="1000000000" max="9999999999" name="phno" placeholder="Phone number" required>
					   <button onclick="SearchCustomer()" type="button" id="select_name" name="select_name" class="btn btn-dark d-block mx-auto btn-submit" >
					   Search Customer
					</button>
    			</div>

    			<div class="row mt-3">
		            <div class="col-12">
		              <button type="button" id="btnAdd" class="btn btn-dark d-block mx-auto btn-submit" onclick="Add_item()">Add Item</button>
		            </div>
    			</div>

	    	

	    	</div>

		   <div class="col">
		    	<div class="col-md">
		    	

		    		<h1 class="text-center card-header bg-info text-white">Items Added</h1>
		     	<ul id="Items" class="list-group md-3">
		            <li class="list-group-item d-flex justify-content-between lh-condensed">
		              <div>
		                <h6 class="my-0">Order ID</h6>
		                <small class="text-muted"></small>
		              </div>
		              <span class="text-muted"></span>
		              <h6 class="my-0"><?php echo $id ?></h6>
		            </li>
		           
		          </ul>

		          <ul id="Price_Items" class="list-group md-3">
		          	<hr>
		            <li class="list-group-item d-flex justify-content-between lh-condensed">
		              <div>
		                <h4 class="my-0">Price</h4>
		                <small class="text-muted"></small>
		              </div>
		              <span class="text-muted"></span>
		              <h4 id="Total_Price" class="my-0">0</h4>
		            </li>
		           
		          </ul>
		          <input type="hidden" class="form-control" id="Total_Price_h" min="1000000000" max="9999999999" name="Total_Price_h" value=0>

		           <input type="hidden" class="form-control" id="Custom_ID" name="Custom_ID">
		      </div>
		      <button type="submit" name="Order" style="visibility: hidden;" id="Order" class="btn btn-dark d-block mx-auto btn-submit">Order</button>
		      </div>
	      </div>
	</div>

</form>