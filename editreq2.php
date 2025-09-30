<?php
include('conn.php');
if (!isset($_GET['date']) || !isset($_GET['name'])) exit();
$date = $_GET['date'];
$name = $_GET['name'];
$s = mysqli_query($conn, "SELECT * FROM `request` where namestaff = '$name' AND dateapply = '$date'");
$row = mysqli_fetch_assoc($s);
$statusmana = $row['statusmana'];
$statusacc = $row['statusacc'];
$trmnpay = $row['termpayment'];
$payto = $row['payto'];
$accno = $row['accno'];
$bankname = $row['bankname'];
$remarks = $row['remark'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Create Request</h5>
        <div align="center">
            <h3>STEP 2</h3>
        </div>
        <br>
        <?php
            $res = mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE name = '$name'");
            $row = mysqli_fetch_assoc($res);
            $status = $row['status'];

            if ($status == 'STAFF' || $status == 'LEADER STAFF') {
                ?>
                    <form name="createreq2" action="createreqaction.php" method="POST" enctype="multipart/form-data">
                        <div class="customer_records">
                            <div class="row mb-3">
                                <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo ($_GET['name'] ? $_GET['name'] : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="date" name="date" value="<?php echo ($_GET['date'] ? $_GET['date'] : ''); ?>" style="display:none;">
                        <input type="text" class="form-control mb-3" id="appoinment" name="appoinment" value="<?php echo ($_GET['appoinment'] ? $_GET['appoinment'] : ''); ?>" style="display:none;">
                                <label for="datestart" class="col-sm-2 col-form-label">DISCRIPTIONS :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control mb-3" id="discriptions" name="discriptions">
                        </div>
                        <label for="datestart" class="col-sm-2 col-form-label">LINK SHOPEE PRODUK</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="link" name="link">
                        </div>
                                <label class="col-sm-2 col-form-label">QUANTITY :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control mb-3" id="quantity" name="quantity">
                                </div>
                                <label class="col-sm-2 col-form-label">PRICE :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control mb-3" id="price" name="price">
                                </div>
                                <div align="right">
                                    <a href="request.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">DONE</a>
                                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editreq2" onclick="return validate()">+</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                <?php
            } elseif ($status == 'MANAGER') {
                ?>
                    <form name="editreq2mana" action="createreqaction.php" method="POST" enctype="multipart/form-data">
                        <div class="customer_records">
                            <div class="row mb-3">
                                <input type="text" class="form-control mb-3" id="namemana" name="namemana" value="<?php echo $name; ?>" style="display:none;">
                                <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo ($_GET['name'] ? $_GET['name'] : ''); ?>" style="display:none;">
                                <input type="text" class="form-control mb-3" id="date" name="date" value="<?php echo ($_GET['date'] ? $_GET['date'] : ''); ?>" style="display:none;">
                                <input type="text" class="form-control mb-3" id="appoinment" name="appoinment" value="<?php echo ($_GET['appoinment'] ? $_GET['appoinment'] : ''); ?>" style="display:none;">
                                <label for="datestart" class="col-sm-2 col-form-label">YOUR OPTION :</label>
                                <div class="col-sm-4">
				    <select class="form-control mb-1" name="statusmana" id="statusmana">
				        <option value="">Please Choose</option>
				        <option value="1" <?php echo ($statusmana == '1') ? 'selected' : ''; ?>>PENDING</option>
					<option value="2" <?php echo ($statusmana == '2') ? 'selected' : ''; ?>>APPROVED</option>
					<option value="3" <?php echo ($statusmana == '3') ? 'selected' : ''; ?>>REJECTED</option>
                                    </select>
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editreq2mana" onclick="return validatemana()">DONE</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                <?php
            } elseif ($status == 'ADMIN STAFF' || $status == 'HR STAFF') {
                ?>
                    <form name="editreq2admin" action="createreqaction.php" method="POST" enctype="multipart/form-data">
                        <div class="customer_records">
                            <div class="row mb-3">
                                <input type="text" class="form-control mb-3" id="nameadmin" name="nameadmin" value="<?php echo $name; ?>" style="display:none;">
                                <input type="text" class="form-control mb-3" id="name" name="name" value="<?php echo ($_GET['name'] ? $_GET['name'] : ''); ?>" style="display: none;">
				<input type="text" class="form-control mb-3" id="date" name="date" value="<?php echo ($_GET['date'] ? $_GET['date'] : ''); ?>" style="display: none;">
				<label for="" class="col-sm-2 col-form-label">TERMS OF PAYMENT</label>
				<input type="text" class="form-control mb-3" id="termpyment" name="termpyment" value="<?php echo $trmnpay; ?>">
				<label for="" class="col-sm-2 col-form-label">PAY TO</label>
				<input type="text" class="form-control mb-3" id="payto" name="payto" value="<?php echo $payto; ?>">
				<label for="" class="col-sm-2 col-form-label">ACCOUNT NO</label>
				<input type="text" class="form-control mb-3" id="acc" name="acc" value="<?php echo $accno; ?>">
				<label for="" class="col-sm-2 col-form-label">BANK</label>
				<input type="text" class="form-control mb-3" id="bank" name="bank" value="<?php echo $bankname; ?>">
				<label for="" class="col-sm-2 col-form-label">REMARKS</label>
				<input type="text" class="form-control mb-3" id="remarks" name="remarks" value="<?php echo $remarks; ?>">
				<label for="datestart" class="col-sm-2 col-form-label">YOUR OPTION :</label>
                                <div class="col-sm-4">
                                    <select class="form-control mb-1" name="statusadmin" id="statusadmin">
					<option value="">Please Choose</option>
					<option value="1" <?php echo ($statusacc == "1") ? 'selected' : ''; ?>>PENDING</option>
					<option value="2" <?php echo ($statusacc == "2") ? 'selected' : ''; ?>>APPROVED</option>
					<option value="3" <?php echo ($statusacc == "3") ? 'selected' : ''; ?>>REJECTED</option>
                                    </select>
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="editreq2admin" onclick="return validateadmin()">DONE</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                <?php
            }
        ?>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="tablelistid" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;">Discriptions</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">#</th>
                </tr>
            </thead>
            
                <?php
                    $index = 1;
                    $name = $_GET['name'];
                    $date = $_GET['date'];
                    $appoinment = $_GET['appoinment'];
                    $sql = "SELECT * FROM `list_request` WHERE appoinment = '$appoinment' AND name = '$name'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tbody>
                            <tr>
                                <td style="text-align: center;"><?php echo ($index++); ?></td>
                                <td style="text-align: center;"><?php echo $row['descriptions'] ?></td>
                                <td style="text-align: center;"><?php echo $row['quantity'] ?></td>
                                <td style="text-align: center;"><?php echo $row['price'] ?></td>
                                <td style="text-align: center;"><?php echo $row['amount'] ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-danger" onclick="test('<?php echo $row['id']; ?>')" >
                                        <img src="assets/images/Trash_Can.png" alt="" style="width: 24px;  height: 24px;">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?> 
<script>
    new DataTable('#tablelistid', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>
<script>
    function validate() {
      form = document.createreq2;
      if (form.discriptions.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your discriptions!', confirmButtonColor: '#1B95CF' });
        form.discriptions.focus();
        return false;
      }
      else if (form.quantity.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your quantity!', confirmButtonColor: '#1B95CF' });
        form.quantity.focus();
        return false;
      }
      else if (form.price.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your price!', confirmButtonColor: '#1B95CF' });
        form.price.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>
  <script type="text/javascript">
  function test(idcreatereq2) {
    var result = confirm("Adakah anda ingin memadam data ini?");

    if (result) {
      window.location.href = "delete.php?idcreatereq2=" + idcreatereq2;
    }
  }
</script>
<script>
    function validatemana() {
      form = document.editreq2mana;
      if (form.statusmana.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your option!', confirmButtonColor: '#1B95CF' });
        form.statusmana.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>
<script>
    function validateadmin() {
      form = document.editreq2admin;
      if (form.statusadmin.value.trim() == "") {
        Swal.fire({ icon: 'warning', text: 'Please fill in your option!', confirmButtonColor: '#1B95CF' });
        form.statusadmin.focus();
        return false;
      }
      return true; // bagi submit terus
    }
  </script>
