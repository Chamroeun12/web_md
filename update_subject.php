<?php
include "connection.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['btnsave'])) {
    if (isset($_GET['sub_id'])) {
        $sql = "UPDATE tb_subject SET Subject_name=:name, Color=:color WHERE SubID=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $_POST['sub_name'], PDO::PARAM_STR);
        $stmt->bindParam(":color", $_POST['color'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $_GET['sub_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
    if ($stmt->rowCount()) {
        header('Location: subject.php');
        exit;
    }
}

if (isset($_GET['sub_id'])) {
    $sql = "SELECT * FROM tb_subject WHERE SubID=:id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET['sub_id'], PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$data) {
        die("Can not find User with this ID.");
    }
}
?>
<?php include_once "header.php"; ?>
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h2 class="m-0">|Edit Subject</h2>
            </div>
            <!-- /.col -->

        </div>
    </div>
    <div class="m-4 card">
        <form name="subjectForm" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputName">Subject Name</label>
                            <input type="text" id="subName" name="sub_name" class="form-control"
                                value="<?php echo !isset($data) ? '' : $data['Subject_name']; ?>">
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputStatus">Color</label>
                                <select id="" name="color" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    <option value="bg-primary"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-primary' ? 'selected' : ''); ?>>
                                        Primary</option>
                                    <option value="bg-secondary"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-secondary' ? 'selected' : ''); ?>>
                                        Secondary</option>
                                    <option value="bg-success"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-success' ? 'selected' : ''); ?>>
                                        Success</option>
                                    <option value="bg-danger"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-danger' ? 'selected' : ''); ?>>
                                        Danger</option>
                                    <option value="bg-warning"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-warning' ? 'selected' : ''); ?>>
                                        Warning</option>
                                    <option value="bg-info"
                                        <?php echo !isset($data) ? '' : ($data['Color'] == 'bg-info' ? 'selected' : ''); ?>>
                                        Info</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="subject.php" class="btn btn-danger">Close</a>
                <input type="submit" value="Save" name="btnsave" class="btn btn-success">
                <!-- <button type="button" class="btn btn-primary">Save</button> -->
            </div>
        </form>
    </div>
    </div>
    <!-- /.modal-dialog -->
    </div>

</section>


<?php include_once "footer.php"; ?>