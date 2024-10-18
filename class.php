<?php
include 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch Classes
$sql = "SELECT * FROM tb_class
INNER join
    tb_course ON tb_class.course_id = tb_course.id
where Status = 'Active'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$class = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Number of records per page
$records_per_page = 15;


$sql = "SELECT * FROM tb_student  WHERE status='active' LIMIT $records_per_page";
$student = $conn->prepare($sql);
$student->execute();
$student = $student->fetchAll(PDO::FETCH_ASSOC);
// Get the current page number from the query string; default to 1 if not set
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Calculate the starting limit for the SQL query
$start_from = ($page - 1) * $records_per_page;

// Query to get the total number of records
$total_records = $conn->query("SELECT COUNT(*) FROM tb_student")->fetchColumn();

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);




// Fetch joined records
$sql = "SELECT * FROM tb_add_to_class atc
        JOIN tb_class c ON c.ClassID = atc.Class_id
        JOIN tb_student stu ON stu.ID = atc.Stu_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$joinclass = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if (isset($_POST['btnsave'])) {
    $class_id = $_POST['addclass'];
    $students = $_POST['addstu'];  // This is an array of selected students
    if (!empty($class_id) && !empty($students)) {
        foreach ($students as $student_id) {
            $sql = "INSERT INTO tb_add_to_class(Stu_id, Class_id) VALUES(:Stu_id, :Class_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":Stu_id", $student_id, PDO::PARAM_INT);
            $stmt->bindParam(":Class_id", $class_id, PDO::PARAM_INT);
            $stmt->execute();
        }
        header('Location: class.php');
        exit();
    } else {
        echo '<script>alert("Please select a class and students!")</script>';
    }
}


?>

<?php include_once 'header.php'; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h3 class="m-0">
                    |បញ្ចូលសិស្សទៅក្នុងថ្នាក់
                </h3>
            </div>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <form name="classform" method="post" action="">
                    <div class="row mt-3 ml-2">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <!-- Class selection dropdown -->
                                    <select name="addclass" class="form-control">
                                        <option value="">--ជ្រើសរើសថ្នាក់--</option>
                                        <?php foreach ($class as $row) : ?>
                                        <option value="<?= $row['ClassID']; ?>"><?= $row['Class_name']; ?> - <?= $row['Course_name']; ?> - <?= $row['Shift']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="ml-3">
                                        <!-- Submit button -->
                                        <input type="submit" value="រក្សាទុក" name="btnsave"
                                            class="btn1 bg-sis text-white">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="width: 300px;">
                                <input type="text" name="namesearch" class="search form-control float-right"
                                    placeholder="ស្វែងរក">
                            </div>
                        </div>
                    </div>
            </div>

            <div class=" card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body table-responsive p-0 text-sm">
                                            <table class="table table-hover text-nowrap" id="userTbl">
                                                <thead>
                                                    <tr>
                                                        <th>ជ្រើសរើស</th>
                                                        <th>ល.រ</th>
                                                        <th>អត្តលេខ</th>
                                                        <th>ឈ្មោះភាសាអង់គ្លេស</th>
                                                        <th>ឈ្មោះភាសាខ្មែរ</th>
                                                        <th>ភេទ</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="showdata">
                                                    <?php if (isset($student)) { ?>
                                                    <?php foreach ($student as $key => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="icheck-primary">
                                                                <input type="checkbox" name="addstu[]"
                                                                    value="<?php echo $value['ID']; ?>"
                                                                    id="check<?php echo $key; ?>">
                                                                <label for="check<?php echo $key; ?>"></label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo ($key + 1); ?></td>
                                                        <td><?php echo $value['Stu_code']; ?></td>
                                                        <td><?php echo $value['En_name']; ?></td>
                                                        <td><?php echo $value['Kh_name']; ?></td>
                                                        <td><?php echo $value['Gender']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Page -->
                                        <!-- xkjfjxfjhk -->
                                        <!-- <div>
                                            <?php if ($page > 1): ?>
                                            <a href="class.php?page=<?php echo $page - 1; ?>">Previous</a>
                                            <?php endif; ?>

                                            <?php if ($page < $total_pages): ?>
                                            <a href="class.php?page=<?php echo $page + 1; ?>">Next</a>
                                            <?php endif; ?>
                                        </div> -->





                                    </div>
                                </div>
                            </div>
                </form>
                <!-- this form table -->
            </div>

        </div>
</section>
<?php include_once 'footer.php'; ?>
