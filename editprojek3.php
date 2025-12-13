<?php
include ('conn.php');
if (!isset($_GET['rendom'])) exit('Not Found');
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
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Job</h5>
        <div align="center">
            <h3>EDIT STEP 3</h3>
        </div>
        <br>
        <form name="editprojek3" action="projekaction.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="editprojek" value="editprojek3" style="display: none;">
            <input type="text" name="rendom" id="" value="<?php echo $rendom;?>" style="display: none;">
            <input type="text" name="ic" id="" value="<?php echo $ic;?>" style="display: none;">
            <input type="text" name="namecreate" id="" value="<?php echo $namecreate;?>" style="display: none;">
            <div class="customer_records">
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">LPO NUMBER</label>
                    <div class="col-sm-4">
                        <select name="lponum" id="lponum" class="form-control mb-1">
                            <option value="">Please Choose</option>
                            <?php
                            $res=mysqli_query($conn, "SELECT * FROM `projek` WHERE `rendom` = '$rendom'");
                            while ($row=mysqli_fetch_assoc($res)) {
                                $lponum=$row['lponum'];
                                echo '<option value="' . $lponum . '">' . $lponum . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <label for="" class="col-sm-2 col-form-label">DOCUMENT</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control mb-1" name="document" id="document">
                    </div>
                </div>
            </div>
            <div align="right">
                <a href="projek.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">DONE</a>
                <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return validate3()">+</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="documenttablelistedit" class="display nowrap" style="width:100%">
            <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Information</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $index = 1;
            $res1 = mysqli_query($conn, "SELECT * FROM `document` WHERE `rendom` = '$rendom'");
            while ($row1=mysqli_fetch_assoc($res1)) {
                $maklumat = "
                    <div>
                        <div style='display: flex; justify-content: space-between;'>
                            <div><strong>REPAIR: </strong> {$row1['pembaikan']}<br></div>
                        </div>
                        <div style='display: flex; justify-content: space-between;'>
                            <div><strong>LPO NUMBER: </strong> {$row1['lponum']}<br></div>
                        </div>
                        <div style='display: flex; justify-content: space-between;'>
                            <div><strong>DOCUMENT: </strong> {$row1['document']}<br></div>
                        </div>
                    </div>
                ";
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo ($index++);?></td>
                    <td style="text-align: center;"><?php echo $maklumat;?></td>
                    <td>
                        <button  type="button" onclick="deletedocument('deleteeditprojek3','<?php echo $row1['id'];?>')" class="btn btn-danger"><img src="assets/images/Trash_Can.png" style="width: 24px; height: 24px;"></button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include("./components/footer.php"); ?>
<script>
    new DataTable('#documenttablelistedit', {
        scrollX: true
    });
</script>
<script>
    function validate3() {
        const form3 = document.editprojek3;
        if (form3.lponum.value == "" || form3.lponum.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in End Date!',
                confirmButtonColor: '#1B95CF'
            });
            form3.lponum.focus();
            return false;
        } else if (form3.document.value == "" || form3.document.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in document!',
                confirmButtonColor: '#1B95CF'
            });
            form3.document.focus();
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
                    form3.submit(); // ✔ betul
                }
            })
        }
        return false;
    }
</script>
<script>
    function deletedocument(val, val1) {
        // console.log(val, val1);
        var result = confirm("Are you sure you want to delete this data?");

        if (result) {
            window.location = "projekaction.php?apply=" + btoa(val) + "&id=" + btoa(val1);
        }
    }
</script>