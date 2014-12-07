<?php include 'firstHeader.html';?>
<script type="text/javascript">
	$(document).ready(function() {
		$( "#myformSignUp" ).submit(function( event ) {
			
			var objReturn = validateSignUpForm();
			if(objReturn == false) {
				return false;
			}

			event.preventDefault();// using this page stop being refreshing 
// 			$.post("../../serverContent/registerUser.php", $("#myformSignUp").serialize(),  function(data) {  
// 				alert(data);
// 			 });

			$.ajax({
			    type: "POST",
			    url: "../../serverContent/registerUser.php",
			    data: $("#myformSignUp").serialize(),
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
    <img src="../images/cloud-slide.png" class="img-responsive"/>
    <img src="../images/mundi-slide.png" class="img-responsive"/>
</div>
<div id="loginbox" class="container">
	<div>
		<form class="form-horizontal" role="form" id="myformSignUp" action="../../serverContent/registerUser.php" method="POST">
			<div style="margin-bottom: 3%;">
				<div style="display: inline; position: relative;">
					<h3 style="display: inline; color: #3071a9;">Sign up</h3>
				</div>
				<div style="display: inline; position: relative; float: right;">
					<a href="signIn.php">or Sign in now</a>
				</div>
			</div>
			<div class="form-group" id="firstLabel">
			  <label class="col-sm-3 control-label" style="color: #184271">First Name</label>
			  <div class="col-sm-8">
			    <input class="form-control" placeholder="First Name" id="firstNameInput" name="firstName">
			  </div>
			</div>
			<div class="form-group" id="surnameLabel">
			  <label class="col-sm-3 control-label" style="color: #184271">Surname</label>
			  <div class="col-sm-8">
			    <input class="form-control" placeholder="Surname" id="surnameInput" name="surname">
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-sm-3 control-label" style="color: #184271">Email</label>
			  <div class="col-sm-8">
			    <input type="email" class="form-control" placeholder="Email" id="emailInput" name="email">
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-sm-3 control-label" style="color: #184271">Password</label>
			  <div class="col-sm-8">
			    <input type="password" class="form-control" placeholder="Password" id="passwordInput" name="password">
			  </div>
			</div>
			<div class="form-group" style="text-align: right;">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-primary" id="submit">Sign up</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include 'footer.html';?>