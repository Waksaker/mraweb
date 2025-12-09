<?php
if(!isset($_GET['date']) || !isset($_GET['ic']) || !isset($_GET['namepro'])) exit("Not Found");
$date=$_GET['date'];
$ic=$_GET['ic'];
$namepro=$_GET['namepro'];
$func=$_GET['func'];
?>
<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Apply Project</h5>
        <div align="center">
            <h3>STEP 2</h3>
        </div>
        <br>
        <?php
            if ($func == "apply1") {
        ?>
            <form name="applyprojek2" action="projekaction.php" method="POST" enctype="multipart/form-data">
                <div class="customer_record">
                    <div class="row mb-3">
                        <input type="text" name="namecreate1" value="<?php echo "$namepro";?>" style="display: none;">
                        <input type="text" name="date1" value="<?php echo "$date";?>" style="display: none;">
                        <input type="text" name="ic1" value="<?php echo "$ic";?>" style="display: none;">
                        <label for="" class="col-sm-2 col-form-label">COMPANY :</label>
                        <div class="col-sm-4">
                            <select class="form-control mb-1" name="syarikat" id="syarikat">
                                <option value="">Please Choose</option>
                                <option value="MRA GLOBAL SDN BHD">MRA GLOBAL SDN BHD</option>
                                <option value="LETILICA SDN BHD">LETILICA SDN BHD</option>
                                <option value="MIM DEFENSE SDN BHD">MIM DEFENSE SDN BHD</option>
                            </select>
                        </div>
                        <label for="" class="col-sm-2 col-form-label">LPO NUMBER :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="lponum" id="lponum">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">START DATE :</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control mb-3" name="datestart" id="datestart">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">END DATE :</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control mb-3" name="dateend" id="dateend">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">END DATE :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="repair" id="repair">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">PAYMENT :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="repair" id="repair">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">PRICE :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="price" id="price">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">PRICE :</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mb-3" name="price" id="price">
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
                            <input type="text" name="invoice" id="invoice" class="form-control mb-1">
                        </div>
                        <label for="" class="col-sm-2 col-form-label">UPLOAD INVOICE :</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control mb-1" name="invoice" id="invoice">
                        </div>
                    </div>
                </div>
            </form>
        <?php
            }
        ?>
    </div>
</div>
