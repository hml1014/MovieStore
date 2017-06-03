<?php
        include(BASE_DIR.DS.'assets/header.php');
        include(BASE_DIR.DS.'assets/sidemenu.php');
?>
 <div class='col-xs-9 content'><!-- main content section -->
                <div class='col-md-6' id='movie-data'><h2 id='content-title'></h2><table class='table mlist' id='mlist'></table></div>	
		<div class='col-md-3' id='extra'>
			<div id='register-box'>
				<h3>Register</h3>
				<p>Username:</p>
				<input type='text' name="rusername" id='rusername' class='log-info'>
				<p>Password:</p> 
				<input type='password' name="rpassword" id='rpassword' class='log-info'>
				<p></p>
				<button type='button' class='btn btn-primary' id='register'>Register</button>
			</div>
			<div id='shopping-cart'>
				<h3>Cart</h3>
				<table class='table shopcart' id='shopcart'></table>
				<p id='total-cost'></p>
				<button type='button' class='btn btn-primary' id='purchase'>Purchase</button>
			</div>
		</div>
 </div>

<?php
        include(BASE_DIR.DS.'assets/footer.php');
?>

