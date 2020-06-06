<?php
   if(isset($_POST['Cancel'])){
        $id=$_POST['Cancel'];

        $sql="UPDATE orders SET delivery_status = 2  where oid = $id";
         if(mysqli_query($conn,$sql)){
         }
        else{
            echo $sql."<br>";
            die("Error");
         }
         header("Location:Orders_history.php");
    }
    else if(isset($_POST['Delivered'])){
        $id=$_POST['Delivered'];

        $sql="UPDATE orders SET delivery_status = 1  where oid = $id";
         if(mysqli_query($conn,$sql)){
         }
        else{
            echo $sql."<br>";
            die("Error");
         }
         header("Location:Orders_history.php");
    }

?>

<div class="container bg-dark text-white">
<h1 class="text-center"> Order History</h1>
</div>
<div class="table-responsive">
	<form method="post">
		<table class="table table-hover table-sm table-bordered">
			<thead id="thead1">
				<tr id="Display_tb_thead">
					<?php
					if ( $count_head> 0) 
					{
						while($head1 = mysqli_fetch_assoc($result_count_head)) 
						{
				               echo "<th class='bg-dark text-white' scope='col'>".$head1['COLUMN_NAME']. "</th>";
				        }
				        echo "<th scope='col'></th>";
				         echo "<th scope='col'></th>";
				    } 
				    else 
				    {
				            echo "0 results";
				    }
					?>
				</tr>
			</thead>
			<tbody id="tbody1">
				<?php

				if ( $count_rows> 0) {

					while($row = mysqli_fetch_row($result)) 
						{
				               echo "<tr>";
				               echo "<th  scope='row'><input name='row$row[0]' value='".$row[0]."' disabled></thead>";
				               for ($i=1; $i <$count_head ; $i++)
				               {
                                    if($i==1){
                                            $sql1="select name from customer where cid=$row[$i]";
                                             $customer_result =mysqli_query($conn,$sql1);
                                             $customer_name=mysqli_fetch_row($customer_result);

                                             echo "<td><input type='text' name='row$row[0]_input[]' value='".$customer_name[0]."' disabled></td>";

                                    }
                                    else if($i==2){
                                        $sql1="select name from employee where eid=$row[$i]";
                                             $employee_result =mysqli_query($conn,$sql1);
                                             $employee_name=mysqli_fetch_row($employee_result);

                                             echo "<td><input type='text' name='row$row[0]_input[]' value='".$employee_name[0]."' disabled></td>";

                                    }
                                    else if($i==5){
                                        if($row[$i] == 0){
                                            echo "<td><input type='text' name='row$row[0]_input[]' value='Processing Order' disabled></td>";

                                        }
                                        else if($row[$i] == 1){
                                            echo "<td ><input class='bg-success text-white text-center' type='text' name='row$row[0]_input[]' value='Delivered' disabled></td>";
                                        }
                                        else{
                                            echo "<td><input class='bg-danger text-white text-center' type='text' name='row$row[0]_input[]' value='Cancelled' disabled></td>";
                                        }

                                    }
                                    
    				            else{
    									echo "<td><input type='text' name='row$row[0]_input[]' value='".$row[$i]."' disabled></td>";
    				                }
                               }
                               $str ="'row".$row[0]."_input'";

                               if($row[5] == 0){
                               echo '<td><button class="btn btn-info" type="submit"  name="Delivered" value='.$row[0].' >Order Delivered</button></td>';
				               echo '<td><button class="btn btn-danger" type="submit" name="Cancel" value='.$row[0].'> Cancel</button></td>';
                                }
				               
				               echo "</tr>";
				        }
				}
				else{
					echo "0 results";
				}

				?>

			</tbody>
		</table>
	</form>
	</div>

