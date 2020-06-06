
function openNav() {
  document.getElementById("mySidenav").style.width = "20%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("myUtilities").style.display="none";
}

function openUtilities(idname) {
	var id_name= idname;
	if (document.getElementById(id_name).style.display != "block") {
		document.getElementById(id_name).style.display="block";
	}
	else{
		document.getElementById(id_name).style.display="none";
	}
  
}

function addItems(head_count,row_count){
	var html_head="<tr>";
		for (var i = 0; i < head_count; i++) {
			html_head +="<th>"+i+"</th>";
		}
		
		html_head += "</tr>";

	var html_row="";
	var k=0;
	while(k!=row_count){

		html_row += " <tr> ";
		for(var j=0;j<head_count;j++){
			html_row += "<td><input name='item"+(j+1)+"[]'</td>";
		}
		html_row += " </tr> ";
		k++;
		document.getElementById("tbody1").insertRow().innerHTML = html_row;
		html_row="";
	}

	document.getElementById("thead1").insertRow().innerHTML = html_head;
	

}
function addRow(head_count,row_count){

	var html_head="<tr><form action='post'>";
		html_head += "<td scope='row'>"+"<input type='text' name='row"+(row_count)+"_input[]' value='"+(row_count)+"' ></td>";
		for (var i = 1; i < head_count; i++) {
			html_head +="<td><input type='text' name='row"+(row_count)+"_input[]'></td>";
		}
		html_head +="<td><button class='btn btn-success' type='submit' value='"+(row_count)+"' name='Add'>Add</button></td>";
		html_head +="<td><button class='btn btn-danger' type='submit' value='"+(row_count)+"' name='Cancel'>Cancel</button></td>";
		html_head += "</form></tr>";
	document.getElementById("tbody1").insertRow().innerHTML = html_head;
	document.getElementById("Add_Row").style.display = 'none';
}

function makeEditable(value){
	//document.write(value);
	var input = document.getElementById(""+value);
	for(var i = 0; i < input.length; i++) {
		document.write(value);
    	input[i].style.color = "blue";
	}

}

function Add_item(){
	var menu_name = document.getElementById("ItemName");
	var Quantity = document.getElementById("Quantity").value;
	var list = document.getElementById("Items");
	var li_count=$('ul#Items  li').length;
	var Item_Name = document.querySelectorAll("[id='Added_Item[]']");

	var bool_true=0;
	for(var i = 0; i < Item_Name.length; i++){
		if(Item_Name[i].innerText == $("#ItemName option:selected").text()){
			bool_true=1;
			var Item_Price = document.querySelectorAll("[id='Added_Price[]']");
			var Item_Quantity = document.querySelectorAll("[id='Added_Quantity[]']");
			var Hidden_Item_Quantity = document.querySelectorAll("[id='Hidden_Added_Quantity[]']");
			Item_Price[i].innerText = parseInt(Item_Price[i].innerText)+(menu_name.value*Quantity);
			Item_Quantity[i].innerText = parseInt(Item_Quantity[i].innerText)+parseInt(Quantity);
			Hidden_Item_Quantity[i].value=Item_Quantity[i].innerText;
		}
	}
	if(bool_true==0)
	{
		var html ='<div>';
			html+='<h6 class="my-0" id="Added_Item[]">'+$("#ItemName option:selected").text()+'</h6>';
			html+='<small class="text-muted" id="Added_Quantity[]">'+Quantity+'</small></div>';
			html+='<span class="text-muted"  id="Added_Price[]">'+(menu_name.value*Quantity)+'</span>';
			html+='<input type="hidden" id="Hidden_Added_Item_id[]" name="Hidden_Added_Item_id[]" value="'+$("#ItemName option:selected").attr("id")+'">';
			html+='<input type="hidden" id="Hidden_Added_Quantity[]" name="Hidden_Added_Quantity[]" value="'+Quantity+'">';

		
		li_count++;
		//console.log(li_count);
		var li=document.createElement('li'); 
		li.setAttribute('class','list-group-item d-flex justify-content-between lh-condensed');
		li.setAttribute('id',li_count);
		li.setAttribute('onclick','removeli(this)');
		li.innerHTML =html;
		list.appendChild(li);
		document.getElementById("Order").style.visibility = "visible";

		
		console.log(Price);
		
		/*li_count +=10;
		for(var i=1; i<li_count; i++){
			if(document.getElementById('Added_Price['+i+']') != undefined ){
			var Price=document.getElementById('Added_Price['+i+']');
			sum=sum+parseInt(Price.innerText);
			}
		}
		console.log(sum);*/
	}
		var sum=0;
		var Price = document.querySelectorAll("[id='Added_Price[]']");
		for(var i = 0; i < Price.length; i++){
			sum=sum+parseInt(Price[i].innerText);
		}
			document.getElementById("Total_Price").innerHTML=sum+" ₹";
			document.getElementById("Total_Price_h").value=sum;
	

}
function removeli(li_item){
	//console.log(li_item);
	var li_count=$('ul#Items  li').length;
	if(li_count==2){
		document.getElementById("Order").style.visibility = "hidden";
	}


	$(li_item).remove();
	/*Great code down below*/
	var sum=0;
	var Price = document.querySelectorAll("[id='Added_Price[]']");
		for(var i = 0; i < Price.length; i++){
			sum=sum+parseInt(Price[i].innerText);
		}
	document.getElementById("Total_Price").innerHTML=sum+" ₹";
	document.getElementById("Total_Price_h").value=sum;
}

