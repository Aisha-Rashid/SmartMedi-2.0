<?php
include('signin.php');

// Starting the session, to use and
// store data in session variable
// session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['IDNo'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['IDNo']);
    header("location: login.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <title>SmartMedi User Dashboard</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="dashboardcss/templatemo_main.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="shortcut icon" href="dashboardimages/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="dashboardimages/apple-touch-icon.png">

    <script src="./bootstrap.min.js"></script>

</head>

<body>
    <?php if (isset($_SESSION['IDNo'])) :


        $unique = $_SESSION['IDNo'];
        $query = "SELECT * FROM `patients` WHERE IDNo = '$unique'";
        $res = mysqli_query($db, $query);
        $array = mysqli_fetch_row($res);
        $rows = mysqli_num_rows($res);

        $AllPatientsQuery = "SELECT * FROM `patients` ORDER by id";
        $AllPatientsRes = mysqli_query($db, $AllPatientsQuery);
        $totalPatients = mysqli_num_rows($AllPatientsRes);

        // doctors query
        $doctorsQuery = "SELECT * FROM `doctors` ORDER by id";
        $doctorsRes = mysqli_query($db, $doctorsQuery);
        $totalDoctors = mysqli_num_rows($doctorsRes);

        $maleUsers = "SELECT * FROM `patients` WHERE `gender`='Male'";
        $maleUsersRes = mysqli_query($db, $maleUsers);
        $maleUsersNo = mysqli_num_rows($maleUsersRes);
        // female users
        // $femaleUsers = ;
        $femaleUsersRes = mysqli_query($db, "SELECT * FROM `patients` WHERE `gender`='Female'");
        $femaleUsersNo = mysqli_num_rows($femaleUsersRes);
        echo "female patients",$femaleUsersNo;

        $x =  "SELECT DISTINCT hospitalname FROM `hospitals`";
        $Res = mysqli_query($db, $x);
        echo (mysqli_fetch_all($Res)[1]);
        

    ?>


        <!-- Start menu -->
        <div class="template-page-wrapper">
            <div class="navbar-collapse collapse templatemo-sidebar">






                <ul class="templatemo-sidebar-menu">
                    <li>
                        <form class="navbar-form">
                            <img src="dashboardimages/favicon.ico" alt="Smartmedi">
                        </form>
                    </li>
                    <li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                    <li class="sub">
                        <a href="javascript:;">
                            <i class="fa fa-database"></i> Menu <div class="pull-right"><span class="caret"></span></div>
                        </a>
                        <ul class="templatemo-submenu">
                            <li><a href="medicalhist.php">Medical History</a></li>
                            <li><a href="attachments.php">Attachments</a></li>
                            <li><a href="appointment.php">Appointments</a></li>
                        </ul>
                    </li>
                    <li><a href="preferences.php"><i class="fa fa-cog"></i>Settings</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
            <div class="templatemo-content-wrapper">
                <div class="templatemo-content">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">User Panel</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li>Overview</li>
                    </ol>


                    <!-- partial -->
                    <div>

                        <div class="row">
                            <div class="col-4 icon-dashboard-container">
                                <div class="card shadow p-3 mb-5 bg-body rounded">
                                    <div class="card-body">
                                        <div class="card-header">
                                            Total Number of Patients
                                        </div>
                                        <p><?php echo $totalPatients; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card shadow p-3 mb-5 bg-body rounded">
                                    <div class="card-header">
                                        Doctors
                                    </div>
                                    <div class="card-body">

                                        <p><?php echo $totalDoctors; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card shadow p-3 mb-5 bg-body rounded">
                                    <div class="card-header">
                                        Doctors
                                    </div>
                                    <div class="card-body">

                                        <p><?php echo $totalDoctors; ?> </p>
                                    </div>
                                </div>
                            </div>
                            

                        </div>



                        <div>

                            <table class=" table table-stripped">
                                <thead class="thead-light">

                                    <tr>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <?php
                                    // while($row = mysqli_fetch_array($res))
                                    while ($row = $AllPatientsRes->fetch_array()) {
                                        $age = $row['DOB'];
                                        $year = explode('-', $age);
                                        $patientAge = date("Y") - $year[0];
                                        echo "<tr>";
                                        echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                                        echo "<td>" . $patientAge . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['bloodgroup'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td><button class='btn'>View</button> </td>";

                                        echo "</tr>";
                                    }

                                    ?>
                                </tr>
                            </table>

                        </div>


                    </div>
                </div>

            </div>
        </div>
        </section>


        <!-- End menu    -->

        <!-- Start popup -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="dashboard.php?logout='1'" class="btn btn-primary">Yes</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End popup -->

        <script src="dashboardjs/jquery.min.js"></script>
        <script src="dashboardjs/Chart.min.js"></script>
        <script src="dashboardjs/templatemo_script.js"></script>
        <script src="dashboardjs/Graph.js"></script>
        <script type="text/javascript"></script>

        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                });
            }
        </script>
    <?php endif ?>
</body>

</html>