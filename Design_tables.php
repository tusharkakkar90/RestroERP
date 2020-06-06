<?php
    if(isset($_SESSION["status"])){
        if(($_SESSION["status"] == 0) && $table=='employee'){
            header("Location: index.php");

        }
    }
    if(isset($_POST['Update'])){
    	$id=$_POST['Update'];
        $array =$_POST['row'.$_POST['Update'].'_input'];
        $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'RestroERP' AND TABLE_NAME = '$table'";
		$result_col_n = mysqli_query($conn,$sql);
		$count_head =mysqli_num_rows($result_count_head);
		$col_name = mysqli_fetch_row($result_col_n);
		$p_id= $col_name[0];
        foreach( $array as $val){

        	$col_name = mysqli_fetch_row($result_col_n);
        	$sql="UPDATE $table SET $col_name[0] = '$val' where $p_id='$id'";
        	 if(mysqli_query($conn,$sql)){
        	 	echo $sql."<br>";
        	 }
        	 else{
        	 	echo $sql."<br>";
        	 	die("Error");
        	 }
        	
        }
        header("Location: Tables.php?table=$table");
    }
    else if(isset($_POST['Delete'])){
        $id = $_POST['Delete'];
        $array =$_POST['row'.$_POST['Add'].'_input'];
        $result_col_n = mysqli_query($conn,$sql);
		$count_head =mysqli_num_rows($result_count_head);
		$col_name = mysqli_fetch_row($result_col_n);
        $sql = "DELETE from $table where $col_name[0]=$id";
        if(mysqli_query($conn,$sql)){
        	 	echo $sql."<br>";
        	 }
        	 else{
        	 	echo $sql."<br>";
        	 	die("Error");
        	 }
        header("Location: Tables.php?table=$table");

    }
    else if(isset($_POST['Add'])){
    	$id=$_POST['Add'];
        $array =$_POST['row'.$_POST['Add'].'_input'];
        $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'RestroERP' AND TABLE_NAME = '$table'";
		$result_col_n = mysqli_query($conn,$sql);
		$count_head =mysqli_num_rows($result_count_head);
		$col_name = mysqli_fetch_row($result_col_n);
		$col_names = "$col_name[0]";
        $values="";
        foreach( $array as $val){
        	if($col_name = mysqli_fetch_row($result_col_n)){
        		$col_names = "$col_names". ",$col_name[0]";	
        	}
        	
        	if(is_numeric($val)){
        		if($count ==0){
        			$values ="".$val."";
        		}
        		else{
        			$values ="$values,"."$val";
        		}
        	}
        	else{
        		$values="$values,'$val'";
        	}
        	$count++;
        }
    //    echo $col_names."<br>" ;
      //  echo $values;
        $sql="INSERT INTO $table ($col_names) VALUES($values)";
         if(mysqli_query($conn,$sql)){
        	 	echo $sql."<br>";
        	 }
        	 else{
        	 	echo $sql."<br>";
        	 	die("Error");
        	 }
        header("Location:Tables.php?table=$table");
    }
?>
<div class="container bg-info text-white">
<h1 class="text-center">Table <?php echo"$table"; ?></h1>
</div>
<div class="table-responsive">
	<form method="post">
		<table class="table table-hover table-sm table-bordered">
			<thead id="thead1">
				<tr id="Display_tb_thead">
					<?php
					if ( $count_head> 0) 
					{      $count=0;
                        $col_names="";
						while($head1 = mysqli_fetch_assoc($result_count_head)) 
					   	{      
                                if($count==0){
                                    $col_names =$head1['COLUMN_NAME'];
                                }
				               echo "<th class='bg-dark text-white' scope='col'>".$head1['COLUMN_NAME']. "</th>";
                               $count++;
				        }
				        echo "<th scope='col'></th>";
				        echo "<th scope='col'></th>";
                        $sql="Select max($col_names) from $table";
                        $result_id=mysqli_query($conn,$sql) or die("Error");
                        $result_data_id=mysqli_fetch_row($result_id);
                        $result_id_value=$result_data_id[0] + 1;

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
				           
									echo "<td><input type='text' name='row$row[0]_input[]' value='".$row[$i]."'></td>";
				               }
                               $str ="'row".$row[0]."_input'";
                               echo '<td><button class="btn btn-info" type="submit"  name="Update" value='.$row[0].' > Update</button></td>';
				               echo '<td><button class="btn btn-danger" type="submit" name="Delete" value='.$row[0].'> Delete</button></td>';
				               
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
<div>
	<button class="btn btn-success" id="Add_Row" onclick="addRow(<?php echo $count_head; ?>,<?php echo $result_id_value; ?>)">
		Add Row
	</button>
</div>
