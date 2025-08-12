<?php
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];


$sql = "SELECT * FROM `mra_staff` WHERE name = '$name'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$syarikat = $row['syarikat'];
$status = $row['status'];
?>
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center flex-column text-center">
          <a href="index.php" class="text-nowrap logo-img d-flex flex-column align-items-center text-center">
            <?php
              if ($syarikat == "MRA GLOBAL SDN BHD") {
                echo "
                  <img src='assets/images/logos/mra.png' width='100' style='margin: 0 10px;' alt='Logo 1'>
                  <h4 class='mt-2 mb-0'>MRA GLOBAL SDN BHD</h4>
                ";
              } elseif ($syarikat == "LETILICA SDN BHD") {
                echo "
                  <img src='assets/images/logos/letilica.png' width='50' style='margin: 0 10px;' alt='Logo 2'>
                  <h4 class='mt-2 mb-0'>LETILICA SDN BHD</h4>
                ";
              } elseif ($syarikat == "MIM DEFENSE SDN BHD") {
                echo "
                  <img src='assets/images/logos/mim.png' width='50' style='margin: 0 10px;' alt='Logo 3'>
                  <h4 class='mt-2 mb-0'>MIM DEFENSE SDN BHD</h4>
                ";
              }
            ?>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">LEAVE</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="leave.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Leave</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">CLAIM</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="claim.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Claim</span>
              </a>
            </li>

            <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ATTENDANCE</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="attandance.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Attendance</span>
              </a>
            </li> -->

            <?php
              if ($status == 'HR STAFF') {
                echo '
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						<span class="hide-menu">Managment</span>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="managment.php" aria-expanded="false">
						<span>
							<i class="ti ti-article"></i>
						</span>
						<span class="hide-menu">Managment</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="logistik.php" aria-expanded="false">
						<span>
							<i class="ti ti-article"></i>
						</span>
						<span class="hide-menu">Logistics</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="alatganti.php" aria-expanded="false">
						<span>
							<i class="ti ti-article"></i>
						</span>
						<span class="hide-menu">Spare Parts</span>
						</a>
					</li>
				
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						<span class="hide-menu">STAFF</span>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="staff.php" aria-expanded="false">
						<span>
							<i class="ti ti-article"></i>
						</span>
						<span class="hide-menu">Staff</span>
						</a>
					</li>
                ';
              }
            ?>
          </ul>
        </nav>
      </div>
    </aside>