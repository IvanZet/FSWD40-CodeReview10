<?php require_once('header.php'); ?>

	<main>
		<!-- <?php var_dump($details['description']); ?> -->
		<div class="container">
			<a href="../big_list.php" ><button type="button" class="btn btn-primary mt-3">Back to all media</button></a>

			<form action="edit_controller.php" method="POST" accept-charset="utf-8" class="mt-3">
				<!-- Medium ID hidden for POST request-->
				<input type="hidden" name="isbn" value="<?php echo $isbn; ?>"></input>
				<!-- Medium title and creator-->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $details['title']; ?>"></input>
						</div>	
					</div>
					<div class="col-sm">
						<div class="form-group">
					    <label for="creator">Creator</label>
					    <select class="form-control" id="creator" name="creator">
					    	<option value="<?php echo $details['creator_id']; ?>"><?php echo $details['first_name'].' '.$details['last_name']; ?></option>
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
					<textarea class="form-control" id="descr" name="descr" rows="4"><?php echo htmlspecialchars($details['description']); ?></textarea>
				</div>
				<!-- Image link-->
				<div class="form-group">
					<label for="img">Image URL</label>
					<textarea class="form-control" id="img" name="img" rows="2"><?php echo $details['img_link']; ?></textarea>
				</div>
				<!-- Publication year and publisher -->
				<div class="row">
					<div class="col-sm">
						<div class="form-group">
							<label for="year">Publication year</label>
							<input type="text" class="form-control" id="year" name="year" value="<?php echo $details['pub_year']; ?>"></input>
						</div>
					</div>
					<div class="col-sm">
						<div class="form-group">
							<label for="publisher">Select publisher</label>
					    <select class="form-control" id="publisher" name="publisher">
					      <option value="<?php echo $details['pub_id']; ?>"><?php echo $details['pub_name'].' '.$details['pub_city']; ?></option>
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
					    	<option value="<?php echo $details['type_id']; ?>"><?php echo $details['type_name']; ?></option>
					    	<?php foreach($types as $oneType) { ?>
					      <option value="<?php echo $oneType['type_id']; ?>"><?php echo $oneType['name']; ?></option>
					    	<?php } ?>
					    </select>
						</div>		
					</div>	
				</div>
				<button class="btn btn-warning" type="submit" name="btn_edit">Save changes</button>
			</form>
		</div>
	</main>

<?php require_once('footer.php'); ?>