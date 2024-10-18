<?php
include "connection.php";

if (isset($_POST['btnsave'])) {
  if (isset($_GET['stu_id'])) {
      $file_name = $_FILES['image']['name'];
      $tempname = $_FILES['image']['tmp_name'];
      $folder = 'images/' . $file_name;
      $upload_success = false;

      // Validate and upload image
      if ($file_name) {
          $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
          if (in_array($_FILES['image']['type'], $allowed_types) && $_FILES['image']['size'] <= 500000) {
              $upload_success = move_uploaded_file($tempname, $folder);
          } else {
              $_SESSION['message'] = "Invalid file type or size too large.";
              $_SESSION['message_type'] = "error";
              header('Location: edit_student.php?stu_id=' . $_GET['stu_id']);
              exit;
          }
      } else {
          // No new image uploaded
          $sql_current = "SELECT Profile_img FROM tb_student WHERE ID=:ID";
          $stmt_current = $conn->prepare($sql_current);
          $stmt_current->bindParam(":ID", $_GET['stu_id'], PDO::PARAM_INT);
          $stmt_current->execute();
          $current_data = $stmt_current->fetch(PDO::FETCH_ASSOC);
          $file_name = $current_data['Profile_img'];
      }

      // Prepare and execute the update statement
      $sql = "UPDATE tb_student SET
                  Stu_code=:Stu_code,
                  En_name=:En_name,
                  Kh_name=:Kh_name,
                  Gender=:Gender,
                  DOB=:DOB,
                  Address=:Address,
                  Status=:Status,
                  Dad_name=:Dad_name,
                  Mom_name=:Mom_name,
                  Dad_job=:Dad_job,
                  Mom_job=:Mom_job,
                  Phone=:Phone,
                  Profile_img=:Profile
              WHERE ID=:ID";

      $stmt = $conn->prepare($sql);
      $stmt->bindParam(":Stu_code", $_POST['code'], PDO::PARAM_STR);
      $stmt->bindParam(":En_name", $_POST['en_name'], PDO::PARAM_STR);
      $stmt->bindParam(":Kh_name", $_POST['kh_name'], PDO::PARAM_STR);
      $stmt->bindParam(":Gender", $_POST['gender'], PDO::PARAM_STR);
      $stmt->bindParam(":DOB", $_POST['dob'], PDO::PARAM_STR);
      $stmt->bindParam(":Address", $_POST['address'], PDO::PARAM_STR);
      $stmt->bindParam(":Status", $_POST['status'], PDO::PARAM_STR);
      $stmt->bindParam(":Dad_name", $_POST['dad_name'], PDO::PARAM_STR);
      $stmt->bindParam(":Mom_name", $_POST['mom_name'], PDO::PARAM_STR);
      $stmt->bindParam(":Dad_job", $_POST['dad_job'], PDO::PARAM_STR);
      $stmt->bindParam(":Mom_job", $_POST['mom_job'], PDO::PARAM_STR);
      $stmt->bindParam(":Phone", $_POST['phone'], PDO::PARAM_STR);
      $stmt->bindParam(":Profile", $file_name, PDO::PARAM_STR);
      $stmt->bindParam(":ID", $_GET['stu_id'], PDO::PARAM_INT);
      $stmt->execute();

      // Redirect with a success message
      if ($stmt->rowCount() || $upload_success) {
          $_SESSION['message'] = "Student updated successfully.";
          $_SESSION['message_type'] = "success";
      } else {
          $_SESSION['message'] = "No changes made or error occurred.";
          $_SESSION['message_type'] = "error";
      }
      header('Location: student_list.php');
      exit;
  }
}

// Fetch student details for editing
if (isset($_GET['stu_id'])) {
    $sql = "SELECT * FROM tb_student WHERE ID=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET['stu_id'], PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$data) {
        die("Cannot find student with this ID.");
    }
}
?>

<?php include_once "header.php"; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h3 class="m-0">|កែប្រែព័ត៌មានសិស្ស</h3>
            </div>
        </div>
    </div>
    <div class="m-4 card">
        <form name="studentform" method="post" action="" enctype="multipart/form-data"
            style="font-family:Khmer OS Siemreap;">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="code">អត្តលេខ</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="<?= htmlspecialchars($data['Stu_code']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="enName">ឈ្មោះភាសាអង់គ្លេស</label>
                            <input type="text" id="enName" name="en_name" class="form-control"
                                value="<?= htmlspecialchars($data['En_name']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="khName">ឈ្មោះភាសាខ្មែរ</label>
                            <input type="text" id="khName" name="kh_name" class="form-control"
                                value="<?= htmlspecialchars($data['Kh_name']); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label for="inputStatus">ភេទ</label>
                            <select id="inputStatus" name="gender" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option value="ប្រុស" <?= ($data['Gender'] == 'ប្រុស') ? 'selected' : ''; ?>>ប្រុស
                                </option>
                                <option value="ស្រី" <?= ($data['Gender'] == 'ស្រី') ? 'selected' : ''; ?>>ស្រី
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputDateOfBirth">ថ្ងៃខែ​ឆ្នាំកំណើត</label>
                            <input type="date" id="inputDateOfBirth" name="dob" class="form-control"
                                value="<?= htmlspecialchars($data['DOB']); ?>">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputPhone">លេទទូរស័ព្ទ</label>
                            <input type="text" id="inputPhone" name="phone" class="form-control"
                                value="<?= htmlspecialchars($data['Phone']); ?>">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputStatus">ស្ថានភាព</label>
                            <select id="inputStatus" name="status" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option value="Active" <?= ($data['Status'] == 'Active') ? 'selected' : ''; ?>>
                                    Active
                                </option>
                                <option value="Deactive" <?= ($data['Status'] == 'Deactive') ? 'selected' : ''; ?>>
                                    Deactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 mt-3">
                                <label for="dad_name">ឈ្មោះឪពុក</label>
                                <input type="text" name="dad_name" class="form-control"
                                    value="<?= htmlspecialchars($data['Dad_name']); ?>">
                            </div>
                            <div class="col-sm-3 mt-3">
                                <label for="dad_job">មុខរបរឪពុក</label>
                                <input type="text" name="dad_job" class="form-control"
                                    value="<?= htmlspecialchars($data['Dad_job']); ?>">
                            </div>
                            <div class="col-sm-3 mt-3">
                                <label for="mom_name">ឈ្មោះម្ដាយ</label>
                                <input type="text" name="mom_name" class="form-control"
                                    value="<?= htmlspecialchars($data['Mom_name']); ?>">
                            </div>
                            <div class="col-sm-3 mt-3">
                                <label for="mom_job">មុខរបរម្ដាយ</label>
                                <input type="text" name="mom_job" class="form-control"
                                    value="<?= htmlspecialchars($data['Mom_job']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">អាសយដ្ឋាន</label>
                        <textarea id="inputDescription" name="address" class="form-control"
                            rows="2"><?= htmlspecialchars($data['Address']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">រូបភាព</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="preview(event)">
                        <div style="margin-top: 9px">
                            <img src="images/<?= htmlspecialchars($data['Profile_img']); ?>" alt="" id="img"
                                width="100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn bg-danger">
                    <a href="student_list.php">បោះបង់</a>
                </button>
                <input type="submit" value="រក្សាទុក" name="btnsave" class="btn1 bg-sis text-white">
            </div>
        </form>
    </div>
</section>

<script>
function preview(evt) {
    let img = document.getElementById('img');
    img.src = URL.createObjectURL(evt.target.files[0]);
}
</script>

<?php include_once "footer.php"; ?>
