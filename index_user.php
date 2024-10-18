<?php include "connection.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['role']) == 'user') {
        // Redirect to login page or display an error message
        header('Location: login_role.php');
        exit;
    }
}



?>

<?php include_once 'header.php'; ?>


<div class="content-wrapper">
    <!-- <?php
            if (isset($_GET['backup']) && $_GET['backup'] === 'success') {
                echo "<p>Backup completed successfully!</p>";
            } else {
                echo "<p>Backup failed!</p>";
            }
            ?> -->
    <!-- Content Header (Page header) -->
    <!-- <?php print_r($_COOKIE['Chamroeun']); ?> -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">|ទំព័រដើម</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- <?php print_r($_SESSION['role']) ?> -->
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ចំនួនសិស្សសរុប</span>
                            <span class="info-box-number">
                                <?php
                                $sql  = "SELECT ID FROM tb_student";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                echo Count($all);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ចំនួនគ្រូបង្រៀនសរុប</span>
                            <span class="info-box-number">
                                <?php
                                $sql  = "SELECT id FROM tb_teacher";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                echo Count($all);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->

                <div class="col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ចំនួនថ្នាក់រៀនសរុប</span>
                            <span class="info-box-number">
                                <?php
                                $sql  = "SELECT ClassID FROM tb_class";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                echo Count($all);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-purple elevation-1 "><i class="fas fa-book"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ចំនួនវគ្គសិក្សាសរុប</span>
                            <span class="info-box-number">
                                <?php
                                $sql  = "SELECT id FROM tb_course";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                echo Count($all);
                                ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.row -->

            <script>
                //-------------
                //- DONUT CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: [
                        'Chrome',
                        'IE',
                        'FireFox',
                        'Safari',
                        'Opera',
                        'Navigator',
                    ],
                    datasets: [{
                        data: [700, 500, 400, 600, 300, 100],
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            </script>
            <?php include_once 'footer.php'; ?>