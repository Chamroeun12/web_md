<?php
include_once 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if (isset($_POST['name_search'])) {
//     $sql = "SELECT * FROM tb_student WHERE En_name LIKE '%" . $_POST['name_search'] . "' ";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// } else {
//     $sql = "SELECT * FROM tb_student";
//     if (isset($_GET['page'])) {
//         if ($_GET['page'] > 1) {
//             $sql .= " OFFSET " . ($_GET['page'] - 1) * 10;
//         }
//     }
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }


// Insert Student
if (isset($_POST['btnsave'])) {
  $file_name = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];
  $folder = 'images/' . $file_name;

  $sql = "INSERT INTO tb_student(Stu_code, En_name, Kh_name, Gender, DOB, Address, Dad_name, Mom_name, Dad_job, Mom_job, Phone, Profile_img, status)
  VALUES(:stucode, :En_name, :Kh_name, :Gender, :DOB, :Address, :Dad_name, :Mom_name, :Dad_job, :Mom_job, :Phone, :Profile_img, :status)";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":stucode", $_POST['studentcode'], PDO::PARAM_STR);
  $stmt->bindParam(":En_name", $_POST['en_name'], PDO::PARAM_STR);
  $stmt->bindParam(":Kh_name", $_POST['kh_name'], PDO::PARAM_STR);
  $stmt->bindParam(":Gender", $_POST['gender'], PDO::PARAM_STR);
  $stmt->bindParam(":DOB", $_POST['dob'], PDO::PARAM_STR);
  $stmt->bindParam(":Address", $_POST['address'], PDO::PARAM_STR);
  $stmt->bindParam(":Dad_name", $_POST['dad_name'], PDO::PARAM_STR);
  $stmt->bindParam(":Mom_name", $_POST['mom_name'], PDO::PARAM_STR);
  $stmt->bindParam(":Dad_job", $_POST['dad_job'], PDO::PARAM_STR);
  $stmt->bindParam(":Mom_job", $_POST['mom_job'], PDO::PARAM_STR);
  $stmt->bindParam(":Phone", $_POST['phone'], PDO::PARAM_STR);
  $stmt->bindParam(":status", $_POST['status'], PDO::PARAM_STR);
  $stmt->bindParam(":Profile_img", $file_name, PDO::PARAM_STR);

  // Execute and handle success/error
  if ($stmt->execute() && move_uploaded_file($tempname, $folder)) {
      $_SESSION['message'] = 'Student added successfully!';
      $_SESSION['message_type'] = 'success';
  } else {
      $_SESSION['message'] = 'Failed to add student. Please try again.';
      $_SESSION['message_type'] = 'error';
  }

  // Redirect to avoid resubmission
  header('Location: student_list.php');
  exit();
}

// Initialize variables
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
$sql = "SELECT * FROM tb_student";

if ($status) {
    $sql .= " WHERE tb_student.status = :status";
}
$sql .= " ORDER BY En_name ASC";

$stmt = $conn->prepare($sql);

if ($status) {
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
}
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


