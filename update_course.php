<?php
include_once 'connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables
$course_to_edit = null;

// Handle Course Editing
if (isset($_GET['co_id'])) {
    $sql = "SELECT * FROM tb_course WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['co_id'], PDO::PARAM_INT);
    $stmt->execute();
    $course_to_edit = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Process the update
if (isset($_POST['btnedit'])) {
    // Validate inputs
    if (empty($_POST['cu_name']) || empty($_POST['subject']) || empty($_POST['color']) || empty($_POST['date'])) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        try {
            // Prepare update SQL statement
            $sql = "UPDATE tb_course SET Course_name = :cu_name, Color = :Color, Sub_id = :subid, Date = :date WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":cu_name", $_POST['cu_name'], PDO::PARAM_STR);
            $stmt->bindParam(":Color", $_POST['color'], PDO::PARAM_STR);
            $stmt->bindParam(":subid", $_POST['subject'], PDO::PARAM_INT);
            $stmt->bindParam(":date", $_POST['date'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $_POST['course_id'], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                // Redirect after update
                header("Location: tbl_course.php"); // Adjust the redirection to your course list page
                exit;
            } else {
                echo "<script>alert('No changes were made.');</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Fetch subjects for dropdown
$sql = "SELECT * FROM tb_subject";
$stmt = $conn->prepare($sql);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include_once 'header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row">
        <!-- Edit Course Form -->
            <?php if ($course_to_edit): ?>
                <h3>|កែប្រែវគ្គសិក្សា</h3>
                <form method="post" action="">
                    <input type="hidden" name="course_id" value="<?= $course_to_edit['id'] ?>">
                    <div class="form-group mt-4 col-4">
                        <label>វគ្គសិក្សា</label>
                        <input type="text" name="cu_name" class="form-control" value="<?= $course_to_edit['Course_name'] ?>" required>
                    </div>
                    <div class="form-group col-4">
                        <label>មុខវិជ្ជា</label>
                        <select name="subject" class="form-control" required>
                            <option value="" disabled>--ជ្រើសរើស--</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['SubID'] ?>" <?= $subject['SubID'] == $course_to_edit['Sub_id'] ? 'selected' : '' ?>><?= $subject['Subject_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label>កាលបរិច្ឆេទ</label>
                        <input type="date" name="date" class="form-control" value="<?= $course_to_edit['Date'] ?>" required>
                    </div>
                    <button type="submit" name="btnedit" class="btn1 bg-sis text-white ml-2">រក្សាទុក</button>
                </form>
            <?php else: ?>
                <p>គ្មានទិន្នន័យ</p>
            <?php endif; ?>
          </div>
        </div>
      </section>
</div>


<?php include_once 'footer.php'; ?>
