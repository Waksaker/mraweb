<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test upload</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data" action="testupload.php"> 
		<div class="col">
            <label for="datestart" class="col-sm-2 col-form-label">SIGNATURE IMAGE :</label>
            <input type="file" name="namefile" onchange="previewImage(event)">
            <div class="container-img">
                <label for="input-file" id="drop-area">
                    <div id="img-view">
                        <img alt="" id="preview-img">
                    </div>
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="submit">UPDATE</button>
	</form>
	<script>
		function previewImage(event) {
		    const input = event.target;
		    const preview = document.getElementById('preview-img');

		    // Check if a file was selected
		    if (input.files && input.files[0]) {
		        const reader = new FileReader();

		        // Once the image is read, set it as the source of the preview image
		        reader.onload = function(e) {
		            preview.src = e.target.result;
		            preview.style.display = 'block'; // Show the image
		        }

		        // Read the image file as a data URL
		        reader.readAsDataURL(input.files[0]);
		    }
		}
	</script>
</body>
</html>