<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

	if(isset($_POST['register_individuals'])) {
			$errMsg = '';
			// Get data from FROM
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$alternat_mobile = $_POST['alternat_mobile'];
			$plot_number = $_POST['plot_number'];
			$country = $_POST['country'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$address = $_POST['address'];
			$landmark = $_POST['landmark'];
			$rent = $_POST['rent'];
			$deposit = $_POST['deposit'];
			$description = $_POST['description'];
			//$open_for_sharing = $_POST['open_for_sharing'];
			$user_id = $_SESSION['id'];
			$accommodation = $_POST['accommodation'];
			//$image = $_POST['image']?$_POST['image']:NULL;
			//$other = $_POST['other'];			
			$rooms = $_POST['rooms'];
			$vacant = $_POST['vacant'];
			$sale = $_POST['sale'];


			//upload an images
			$target_file = "";
			if (isset($_FILES["image"]["name"])) {
				$target_file = "uploads/".basename($_FILES["image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
			    $check = getimagesize($_FILES["image"]["tmp_name"]);			
			    if($check !== false) {
			    	move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			//end of image upload


			try {
					$stmt = $connect->prepare('INSERT INTO room_rental_registrations (fullname, email, mobile, alternat_mobile, plot_number, rooms, country, state, city, address, landmark, rent, sale, deposit, description, image, accommodation, vacant, user_id) VALUES (:fullname, :email, :mobile, :alternat_mobile, :plot_number, :rooms, :country, :state, :city, :address, :landmark, :rent, :sale, :deposit, :description, :image, :accommodation, :vacant, :user_id)');
					$stmt->execute(array(
						':fullname' => $fullname,
						':email' => $email,
						':mobile' => $mobile,
						':alternat_mobile' => $alternat_mobile,
						':plot_number' => $plot_number,
						//':ap_number_of_plats' => $ap_number_of_plats,
						':rooms' => $rooms,
						':country' => $country,
						':state' => $state,
						':city' => $city,
						':address' => $address,
						':landmark' => $landmark,
						':rent' => $rent,
						':sale' => $sale,
						':deposit' => $deposit,
						':description' => $description,
						':accommodation' => $accommodation,
						':image' => $target_file,
						//':other' => $other,
						':vacant' => $vacant,
						':user_id' => $user_id
						));				

				header('Location: register.php?action=reg');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}


	if(isset($_POST['register_apartment'])) {
			$errMsg = '';
			// Get data from FROM
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$alternat_mobile = $_POST['alternat_mobile'];
			$plot_number = $_POST['plot_number'];
			$country = $_POST['country'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$address = $_POST['address'];
			$landmark = $_POST['landmark'];
			$rent = $_POST['rent'];
			$deposit = $_POST['deposit'];
			$description = $_POST['description'];			
			//$open_for_sharing = $_POST['open_for_sharing'];
			$user_id = $_SESSION['id'];
			$accommodation = $_POST['accommodation'];
			$apartment_name = $_POST['apartment_name'];
			$image = $_FILES['image']['name'];
			//$other = $_POST['other'];	

			//upload an images
			$target_file = "";
			if (isset($image)) {
				# code...
				$target_file = "uploads/".basename($_FILES["image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
			    //$check = getimagesize($_FILES["image"]["tmp_name"]);			
			    //if($check !== false) {
			    	move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
			        $uploadOk = 1;
			   // } else {
			       // echo "File is not an image.";
			        //$uploadOk = 0;
			   // }
			}			
			//end of image upload		
			
			try {
				$stmt = $connect->prepare('INSERT INTO room_rental_registrations_apartment (fullname, email, mobile, alternat_mobile, plot_number, apartment_name, ap_number_of_plats, rooms, floor, purpose, own, area, country, state, city, address, landmark, rent, deposit, description, image, accommodation,  vacant, user_id) VALUES (:fullname, :email, :mobile, :alternat_mobile, :plot_number, :apartment_name, :ap_number_of_plats, :rooms, :floor, :purpose, :own, :area, :country, :state, :city, :address, :landmark, :rent, :deposit, :description, :image, :accommodation, :vacant, :user_id)');
				
				foreach ($_POST['ap_number_of_plats'] as $key => $value) {
					# code...					
					$stmt->execute(array(
						':fullname' =>  $_POST['fullname'][$key],
						':email' => $email,
						':mobile' => $mobile,
						':alternat_mobile' => $alternat_mobile,
						':plot_number' => $plot_number,
						':apartment_name' => $apartment_name,
						':ap_number_of_plats' => $value,
						':rooms' => $_POST['rooms'][$key],
						':floor' => $_POST['floor'][$key],
						':purpose' => $_POST['purpose'][$key],
						':own' => $_POST['own'][$key],
						':area' => $_POST['area'][$key],						
						':country' => $country,
						':state' => $state,
						':city' => $city,
						':address' => $_POST['address'],
						':landmark' => $_POST['landmark'],
						':rent' => $_POST['rent'][$key],
						':deposit' => $_POST['deposit'][$key],
						':description' => $_POST['description'][$key],
						':image' => $target_file,
						':accommodation' => $_POST['accommodation'][$key],
						//':other' => $_POST['other'][$key],
						':vacant' => $_POST['vacant'][$key],
						':user_id' => $user_id
					));
				}				
				header('Location: register.php?action=reg');
				exit;
			}catch(PDOException $e) {
				echo $e->getMessage();
			}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'reg') {
		$errMsg = 'Registration successfull. Thank you';
	}
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
<?php include '../include/side-nav.php';?>
<section class="wrapper" style="margin-inline-start: 16%;margin-block-start: -11%;">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Individual Home Registration</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Apartment Registration</a>
	  </li>
	</ul>

	<div class="tab-content">
	<!-- Single room -->
	  <div class="tab-pane active" id="home" role="tabpanel"><br>
	  		<?php include 'partials/individaul.php';?>
	  </div>

	<!-- Apartment -->
	  <div class="tab-pane" id="profile" role="tabpanel">
	  		<?php include 'partials/apartment.php';?>	  	
	  </div>
	</div>	
</section>
<?php include '../include/footer.php';?>
<script type="text/javascript">
	var rowCount = 1;
	function addMoreRows(frm) {
		rowCount ++;
		var recRow = '<div id="rowCount'+rowCount+'"><div class="row"><div class="col-md-4"><div class="form-group"><br> <a href="javascript:void(0);" onclick="removeRow('+rowCount+');" class="btn btn-danger btn-sm">Delete</a> </div> </div></div><div class="row"> <div class="col-md-4"><div class="form-group"> <label for="fullname">Full Name</label> <input type="fullname" class="form-control" id="fullname" placeholder="Full Name" name="fullname[]" required> </div> </div> <div class="col-md-4"><div class="form-group"> <label for="ap_number_of_plats">Flat Number</label> <input type="ap_number_of_plats" class="form-control" id="ap_number_of_plats" placeholder="Flat Number" name="ap_number_of_plats[]" required> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="rooms">Rooms</label> <input type="rooms" class="form-control" id="rooms" placeholder="2BHK/3BHK/1RK" name="rooms[]" required> </div> </div></div><div class="row"> <div class="col-md-4"> <div class="form-group"> <label for="area">Area</label> <input type="area" class="form-control" id="area" placeholder="Area" name="area[]"> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="purpose">Purpose</label> <select class="form-control" id="purpose" name="purpose[]"> <option value="Residential">Residential</option> <option value="Commercial">Commercial</option> </select> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="floor">Floor</label> <select class="form-control" id="floor" name="floor[]"> <option value="Ground Floor">Ground Floor</option> <option value="1st">1st</option> <option value="2nd">2nd</option> <option value="3rd">3rd</option> <option value="4th">4th</option> <option value="5th">5th</option> <option value="6th">6th</option> <option value="7th">7th</option> <option value="8th">8th</option> </select> </div> </div> </div> <div class="row"><div class="col-md-4"> <div class="form-group"> <label for="ownership">Owner/Rented</label> <select class="form-control" id="ownership" name="own[]"> <option value="owner">Owner</option> <option value="rented">Rented</option> </select> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="rent">Rent</label> <input type="rent" class="form-control" id="rent" placeholder="Rent" name="rent[]"> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="deposit">Deposit</label> <input type="deposit" class="form-control" id="deposit" placeholder="Deposit" name="deposit[]"> </div> </div>  </div><div class="row"><div class="col-md-4"> <div class="form-group"> <label for="accommodation">Facilities</label> <input type="accommodation" class="form-control" id="accommodation" placeholder="Facilities" name="accommodation[]"> </div> </div> <div class="col-md-4"> <div class="form-group"> <label for="description">Description</label> <input type="description" class="form-control" id="description" placeholder="Description" name="description[]" required> </div> </div> <div class="col-4"> <div class="form-group"> <label for="vacant">Vacant/Occupied</label> <select class="form-control" id="vacant" name="vacant[]"> <option value="1">Vacant</option> <option value="0">Occupied</option> </select> </div> </div> </div></div>'; $('#addedRows').append(recRow);
	}
	function removeRow(removeNum) {
		$('#rowCount'+removeNum).remove();
	}
</script>