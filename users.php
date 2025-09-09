<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	

		try {
			$stmt = $connect->prepare('SELECT * FROM users');
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}	
		// print_r($data);	
?>
<?php include '../include/header.php';?>
	<!-- Header nav -->	
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Logo/Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="../auth/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!-- end header nav -->
<?php include '../include/side-nav.php';?>
<section class="wrapper" style="margin-inline-start:16%;margin-block-start: -11%;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php
					if(isset($errMsg)){
						echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
					}
				?>
				<h2>List Of Users</h2>
				<div class="table-responsive">
					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Full Name</th>
					      <th>Email</th>
					      <th>Username</th>
					      <th>Role</th>
					      <!-- <th>Action</th> -->
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		foreach ($data as $key => $value) {
					  			# code...				  			
							   echo '<tr>';
							      echo '<th scope="row">'.$key.'</th>';
							      echo '<td>'.$value['fullname'].'</td>';
							      echo '<td>'.$value['email'].'</td>';
							      echo '<td>'.$value['username'].'</td>';
							      echo '<td>'.$value['role'].'</td>';
							      // echo '<td></td>';
							   echo '</tr>';
					  		}
					  	?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include '../include/footer.php';?>