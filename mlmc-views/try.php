
        <script src="assets/js/report/webix.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/report/querybuilder.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/js/report/webix.css">
        <link rel="stylesheet" type="text/css" href="assets/js/report/querybuilder.css">


		<script type="text/javascript">
		var helper;
		var small_film_set = [
			{ id:1, title:"The Shawshank Redemption", year:1994, votes:678790, rating:9, rank:1, category:"Thriller"},
			{ id:2, title:"The Godfather", year:1972, votes:511495, rating:9, rank:2, category:"Crime"},
			{ id:3, title:"The Godfather: Part II", year:1974, votes:319352, rating:9, rank:3, category:"Crime"},
			{ id:4, title:"The Good, the Bad and the Ugly", year:1966, votes:213030, rating:7, rank:4, category:"Western"},
			{ id:5, title:"Pulp fiction", year:1994, votes:533848, rating:8, rank:5, category:"Crime"},
			{ id:6, title:"12 Angry Men", year:1957, votes:164558, rating:8, rank:6, category:"Western"}
		];

		var qb = {
			view: "querybuilder",
			id: "querybuilder",
			fields:[
				{ id:"rating", value:"Rating", type:"number" },
				{ id:"title", value:"Title",  type:"string" },
				{ id:"votes",  value:"Votes", type:"number" }
			],
			maxLevel: 3
		};

		var table = {
			view:"datatable",
			autowidth: true,
			columns:[
				{ id:"rank",	header:"", css:"rank",  width:100,	sort:"int"},
				{ id:"title",	header:"Film title",	width:350,	sort:"string"},
				{ id:"year",	header:"Released",	width:200,	sort:"int"},
				{ id:"votes",	header:"Votes", 		width:250,	sort:"int"},
				{ id:"rating",	header:"Rating", 		width:250,	sort:"int"},
				{ id:"category",header:"Category", 		width:350,	sort:"string"}
			],
			data:small_film_set
		};

		var buttonFilter = {
			view:"button",
			value:"Apply Filter",
			width:150,
			click: function() {
				if($$('querybuilder')){
					helper = $$('querybuilder').getFilterHelper();
				}
				$$('$datatable1').filter(helper);
			}
		};

		webix.ready(function(){
			webix.ui({
				cols:[{
					rows: [qb, {view:"toolbar", cols: [ buttonFilter, { }]}, table ]
				}]
			});
		});
		</script>


<?php
// require_once 'insertData/connection.php';

// $sel = mysqli_query($conn,"SELECT Conditions FROM conditions");
// $data = array();
// $flag=0;   
// $params = $_GET['val'];

// while($row = mysqli_fetch_assoc($sel))
// {
//     $data[] = $row['Conditions'];
// }

// if(preg_match("/[A-z]/i", $params)){
    
//     $params = explode(',',$params);

//     foreach($params AS $val){

//         if(is_numeric($val)){
        
//         }
//         else{
//             $value  = ucwords(strtolower($val));
//             echo $value;
//         }
        
//     }

// }
?>