<?php
include_once 'connection.php';
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle insert (Add new teacher)
if (isset($_POST['btnsave'])) {
    $sql = "INSERT INTO tb_teacher(En_name, Kh_name, Staff_code, Gender, DOB, Position, Address, Phone, Nation, Ethnicity, Status)
    VALUES(:En_name, :Kh_name, :Staff_code, :Gender, :DOB, :Position, :Address, :Phone, :Nation, :Ethnicity, :Status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":Kh_name", $_POST['Kh_name'], PDO::PARAM_STR);
    $stmt->bindParam(":En_name", $_POST['En_name'], PDO::PARAM_STR);
    $stmt->bindParam(":Staff_code", $_POST['code'], PDO::PARAM_STR);
    $stmt->bindParam(":Gender", $_POST['gender'], PDO::PARAM_STR);
    $stmt->bindParam(":DOB", $_POST['dob'], PDO::PARAM_STR);
    $stmt->bindParam(":Position", $_POST['position'], PDO::PARAM_STR);
    $stmt->bindParam(":Address", $_POST['address'], PDO::PARAM_STR);
    $stmt->bindParam(":Phone", $_POST['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":Nation", $_POST['nation'], PDO::PARAM_STR);
    $stmt->bindParam(":Ethnicity", $_POST['ethnicity'], PDO::PARAM_STR);
    $stmt->bindParam(":Status", $_POST['status'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        header('Location: teacher_list.php');
    }
}

// Initialize variables
$status = '';
$search = '';

// Check if filtering by status or search
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
    }
    if (isset($_GET['search'])) {
        $search = $_GET["search"];
    }
}

// Build the SQL query
$sql = "SELECT * FROM tb_teacher";
if ($status) {
    $sql .= " WHERE tb_teacher.status = :status";
}
$sql .= " ORDER BY En_name ASC";

$stmt = $conn->prepare($sql);

if ($status) {
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
}

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once "header.php"; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h3 class="m-0">|បញ្ជីព័ត៌មានគ្រូ</h3>
            </div>
            <div class="col-sm-6">
                <h3 class="card-title float-sm-right">
                    <button type="button" class="btn1 bg-sis text-white" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus iconz"></i> បញ្ចូលថ្មី
                    </button>
                </h3>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header">
                    <h3 class="card-title">|បញ្ចូលគ្រូបង្រៀនថ្មី</h3>
                </div>
                <form name="teacherform" method="post" action="">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputName">ឈ្មោះភាសាអង់គ្លេស</label>
                                    <input type="text" id="enName" name="En_name" class="form-control" value="">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputName">ឈ្មោះភាសាខ្មែរ</label>
                                    <input type="text" id="khName" name="Kh_name" class="form-control" value="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">ថ្ងៃខែឆ្នាំកំណើត</label>
                                    <input type="date" id="dob" name="dob" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label for="inputStatus">ភេទ</label>
                                    <select id="inputStatus" name="gender" class="form-control custom-select">
                                        <option selected disabled>--ជ្រើសរើស--</option>
                                        <option value="ប្រុស">ប្រុស</option>
                                        <option value="ស្រី">ស្រី</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="inputStatus">តួនាទី</label>
                                    <input type="text" name="position" class="form-control">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="inputStatus">អត្តលេខ</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="inputStatus">ជនជាតិ</label>
                                    <input type="text" name="nation" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputStatus">សញ្ជាតិ</label>
                                    <input type="text" name="ethnicity" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 mt-3">
                                    <label for="">ស្ថានភាព</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="disable">Disable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="inputDescription">អាសយដ្ឋាន</label>
                                <textarea id="inputDescription" name="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">លេខទូរស័ព្ទ</label>
                                <input type="text" id="inputPhone" name="phone" class="form-control" value="">
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
            </div>
            <div class="card-body table-responsive p-0 text-sm">
                <table class="table table-hover text-nowrap" id="userTbl">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>ឈ្មោះភាសាខ្មែរ</th>
                            <th>ឈ្មោះភាសាអង់គ្លេស</th>
                            <th>អត្តលេខ</th>
                            <th>ភេទ</th>
                            <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                            <th>តួនាទី</th>
                            <th>អាសយដ្ឋាន</th>
                            <th>លេខទូរស័ព្ទ</th>
                            <th>ស្ថានភាព</th>
                            <th>សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data)) { ?>
                        <tr>
                            <td colspan="11" class="text-center">No records found</td>
                        </tr>
                        <?php } else { ?>
                        <?php foreach ($data as $key => $value) { ?>
                        <tr>
                            <td><?php echo ($key + 1); ?></td>
                            <td><?php echo $value['Kh_name']; ?></td>
                            <td><?php echo $value['En_name']; ?></td>
                            <td><?php echo $value['Staff_code']; ?></td>
                            <td><?php echo $value['Gender']; ?></td>
                            <td><?php echo date('d-M-Y', strtotime($value['DOB'])); ?></td>
                            <td><?php echo $value['Position']; ?></td>
                            <td><?php echo $value['Address']; ?></td>
                            <td><?php echo $value['Phone']; ?></td>
                            <td>
                                <?php if ($value['status'] == 'active') { ?>
                                <span class="badge badge-success">Active</span>
                                <?php } else { ?>
                                <span class="badge badge-danger">Disable</span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="update_teacher.php?t_id=<?php echo $value['id']; ?>">
                                    <i class="fa fa-edit text-success"></i>
                                </a>
                                <a class="m-2" href="all_condition.php?t_id=<?php echo $value['id']; ?>"
                                    onclick="return confirm('Do you want to delete this record?')">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>
