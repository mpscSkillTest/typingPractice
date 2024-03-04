<?php session_start(); ?>
<?php include "Components/Header/header.php" ?>
<?php
include 'connection.php';
include 'Logging/logerror.php';
// include 'CommonFunctions/functions.php';
?>




<?php print_r ($_SESSION);?>
<div class="d-flex" id="wrapper">
    <!-- SIDEBAR -->
    <?php if ($_SESSION['user_role'] == 'STU') {
        // if($_SESSION['user_status'] == 'inactive'){
        //     return false;
        //     header();
        // }
        include "Components/Sidebar/student_sidebar.php";
    } else if ($_SESSION['user_role'] == 'Admin') {
        include "Components/Sidebar/admin_sidebar.php";
    } else if ($_SESSION['user_role'] == 'Owner') {
        include "Components/Sidebar/owner_sidebar.php";
    }
    ?>
    <!-- MAIN DATA -->
    <div id="page-content-wrapper"> 
        <?php include "Components/Nav/nav_main.php" ?>
        

        <div class="tab-content">
            <?php if ($_SESSION['user_role'] == 'STU') {
                ?>
                <div class="tab-pane fade show active" id="tab-dashboard-content">
                    <?php include "StudentContent/studentDashboard.php" ?>
                </div>
                <div class="tab-pane fade show " id="tab-payment-content">
                    <?php include "StudentContent/studentpayment.php" ?>
                </div>
                <div class="tab-pane fade show " id="tab-leaderboard-content">
                    <?php include "StudentContent/studentleaderboard.php" ?>
                </div>

                <div class="tab-pane fade show " id="tab-student-ticket-content">
                    <?php include "StudentContent/studentticket.php" ?>
                </div>


            <?php } else if ($_SESSION['user_role'] == 'Admin') {
                ?>
                <div class="tab-pane fade show active" id="tab-dashboard-content">
                    <?php include "AdminContent/admin_dashboard.php" ?>
                </div>
                <div class="tab-pane fade show " id="tab-institute-list-content">
                    <?php include "AdminContent/institute_list.php" ?>
                </div>
                <div class="tab-pane fade show " id="tab-adminstulist-content">
                    <?php include "AdminContent/adminstu_list.php" ?>
                </div>
                <div class="tab-pane fade show " id="tab-institute-verification-content">
                    <?php include "AdminContent/institute_verification.php" ?>
                </div>
            <?php

            } else if ($_SESSION['user_role'] == 'Owner') {
                ?>
                    <div class="tab-pane fade show active" id="tab-dashboard-content">
                        <?php include "InstituteContent/institute_dashboard.php" ?>
                    </div>
                    
                    <div class="tab-pane fade show " id="tab-studentlist-content">
                        <?php include "InstituteContent/studentList.php" ?>
                    </div>

                    <div class="tab-pane fade show " id="tab-newstudent-content">
                        <?php include "InstituteContent/new_student_reg.php" ?>
                    </div>

                    <div class="tab-pane fade show " id="tab-leaderboard-content">
                        <?php include "InstituteContent/leaderboard.php" ?>
                    </div>
                    <div class="tab-pane fade show " id="tab-ticket-content">
                        <?php include "InstituteContent/institute_ticket.php" ?>
                    </div>
                
                

            <?php }
            ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', event => {


        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {

            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

    });
</script>
<?php include "Components/Footer/footer.php" ?>