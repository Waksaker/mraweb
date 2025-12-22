<?php
include ('conn.php');
if (!isset($_GET['rendom'])) exit("Not Found");
$rendom = base64_decode($_GET['rendom']);
$res = mysqli_query($conn, "SELECT * FROM `projekname` WHERE `rendom` = '$rendom'");
$row = mysqli_fetch_assoc($res);
$namecreate = $row['name'];
$ic = $row['ic'];
$syarikat = $row['syarikat'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<style>
#edittablelistprojek td,
#edittablelistprojek th {
    white-space: normal !important;
    word-wrap: break-word;
}
</style>
<div class="card">
    <div class="card-body">
        <div class="col">
            <h5 class="card-title fw-semibold mb-4">Edit Job</h5>
        </div>
        <div align="center">
            <h3>EDIT STEP 2</h3>
        </div>
        <br>
        <form name="formeditprojek2" action="projekaction.php" method="POST" enctype="multipart/form-data">
            <div class="customer_record">
                <div class="row mb-3">
                    <input type="text" name="editprojek" value="editprojek2" style="display: none;">
                    <input type="text" name="rendom" value="<?php echo $rendom;?>" style="display: none">
                    <input type="text" name="namecreate" value="<?php echo $namecreate;?>" style="display: none;">
                    <input type="text" name="ic1" value="<?php echo "$ic";?>" style="display: none">
                    <input type="text" name="syarikat" value="<?php echo $syarikat;?>" style="display: none;">
                    <label for="" class="col-sm-2 col-form-label">START DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" name="datestart" id="datestart">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">END DATE :</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control mb-3" name="dateend" id="dateend">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">LPO NUMBER :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="lponum" id="lponum">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">REPAIRE :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control mb-3" name="repair" id="repair"></textarea>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">PAYMENT :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="payment" id="payment">
                        <sup><font style="color:red">Enter numbers only, do not include commas (e.g., 1000.00)</font></sup>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">PRICE :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" name="price" id="price">
                        <sup><font style="color:red">Enter numbers only, do not include commas (e.g., 1000.00)</font></sup>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">STATUS</label>
                    <div class="col-sm-4">
                        <select class="form-control mb-3" name="status" id="status">
                            <option value="">Please Choose</option>
                            <option value="1">Repaire in progress</option>
                            <option value="2">Pending spepart</option>
                            <option value="3">Pending payment</option>
                            <option value="4">Pending claim</option>
                            <option value="5">Settle</option>
                        </select>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">Note</label>
                    <div class="col-sm-4">
                        <textarea name="note" id="note" class="form-control mb-1"></textarea>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">INVOICE / DELIVERY ORDER :</label>
                    <div class="col-sm-4">
                        <input type="text" name="invoicename" id="invoicename" class="form-control mb-1">
                    </div>
                    <label for="" class="col-sm-2 col-form-label">UPLOAD INVOICE :</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control mb-1" name="invoice" id="invoice">
                    </div>
                </div>
            </div>
            <div align="right">
                <a href="editprojek3.php?rendom=<?php echo base64_encode($rendom);?>" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">SUBMIT</a>
                <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return validate2()">+</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="edittablelistprojek" class="display" style="width:100%">
                <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Invoice</th>
                    <th style="text-align: center;">#</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $index = 1;
                $result = mysqli_query($conn, "SELECT * FROM `projek` WHERE `rendom`='$rendom'");
                while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo ($index++);?></td>
                        <td style="text-align: center;">
                            <a href="invoice/<?php echo $row['invoicedoc'];?>" target="_blank"><?php echo $row['invoice'];?></a>
                        </td>
                        <td style="text-align: center;">
                            <a href="kemasprojek.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-primary"><img src="assets/images/Pencil.png" style="height: 24px; width: 24px;"></a>
                            <button type="button" onclick="deleteprojek2('deleteeditprojek','<?php echo $row['id'];?>')" class="btn btn-danger"><img src="assets/images/Trash_Can.png" style="width: 24px; height: 24px;"></button>
                        </td>
                    </tr>
                    <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    function deleteprojek2(func, id) {
        var result = confirm("Are you sure you want to delete this data?");
        if (result) {
            window.location = "projekaction.php?apply=" + btoa(func) + "&id=" + btoa(id);
        }
    }
</script>
<script>
    function validate2() {
        const form2 = document.formeditprojek2;

        if (form2.datestart.value == null || form2.datestart.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in Start Date!',
                confirmButtonColor: '#1B95CF'
            });
            form2.datestart.focus();
            return false;
        } else if (form2.dateend.value == null || form2.dateend.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in End Date!',
                confirmButtonColor: '#1B95CF'
            });
            form2.dateend.focus();
            return false;
        } else if (form2.lponum.value == null || form2.lponum.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in lpo number!',
                confirmButtonColor: '#1B95CF'
            });
            form2.lponum.focus();
            return false;
        } else if (form2.repair.value == null || form2.repair.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in repaire!',
                confirmButtonColor: '#1B95CF'
            });
            form2.repair.focus();
            return false;
        } else if (form2.payment.value == null || form2.payment.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in payment!',
                confirmButtonColor: '#1B95CF'
            });
            form2.payment.focus();
            return false;
        } else if (form2.price.value == null || form2.price.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in price!',
                confirmButtonColor: '#1B95CF'
            });
            form2.price.focus();
            return false;
        } else if (form2.status.value == null || form2.status.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in status!',
                confirmButtonColor: '#1B95CF'
            });
            form2.status.focus();
            return false;
        } else if (form2.note.value == null || form2.note.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in note!',
                confirmButtonColor: '#1B95CF'
            });
            form2.note.focus();
            return false;
        } else if (form2.invoicename.value == null || form2.invoicename.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in invoice name!',
                confirmButtonColor: '#1B95CF'
            });
            form2.invoicename.focus();
            return false;
        } else if (form2.invoice.value == null || form2.invoice.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in invoice file or image!',
                confirmButtonColor: '#1B95CF'
            });
            form2.invoice.focus();
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
<script>
$('#edittablelistprojek').DataTable({
    responsive: true,
    autoWidth: false,
    pageLength: 10,
    lengthChange: false
});
</script>
