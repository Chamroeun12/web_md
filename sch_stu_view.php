<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//get class id
// $classid = $_GET['classid']; 

if (isset($_POST['classid'])) {
    $classid = $_POST['classid'];
    $sql = "SELECT c.Class_name, c.Shift, sch.Start_class, sch.End_class, sch.Time_in, 
                    sch.Time_out,c.`status`,sch.Monday, sch.Tuesday, sch.Wednesday, sch.Thursday, sch.Friday
        FROM tb_sch_student sch
		INNER JOIN tb_class c ON sch.Class_id = c.ClassID WHERE Class_id = $classid";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sch = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT * FROM tb_class WHERE status='active'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$class = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php include_once "header.php"; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h3 class="m-0">|បង្ហាញកាលវិភាគ</h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6"> </div>
        </div>
    </div>

    <form action="" method="post">
        <div class="form-group mt-2 card p-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="classid" id="" class="form-control custom-select">
                        <option selected disabled>--ជ្រើសរើស--</option>
                        <?php foreach ($class as $row) { ?>
                            <option value="<?= $row['ClassID']; ?>"><?= $row['Class_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn1 bg-sis text-white" name="save" id="save" value="បង្ហាញ"
                        class="form-control">
                </div>
            </div>
        </div>
    </form>

    <!-- /.row -->

    <div class="row m-2">
        <!-- <div class="form-group" style="width: 300px;">
                            <input type="text" id="" name="namesearch" class="search form-control float-right"
                                placeholder="ស្វែងរក" style="font-family:Khmer OS Siemreap;">
                            <div class="input-group-append">
                            </div>
                        </div> -->
        <!-- /.card-header -->

        <div class="card-body table-responsive p-0 text-sm mt-1">
            <table class="table table-hover text-nowrap text-center" style="font-family:Khmer OS Siemreap;"
                id="userTbl">
                <thead>
                    <tr>
                        <th
                            style="width: 10%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            ម៉ោងសិក្សា
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            ច័ន្ទ
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            អង្គារ
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            ពុធ
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            ព្រហស្បត្តិ៍
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            សុក្រ
                        </th>
                        <th
                            style="width: 15%; background-color: #152550; color:white; font-weight:bold; font-size:18px;">
                            សៅរ៍
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($sch)) { ?>
                        <?php $i = 1;
                        foreach ($sch as $row): ?>
                            <tr style="height: 60px;">
                                <td class="table-secondary align-middle">
                                    <?php echo date('h:i', strtotime($row['Time_in'])); ?> -
                                    <?php echo date('h:i A', strtotime($row['Time_out'])); ?>
                                </td>
                                <!-- <td><?php echo $row['Time_in']; ?>:<?php echo $row['Time_out']; ?></td> -->
                                <td class="align-middle">
                                    <div class="day">
                                        <?php echo $row['Monday']; ?>
                                    </div>
                                </td>
                                <td class="align-middle"><?php echo $row['Tuesday']; ?></td>
                                <td class="align-middle"><?php echo $row['Wednesday']; ?></td>
                                <td class="align-middle"><?php echo $row['Thursday']; ?></td>
                                <td class="align-middle"><?php echo $row['Friday']; ?></td>
                                <td class="align-middle">
                                    <!-- <form action="report_sch.php" method="POST">
                                        <button type="submit" name="export_pdf" title="PDF"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-pdf text-danger ml-1" style=" font-size: 18px;"></i>
                                            <input type="hidden" name="classname" value="<?= $row['Class_name']; ?>">
                                        </button>
                                        <button type="submit" name="export_excel" title="Excel"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-excel text-success ml-2"
                                                style=" font-size: 18px;"></i></button>


                                    </form> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else {
                        echo '<tr><td colspan="7" style="text-align:center;">គ្មានទិន្នន័យ</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card -->
    </div>

    <!-- /.row -->
</section>
</div>
<?php include_once "footer.php"; ?>