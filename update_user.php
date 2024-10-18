<?php
include "connection.php";

if (isset($_POST['btnsave'])) {
    if (isset($_GET['user_id'])) {
        $sql = "UPDATE tb_login SET Username=:Username, Password=:Password, Role=:Role WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Username", $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $_POST['password'], PDO::PARAM_STR);
        $stmt->bindParam(":Role", $_POST['role'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $_GET['user_id'], PDO::PARAM_INT);
        $stmt->execute();
    }
    if ($stmt->rowCount()) {
        header('Location: user_info.php');
        exit;
    }
}

if (isset($_GET['user_id'])) {
    $sql = "SELECT * FROM tb_login WHERE id=:id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $_GET['user_id'], PDO::PARAM_INT);
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
                <h1 class="m-0">|Edit User</h1>
            </div>
            <!-- /.col -->

        </div>
    </div>
    <div class="m-4 card">
        <form name="teacherform" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append mx-2">
                                    <div class="input-group-text">
                                        <span class="mx-2">Username:</span>
                                    </div>
                                </div>
                                <input type="text" id="username" class="form-control" name="username"
                                    value="<?php echo !isset($data) ? '' : $data['Username']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append mx-2">
                                    <div class="input-group-text">
                                        <span class="mx-2">Password:</span>
                                    </div>
                                </div>
                                <input type="text" id="password" class="form-control" name="password"
                                    value="<?php echo !isset($data) ? '' : $data['Password']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-append mx-2">
                                    <div class="input-group-text">
                                        <span class="mx-2">Role:</span>
                                    </div>
                                </div>
                                <select name="role" id="role" class="form-control">
                                    <option selected disabled>--select role--</option>
                                    <option value="admin"
                                        <?php echo !isset($data) ? '' : ($data['Role'] == 'admin' ? 'selected' : ''); ?>>
                                        Admin</option>
                                    <option value="user"
                                        <?php echo !isset($data) ? '' : ($data['Role'] == 'user' ? 'selected' : ''); ?>>
                                        User</option>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnsave">Save</button>
            </div>
        </form>
    </div>
    </div>
    <!-- /.modal-dialog -->
    </div>

</section>


<?php include_once "footer.php"; ?>