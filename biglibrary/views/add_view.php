<?php require_once('header.php'); ?>

	<main>
		<div class="container">
			<form action="add_controller.php" method="POST" accept-charset="utf-8">
				<!-- Medium title -->
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" placeholder="Enter title"></input>
				</div>
				<!-- Creator's name and creator-->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="first_name">Creator's first name</label>
				    	<input type="text" class="form-control" id="first_name" placeholder="Enter creator's first name">
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
							<label for="last_name">Creator's last name</label>
				    	<input type="text" class="form-control" id="last_name" placeholder="Enter creator's last name">
						</div>	
					</div>
				</div>
				<!-- Description -->
				<div>
					<div class="form-group">
						<label for="descr">Description</label>
						<textarea class="form-control" id="descr" rows="3"></textarea>
					</div>
				</div>
				<!-- Publication data and publisher's name-->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="pub_date">Publication year</label>
							<input type="text" class="form-control" id="year" placeholder="Enter publication year"></input>
						</div>
					</div>
					<div class="col-sm">
						<div class="form-group">
							<label for="publisher">Publisher's name</label>
							<input type="text" class="form-control" id="publisher" placeholder="Enter publisher name"></input>
						</div>
					</div>
				</div>
				<!-- Publisher's address -->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
						<label for="street">Publisher's Street</label>
			    	<input type="text" class="form-control" id="street" placeholder="Enter Publisher's street">
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
						<label for="house">House number</label>
			    	<input type="text" class="form-control" id="house" placeholder="Enter house number">
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
						<label for="post_code">Postal code</label>
			    	<input type="text" class="form-control" id="post_code" placeholder="Enter postal code">
						</div>	
					</div>
				</div>
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
						<label for="city">Publisher's city</label>
			    	<input type="text" class="form-control" id="city" placeholder="Enter Publisher's city">
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
						<label for="country">Country</label>
			    	<input type="text" class="form-control" id="country" placeholder="Enter country">
						</div>	
					</div>
				</div>
			</form>
		</div>
	</main>

<?php require_once('footer.php'); ?>