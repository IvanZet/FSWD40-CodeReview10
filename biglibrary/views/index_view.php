<?php require_once('header.php'); ?>
<main class="small_main">
	<form class="form-signin" action="index_controller.php" method="post">
	  <h1 class="h3 font-weight-normal">Please sign in</h1>
	  <h1 class="h5 mb-3 font-weight-normal">or <a href="../register.php">sign up</a></h1>
	  <label for="inputEmail" class="sr-only">Email address</label>
	  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus><!--required email-->
	  <label for="inputPassword" class="sr-only">Password</label>
	  <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" autocomplete="on"><!--required password-->
	  <button class="btn btn-lg btn-primary btn-block" type="submit" name="btn_login">Sign in</button>
	</form>	
</main>

<?php require_once('footer.php'); ?>