<?php
include_once 'connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetch subjects
$sql = "SELECT * FROM tb_sub_type ORDER BY id ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch courses
$sql = "SELECT * FROM tb_course";
$stmt = $conn->prepare($sql);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get class ID from URL
$class_id = $_GET['class_id'];

// Fetch students based on class ID
$sql = "SELECT * FROM tb_add_to_class ad
INNER JOIN tb_class c ON ad.Class_id = c.ClassID
INNER JOIN tb_student stu ON ad.Stu_id = stu.ID
WHERE ad.Class_id = '$class_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch class information for the selected class ID
if (isset($_GET['class_id'])) {
    $sql = "SELECT * FROM tb_class WHERE ClassID = :class_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt->execute();
    $class = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Handle score submission
if (isset($_POST['btnsave'])) {
  $for_month = $_POST['for_month'];
  $scores = $_POST['scorebox'];

  foreach ($scores as $student_id => $student_scores) {
      foreach ($subjects as $subject) {
          $subject_name = $subject['name'];
          $score = (int) $student_scores[$subject_name];

          // Prepare the SQL statement with parameters
          $sql = "INSERT INTO tb_month_score (Stu_id, Class_id, Homework, Participation, Attendance, Monthly, Average, for_month, Status, Create_at)
                  VALUES (:student_id, :class_id, :homework, :participation, :attendance, :monthly, :average, :for_month, 'Active', NOW())";
          $stmt = $conn->prepare($sql);

          // Bind parameters
          $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
          $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT); // Ensure this is bound correctly
          $homework = $score;
          $participation = $score;
          $attendance = $score;
          $monthly = $score;

          // Calculate the average
          $average = ($homework * 0.40) + ($participation * 0.10) + ($attendance * 0.10) + ($monthly * 0.40);

          // Bind all necessary parameters
          $stmt->bindParam(':homework', $homework, PDO::PARAM_STR);
          $stmt->bindParam(':participation', $participation, PDO::PARAM_STR);
          $stmt->bindParam(':attendance', $attendance, PDO::PARAM_STR);
          $stmt->bindParam(':monthly', $monthly, PDO::PARAM_STR);
          $stmt->bindParam(':average', $average, PDO::PARAM_STR);
          $stmt->bindParam(':for_month', $for_month, PDO::PARAM_STR); // Ensure this is bound correctly

          // Execute the query
          $stmt->execute();
      }
  }

  // echo "Scores saved successfully!";
}
?>

<?php include_once 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>| តារាងបញ្ចូលពិន្ទុ</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Combine the form for selecting the month and the score form into one -->
                            <form action="score_list.php" method="POST" >
                                <div class="row mb-2">
                                    <div class="col-sm-5">
                                        <label for="for_month">បញ្ចូលសម្រាប់ខែ</label>
                                        <select name="for_month" id="for_month" class="form-control" style="font-size:14px;" required>
                                            <option selected disabled>-- ជ្រើសរើសខែ --</option>
                                            <option value="First Month">ប្រចាំខែទី១</option>
                                            <option value="Second Month">ប្រចាំខែទី២</option>
                                            <option value="Third Month">ប្រចាំខែទី៣</option>
                                            <option value="Fourth Month">ប្រចាំខែទី៤</option>
                                            <option value="Fifth Month">ប្រចាំខែទី៥</option>
                                            <option value="Sixth Month">ប្រចាំខែទី៦</option>
                                            <option value="Seventh Month">ប្រចាំខែទី៧</option>
                                            <option value="Eighth Month">ប្រចាំខែទី៨</option>
                                            <option value="Ninth Month">ប្រចាំខែទី៩</option>
                                            <option value="Tenth Month">ប្រចាំខែទី១០</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Student Scores Table -->
                                <div class="card-body p-0">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ល.រ</th>
                                                <th>ឈ្មោះសិស្ស</th>
                                                <th>ភេទ</th>
                                                <?php foreach ($subjects as $subject): ?>
                                                <th class="text-center"><?php echo $subject['name']; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($students as $key => $student): ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $student['En_name']; ?></td>
                                                <td><?php echo $student['Gender']; ?></td>
                                                <?php foreach ($subjects as $subject): ?>
                                                <td style="padding:0px">
                                                    <input type="number" class="form-control text-center"
                                                        name="scorebox[<?php echo $student['ID']; ?>][<?php echo $subject['name']; ?>]"
                                                        placeholder="0-100" min="0" max="100" required>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" value="Save Scores" name="btnsave" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include_once 'footer.php'; ?>