//pages
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_student";
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
                <h3 class="m-0">
                    |បញ្ជីព័ត៌មានសិស្ស</h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <h3 class="card-title float-sm-right">
                    <button type="button" class="btn1 bg-sis text-white" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-user-plus"></i> បញ្ចូលសិស្សថ្មី
                    </button>
                </h3>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>|បញ្ចូលសិស្សថ្មី</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Condition to Add or Edit student -->

                <!-- form add and edit student -->
                <form name="studentform" method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">អត្តលេខសិស្ស</label>
                                    <input type="text" name="studentcode" id="studentcode" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputName">ឈ្មោះភាសាអង់គ្លេស</label>
                                    <input type="text" id="enName" name="en_name" class="form-control" value="">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputName">ឈ្មោះភាសាខ្មែរ</label>
                                        <input type="text" id="khName" name="kh_name" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputStatus">ភេទ</label>
                                        <select id="inputStatus" name="gender" class="form-control custom-select">
                                            <option selected disabled>--ជ្រើសរើសភេទ--</option>
                                            <option value="ប្រុស"> ប្រុស</option>
                                            <option value="ស្រី">ស្រី</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputDateOfBirth">ថ្ងៃ​ខែឆ្នាំកំណើត</label>
                                        <input type="date" id="inputDateOfBirth" name="dob" class="form-control"
                                            value="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">ស្ថានភាព</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="disable">Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">ឈ្មោះឪពុក</label>
                                    <input type="text" name="dad_name" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">មុខរបរឪពុក</label>
                                    <input type="text" name="dad_job" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">ឈ្មោះម្ដាយ</label>
                                    <input type="text" name="mom_name" id="" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">មុខរបរម្ដាយ</label>
                                    <input type="text" name="mom_job" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">អាសយដ្ឋាន</label>
                            <textarea id="inputDescription" name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPhone">លេខទូរស័ព្ទ</label>
                                    <input type="text" id="inputPhone" name="phone" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail">រូបភាពសិស្ស</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/**" onchange="preview (event)">
                                      <small>
                                        <i class="icon-help-with-circle"></i>
                                        Extensions: .png, .jpg, .jpeg, .gif, .svg, .webp
                                      </small>
                                      <div style="margin-top: 9px">
                                        <img src="" alt="" id="img" width="150">

                                      </div>
                                </div>
                            </div>
                        </div>


                        <!-- <?php if ($_SESSION['role'] == "admin") { ?>
                        <?php if (isset($_GET['student_id'])) { ?>
                        <input type="submit" value="Delete" name="btndelete"
                            onclick="return confirm('Do you want to delete this record?')" class="btn btn-danger">
                        <?php } ?>
                        <?php } ?> -->
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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap" id="userTbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>រូបភាព</th>
                                <th>អត្តលេខ</th>
                                <th>ឈ្មោះភាសាអង់គ្លេស</th>
                                <th>ឈ្មោះភាសាខ្មែរ</th>
                                <th>ភេទ</th>
                                <th>ថ្ងៃខែ​ឆ្នាំកំណើត</th>
                                <th>អាសយដ្ឋាន</th>
                                <th>លេខទូរស័ព្ទ</th>
                                <th>ស្ថានភាព</th>
                                <th>សកម្មភាព</th>

                            </tr>
                        </thead>
                        <tbody id="showdata">
                            <?php foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?php
                                        if (isset($_GET['page']) && $_GET['page'] > 1)
                                            echo ($_GET['page'] - 1) * 10 + ($key + 1);
                                        else
                                            echo ($key + 1);
                                        ?></td>
                                    <td>
                                        <div class="user-panel p-0">
                                            <div class="image p-0">
                                                <img onerror="this.style.display = 'none'" class="img-circle p-0"
                                                    src="images/<?= $value['Profile_img']; ?>"
                                                    style="width: 35px; height: 35px;" />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $value['Stu_code']; ?></td>
                                <td><?php echo $value['En_name']; ?></td>
                                <td><?php echo $value['Kh_name']; ?></td>
                                <td><?php echo $value['Gender']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($value['DOB'])); ?></td>
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
                                    <a href="update_student.php?stu_id=<?php echo $value['ID'] ?>">
                                        <i class="fa fa-edit text-success"></i>
                                    </a>
                                    <a class="m-2" href="all_condition.php?stu_id=<?php echo $value['ID'] ?>"
                                        onclick="return confirm('Do you want to delete this record?')">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <!-- Previous link -->
                        <li class="page-item">
                            <a class="page-link" href="student_list.php?page=<?php echo isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] - 1 : 1; ?>">&laquo;</a>
                        </li>

                        <!-- Page links -->
                        <?php for ($i = 1; $i <= $maxpage; $i++): ?>
                            <li class="page-item <?php echo isset($_GET['page']) && $_GET['page'] == $i ? 'active' : ''; ?>">
                                <a class="page-link" href="student_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next link -->
                        <li class="page-item">
                            <a class="page-link" href="student_list.php?page=<?php echo isset($_GET['page']) && $_GET['page'] < $maxpage ? $_GET['page'] + 1 : $maxpage; ?>">&raquo;</a>
                        </li>
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

<script>
function preview(evt) {
    let img = document.getElementById('img');
    img.src = URL.createObjectURL(evt.target.files[0]);
}
</script>
<?php include_once "footer.php"; ?>
