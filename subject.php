<?php
include "connection.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "connection.php";
$sql = "SELECT * FROM tb_subject";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['btnsave'])) {
    $sql = "INSERT INTO tb_subject(Subject_name,Color) VALUES(:subName,:color)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":subName", $_POST['sub_name'], PDO::PARAM_STR);
    $stmt->bindParam(":color", $_POST['color'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        // echo "<script>alert('Data saved successfully');</script>";
        header('Location: subject.php');
        exit;
    }
}

?>
<?php include_once 'header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- <?php print_r($data); ?> -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">|មុខវិជ្ជាសិក្សា</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" class="btn1 bg-sis text-white float-sm-right" data-toggle="modal"
                        data-target="#modal-lg">បង្កើតថ្មី</button>
                </div>
            </div>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4>|បន្ថែមមុខវិជ្ជា</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Condition to Add or Edit student -->

                        <!-- form add and edit student -->
                        <form name="subjectForm" method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="inputName">មុខវិជ្ជាសិក្សា</label>
                                            <input type="text" id="subName" name="sub_name" class="form-control"
                                                value="">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputStatus">ពណ៌</label>
                                                <select id="" name="color" class="form-control custom-select">
                                                    <option selected disabled>--ជ្រើសរើស--</option>
                                                    <option value="bg-primary">Primary​</option>
                                                    <option value="bg-secondary">Secondary</option>
                                                    <option value="bg-success">Success</option>
                                                    <option value="bg-danger">Danger</option>
                                                    <option value="bg-warning">Warning</option>
                                                    <option value="bg-info">Info</option>
                                                </select>
                                            </div>
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
            <!-- /.row -->
            <!-- Foreach Loop -->
            <div class="row mt-5">
                <?php foreach ($data as $row) { ?>
                <div class="col-lg-3 col-3">
                    <div class="small-box <?php echo $row['Color']; ?>">

                        <div class="inner">
                            <h3 class="text-white"><?php echo $row['Subject_name']; ?></h3>
                            <p class="text-white">&nbsp;</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="d-flex justify-content-between small-box-footer">
                            <div>
                                <!-- <a href="" class="text-white ml-3">
                                    View &nbsp;
                                    <i class="fas fa-arrow-right fa-xs"></i>
                                </a> -->
                            </div>
                            <div class="mr-3 dropup">
                                <i class="nav-icon fas fa-ellipsis-h text-white" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a href="update_subject.php?sub_id=<?= $row['SubID']; ?>" class="dropdown-item"><i
                                            class="fa fa-edit text-success"></i> កែប្រែ</a>
                                    <a href="all_condition.php?sub_id=<?php echo $row['SubID'] ?>"
                                        onclick="return confirm('Do you want to delete this record?')"
                                        class="dropdown-item"><i class="fa fa-trash text-danger"></i> លុប</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
</div>



<?php include_once 'footer.php'; ?>
