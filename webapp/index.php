<?php
    session_start();
    include "views/header.php";
    include "views/nav.php";
?>
<?php include "views/header-master.php"; ?>
<div class="container my-5">
    
	<div class="container my-4">
		<div class="justify-content-center h-100 my-4">
			<div class="user_card border p-4">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./assets/images/icon.png" class="brand_logo rounded img-fluid" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
				
		   <form onsubmit="myFunction" method="POST" action="php/login.php" novalidate class="border p-3 my-4">
      
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
              <i class="fa fa-envelope-square fa-2x" style="color:#DC3737"></i>Email
                <input type="email" class="form-control" placeholder="Email Adresa" id="tbEmail" required name="email">
                <p class="help-block " id="email-miss"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
              <i class="fa fa-key fa-2x" style="color:#DC3737"></i>Password
                <input type="password" class="form-control" placeholder="Password" id="tbPassword" required name="password">
                <p class="help-block " id="pass-miss"></p>
              </div>
            </div>
          
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" name="login" class="btn btn-primary" id="sendMessageButton" name="sendMessageButton"  style="background-color:#DC3737">Login as admin</button>
            </div>
          </form>
				</div>
				
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="#" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<?php include "views/footer.php"; ?>
