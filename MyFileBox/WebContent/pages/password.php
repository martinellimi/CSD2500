<?php include 'firstHeader.html';?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#submit').click(function() {
			validatesPasswordForm();
		});
	});
</script>

<div class="alert alert-success" role="alert" style="display: none;" id="success">
	<p>An email has been sent to your email address with further instructions. </p>
</div>

<div class="container">
	<div>
		<form class="form-horizontal" style="color: #184271;">
			<div style="width: 50%; margin-left: 25%; margin-top: 8%;">
				<h1 style="text-align: center; margin-bottom: 2%;">Forgot your password?</h1>
				<p style="font-size: 16px;">Enter your email address to reset your password.</p> 
				<div id="emailLabel">
				  <label style="margin-right: 20px;">Email </label>
				  <div style="display: inline;">
				    <input type="email" id="emailInput" class="form-control" style="display: inline; width:88%;" placeholder="Email">
				  </div>
				</div>
			</div>
		</form>
		<button class="btn btn-primary" id="submit" style="float: right; margin-right: 26%;margin-top: 3%;">Send</button>
	</div>
</div>