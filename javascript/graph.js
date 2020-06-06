 $(document).ready(function(){
 	$.ajax({
 		url: "http://localhost/Website/RestroERP/Graph_data.php",
 		method: "GET",
 		success: function(data){
 			console.log(data);
 			var name = [];
 			var price = [];

 			for(var i in data){
 				name.push(data[i].name);
 				price.push(data[i].price);
 			}

 			var chartdata = {
 				labels: name,
 				datasets: [
 					{
 						label : "Price",
 						backgroundColor: 'rgba(200,200,200,0.75)',
 						borderColor: 'rgba(200,200,200,0.75)',
 						hoverBackgroundColor: 'rgba(200,200,200,1)',
 						hoverBorderColor: 'rgba(200,200,200,1)',
 						data:price
 					}
 				]
 			};
 			var ctx = $("#mycanvas");

 			var barGraph = new Chart(ctx,{
 				type: "bar",
 				data: chartdata
 			});
 		},
 		error: function(data){
 			console.log(data);
 		} 
 	});
 });

