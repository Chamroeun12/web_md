<?php
include_once 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['btnsave'])) {
    $sql = "INSERT INTO tb_course(Course_name,Color,Sub_id,Date) VALUES(:cu_name,:Color,:subid,:date)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":cu_name", $_POST['cu_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Color", $_POST['color'], PDO::PARAM_STR);
    $stmt->bindParam(":subid", $_POST['subject'], PDO::PARAM_INT);
    $stmt->bindParam(":date", $_POST['date'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
        echo "<script>window.history.back();</script>";
    }
}

//pages
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_course LIMIT 8";
$stmt = $conn->prepare($sql);
$stmt->execute();
$temp = $stmt->fetch(PDO::FETCH_ASSOC);

$maxpage = 1;
if ($temp) {
    $maxpage = ceil($temp['CountRecords'] / 8);
}



// $sql = "SELECT * FROM tb_subject";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $Student = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * from tb_course co,  tb_subject su WHERE co.Sub_id = su.SubID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$Course = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * from tb_subject";
$stmt = $conn->prepare($sql);
$stmt->execute();
$Subject = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once 'header.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">|វគ្គសិក្សា</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <a href="add_subject.php" class="btn1 bg-sis text-white float-sm-right" data-toggle="modal"
                        data-target="#modal-lg">បញ្ចូលថ្មី</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4>|បង្កើតវគ្គសិក្សាថ្មី</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Condition to Add or Edit student -->

                    <!-- form add and edit student -->
                    <form name="subjectForm" method="post" action="">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" id="subID" name="subid" value="<?= $subject_id; ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="inputName">វគ្គសិក្សា</label>
                                        <input type="text" id="coursename" name="cu_name" class="form-control" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inputStatus">មុខវិជ្ជាសិក្សា</label>
                                            <select id="" name="subject" class="form-control custom-select">
                                                <option selected disabled>--ជ្រើសរើស--</option>
                                                <?php foreach ($Subject as  $row): ?>
                                                <option value="<?= $row['SubID']; ?>">
                                                    <?= $row['Subject_name']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inputStatus">ពណ៌</label>
                                            <select id="" name="color" class="form-control custom-select">
                                                <option selected disabled>--ជ្រើសរើស--</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-secondary">Secondary</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-danger">Danger</option>
                                                <option value="bg-warning">Warning</option>
                                                <option value="bg-info">Info</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <label for="inputName">កាលបរិច្ឆេទ</label>
                                        <input type="date" id="date" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">បោះបង់</button>
                            <input type="submit" value="រក្សាទុក" name="btnsave" class="btn1 bg-sis text-white">
                            <!-- <button type="button" class="btn btn-primary">Save</button> -->
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">
                                <div class="form-group" style="width: 300px;">
                                    <input type="text" id="" name="namesearch" class="search form-control float-right"
                                        placeholder="ស្វែងរក">
                                    <div class="input-group-append">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover text-nowrap" id="userTbl">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ល.រ</th>
                                        <th>វគ្គសិក្សា</th>
                                        <th>មុខវិជ្ចា</th>
                                        <th>កាលបរិច្ឆេទ</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Course as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value['Course_name']; ?></td>
                                        <td><?php echo $value['Subject_name']; ?></td>
                                        <td><?php echo $value['Date']; ?></td>
                                        <td>
                                            <a href="update_course.php?co_id=<?php echo $value['id'] ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="m-2" href="all_condition.php?co_id=<?php echo $value['id'] ?>"
                                                onclick="return confirm('Do you want to delete this record?')">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>


                        <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <!-- Previous link -->
                        <li class="page-item">
                            <a class="page-link" href="tbl_course.php?page=<?php echo isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] - 1 : 1; ?>">&laquo;</a>
                        </li>

                        <!-- Page links -->
                        <?php for ($i = 1; $i <= $maxpage; $i++): ?>
                            <li class="page-item <?php echo isset($_GET['page']) && $_GET['page'] == $i ? 'active' : ''; ?>">
                                <a class="page-link" href="tbl_course.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next link -->
                        <li class="page-item">
                            <a class="page-link" href="tbl_course.php?page=<?php echo isset($_GET['page']) && $_GET['page'] < $maxpage ? $_GET['page'] + 1 : $maxpage; ?>">&raquo;</a>
                        </li>
                    </ul>
                </div>

                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include_once 'footer.php'; ?>
