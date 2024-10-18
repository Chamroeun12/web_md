<?php
include_once 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch courses and teachers
$course = "SELECT * FROM tb_course";
$stmt = $conn->prepare($course);
$stmt->execute();
$Course = $stmt->fetchAll(PDO::FETCH_ASSOC);

$teacher = "SELECT * FROM tb_teacher WHERE tb_teacher.status='active ';";
$stmt = $conn->prepare($teacher);
$stmt->execute();
$Teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize variables
$status = '';
$search = '';

// Check if form is submitted via GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
    }
    if (isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
    }
}

// Fetch classes based on status
$sql = "SELECT * FROM tb_class c
        INNER JOIN tb_course co ON c.Course_id = co.id
        INNER JOIN tb_teacher t ON c.Teacher_id = t.id";

if ($status) {
    $sql .= " WHERE c.status = :status"; // Assuming 'status' is a column in tb_class
}

$sql .= " ORDER BY Class_name ASC";

$stmt = $conn->prepare($sql);
if ($status) {
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
}
$stmt->execute();
$Class = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Insert Class
if (isset($_POST['btnsave'])) {
    $sql = "INSERT INTO tb_class(Class_name, Teacher_id, Course_id, Time_in, Time_out, Shift, Start_class, End_class, status)
            VALUES(:Class_name, :Teacher_id, :co, :Time_in, :Time_out, :Shift, :Start_class, :End_class, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":Class_name", $_POST['class_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Teacher_id", $_POST['teacher_name'], PDO::PARAM_INT);
    $stmt->bindParam(":co", $_POST['co'], PDO::PARAM_INT);
    $stmt->bindParam(":Time_in", $_POST['time_in'], PDO::PARAM_STR);
    $stmt->bindParam(":Time_out", $_POST['time_out'], PDO::PARAM_STR);
    $stmt->bindParam(":Shift", $_POST['shift'], PDO::PARAM_STR);
    $stmt->bindParam(":Start_class", $_POST['start_class'], PDO::PARAM_STR);
    $stmt->bindParam(":End_class", $_POST['end_class'], PDO::PARAM_STR);
    $stmt->bindParam(":status", $_POST['status'], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
        header('Location: classroom.php');
        exit;
    }
}

// Pagination setup
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_class";
$stmt = $conn->prepare($sql);
$stmt->execute();
$temp = $stmt->fetch(PDO::FETCH_ASSOC);

$maxpage = $temp ? ceil($temp['CountRecords'] / 10) : 1;

// Fetch class details if class_id is set
if (isset($_GET['class_id'])) {
    $class_id = $_GET['class_id'];
    $sql = "SELECT * FROM tb_add_to_class atc
            JOIN tb_class c ON c.ClassID = atc.Class_id
            JOIN tb_student stu ON stu.ID = atc.Stu_id
            WHERE atc.id=:class_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include_once "header.php";
?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h2 class="m-0">|បញ្ជីថ្នាក់រៀន</h2>
            </div>
            <div class="col-sm-6">
                <h3 class="card-title float-sm-right">
                    <button type="button" class="btn1 bg-sis text-white" data-toggle="modal"
                        data-target="#modal-lg">បង្កើតថ្មី</button>
                </h3>
            </div>
        </div>
    </div>

    <!-- Pop up -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="classform" method="post" action="">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputName">ថ្នាក់</label>
                                    <input type="text" name="class_name" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">គ្រូបង្រៀន</label>
                                    <select name="teacher_name" class="form-control">
                                        <option selected disabled value="">--ជ្រើសរើស--</option>
                                        <?php foreach ($Teacher as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Kh_name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="inputName">វគ្គសិក្សា</label>
                                    <select name="co" class="form-control">
                                        <option selected disabled value="">--ជ្រើសរើស--</option>
                                        <?php foreach ($Course as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['Course_name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="">វេនសិក្សា</label>
                                    <select name="shift" class="form-control">
                                        <option value="ពេញម៉ោង">ពេញម៉ោង</option>
                                        <option value="ពេលព្រឹក">ពេលព្រឹក</option>
                                        <option value="ពេលរសៀល">ពេលរសៀល</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mt-3">
                                    <label for="inputName">ម៉ោងចូល</label>
                                    <input type="text" name="time_in" class="form-control">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputName">ម៉ោងចេញ</label>
                                    <input type="text" name="time_out" class="form-control">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputStatus">កាលបរិច្ឆេទចាប់ផ្ដើម</label>
                                    <input type="date" name="start_class" class="form-control"> <!-- Fixed name here -->
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="pob">កាលបរិច្ឆេទបញ្ចប់</label>
                                    <input type="date" name="end_class" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">ស្ថានភាព</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="disable">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">បោះបង់</button>
                        <input type="submit" value="រក្សាទុក" name="btnsave" class="btn1 bg-sis text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="form-group" style="width: 300px;">
                            <input type="text" name="namesearch" class="search form-control float-right"
                                placeholder="ស្វែងរក">
                        </div>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"
                        style="float: right; margin-right: 10px;">
                        <input type="hidden" name="search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <select name="status" onchange="this.form.submit()" class="form-select custom-select"
                            style="width: 250px;">
                            <option value="" <?php echo ($status == '') ? 'selected' : ''; ?>>ទាំងអស់</option>
                            <option value="active" <?php echo ($status === 'active') ? 'selected' : ''; ?>>Active
                            </option>
                            <option value="disable" <?php echo ($status === 'disable') ? 'selected' : ''; ?>>Disable
                            </option>
                        </select>
                    </form>
                </div>

                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" id="userTbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ថ្នាក់</th>
                                <th>គ្រូបង្រៀន</th>
                                <th>វគ្គសិក្សា</th>
                                <th>ម៉ោងចូល</th>
                                <th>ម៉ោងចេញ</th>
                                <th>កាលបរិច្ឆេទចាប់ផ្ដើម</th>
                                <th>កាលបរិច្ឆេទបញ្ចប់</th>
                                <th>វេនសិក្សា</th>
                                <th>ស្ថានភាព</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($Class)) { ?>
                        <tr>
                            <td colspan="11" class="text-center">No records found</td>
                        </tr>
                        <?php } else { ?>
                            <?php $i = 1; foreach ($Class as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($row['Class_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['Kh_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['Course_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['Time_in']); ?></td>
                                <td><?php echo htmlspecialchars($row['Time_out']); ?></td>
                                <td><?php echo htmlspecialchars($row['Start_class']); ?></td>
                                <td><?php echo htmlspecialchars($row['End_class']); ?></td>
                                <td><?php echo htmlspecialchars($row['Shift']); ?></td>
                                <td>
                                    <?php if ($row['status'] == 'active') { ?>
                                    <span class="badge badge-success">Active</span>
                                    <?php } else { ?>
                                    <span class="badge badge-danger">Disable</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="report_data.php" method="POST">

                                        <button type="submit" name="export_pdf" title="PDF"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-pdf text-danger ml-1" style=" font-size: 18px;"></i>
                                            <input type="hidden" name="classname" value="<?=$row['Class_name']; ?>">
                                        </button>
                                        <button type="submit" name="export_excel" title="Excel"
                                            style="border:none; background: transparent; padding:0px;"><i
                                                class="fa fa-file-excel text-success ml-1"
                                                style=" font-size: 18px;"></i></button>

                                        <span class="dropstart">
                                            <i class="nav-icon fas fa-ellipsis-v text-info ml-2" style=" font-size:
                                        18px; cursor:pointer;" data-toggle="dropdown"></i>
                                            <div class="dropdown-menu">
                                                <a href="classroom.php?class_id=<?php echo $row['ClassID']; ?>"
                                                    class="dropdown-item"><i class="fas fa-edit text-success mr-2"
                                                        style=" font-size: 18px;"></i>កែប្រែ</a>
                                                <a href="all_condition.php?delete_class_id=<?php echo $row['ClassID']; ?>"
                                                    class="dropdown-item"><i class="fas fa-trash text-danger mr-2"
                                                        style=" font-size: 18px;"></i>លុប</a>
                                            </div>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>
