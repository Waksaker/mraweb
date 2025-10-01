<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$sql = "SELECT * FROM mra_staff WHERE name = '$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);	
        $name = $row['name'];
        $email = $row['email'];
        $ic = $row['icno'];
        $position = $row['position'];
        $phone = $row['phoneno'];
        $bank = $row['bank_name'];
        $acc = $row['acc_no'];
        $namefile = $row['image'];
        $nameimage = $row['image_user'];
        $password = $row['password'];
        $id = $row['id'];
        $status = $row['status'];
        $syarikat = $row['syarikat'];
	$portfolio = $row['portfolio'];
}
?>
<style>
.container-img {
    display: flex;
    width: 100%;
    text-align: center;
    /* align-content: center;
    justify-content: center; */
    align-items: center;
}

#drop-area {
    width: 500px;
    height: 300px;
    background: white;
    border-radius: 15px;
    margin-bottom: 30px;
    padding: 30px;
}

#img-view {
    width: 100%;
    height: 100%;
    border-radius: 23px;
    border: 2px dashed lightgrey;
    background: whitesmoke;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* penting untuk elak overflow image */
}

#img-view img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* atau 'cover' jika nak penuh */
    border-radius: 15px;
}

#img-view h3, #img-view p {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 6px;
}
</style>
<div class="container">
    <div class="row3">
        <div class="card">
            <div class="card-body">
            <div class="col">
                <h3>Profile</h3>
            </div>
            <br>
            <form method="POST" enctype="multipart/form-data" action="profileaction.php">
                <div class="col">
                    <label for="datestart" class="col-sm-2 col-form-label">SIGNATURE IMAGE :</label>
                    <div class="col-sm-4">
			<input type="file" name="namefile" class="form-control mb-3" value="<?php echo $namefile; ?>" onchange="previewImageSign(event)">
               	    	<input type="text" name="namefile1" value="<?php echo $namefile; ?>" style="display: none;">
		    </div>    
		<div class="container-img">
                        <label for="input-file" id="drop-area">
                            <div id="img-view">
                                <?php
                                    if ($namefile != '') {
                                        echo '<img src="./image/' . $namefile . '" alt="" id="preview-img-sign">';
                                    } else {
                                        echo '<img alt="" id="preview-img-sign">';
                                    }
                                ?>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="customer_records">
                    <div class="row mb-3">
                        <input type="text" class="form-control mb-3" id="date" name="id" value="<?php echo $id; ?>" style="display: none;">
                        <label for="datestart" class="col-sm-2 col-form-label">NAME :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="name" value="<?php echo $name; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">PASSWORD :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="password" name="password" value="<?php echo $password ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">EMAIL :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="purpose" name="email" value="<?php echo $email; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">IC :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="ic" value="<?php echo $ic; ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">POSITION :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-1" id="purpose" name="position" value="<?php echo $position; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">PHONE NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="number" value="<?php echo $phone; ?>">
                        </div>
                        <label for="dateend" class="col-sm-2 col-form-label">BANK NAME :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" id="bankname" name="bankname">
                                <option value="">Please Choose</option>
                                <option value="Maybank" <?php echo ($bank == 'Maybank') ? 'selected' : ''; ?>>Maybank</option>
                                <option value="CIMB" <?php echo ($bank == 'CIMB') ? 'selected' : ''; ?>>CIMB</option>
                                <option value="Public Bank" <?php echo ($bank == 'Public Bank') ? 'selected' : ''; ?>>Public Bank</option>
                                <option value="RHB Bank" <?php echo ($bank == 'RHB Bank') ? 'selected' : ''; ?>>RHB Bank</option>
                                <option value="Hong Leong Bank" <?php echo ($bank == 'Hong Leong Bank') ? 'selected' : ''; ?>>Hong Leong Bank</option>
                                <option value="AmBank" <?php echo ($bank == 'AmBank') ? 'selected' : ''; ?>>AmBank</option>
                                <option value="Bank Islam" <?php echo ($bank == 'Bank Islam') ? 'selected' : ''; ?>>Bank Islam</option>
                                <option value="Bank Rakyat" <?php echo ($bank == 'Bank Rakyat') ? 'selected' : ''; ?>>Bank Rakyat</option>
                                <option value="Affin Bank" <?php echo ($bank == 'Affin Bank') ? 'selected' : ''; ?>>Affin Bank</option>
                                <option value="Alliance Bank" <?php echo ($bank == 'Alliance Bank') ? 'selected' : ''; ?>>Alliance Bank</option>
                                <option value="HSBC Bank" <?php echo ($namebbanknk == 'HSBC Bank') ? 'selected' : ''; ?>>HSBC Bank</option>
                                <option value="OCBC Bank" <?php echo ($bank == 'OCBC Bank') ? 'selected' : ''; ?>>OCBC Bank</option>
                                <option value="Standard Chartered" <?php echo ($bank == 'Standard Chartered') ? 'selected' : ''; ?>>Standard Chartered</option>
                                <option value="UOB Bank" <?php echo ($bank == 'UOB Bank') ? 'selected' : ''; ?>>UOB Bank</option>
                                <option value="Agrobank" <?php echo ($bank == 'Agrobank') ? 'selected' : ''; ?>>Agrobank</option>
                                <option value="Bank Muamalat" <?php echo ($bank == 'Bank Muamalat') ? 'selected' : ''; ?>>Bank Muamalat</option>
                                <option value="Bank Simpanan Nasional" <?php echo ($bank == 'Bank Simpanan Nasional') ? 'selected' : ''; ?>>Bank Simpanan Nasional</option>
                                <option value="Kuwait Finance House" <?php echo ($bank == 'Kuwait Finance House') ? 'selected' : ''; ?>>Kuwait Finance House</option>
                                <option value="City Bank" <?php echo ($bank == 'City Bank') ? 'selected' : ''; ?>>City Bank</option>
                            </select>
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">ACCOUNT NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" id="date" name="account" value="<?php echo $acc; ?>">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">SYARIKAT :</label>
                        <div class="col-sm-4">
                        	<input type="text" class="form-control mb-1" name="syarikat" value="<?php echo $syarikat; ?>" readonly>
                        </div>
		    </div>
            <br>
		    <div class="row mb-3">
			<h3>Portfolio</h3>
		    </div>
		    <div class="col-sm-4">
			<input type="file" class="form-control mb-3" id="portfolio" name="portfolio" value="<?php echo $portfolio; ?>">
			<input type="text" name="portfolio1" value="<?php echo $portfolio; ?>" style="display: none;">
		    </div>
		    <div>
			<?php
				if ($portfolio != '') {
			?>
				<iframe src="./folio/<?php echo $portfolio; ?>" width="100%" height="600" style="border:0;"></iframe>
			<?php
				} 
			?>
		    </div>
		     
                    <button type="submit" class="btn btn-primary mt-3" name="submit">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function previewImageSign(event) {
    const input = event.target;
    const preview = document.getElementById('preview-img-sign');


    // Check if a file was selected
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        // Once the image is read, set it as the source of the preview image
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image

            // Hide the text and subtext once the image is displayed
            // uploadText.style.display = 'none';
            // uploadSubtext.style.display = 'none';
        }

        // Read the image file as a data URL
        reader.readAsDataURL(input.files[0]);
    }
}

function previewImageUser(event) {
    const input = event.target;
    const preview = document.getElementById('preview-img-user');


    // Check if a file was selected
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        // Once the image is read, set it as the source of the preview image
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image

            // Hide the text and subtext once the image is displayed
            // uploadText.style.display = 'none';
            // uploadSubtext.style.display = 'none';
        }

        // Read the image file as a data URL
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php include("./components/footer.php"); ?> 
