<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="images/SiSlogo.png" alt="AdminLTELogo" height="110" width="90">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4" style="background-color: #152550;">
            <!-- Brand Logo -->
            <div class="brand-link text-center">
                <a href="index3.html">
                    <img src="images/SiSlogo.png" alt="AdminLTE Logo" class="text-center mb-3" height="40">
                </a>
                <div class="brand-text text-white text-sm" style="font-family:Khmer OS Siemreap">
                    ស្មាតប្រាយ អ៊ិនធើណាសិនណលស្គូល
                    <br>
                    SmartBright International School
                    <!-- <p class="">ស្មាតប្រាយ អ៊ិនធើណាសិនណលស្គូល</p>
                    <p class="">SmartBright International School</p> -->
                </div>

            </div>

            <!-- Brand Logo -->
            <!-- <div class="branding text-center text-white" style="font-family:Khmer OS Siemreap">
                <a href="index.php" class="">
                    <img src="images/SiSlogo.png" alt="School Logo" class="text-center" height="60" weight="50">
                </a>
                <div class="font-weight-light">ស្មាតប្រាយ អ៊ិនធើណាសិនណលស្គូល</div>
                <div class="font-weight-light">jjjfjfj</div>
            </div> -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block text-white">SARAN CHAMROEUN</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <!-- menu-open -->
                            <a href="index.php" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <!-- <i class="nav-link fa-solid fa-gauge"></i> -->
                                <p>
                                    Dashboard
                                </p>
                            </a>
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- Teacher -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white active">
                                <i class="nav-icon fas fa-solid fa-school"></i>
                                <p>
                                    Students
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="student-list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Students</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Score</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Attendance</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Students -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-solid fa-school"></i>
                                <p>
                                    Subjects
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="liststudent.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Students</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addstudent.php" class="nav-link text-white">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Student</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Subjects -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Subjects
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Subjects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Subject</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <!-- Class Room -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-solid fa-school"></i>
                                <p>
                                    Class Room
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="liststudent.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Students</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addstudent.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Student</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Attendance -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Attendance
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Subjects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Subject</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Schedule -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Schedule
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Subjects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="addsubject.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Subject</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <!-- Students Score -->
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>
                                    Student Scores
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="score.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Score</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="result.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Result</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>