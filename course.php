<?php include_once 'header.php';
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
include "connection.php";

$norecord = "<div class='text-center'>No Record Found!</div>";
if (isset($_GET['subject_id'])) {
    $subject_id = $_GET['subject_id'];
    $sql = "SELECT * FROM tb_course WHERE Sub_id=$subject_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['btnsave'])) {
    $sql = "INSERT INTO tb_course(Course_name,Color,Sub_id,Date) VALUES(:cu_name,:color,:subid,:date)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":cu_name", $_POST['cu_name'], PDO::PARAM_STR);
    $stmt->bindParam(":color", $_POST['color'], PDO::PARAM_STR);
    $stmt->bindParam(":subid", $_POST['subid'], PDO::PARAM_INT);
    $stmt->bindParam(":date", $_POST['date'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
        echo "<script>window.history.back();</script>";
    }
}

if (isset($_POST['delete'])) {
    $cid = $_POST['cid'];
    $sql = "DELETE FROM tb_course WHERE id=$cid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: index.php");
}


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">|វគ្គសិក្សា</h1>
                </div>
            </div>
            <!-- Alert popup-->
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>|បញ្ចូលវគ្គសិក្សាថ្មី</h4>
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
                                            <label for="inputName">Course Name</label>
                                            <input type="text" id="coursename" name="cu_name" class="form-control"
                                                value="">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputStatus">Color</label>
                                                <select id="" name="color" class="form-control custom-select">
                                                    <option selected disabled>Select one</option>
                                                    <option value="bg-primary">Primary</option>
                                                    <option value="bg-secondary">Secondary</option>
                                                    <option value="bg-success">Success</option>
                                                    <option value="bg-danger">Danger</option>
                                                    <option value="bg-warning">Warning</option>
                                                    <option value="bg-info">Info</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputName">Date</label>
                                            <input type="date" id="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value="Save" name="btnsave" class="btn btn-success">
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                            </div>
                        </form>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- /.row -->
            <div class="row mt-5" id="">
                <div class="col-md-12">
                    <div class="card text-bold">
                        <?php if (!$data) {
                            echo $norecord;
                        } ?>
                    </div>
                </div>

                <?php if (isset($data)) { ?>
                <?php foreach ($data as $row) { ?>
                <div class="col-lg-3 col-3">
                    <div class="small-box <?php echo $row['Color'] ?>">
                        <div class="inner">
                            <h3 class="text-white"><?php echo $row['Course_name'] ?></h3>
                            <p class="text-white"><?php echo $row['Date'] ?></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="d-flex justify-content-between small-box-footer">
                            <div>
                                <a href="class_from_course.php?course_id=<?php echo $row['id'] ?>"
                                    class="text-white ml-3">
                                    View &nbsp;
                                    <i class="fas fa-arrow-right fa-xs"></i>
                                </a>
                            </div>
                            <!-- <div class="mr-3 dropup">
                                <i class="nav-icon fas fa-ellipsis-h text-white" data-toggle="dropdown"></i>
                                <div class="dropdown-menu">
                                    <a href="" class="dropdown-item"><i class="fa fa-edit text-success"></i>
                                        Edit</a>
                                    <a href="all_condition.php?c_id=<?php echo $row['id'] ?>"
                                        onclick="return confirm('Do you want to delete this record?')"
                                        class="dropdown-item"><i class="fa fa-trash text-danger"></i> Delete</a>
                                </div>
                            </div> -->
                        </div>


                        <!-- <a href="class_from_course.php?course_id=<?php echo $row['id']; ?>" class="small-box-footer">
                            view &nbsp;
                            <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>

                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<?php include_once 'footer.php'; ?>