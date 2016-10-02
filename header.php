<!DOCTYPE html>
<html>
<head>
	<title>tbspace.dn42</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">tbspace.dn42</p></a>
	</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php echo (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "index" ? 'class="active"' : ''); ?>><a href="/">Home</a></li>
				<li <?php echo (basename($_SERVER["SCRIPT_FILENAME"], ".php") == "peers" ? 'class="active"' : ''); ?>><a href="/peers.php">Peers</a></li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">