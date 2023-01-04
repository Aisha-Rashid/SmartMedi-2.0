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
    <!-- <meta name="viewport" content="width=device-width"> -->
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
        // echo "female patients", $femaleUsersNo;

        // $x =  "SELECT DISTINCT hospitalname FROM `hospitals`";
        // $Res = mysqli_query($db, $x);
        // echo $Res;
        // echo (mysqli_fetch_all($Res)[1]);

        $x =  "SELECT DISTINCT hospitalname FROM `hospitals`";
        $Res = mysqli_query($db, $x);
        $totalHospitals = mysqli_num_rows($Res);

        while ($row = mysqli_fetch_assoc($Res)) {
        };


        // $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

        // $result = mysqli_query($conn, $sqlQuery);

        $data = array();
        foreach ($femaleUsersRes as $row) {
            $data[] = $row;
            echo implode($data);
        }
        // $x = implode($data);
        // echo $x;

        mysqli_close($db);


        // $data = array();
        // while ($row = mysqli_fetch_assoc($femaleUsersRes)) {
        //     $data[] = $row;
        //     echo $data;
        // }




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
                                        Hospitals
                                    </div>
                                    <div class="card-body">

                                        <p><?php echo $totalHospitals; ?> </p>
                                        <?php echo $data; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

                        <!-- <script>
                            
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'bar',

                                // The data for our dataset
                                data: {
                                    labels: ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"], // labels for the x-axis
                                    datasets: [{
                                        label: 'Months', // label for the data set
                                        backgroundColor: 'rgb(255, 99, 132)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: [] // data for the chart
                                    }]
                                },
                               

                                // Configuration options go here
                                options: {}
                            });

                            // Fetch data from PHPMyAdmin database
                            console.log(data)
                            fetch('phpmyadmin_url/query.php')
                                .then(response => response.json())
                                .then(data => {
                                    // Update chart data
                                    chart.data.labels = data.labels;
                                    chart.data.datasets[0].data = data.data;
                                    chart.update();
                                });
                        </script> -->



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

<!-- function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].student_name);
                        marks.push(data[i].marks);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Student Marks',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    }; -->



        <script>
            // Define the chart configuration
            var chartConfig = {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"], // labels for the x-axis
                    datasets: [{
                        label: 'Your data',
                        data: [<?php echo $data; ?>], // The data for the chart
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            };

            // Get the canvas element
            var ctx = document.getElementById('myChart').getContext('2d');

            // Create the chart using the chart configuration
            var myChart = new Chart(ctx, chartConfig);
        </script>

    <?php endif ?>
</body>

</html>