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
                        <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="createreq2" onclick="return validate()">+</button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="tablelistid" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th style="text-align: center;">No</th>
		    <th style="text-align: center;">Discriptions</th>
		    <th style="text-align: center;">Link</th>
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
				                <td style="text-align: center;"><?php echo $row['descriptions']; ?></td>
				                <td style="text-align: center"><?php echo $row['link']; ?></td>
                                <td style="text-align: center;"><?php echo $row['quantity']; ?></td>
                                <td style="text-align: center;"><?php echo $row['price']; ?></td>
                                <td style="text-align: center;"><?php echo $row['amount']; ?></td>
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
