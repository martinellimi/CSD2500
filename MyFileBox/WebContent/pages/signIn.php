<?php include 'firstHeader.html'; ?>

<script type="text/javascript">
	$(document).ready(function() {
		$( "#myform" ).submit(function( event ) {
			
			var objReturn = validatesSignInForm();
			if(objReturn == false) {
				return false;
			}

			event.preventDefault();// using this page stop being refreshing 
			//$.post("../../serverContent/login.php", $("#myform").serialize(),  function(data) {  
				//alert(data);
			// });

			$.ajax({
			    type: "POST",
			    url: "../../serverContent/authentication.php",
			    data: $("#myform").serialize(),
			    success: function(data){
				    if(data==""){
				    	document.location.href = "files.php";
					} else {
				    	alert(data);
					}
			    }
			});
		});
		
		jQuery(window).load(function () {
			$('#slideshow').css('display', 'block');
		});
	});
</script>

<div id="slideshow" style="display: none;">
	<img src="../images/folder-slide.png" class="img-responsive active" />
	<img src="../images/cloud-slide.png" class="img-responsive" /> 
	<img src="../images/mundi-slide.png" class="img-responsive" />
</div>
<div id="loginbox" class="container">
	<form class="form-horizontal" role="form" id="myform" action="../../serverContent/authentication.php" method="POST">
		<div style="margin-bottom: 3%;">
			<div style="display: inline; position: relative;">
				<h3>Sign in</h3>
			</div>
			<div style="display: inline; position: relative; float: right;">
				<a href="signUp.php">or Sign up now</a>
			</div>
		</div>
		<div class="form-group" id="emailLabel">
			<label class="col-sm-3 control-label">Email</label>
			<div class="col-sm-8">
				<input type="email" name="email" class="form-control" id="emailInput" placeholder="Email">
			</div>
		</div>
		<div class="form-group" id="passwordLabel">
			<label class="col-sm-3 control-label">Password</label>
			<div class="col-sm-8">
				<input type="password" class="form-control" id="passwordInput" name="password"
					placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10">
				<div class="checkbox">
					<label> <a href="password.php">Forgot Password</a>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group" style="text-align: right;">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-primary" type="submit" id="submit">Sign in</button>
			</div>
		</div>
	</form>
	
</div>

<?php include 'footer.html';?>