<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

// join table tb_class to tb_teacther and tb_course
$sql = "SELECT c.ClassID, c.Class_name, t.En_name, co.Course_name, c.Time_in, c.Time_out, c.Shift, c.Start_class, c.End_class From tb_class c
INNER JOIN tb_teacher t
ON c.Teacher_id = t.id
INNER JOIN tb_course co ON c.course_id=co.id where c.status='active'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h2 class="m-0">|តារាងថ្នាក់រៀន</h2>
            </div>
        </div>
    </div>

    <!-- Pop up -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <?php if (isset($_GET['ID'])) { ?>
                        <h3 class="card-title" style="color:chocolate;">Edit Student</h3>
                    <?php } else { ?>

                        <h3 class="card-title" style="color:chocolate;">Add Student</h3>
                    <?php  } ?> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Condition to Add or Edit student -->

                <!-- form add and edit student -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.row -->
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="form-group" style="width: 300px;">
                            <input type="text" id="" name="namesearch" class="search form-control float-right"
                                placeholder="Search">
                            <div class=" input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" id="userTbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ថ្នាក់</th>
                                <!-- <th>Class Type</th> -->
                                <th>វគ្គសិក្សា</th>
                                <th>គ្រូបង្រៀន</th>
                                <th>ម៉ោងចូល</th>
                                <th>ម៉ោងចេញ</th>
                                <th>ឆ្នាំចាប់ផ្ដើម</th>
                                <th>ឆ្នាំបញ្ចប់</th>
                                <th>វេនសិក្សា</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $i=1; foreach ($data as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>

                                        <td><?php echo $value['Class_name']; ?></td>
                                        <td><?php echo $value['Course_name']; ?></td>
                                        <td><?php echo $value['En_name']; ?></td>
                                        <td><?php echo $value['Time_in']; ?></td>
                                        <td><?php echo $value['Time_out']; ?></td>
                                        <td><?php echo $value['Start_class']; ?></td>
                                        <td><?php echo $value['End_class']; ?></td>
                                        <!-- <td><?php echo date('d-M-Y', strtotime($value['Start_class '])); ?></td>
                                <td><?php echo date('d-M-Y', strtotime($value['End_class '])); ?></td> -->
                                        <td><?php echo $value['Shift']; ?></td>
                                        <td>
                                            <a class="btn1 bg-sis text-white" href="add_score.php?class_id=<?php echo $value['ClassID']; ?>" >បញ្ចូលពិន្ទុ</a>
                                        </td>

                                    </tr>
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
