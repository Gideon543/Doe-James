<!DOCTYPE html>

<?php 
/*
*********************************************************************************
A Web Site for Ashesi Career Services Department
*********************************SIDEBAR***************************************
Date started: 10th November, 2021
Date completed: 10th November, 2021
**********************************************************************************
*/

?>

<?php
// Checks if the user clicked the logout button
  if (isset($_GET['logout'])) {
    session_destroy();
  	unset($_SESSION['valid_user']);
    unset($_SESSION['user_id']);
  	header("location: login.php");
  }
?>


<!---SIDEBAR-->
<aside class="sidebar">
    
    <div class="logo-c">
        <a class="navbar-brand" href="dashboard.php"><img src="../assets/images/dow_jones.png" alt=""></a>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="profile.php"> <i class="bi bi-person-circle"></i>ACCOUNT</a>
        </li>
        <li class="nav-item">
            <a href="dashboard.php"><i class="bi bi-speedometer2"></i> DASHBOARD</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="enlistedCompanies.php"> <i class="bi bi-people"></i>COMPANIES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="clientOrders.php"> <i class="bi bi-cart-check"></i>ORDERS</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="companyMatches.php"><i class="bi bi-calendar4-event"></i>COMPANIES FOR YOU</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="login.php?logout = '1'"><i class="bi bi-box-arrow-left"></i>LOG OUT</a>
        </li>
    </ul>
</aside>

<!---/SIDEBAR-->