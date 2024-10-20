<?php
include_once 'connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Handle Course Editing
if (isset($_GET['room_id'])) {
    $sql = "SELECT * FROM tb_classroom WHERE id =:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['room_id'], PDO::PARAM_INT);
    $stmt->execute();
    $room = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Process the update
if (isset($_POST['btnedit'])) {
            // Prepare update SQL statement
            $sql = "UPDATE tb_classroom SET Name =:Name, status =:status WHERE id =:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":Name", $_POST['Name'], PDO::PARAM_STR);
            $stmt->bindParam(":status", $_POST['status'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_GET['room_id'], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                // Redirect after update
                header("Location: room.php"); // Adjust the redirection to your course list page
                exit;
            } else {
                header("Location: room.php"); exit;
            }
    }


// Fetch subjects for dropdown
?>

<?php include_once 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Edit Course Form -->
                <div class="row mb-2 card-header">
                    <div class="col-sm-6">
                        <h3 class="m-0">|កែប្រែបន្ទប់សិក្សា</h3>
                    </div>
                </div>
            </div>
            <div class="card m-2 pb-4 pl-2">
                <form method="post" action="">
                    <div class="form-group mt-4 col-md-4">
                        <label>បន្ទប់សិក្សាសិក្សា</label>
                        <input type="text" name="Name" class="form-control" value="<?= $room['Name'] ?>" required>
                    </div>
                    <div class="col-md-3 mt-3 mb-3">
                        <label for="inputStatus">ស្ថានភាព</label>
                        <select id="inputStatus" name="status" class="form-control custom-select">
                            <option value="active" <?= ($room['status'] == 'active') ? 'selected' : ''; ?>>
                                Active
                            </option>
                            <option value="disable" <?= ($room['status'] == 'disable') ? 'selected' : ''; ?>>
                                Deactive</option>
                        </select>
                    </div>
                    <button type="submit" name="btnedit" class="btn1 bg-sis text-white ml-2">រក្សាទុក</button>
                </form>
            </div>

        </div>
    </div>
</section>


<?php include_once 'footer.php'; ?>