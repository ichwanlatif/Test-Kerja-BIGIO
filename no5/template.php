
<html>
	<?php
		session_start();
		if(!isset($_SESSION['role']))
		{
			header("location:formLogin.php");
		}
		else{
			if(!isset($_GET['content'])){
				$vcontent = "home.php";
			}
			else{
				$vcontent = $_GET['content'];
			}
		}
	?>

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<title>Web Monitoring Nilai Siswa</title>
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
			<div class="container">
				<a class="navbar-brand font-weight-bold" href="#">Monitoring Nilai Siswa</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mr-4">
					<li class="nav-item">
						<a class="nav-link" href="template.php?content=home.php">Home </a>
					</li>
					<?php 
						switch($_SESSION['role']){
							case 1: {
								echo "<li class='nav-item'>
									<a class='nav-link' href='template.php?content=formAddUser.php'>Add User </a>
								</li>";
								break;
							}
							case 2: {
								echo "<li class='nav-item'>
									<a class='nav-link' href='template.php?content=listStudent.php'>Input Nilai Siswa </a>
								</li>";
								break;
							}
							case 3: {
								echo "<li class='nav-item'>
									<a class='nav-link' href='template.php?content=listSemester.php&studentID=".$_SESSION['studentID']."'>Lihat Nilai </a>
								</li>";
								break;
							}
						}
					?>
					<li class="nav-item">
						<a class="nav-link" href="#">About </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Help </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Logout </a>
					</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="row mt-5">
			<?php include $vcontent; ?>
		</div>
	</body>
	<footer class="bg-info text-white fixed-bottom">
		<div class="copyright text-center text font-weight-bold p-1">
			<p>Developed by Ichwan Latif Fajari Copyright <i class="far fa-copyright"></i> 2021</p>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>