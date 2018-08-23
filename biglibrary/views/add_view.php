<?php require_once('header.php'); ?>

	<main>
		<div class="container">
			<a href="../big_list.php" ><button type="button" class="btn btn-primary mt-3">Back to all media</button></a>

			<form action="add_controller.php" method="POST" accept-charset="utf-8" class="mt-3">
				<!-- Medium title and creator-->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter title"></input>
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
					    <label for="creator">Creator</label>
					    <select class="form-control" id="creator" name="creator">
					    	<option value="-1">-- Select creator --</option>
					      <?php foreach ($creators as $oneCreator) { ?>
					      <option value="<?php echo $oneCreator['creator_id']; ?>"><?php echo $oneCreator['first_name'].' '.$oneCreator['last_name']; ?></option>
					    	<?php } ?>
					    </select>
					  </div>	
					</div>
				</div>
				<!-- Description -->
				<div class="form-group">
					<label for="descr">Description</label>
					<textarea class="form-control" id="descr" name="descr" rows="4" placeholder="Enter description"></textarea>
				</div>
				<!-- Image link-->
				<div class="form-group">
					<label for="img">Image URL</label>
					<textarea class="form-control" id="img" name="img" rows="2" placeholder="Enter image URL"></textarea>
				</div>
				<!-- Publication year and publisher -->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="year">Publication year</label>
							<input type="text" class="form-control" id="year" name="year" placeholder="Enter publication year"></input>
						</div>
					</div>
					<div class="col-sm">
						<div class="form-group">
							<label for="publisher">Select publisher</label>
					    <select class="form-control" id="publisher" name="publisher">
					      <option value="-1">-- Select publisher --</option>
					      <?php foreach($publishers as $onePublisher) { ?>
					      <option value="<?php echo $onePublisher['publisher_id']; ?>"><?php echo $onePublisher['name'].', '.$onePublisher['city']; ?></option>
					    	<?php } ?>
					    </select>
						</div>
					</div>
				</div>
				<!-- Type -->
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="type">Select type</label>
					    <select class="form-control" id="type" name="type">
					    	<option value="-1">-- Select type --</option>
					    	<?php foreach($types as $oneType) { ?>
					      <option value="<?php echo $oneType['type_id']; ?>"><?php echo $oneType['name']; ?></option>
					    	<?php } ?>
					    </select>
						</div>		
					</div>	
				</div>
				<button class="btn btn-success" type="submit" name="btn_add">Add medium</button>
			</form>
		</div>
	</main>

<?php require_once('footer.php'); ?>