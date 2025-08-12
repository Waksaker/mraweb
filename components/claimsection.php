<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$Date_now=date('D, M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];
?>
<div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Claim</h5>
      <div align="right">
        <a href="applyclaim.php?id=<?php echo base64_encode($noic); ?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Apply Claim</a>
      </div>
      
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                <h1 class="col-sm-4 col-form-label">Please Choose</h1>
                <div class="col-sm-4">
                    <select class="form-control" name="tahun" id="tahun"  value=''>
                        <?php  
                            $tahunmin = $Year_now;
                            $tahunmax = 2024;

                            while ($tahunmin >= $tahunmax)
                            {
                                echo "<option value='".$tahunmin."'".$s.">".$tahunmin."</option>";
                                $tahunmin--;
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="bulan" id="bulan" onChange="getClaim(this.value,<?php echo $noic;?>); ">
                        <option value="" style="text-transform: uppercase"><?php echo 'Please Choose...' ?></option>
                        <option value='01'>JANUARY</option>
                        <option value='02'>FEBRUARY</option>
                        <option value='03'>MARCH</option>
                        <option value='04'>APRIL</option>
                        <option value='05'>MAY</option>
                        <option value='06'>JUNE</option>
                        <option value='07'>JULY</option>
                        <option value='08'>AUGUST</option>
                        <option value='09'>SEPTEMBER</option>
                        <option value='10'>OCTOBER</option>
                        <option value='11'>NOVEMBER</option>
                        <option value='12'>DECEMBER</option>
                    </select>
                </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ic" id="ic" value=<?php echo $noic; ?>>

        <div class="text-center">
			<div id="spinner-border3" class="spinner-border text-primary" role="status" style="display:none;">
				<span class="sr-only">Loading...</span>
			</div>
	    </div>

		<div id="list"></div>

      </div>
    </div>
</div>