<!DOCTYPE html>
<head>
	<title>Pusher Notification Demo</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap 3 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Bootstrap Notify - Optional -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css" >
	<script src="https://shareurcodes.com/js/bootstrap-notify.min.js" ></script>
  
	<!-- Material Design Lite Custom - Optional -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-deep_purple.min.css" />
  
	<!-- Pusher -->
	<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
	<script>
	  // Enable pusher logging - don't include this in production
	//   Pusher.logToConsole = true;
  
	  var pusher = new Pusher('c23d5c3be92c6ab27b7a', {
		cluster: 'ap1',
		encrypted: true
	  });
  
	  var channel = pusher.subscribe('my-channel');
	  channel.bind('my-event', function(data) {
	
		console.log(data.message);
		$.notify(data.message, {
			newest_on_top: true
		});
	  });
	</script>
	
	<style type="text/css">
		.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
			background-color: rgb(124,77,255);
		}
		[data-notify="container"] {
			background-color: rgb(241, 242, 240);
			border-color: rgba(149, 149, 149, 0.3);
			border-radius: 5px;
			right : 100px !important;
			color: rgb(124,77,255);
			font-size : 18px;
			font-weight : bolder;
		}
	</style>
</head>
<body>
	<div class="container">
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<a><h3 class="text-center">Real Time Notification to Clients Through Pusher - Demo</h3></a>
			
			<div class="row">
		        <div class="col-md-10 col-md-offset-1">
					<div class="well">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-10 col-md-offset-2">
										<form class="form-inline" id="form"  method="post" >
										<div class="form-group">
										  <label for="fromdate">&emsp;Enter Your Name : &emsp;</label>
										  <input type="text"  class="form-control"  name="name" placeholder="Enter Your Name" required>
										</div>
										<div class="form-group">
											&emsp;&emsp;&emsp;<button style="background-color: rgb(124,77,255);color: #fff" type="submit" id="search"  class="btn btn-default">SUBMIT</button>
										</div>
									   </form> 
									</div>
								</div>
							</div>
						</div>
		            </div>
		        </div>
		    </div>
	</div>
	<script >
	$(document).ready(function(){
		  $("#form").on("submit", function(event){
			event.preventDefault(); 
			$.post('server.php',$("#form").serialize());
		});
	});
	</script>
</body>
</html>