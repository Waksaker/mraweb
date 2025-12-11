<?php
include('conn.php');
if(!isset($_GET['date']) || !isset($_GET['ic']) || !isset($_GET['namepro']) || !isset($_GET['func'])) exit("Not Found");
$date=$_GET['date'];
$ic=$_GET['ic'];
$namepro=$_GET['namepro'];
$func=$_GET['func'];
// echo "$date, $ic, $namepro, $func";
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
            <h3>STEP 3</h3>
        </div>
        <br>
        <?php
            if ($func == 'apply2') {
        ?>
            <form name="applyprojek3" action="projekaction.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="apply" value="apply3" style="display: none;">
                <input type="text" name="date" id="" value="<?php echo $date;?>" style="display: none;">
                <input type="text" name="ic" id="" value="<?php echo $ic;?>" style="display: none;">
                <input type="text" name="namepro" id="" value="<?php echo $namepro;?>" style="display: none;">
                <input type="text" name="namecreate" id="" value="<?php echo $namecreate;?>" style="display: none;">
                <input type="text" name="lponum" id="" value="<?php echo $lponum;?>" style="display: none;">
                <div class="customer_records">
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">DOCUMENT</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control mb-1" name="document" id="document">
                        </div>
                    </div>
                </div>
                <div align="right">
                    <a href="projek.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">DONE</a>
                    <button type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" name="" onclick="return apply3()">+</button>
                </div>
            </form>
        <?php
            }
        ?>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="documenttablelist" class="display nowrap" style="width:100%">
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
                    $res1 = mysqli_query($conn, "SELECT * FROM `document` WHERE `namprojek` = '$namepro'");
                    while ($row1=mysqli_fetch_assoc($res1)) {
                    $maklumat = "
                        <div>
                            <div style='display: flex; justify-content: space-between;'>
                                <div><strong>NAME PROJECT: </strong> {$row1['namprojek']}<br></div>
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
                            <button  type="button" onclick="deletedocument('delete_doc','<?php echo $row1['document'];?>','<?php echo $ic;?>','<?php echo $namepro;?>','<?php echo $date;?>')" class="btn btn-danger"><img src="assets/images/Trash_Can.png" style="width: 24px; height: 24px;"></button>
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
    function apply3() {
        const form = document.applyprojek3;

        if (form.document.value == "" || form.document.value == null) {
            Swal.fire({
                icon: 'warning',
                text: 'Please fill in name document!',
                confirmButtonColor: '#1B95CF'
            })
            form.document.focus();
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
                    form.submit();  // ✔ BETUL
                }
            })
        }
        return false;
    }
</script>
<script>
    new DataTable('#documenttablelist', {
        scrollX: true
    });
</script>
<script>
    function deletedocument(val, val1, val2, val3, val4) {
        // console.log(val, val1, val2, val3, val4);
        var result = confirm("Are you sure you want to delete this data?");

        if (result) {
            window.location = "projekaction.php?apply=" + btoa(val) + "&document=" + btoa(val1) + "&ic=" + btoa(val2) + "&namepro=" + btoa(val3) + "&date=" + btoa(val4);
        }
    }
</script>