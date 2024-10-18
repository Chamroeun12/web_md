<?php
include 'connection.php';
//start seesion
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $role = htmlspecialchars(trim($_POST['role']));

    // Hash the password before storing
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = $conn->prepare("INSERT INTO tb_login (Username, Password, Role) VALUES (:uname, :pwd, :role)");
    $sql->bindParam(':uname', $username, PDO::PARAM_STR);
    $sql->bindParam(':pwd', $password, PDO::PARAM_STR);
    $sql->bindParam(':role', $role, PDO::PARAM_STR);

    if ($sql->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error during registration.";
    }
}


$sql = "SELECT * FROM tb_login LIMIT 10";
if (isset($_GET['page'])) {
    if ($_GET['page'] > 1) {
        $sql .= " OFFSET " . ($_GET['page'] - 1) * 10;
    }
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Insert User






// if (isset($_POST['btnsave'])) {
//     $sql = "INSERT INTO tb_login(Username,Password,Role)
//     VALUES(:Username, :Password, :Role)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(":Username", $_POST['username'], PDO::PARAM_STR);
//     $stmt->bindParam(":Password", $_POST['password'], PDO::PARAM_STR);
//     $stmt->bindParam(":Role", $_POST['role'], PDO::PARAM_STR);
//     $stmt->execute();
//     if ($stmt->rowCount()) {
//         header('Location: user_info.php');
//     }
// }
// if (isset($_POST['btnsave'])) {
//     // Hash the password before storing it
//     $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     // Prepare the SQL statement
//     $sql = "INSERT INTO tb_login (Username, Password, Role)
//             VALUES (:Username, :Password, :Role)";
//     $stmt = $conn->prepare($sql);

//     // Bind parameters
//     $stmt->bindParam(":Username", $_POST['username'], PDO::PARAM_STR);
//     $stmt->bindParam(":Password", $hashedPassword, PDO::PARAM_STR); // Use hashed password
//     $stmt->bindParam(":Role", $_POST['role'], PDO::PARAM_STR);

//     // Execute the statement and check for success
//     try {
//         $stmt->execute();
//         if ($stmt->rowCount()) {
//             header('Location: user_info.php');
//             exit();
//         } else {
//             // Handle case where no rows were affected
//             echo "User registration failed.";
//         }
//     } catch (PDOException $e) {
//         // Handle error during execution
//         echo "Error: " . $e->getMessage();
//     }
// }


//Count Page
$sql  = "SELECT COUNT(*) AS CountRecords FROM tb_login";
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
                <h3 class="m-0">|បញ្ជីអ្នកប្រើប្រាស់</h3>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <h3 class="card-title float-sm-right">
                    <button type="button" class="btn1 bg-sis text-white" data-toggle="modal" data-target="#modal-lg">
                        បញ្ចូលថ្មី
                    </button>
                </h3>
            </div>
            <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div> -->
            <!-- /.col -->
        </div>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- form card-header -->
                <div class="card-header">
                    <h3 class="card-title">|បញ្ជូលអ្នកប្រើប្រាស់</h3>
                </div>
                <!-- Condition to Add or Edit student -->

                <!-- form add student -->
                <form name="userForm" method="post" action="">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append mx-2">
                                            <div class="input-group-text">
                                                <span class="mx-2">ឈ្មោះអ្នកប្រើប្រាស់</span>
                                            </div>
                                        </div>
                                        <input type="text" id="username" class="form-control" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append mx-2">
                                            <div class="input-group-text">
                                                <span class="mx-2">ពាក្យសម្ងាត់</span>
                                            </div>
                                        </div>
                                        <input type="text" id="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append mx-2">
                                            <div class="input-group-text">
                                                <span class="mx-2">Role</span>
                                            </div>
                                        </div>
                                        <select name="role" id="role" class="form-control">
                                            <option selected disabled>--ជ្រើសរើស--</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                        <!-- <input type="text" id="role" class="form-control" name="role"> -->
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-8">
                                    <span>Username</span>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            value="">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <label for="">Role</label>
                                    <input type="text" id="role" name="role" class="form-control" value="">
                                </div>
                            </div> -->

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
                        <button type="submit" class="btn1 bg-sis text-white" name="btnsave">រក្សាទុក</button>
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
                    <!-- <h3 class="card-title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                            Add
                        </button>
                    </h3> -->
                    <div class="card-tools">
                        <div class="form-group" style="width: 300px;">
                            <input type="text" id="" name="namesearch" class="search form-control float-right"
                                placeholder="ស្វែងរក" >
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 text-sm">
                    <table class="table table-hover text-nowrap"  id="userTbl">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>ឈ្មោះអ្នកប្រើប្រាស់</th>
                                <th>Role</th>
                                <th rowspan="2">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?php
                                        if (isset($_GET['page']) && $_GET['page'] > 1)
                                            echo ($_GET['page'] - 1) * 10 + ($key + 1);
                                        else
                                            echo ($key + 1);
                                        ?></td>
                                    <td><?php echo $value['Username']; ?></td>
                                    <td><?php echo $value['Role']; ?></td>
                                    <td>
                                        <a href="update_user.php?user_id=<?php echo $value['id'] ?>">
                                            <i class="fa fa-edit text-success"></i>
                                        </a>
                                        <a class="m-2" href="all_condition.php?user_id=<?php echo $value['id'] ?>"
                                            onclick="return confirm('Do you want to delete this record?')">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                        <a href="">
                                            <i class="nav-icon fas fa-ellipsis-h"></i>
                                        </a>
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
                            <li class="page-item"><a class="page-link" href="user_info.php?page=
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
                        ?>">
                                    <a class="page-link" href="user_info.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="user_info.php?page=
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
