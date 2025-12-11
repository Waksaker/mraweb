<?php
include('conn.php');
if(!isset($_GET['date']) || !isset($_GET['ic']) || !isset($_GET['namepro'])) exit("Not Found");
$date=$_GET['date'];
$ic=$_GET['ic'];
$namepro=$_GET['namepro'];
$func=$_GET['func'];
$syarikat=$_GET['syarikat'];
$res=mysqli_query($conn, "SELECT * FROM `mra_staff` WHERE icno = '$ic'");
$row=mysqli_fetch_assoc($res);
$namecreate=$row['name'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Apply Job</h5>
        <div align="center">
            <h3>STEP 2</h3>
        </div>
        <br>
        <?php
            if ($func == "apply1" || $func == "apply2") {
        ?>
            <form name="applyprojek2" action="projekaction.php" method="POST" enctype="multipart/form-data">
                <div class="customer_record">
                    <div class="row mb-3">
                        <input type="text" name="namepro" value="<?php echo "$namepro";?>" style="display: none;">
                        <input type="text" name="date1" value="<?php echo "$date";?>" style="display: none;">
                        <input type="text" name="ic1" value="<?php echo "$ic";?>" style="display: none;">
                        <input type="text" name="apply" value="apply2" style="display: none;">
                        <input type="text" name="namecreate" value="<?php echo $namecreate;?>" style="display: none;">
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
                    <a href="applyprojek3.php?date=<?php echo urlencode($date) ?>
                    &ic=<?php echo urlencode($ic) ?>
                    &namepro=<?php echo urlencode($namepro) ?>
                    &func=<?php echo urlencode('apply2') ?>"
                    class="btn btn-primary py-8 fs-4 mb-4 rounded-2">
                    SUBMIT
                    </a>
                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return apply2()">+</button>
                </div>
            </form>
        <?php
            }
        ?>
    </div>
</div>
<?php
    if ($func == "apply1" || $func == "apply2") {
?>
<div class="card">
    <div class="card-body">
        <table id="projektablelist" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Date Create</th>
                    <th>Name Project</th>
                    <th>Company</th>
                    <th>LPO Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Repaire</th>
                    <th>Payment</th>
                    <th>Price</th>
                    <th>Invoice</th>
                    <th>Status</th>
                    <th>Bil Date</th>
                    <th>Note</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $index = 1;
                    $result = mysqli_query($conn, "SELECT * FROM `projek` WHERE `nameprojek`='$namepro' AND `syarikat`='$syarikat'");
                    while ($row=mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo ($index++);?></td>
                        <td><?php echo $row['datecreate'];?></td>
                        <td><?php echo $row['nameprojek'];?></td>
                        <td><?php echo $row['syarikat'];?></td>
                        <td><?php echo $row['lponum'];?></td>
                        <td><?php echo $row['stardate'];?></td>
                        <td><?php echo $row['duedate'];?></td>
                        <td><?php echo $row['pembaikan'];?></td>
                        <td><?php echo number_format($row['payment'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                        <td>
                            <a href="invoice/<?php echo $row['invoicedoc'];?>" target="_blank"><?php echo $row['invoice'];?></a>
                        </td>
                        <td>
                            <?php 
                                $status = $row['status'];
                                switch ($status) {
                                    case "1":
                                        echo "<span style='color:#0d6efd'>Repair in progress</span>";
                                        break;
                                    case "2":
                                        echo "<span style='color: #fd7e14;'>Pending spepart</span>";
                                        break;
                                    case "3":
                                        echo "<span style='color: #ffc107;'>Pending payment</span>";
                                        break;
                                    case "4":
                                        echo "<span style='color: #6f42c1;'>Pending claim</span>";
                                        break;
                                    case "5":
                                        echo "<span style='color: #198754;'>Settle</span>";
                                        break;
                                    default:
                                        echo "Error status";
                                }
                            ?>
                        </td>
                        <td><?php echo $row['bildate'];?></td>
                        <td><?php echo $row['catatan'];?></td>
                        <td>

                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
?>
<?php include("./components/footer.php"); ?>
<script>
    function apply2() {
        const formapply2 = document.applyprojek2;

        if (formapply2.syarikat.value == "" || formapply2.syarikat.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in name company!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.syarikat.focus();
            return false;
        } else if (formapply2.lponum.value == "" || formapply2.lponum.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in LPO number!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.lponum.focus();
            return false;
        } else if (formapply2.datestart.value == "" || formapply2.datestart.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in date start!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.datestart.focus();
            return false;
        } else if (formapply2.dateend.value == "" || formapply2.dateend.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in date end!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.dateend.focus();
            return false;
        } else if (formapply2.repair.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in repair!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.repair.focus();
            return false;
        } else if (formapply2.payment.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in payment!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.payment.focus();
            return false;
        } else if (formapply2.price.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in price!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.price.focus();
            return false;
        } else if (formapply2.status.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in status!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.status.focus();
            return false;
        } else if (formapply2.note.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in note!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.note.focus();
            return false;
        } else if (formapply2.invoicename.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in invoice name!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.invoicename.focus();
            return false;
        } else if (formapply2.invoice.value == "") {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in invoice!',
                confirmButtonColor: '#1B95CF'
            })
            formapply2.invoice.focus();
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
                    formapply2.submit();  // ✔ sekarang betul
                }
            })
        }
        return false;
    }
</script>
<script>
    new DataTable('#projektablelist', {
        scrollX: true
    });
</script>