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
        <form action="" method="" enctype="multipart/form-data">
            <div class="customer_records">
                <div class="row mb-3">
                    <label for="datestart" class="col-sm-2 col-form-label">DISCRIPTIONS :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control mb-3" id="discriptions" name="discriptions">
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
                        <button class="btn btn-primary py-8 fs-4 mb-4 rounded-2">+</button>
                    </div>
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
                        <tbody>
                            <?php
                                $index = 1;
                                $date = isset($_GET['date']);
                                $sql = "SELECT * FROM `list_request` WHERE date = '$date' AND name = '$name'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo ($index++); ?></td>
                                        <td style="text-align: center;"><?php echo $row['descriptions'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['quantity'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['price'] ?></td>
                                        <td style="text-align: center;"><?php echo $row['amount'] ?></td>
                                        <td style="text-align: center;">
                                            
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include("./components/footer.php"); ?> 
<script>
    new DataTable('#tablelistid', {
        scrollX: true,
    });
</script>