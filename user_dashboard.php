<?php
session_start()
?>

<?php include_once 'header.php'; ?>
<section class="conten-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">


                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">Attendance Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reports</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container">
                    <!-- Dashboard Cards -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Students</h5>
                                    <p class="card-text" id="totalStudents">50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Attendance %</h5>
                                    <p class="card-text" id="attendancePercentage">85%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card text-white bg-danger">
                                <div class="card-body">
                                    <h5 class="card-title">Absent Students</h5>
                                    <p class="card-text" id="absentStudents">7</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Present Students</h5>
                                    <p class="card-text" id="presentStudents">43</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance Table -->
                    <h4 class="mt-5">Attendance Records</h4>
                    <table class="table table-bordered table-striped mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Attendance Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceTableBody">
                            <!-- Example rows -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Male</td>
                                <td>2005-02-15</td>
                                <td>Present</td>
                                <td>2024-10-01</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>Female</td>
                                <td>2006-03-12</td>
                                <td>Absent</td>
                                <td>2024-10-01</td>
                            </tr>
                            <!-- More rows to be populated dynamically via JavaScript or PHP -->
                        </tbody>
                    </table>

                    <!-- Attendance Report Section -->
                    <h4 class="mt-5">Attendance Report</h4>

                    <!-- Date Range Filter Form -->
                    <form class="form-inline mt-3 mb-3" id="reportForm">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="startDate" class="mr-2">Start Date:</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="endDate" class="mr-2">End Date:</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Generate Report</button>
                    </form>

                    <!-- Filtered Attendance Report Table -->
                    <table class="table table-bordered mt-3" id="reportTable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Attendance Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="reportTableBody">
                            <!-- Filtered report data will appear here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'footer.php'; ?>