<?php require_once('header.php'); ?>

	<main>
		<div class="container">
			<a href="../big_list.php" ><button type="button" class="btn btn-primary my-3">Back to all media</button></a>

			<div class="row">

				<!-- Picture -->
				<div class="col-md">
					<img class="img-fluid mx-auto d-block" src="<?php echo $details['img_link']; ?>" alt="Cover">
				</div>

				<!-- Info -->
				<div class="col-md">
					<h2 class="text-center"><?php echo $details['title']; ?></h2>		
					<h4 class="text-center">by <?php echo $details['first_name'].' '.$details['last_name']; ?></h4>
					<p class="text-justify"><?php echo $details['short_description']; ?></p>
					<p>Published in <?php echo $details['publish_date']; ?>
						by <?php echo $details['pub_name']; ?><br>
						<?php echo $details['pub_street'].', '.$details['pub_house']; ?><br>
						<?php echo $details['pub_postalCode'].', '.$details['pub_city']; ?><br>
						<?php echo $details['pub_country']; ?>
					</p>
					<p>Medium type: <?php echo $details['type']; ?></p>
				</div>

			</div>
		</div>
	</main>

<?php require_once('footer.php'); ?>