<?php
include ('conn.php');
if (!isset($_GET['id'])) exit('Not found');
$id = base64_decode($_GET['id']);
$res=mysqli_query($conn, "SELECT * FROM `projek` WHERE `id`='$id'");
$row=mysqli_fetch_assoc($res);
$rendom  = $row['rendom'];
$namecreate = $row['namecreate'];
$ic = $row['ic'];
$syarikat = $row['syarikat'];
$lponum = $row['lponum'];
$stardate  = $row['stardate'];
$duedate = $row['duedate'];
$pembaikan = $row['pembaikan'];
$payment = $row['payment'];
$price = $row['price'];
$invoice = $row['invoice'];
$invoicedoc = $row['invoicedoc'];
$status1 = $row['status'];
$catatan = $row['catatan'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <div class="col">
            <h5 class="card-title fw-semibold mb-4">Edit Job</h5>
        </div>
        <div align="center">
            <h3>EDIT PROJECT</h3>
        </div>
        <br>
        <form name="formkemaskiniprojek2" action="projekaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_record">
                <div class="row mb-3">
                    <input type="text" name="editprojek" value="kemaskiniprojek2" style="display: none;">
                    <input type="text" name="id" value="<?php echo $id;?>" style="display: none;">
                    <input type="text" name="rendom" value="<?php echo $rendom;?>" style="display: none">
                    <input type="text" name="namecreate" value="<?php echo $namecreate;?>" style="display: none;">
                    <input type="text" name="ic1" value="<?php echo "$ic";?>" style="display: none">
                    <input type="text" name="syarikat" value="<?php echo $syarikat;?>" style="display: none;">
                    <label for="" class="col-sm-2 col-form-label">START DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" name="datestart" id="datestart" value="<?php echo date('Y-m-d', strtotime($stardate));?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">END DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" name="dateend" id="dateend" value="<?php echo date('Y-m-d', strtotime($duedate));?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">LPO NUMBER :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="lponum" id="lponum" value="<?php echo $lponum;?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">REPAIRE :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-3" name="repair" id="repair"><?php echo $pembaikan?></textarea>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">PAYMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="payment" id="payment" value="<?php echo $payment;?>">
                        <sup><font style="color:red">Enter numbers only, do not include commas (e.g., 1000.00)</font></sup>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">PRICE :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="price" id="price" value="<?php echo $price;?>">
                        <sup><font style="color:red">Enter numbers only, do not include commas (e.g., 1000.00)</font></sup>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">STATUS</label>
                    <div class="col-sm-4">
                        <select class="form-control mb-3" name="status" id="status">
                            <option value="">Please Choose</option>
                            <option value="1" <?php echo ($status1 == '1') ? 'selected' : ''; ?>>Repaire in progress</option>
                            <option value="2" <?php echo ($status1 == '2') ? 'selected' : '';?>>Pending spepart</option>
                            <option value="3" <?php echo ($status1 == '3') ? 'selected' : '';?>>Pending payment</option>
                            <option value="4" <?php echo ($status1 == '4') ? 'selected' : '';?>>Pending claim</option>
                            <option value="5" <?php echo ($status1 == '5') ? 'selected' : '';?>>Settle</option>
                        </select>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-4">
                        <textarea name="note" id="note" class="form-control mb-1"><?php echo $catatan?></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">INVOICE / DELIVERY ORDER :</label>
                    <div class="col-sm-4">
                        <input type="text" name="invoicename" id="invoicename" class="form-control mb-1" value="<?php echo $invoice?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">UPLOAD INVOICE :</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control mb-1" name="invoice" id="invoice" value="<?php echo $invoicedoc;?>">
                        <input type="text" class="form-control mb-1" name="invoice1" value="<?php echo $invoicedoc;?>" style="display: none;">
                    </div>
                </div>
            </div>
            <div align="right">
                <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return kemaskiniprojek()">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    function kemaskiniprojek() {
        const form2 = document.formkemaskiniprojek2;

        if (form2.datestart.value == "" || form2.datestart.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in Start Date!',
                confirmButtonColor: '#1B95CF'
            });
            form2.datestart.focus();
            return false;
        } else if (form2.dateend.value == "" || form2.dateend.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in End Date!',
                confirmButtonColor: '#1B95CF'
            });
            form2.dateend.focus();
            return false;
        } else if (form2.lponum.value == "" || form2.lponum.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in LPO Number!',
                confirmButtonColor: '#1B95CF'
            });
            form2.lponum.focus();
            return false;
        } else if (form2.repair.value == "" || form2.repair.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in Repaire!',
                confirmButtonColor: '#1B95CF'
            });
            form2.repair.focus();
            return false;
        } else if (form2.payment.value == "" || form2.payment.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in payment!',
                confirmButtonColor: '#1B95CF'
            });
            form2.payment.focus();
            return false;
        } else if (form2.price.value == "" || form2.price.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in price!',
                confirmButtonColor: '#1B95CF'
            });
            form2.price.focus();
            return false;
        } else if (form2.status.value == "" || form2.status.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in status!',
                confirmButtonColor: '#1B95CF'
            });
            form2.status.focus();
            return false;
        } else if (form2.note.value == "" || form2.note.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in note!',
                confirmButtonColor: '#1B95CF'
            });
            form2.note.focus();
            return false;
        } else if (form2.invoicename.value == "" || form2.invoicename.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in note!',
                confirmButtonColor: '#1B95CF'
            });
            form2.invoicename.focus();
            return false;
        } else {
            Swal.fire({
                text: "Please make sure everything is correct!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#1B95CF',
                cancelButtonColor: '#BF000E',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    form2.submit(); // ✔ betul
                }
            })
        }
        return false;
    }
</script>
