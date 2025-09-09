<?php
	require_once 'config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');	

		try {
			if($_SESSION['role'] == 'admin'){
				$stmt = $connect->prepare('SELECT * FROM cmps');
				$stmt->execute();
				$data = $stmt->fetchAll (PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e) {
			$errMsg = $e->getMessage();
		}
?>
<?php include 'header.php';?>

	<!-- Header nav -->	
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Logo/Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="../auth/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!-- end header nav -->
	<section style="padding-inline-start:0px;">
		<?php include 'side-nav.php';?>
	</section>

<section class="wrapper" style="margin-inline-start: 16%;margin-block-start: -23%;">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<h2>List of Apartment Details</h2>
				<?php 
						echo '<table class="table table-bordered">';
						echo '<thead>';
						echo '<tr>';
						echo '<th>Apartment/Room</th>';
						echo '<th>Complaints</th>';
						echo '<th>Full Name</th>';
						echo '</tr>';
						echo '    </thead>';
							echo '    <tbody>';
					foreach ($data as $key => $value) {	
					     echo ' <tr>';
					      echo "<td>".$value['name']."</td>";
					     echo "<td>".$value['cmp']."</td>";
					     echo "<td>".$value['fullname']."</td>";
					     echo "</tr>";
					}
					echo ' </tbody>';
					echo '	  </table>';
				?>				
			</div>
		</div>
	</div>	
</section>
<?php include 'footer.php';?>