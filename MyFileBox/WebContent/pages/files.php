<?php include 'indexHeader.php';?>

<!-- Load jQuery and the necessary widget JS files to enable file upload -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../scripts/jquery.ui.widget.js"></script>
<script src="../scripts/jquery.iframe-transport.js"></script>
<script src="../scripts/jquery.fileupload.js"></script>
<script src="../scripts/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(
	function() {

		function reload() {
			$.ajax({ type: "GET",   
	         url: "../../serverContent/listFiles.php",   
	         async: false,
	         dataType : "json",
	         success : function(text)
	         {
	        	 $("tbody").children().remove()
		         
	        	 $.each(text, function (index, file) {

					
	        		 if(index != 0 && index != 1) {
	        		 $("#files tbody")
						.append(
								"<tr id=" + file + ">"
										+ "<td><img id="
										+ "home"
										+ " src="
										+ "../images/icon_spacer.gif"
										+ " /></td>"
										+ "<td>"
										+ file
										+ "</td>"
										+ "<td>PDF</td> "
										+ "<td>2.5MB</td>"
										+ "<td>23/01/2014</td>"
										+ "<td>"
										+ '<button type="button" class="btn btn-default btn-xs renameButton"'
										+ 'data-toggle="tooltip" data-placement="bottom" title="Rename" style="margin-right: 4px;">'
										+ '<span class="glyphicon glyphicon-pencil"></span>'
										+ "</button>"
										+ '<button type="button" class="btn btn-default btn-xs removeButton"'
										+ 'data-toggle="tooltip" data-placement="bottom" title="Remove" style="margin-right: 4px;">'
										+ '<span class="glyphicon glyphicon-trash"></span>'
										+ "</button>"
										+ '<button type="button" class="btn btn-default btn-xs"'
										+ 'data-toggle="tooltip" data-placement="bottom" title="Download" style="margin-right: 4px;">'
										+ '<a href="content/File 2.pdf" download style="color: black;">'
										+ '<span class="glyphicon glyphicon-download-alt"></span>'
										+ '</a>'
										+ '</button>'
										+ '<button type="button" class="btn btn-default btn-xs shareButton"'
										+ 'data-toggle="tooltip" data-placement="bottom" title="Share" style="margin-right: 4px;">'
										+ '<span class="glyphicon glyphicon-link"></span>'
										+ '</button>'
										+ '</td>'
										+ "</tr>");
	        		 };
				})

             }
	    });
		};
	
		var id;
		
		$("input:text").addClass("ui-corner-all");

		$("body").tooltip({
			selector : '[data-toggle=tooltip]'
		});

		$(document).on("click", ".renameButton", function(event) {
			
			//get selected row
          	id = $(this.parentNode.parentNode).attr('id'); 
			
          	var file = $('#' + id).find('td').eq(1).text();
			//clear input field
			$('#renameInput').val(file);
			//open modal
			$('#rename-modal').modal('show');
			
			$('.alert').css('display', 'none');
		});
		
		$('#buttonRename').click(function() {
			validateRenameForm();
		});
		
		$(document).on("click", ".removeButton", function() {
			id = $(this.parentNode.parentNode).attr('id');
			$('#delete-modal').modal('show');
			
		});
		
		$('#deleteFile').click(function() {
			//Remove row
			var row = document.getElementById(id);
			row.parentNode.removeChild(row);
			
			$('#delete-modal').modal('hide');
		});
		
		$('#buttonShare').click(function() {
			validateShareForm();
		});
		
		$(document).on("click", ".shareButton", function(){
			$('.alert').css('display', 'none');
			
			$('#emailInput').val('');
			
			$('#share-modal').modal('show');
		});
		
		function validateRenameForm() {

			var rename = $('#renameInput').val();

			$('.alert.alert-danger.validation').hide();

			if (rename == "") {
				$('#renameLabel')
						.before(
								'<div class="alert alert-danger validation"> * Please enter a name for your file </div>');
				return false;
			}

			$('#rename-modal').modal('hide');

			$('#' + id).find('td').eq(1).text(rename);
		};

		$(function () {
	        'use strict';
	        
	        var url = '../../serverContent/uploadFile.php';

	        // Call the fileupload widget and set some parameters
	        $('#fileupload').fileupload({
	            url: url,
	            done: function (e, data) {
	                reload();
	            },
	            progressall: function (e, data) {
	                // Update the progress bar while files are being uploaded
	                var progress = parseInt(data.loaded / data.total * 100, 10);
	                $('#progress .bar').css(
	                    'width',
	                    progress + '%'
	                );
	            }
	        }).on(
					'fileuploadadd',
					function(e, data) {
						$('#progress').css('display', 'block');

						window.setTimeout(function() {
							$('#progress').css('display', 'none');
							$('#progress .progress-bar').css('width', '0%');
						}, 2000);


				}).on('fileuploadprocessalways', function(e, data) {
					var index = data.index, file = data.files[index];
				}).on('fileuploadprogressall', function(e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#progress .progress-bar').css('width', progress + '%');
				});
	    });
		(function() {
			reload();
			})();
		
	});
</script>
	<div style="width: 100%;">
		<div style="width: 100%; height: 20px;" >
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<span class="btn btn-default btn-md fileinput-button"
				style="float: right; margin-top: 2%; margin-right: 5%; color: #184271;"> 
				<i class="glyphicon glyphicon-upload"></i> 
				<span style="color: #184271">Upload</span> 
				<input id="fileupload" type="file" name="files[]" multiple>
			</span>
			</form>
		</div>
		<div id="progress" class="progress"
			style="display: none; margin-top: 4%; margin-left: 5%; margin-right: 5%;">
			<div class="progress-bar progress-bar-success"></div>
		</div>
	</div>
	<div class="table-responsive" style="width: 90%; margin-left: 5%;">
		<table class="table" id="files">
			<thead>
				<tr>
					<th style="width: 0%;"></th>
					<th style="width: 50%;">Name</th>
					<th style="width: 10%;">Type</th>
					<th style="width: 10%;">Size</th>
					<th style="width: 10%;">Date</th>
					<th style="width: 15%;"></th>
				</tr>
			</thead>
			<tbody style="color: #000000;">
			</tbody>
		</table>
	</div>
</div>

<script src="../scripts/scripts.js"></script>
<?php include 'rename.html';?>

<?php include 'delete.html';?>

<?php include 'share.html';?>
	
<?php include 'indexFooter.html';?>