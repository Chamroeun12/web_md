<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$sql = "SELECT
    c.Class_name,
    co.Course_name,
    t.Kh_name,
    att.Date
FROM
    tb_attendance att
INNER JOIN
    tb_class c ON att.Class_id = c.ClassID
INNER JOIN
    tb_course co ON c.course_id = co.id
INNER JOIN
    tb_teacher t ON c.Teacher_id = t.id
GROUP BY
    c.Class_name,
    co.Course_name,
    t.En_name,
    att.Date
ORDER BY
    att.Date;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$attendance = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include_once "header.php"; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h3 class="m-0">|កាលវិភាគគ្រូបង្រៀន</h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6"> </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="form-group" style="width: 300px;">
                            <input type="text" id="" name="namesearch" class="search form-control float-right"
                                placeholder="ស្វែងរក" style="font-family:Khmer OS Siemreap;">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" style="font-family:Khmer OS Siemreap;" id="userTbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ថ្នាក់</th>
                                <th>វគ្គសិក្សា</th>
                                <th>គ្រូបង្រៀន</th>
                                <th>កាលបរិច្ឆេទ</th>
                                <th>ទាញយក</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($attendance as $row): ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['Class_name'];?></td>
                                <td><?php echo $row['Course_name'];?></td>
                                <td><?php echo $row['Kh_name'];?></td>
                                <td>
                                    <?php
                                // Create a DateTime object from the string
                                $date = new DateTime($row['Date']);
                                // Format the date to "15-Sep-2024 at 10 am"
                                echo $date->format('d-M-Y');
                                ?>
                                </td>
                                <td>
                                    <form action="report_att.php" method="POST">
                                        <button type="submit" name="export_pdf" title="PDF"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-pdf text-danger ml-1" style=" font-size: 18px;"></i>
                                            <input type="hidden" name="classname" value="<?=$row['Class_name']; ?>">
                                        </button>
                                        <button type="submit" name="export_excel" title="Excel"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-excel text-success ml-2"
                                                style=" font-size: 18px;"></i></button>


                                    </form>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</section>
</div>
<?php include_once "footer.php"; ?>
