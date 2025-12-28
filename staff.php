<?php include("./components/header.php"); ?>
<?php include("./components/sidenav.php"); ?>
<?php include("./components/topnav.php"); ?>
<?php include("./components/name.php"); ?>
<style>
/* =========================
   STAFF CARD (GLOBAL)
========================= */
.staff-card {
    font-size: 14px;
}

.staff-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px 12px;
}

.staff-grid span {
    display: block;
    font-size: 11px;
    color: #6c757d;
}

/* =========================
   ACTION BUTTONS
========================= */
.action-btns {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

/* =========================
   MOBILE VIEW
========================= */
@media (max-width: 768px) {

    /* Buang header table */
    #allstaff thead {
        display: none;
    }

    /* Jadikan setiap row sebagai card */
    #allstaff tbody tr {
        display: block;
        margin-bottom: 15px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,.08);
        padding: 12px;
    }

    #allstaff tbody td {
        display: block;
        width: 100%;
        border: none;
        padding: 4px 0;
    }

    /* No staff kecil di atas */
    #allstaff tbody td:first-child {
        text-align: right;
        font-size: 12px;
        color: #999;
    }

    /* Maklumat staff satu column */
    .staff-grid {
        grid-template-columns: 1fr;
    }

    /* Action button bawah & kemas */
    .action-btns {
        justify-content: space-between;
        margin-top: 10px;
    }

    .action-btns .btn {
        flex: 1;
        padding: 6px 0;
    }
}
</style>
<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];

$Date_now=date('D M d, Y H:i:s');
$Year_now = date('Y',strtotime($Date_now));
$tarikh = date('Y-m-d');

$sql = "SELECT * FROM mra_staff where name = '$name'"; // SQL with parameters
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name2 = $row['name'];
$position2 = $row['position'];
$noic = $row['icno'];

// $sql1 = "SELECT * FROM `attandance` WHERE `date` = '$tarikh'";
// $result1 = $conn->query($sql1);
// $row1 = $result1->fetch_assoc();

// $date = $row1['outoffice'];
?>
<div class="card">
    <div class="card-body">
		<h5 class="card-title fw-semibold mb-4">Staff</h5>
        <div align="right">
        	<a href="addstaff.php" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Add Staff</a>
        </div>
        <table id="allstaff" class="display" style="width:100%">
			<thead class="bg-primary text-white">
				<tr>
					<th style="text-align: center;">No</th>
    				<th style="text-align: center;">Staff Information</th>
    				<th style="text-align: center;">Action</th>
				</tr>
			</thead>
            <tbody>
			    <?php 
                    $indexstaff = 1;
                    $sql = "SELECT * FROM mra_staff";
                    $result = mysqli_query($conn, $sql);
                    while ($rowstaff = mysqli_fetch_assoc($result)) {
                        $id = $rowstaff['id'];
                        $maklumat = "
                            <div class='staff-card'>
                                <div class='fw-bold fs-6 mb-1'>{$rowstaff['name']}</div>
                                <div class='text-muted small mb-2'>{$rowstaff['position']}</div>
                                <div class='text-muted small mb-2'>{$rowstaff['status']}</div>
                                <div class='staff-grid'>
                                    <div><span>ID</span>{$rowstaff['id_user']}</div>
                                    <div><span>IC</span>{$rowstaff['icno']}</div>
                                    <div><span>Email</span>{$rowstaff['email']}</div>
                                    <div><span>Phone</span>{$rowstaff['phoneno']}</div>
                                    <div><span>Bank</span>{$rowstaff['bank_name']}</div>
                                    <div><span>Account</span>{$rowstaff['acc_no']}</div>
                                    <div><span>Syarikat</span>{$rowstaff['syarikat']}</div>
                                    <div><span>Portfolio</span>{$rowstaff['portfolio']}</div>
                                </div>
                            </div>
                        ";
			    ?>    
				    <tr>
					    <td style="text-align:center;"><?php echo ($indexstaff++); ?></td>
					    <td><?php echo $maklumat; ?></td>
					    <td>
                            <div class="action-btns">
                                <a href="kemaskinistaff.php?name=<?php echo $rowstaff['name'];?>&position=<?php echo $rowstaff['position']; ?>" 
                                    class="btn btn-primary btn-sm">
                                    <img src="assets/images/Pencil.png" alt="" style="width: 16px; height: 16px;">
                                </a>

                                <button type="button" onclick="send('<?php echo $id ?>')" 
                                    class="btn btn-primary btn-sm">
                                    <img src="assets/images/send.png" alt="" style="width: 16px; height: 16px;">
                                </button>

                                <?php if ($rowstaff['portfolio'] != '') { ?>
                                    <a href="./folio/<?php echo $rowstaff['portfolio']; ?>" 
                                        class="btn btn-primary btn-sm" target="_blank">
                                        <img src="assets/images/resume.png" alt="" style="width: 16px;  height: 16px;">
                                    </a>
                                <?php } ?>

                                <button type="button" onclick="deletestaff('<?php echo $id ?>')" 
                                    class="btn btn-danger btn-sm">
                                    <img src="assets/images/Trash_Can.png" alt="" style="width: 16px;  height: 16px;">
                                </button>
                            </div>
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
new DataTable('#allstaff', {
    responsive: false, // MATIKAN responsive DataTables
    paging: true,
    pageLength: 5,
    lengthChange: false,
    autoWidth: false,
    ordering: true,
    searching: true,
    columnDefs: [
        { targets: 0, width: "30px" },
        { targets: 2, orderable: false }
    ]
});
</script>
<script type="text/javascript">
  function deletestaff(id) {
    var result = confirm("Are you sure you want to delete this data?");

    if (result) {
      window.location.href = "delete.php?idstaff=" + id;
    }
  }
</script>
<script>
  function send(id) {
    console.log("Hantar");
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText)
          Swal.fire({
              text: 'Berjaya hantar.',
              icon: 'success',
              showCancelButton: false,
              confirmButtonColor: '#F7E836',
              confirmButtonText: 'Ok'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = 'staff.php';
              }
          });
        else
          Swal.fire({
              text: 'Gagal hantar.',
              icon: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#F7E836',
              confirmButtonText: 'Ok'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location = 'staff.php';
              }
          });
      }
    };
    xhttp.open("GET", "send.php?iduser=" + id, true);
    xhttp.send();
  }
</script>
