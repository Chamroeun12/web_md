<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// select c.ClassID,t.En_name
// from tb_class as c join tb_teacher as t 
// on c.ClassID=t.id;

// $sql = "";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['course_id'])) {
    $courseid = $_GET['course_id'];
    $sql = "SELECT * FROM tb_class WHERE Course_id=$courseid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//pages
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_class";
$stmt = $conn->prepare($sql);
$stmt->execute();
$temp = $stmt->fetch(PDO::FETCH_ASSOC);

$maxpage = 1;
if ($temp) {
    $maxpage = ceil($temp['CountRecords'] / 10);
}

?>

<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h2 class="m-0">|Class</h2>

            </div>

        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="idsearch" name="namesearch" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" style="font-family:Khmer OS Siemreap;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Class Name</th>
                                <th>Class Type</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Start Class</th>
                                <th>End Class</th>
                                <th>Shift</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody id="showdata">
                            <?php if (isset($data)) { ?>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td>
                                            <?php
                                            if (isset($_GET['page']) && $_GET['page'] > 1)
                                                echo ($_GET['page'] - 1) * 10 + ($key + 1);
                                            else
                                                echo ($key + 1);
                                            ?></td>
                                        <td><?php echo $value['Class_name']; ?></td>
                                        <td><?php echo $value['Class_Type']; ?></td>
                                        <td><?php echo $value['Time_in']; ?></td>
                                        <td><?php echo $value['Time_out']; ?></td>
                                        <td><?php echo $value['Start_class']; ?></td>
                                        <td><?php echo $value['End_class']; ?></td>
                                        <td><?php echo $value['Shift']; ?></td>
                                        <td>
                                            <!-- <a href="" data-toggle="modal" data-target="#modal-lg">
                                        <i class="fa fa-edit"></i>
                                    </a> -->
                                            <!-- <a class="m-2" href="all_condition.php?monthly_id=<?php echo $value['ClassID'] ?>"
                                        onclick="return confirm('Do you want to delete this record?')">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a> -->
                                            <!-- <a class="m-2" href="all_condition.php?monthly_id=<?php echo $value['ClassID']; ?>"
                                        onclick="return confirm('Do you want to delete this record?')">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a> -->
                                        </td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="class.php?page=
                     <?php
                        if (isset($_GET['page']) && $_GET['page'] > 1)

                            echo $_GET['page'] - 1;
                        else
                            echo 1;

                        ?>
                    ">&laquo;</a></li>
                            <?php for ($i = 1; $i <= $maxpage; $i++) { ?>
                                <li class="page-item
                      <?php
                                if (isset($_GET['page'])) {
                                    if ($i == $_GET['page'])
                                        echo ' active ';
                                } else {
                                    if ($i == 1)
                                        echo ' active ';
                                }
                        ?>"><a class="page-link" href="class.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="class.php?page=
                     <?php
                        if (isset($_GET['page'])) {
                            if ($_GET['page'] == $maxpage) {
                                echo $maxpage;
                            } else {
                                echo $maxpage + 1;
                            }
                        } else {
                            echo 2;
                        }
                        ?>">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</section>
</div>
<?php include_once "footer.php"; ?>