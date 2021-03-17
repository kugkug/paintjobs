<!DOCTYPE html>
<html>
<head>
	<title><?=$title;?></title>

	<link rel="stylesheet" type="text/css" href="assets/css/main.min.css">
</head>
<body>

	<nav>

		<a href="/">
			JUAN'S AUTO PAINT JOB
		</a>

	</nav>
	<div class="subnav">
		<ul>
			<li>
				<a href="/paint_jobs" class="<?=$new;?>">NEW PAINT JOB</a>
			</li>
			<li>
				<a href="paintjobs" class="<?=$job;?>">PAINT JOBS</a>
			</li>
		</ul>
	</div>

	<div class="wrapper">
		<?=$module;?>
		
	</div>

</body>
</html>

