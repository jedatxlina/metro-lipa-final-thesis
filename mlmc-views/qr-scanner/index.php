<!DOCTYPE html><html lang="en">
<head>
	<meta charset="utf-8">
	<title>QR Code Scanner</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="QR Code Scanner is the fastest and most user-friendly web application."><meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="QR Scanner">
	<meta name="apple-mobile-web-app-status-bar-style" content="#e4e4e4">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="application-name" content="QR Scanner">
	<meta name="msapplication-TileColor" content="#e4e4e4">
	<meta name="msapplication-TileImage" content="/images/touch/mstile-150x150.png">
	<meta name="theme-color" content="#fff">
	<link rel="apple-touch-icon" href="/images/touch/apple-touch-icon.jpg">
	<link rel="icon" type="image/png" href="/images/touch/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/images/touch/favicon-16x16.png" sizes="16x16">
	<link rel="shortcut icon" href="/images/touch/favicon.ico"><link rel="manifest" href="/manifest.json">
	<link href="bundle.css" rel="stylesheet">
</head>
<body>
	<div class="app__layout">
			<header class="app__header">
				<span onclick="window.location.href='../index.php';">
					&emsp;<svg fill="#FFFFFF" height="27" viewBox="0 0 24 24" width="27" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 0h24v24H0z" fill="none"/>
						<path d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z"/>
					</svg>
				
			</header>
		<main class="app__layout-content">
			<video autoplay></video><!-- Dialog  -->
			<div class="app__dialog app__dialog--hide">

				<form action="confirm.php" method="GET">
					<div class="app__dialog-content"><h5>Confirm ID</h5>
						<input type="text" id="result" readonly="readonly" name="result">
					</div>
					
					<div class="app__dialog-actions">
						<button type="button" class="app__dialog-open">Open</button>
						<button type="submit">Confirm</button>
					</div>
				</form>

			</div>
			<div class="app__dialog-overlay app__dialog--hide"></div>
			<!-- Snackbar -->
			<div class="app__snackbar"></div>
		</main>
	</div>

	<div class="app__overlay">
		<div class="app__overlay-frame"></div>
		<div class="custom-scanner"></div>
		<div class="app__help-text">Point the camera at a QR Code</div>
		<div class="app__select-photos">Select from photos</div>
	</div>
<!-- 
	<script>if (location.hostname !== "localhost") {
        (function(i,s,o,g,r,a,m){
        	i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},
        i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })
        (window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'pageview');
      }
  </script> -->
  
  <script type="text/javascript" src="bundle.js"></script>
</body>
</html>