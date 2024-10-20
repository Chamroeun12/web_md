<?php
include 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize variables for selected class, class date, and student info
$selected_class = '';
$class_date = date('Y-m-d');
$students_info = [];
$msg = '';

// Fetch all active classes for the dropdown
// Fetch Classes
$sql = "SELECT * FROM tb_class WHERE Status = 'Active'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM tb_teacher";
$stmt = $conn->prepare($sql);
$stmt->execute();
$teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

$toastr_script = ''; // This will hold our toastr notifications script
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    $class_id = $_POST['classid'] ?? null;
    $start_date = $_POST['sch_start'] ?? null;
    $end_date = $_POST['sch_end'] ?? null;
    $schedule_items = $_POST['item'] ?? [];

    $errors = [];

    // Validation of inputs
    if (empty($class_id)) {
        $errors[] = "Class ID is required.";
    }
    if (empty($start_date)) {
        $errors[] = "Start Date is required.";
    }
    if (empty($end_date)) {
        $errors[] = "End Date is required.";
    }
    if (empty($schedule_items)) {
        $errors[] = "At least one schedule item is required.";
    }

    // If no errors, process the form
    if (empty($errors)) {
        try {
            // Start a transaction
            $conn->beginTransaction();

            // Insert each schedule item into the database
            for ($i = 0; $i < count($schedule_items); $i += 8) {
                $teacher_id = $schedule_items[$i] ?? null;
                $start_time = $schedule_items[$i + 1] ?? null;
                $end_time = $schedule_items[$i + 2] ?? null;
                $field1 = $schedule_items[$i + 3] ?? null; // Extra fields
                $field2 = $schedule_items[$i + 4] ?? null;
                $field3 = $schedule_items[$i + 5] ?? null;
                $field4 = $schedule_items[$i + 6] ?? null;
                $field5 = $schedule_items[$i + 7] ?? null;

                if ($teacher_id && $start_time && $end_time) {
                    // Prepare SQL to insert schedule
                    $sql = "INSERT INTO tb_sch_student (Class_id, teacher_id, Start_class, End_class, Time_in, Time_out, Monday, Tuesday, Wednesday, Thursday, Friday)
                            VALUES (:classid, :teacher_id, :start_date, :end_date, :start_time, :end_time, :field1, :field2, :field3, :field4, :field5)";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        ':classid' => $class_id,
                        ':teacher_id' => $teacher_id,
                        ':start_date' => $start_date,
                        ':end_date' => $end_date,
                        ':start_time' => $start_time,
                        ':end_time' => $end_time,
                        ':field1' => $field1,
                        ':field2' => $field2,
                        ':field3' => $field3,
                        ':field4' => $field4,
                        ':field5' => $field5
                    ]);
                }
            }

            // Commit transaction
            $conn->commit();
            $toastr_script = "<script>toastr.success('Schedule added successfully!');</script>";
        } catch (Exception $e) {
            $conn->rollBack();  // Rollback on error
            $errors[] = "Failed to add schedule: " . $e->getMessage();
            $toastr_script = "<script>toastr.error('Failed to add schedule. Please try again.');</script>";
        }
    }
}


?>
<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <form action="" method="POST">
        <div class="col-sm-6 pt-3 mb-3 ml-3">
            <h3>|បញ្ចូលកាលវិភាគ</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div id="msg">
                    <?php if (isset($msg)) echo $msg; ?>
                </div>
                <div class="card mb-3">
                    <div class="card-body rounded-0">
                        <div class="container-fluid">
                            <div class="row align-items-end">
                                <div class="col-sm-4">
                                    <label for="Class_id" class="form-label">សម្រាប់ថ្នាក់</label>
                                    <select name="classid" id="Class_id" class="form-control" style="font-size:14px;">
                                        <option value="">--ជ្រើសរើសថ្នាក់--</option>
                                        <?php foreach ($classes as $row) : ?>
                                        <option value="<?= htmlspecialchars($row['ClassID'], ENT_QUOTES, 'UTF-8'); ?>">
                                            <?= htmlspecialchars($row['Class_name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="class_date" class="form-label">ចាប់ផ្តើម</label>
                                    <input type="date" name="sch_start" id="sch_start" class="form-control"
                                        style="font-size:14px;" value="">
                                </div>
                                <div class="col-sm-4">
                                    <label for="class_date" class="form-label">បញ្ចប់</label>
                                    <input type="date" name="sch_end" id="sch_end" class="form-control"
                                        style="font-size:14px;" value="">
                                </div>
                                <!-- <div class="col-sm-2">
                                    <label for="">&nbsp;</label>
                                    <div class="ml-2">
                                        <input type="hidden" name="action" value="show">
                                        <input type="submit" value="Show" name="btnsave" class="btn1 bg-sis text-white">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-1 pt-2">
            <div id="itemContainer" class="p-2">
                <div class="row input-group">
                    <div class="form-group mb-2 col-md-4">
                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <input type="time" class="form-control" name="item[]">

                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <input type="time" class="form-control" name="item[]">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group-append col-md-2">
                        <button class="btn btn-danger removeItem" type="button">យកចេញ</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 m-0"></div>
                <div class="col-md-2 m-0">
                    <button type="button" class="btn btn-primary" id="addItem">ថែមថ្មី</button>
                </div>
                <div class="col-md-2 m-0">
                    <input type="submit" name="submit" class="btn1 bg-sis text-white" value="រក្សាទុក">
                </div>
            </div>
            <!-- <input type="text" name="test" class="form-control"> -->

            <div id="response" class="mt-3"></div>

    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // Add new input field
        $('#addItem').click(function() {
            $('#itemContainer').append(`<div id="itemContainer">
                <div class="row input-group">
                    <div class="form-group mb-2 col-md-4">
                        <select name="item[]" id="teacher" class="form-control">
                            <option selected disabled>--Select Teacher--</option>
                            <?php foreach ($teacher as $key => $value) { ?>
                            <option value="<?= $value['id']; ?>"><?= $value['En_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <input type="time" class="form-control" name="item[]">

                    </div>
                    <div class="form-group mb-2 col-md-4">
                        <input type="time" class="form-control" name="item[]">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group mb-2 col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" name="item[]" placeholder="Add day">

                    </div>
                    <div class="form-group-append col-md-2">
                        <button class="btn btn-danger removeItem" type="button">Remove</button>
                    </div>
                </div>
            </div>`);
        });

        // Remove an input field
        $(document).on('click', '.removeItem', function() {
            $(this).closest('.input-group').remove();
        });

        // Handle form submission
        $('#itemForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#response').html(response);
                    $('#itemContainer').html(`
                            <form method="post" action="">
            <div class="row input-group">
                <div class="form-group mb-2 col-md-2">
                <select name="item[]" id="teacher" class="form-control">
    <option selected disabled>--Select Teacher--</option>
    <?php foreach ($teacher as $key => $value) { ?>
        <option value="<?= $value['id']; ?>"><?= $value['En_name']; ?></option>
    <?php } ?>
</select>
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="time" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="time" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="text" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="text" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="text" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group mb-2 col-md-1">
                    <input type="text" class="form-control" name="item[]" >
                    
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" name="item[]" >
                    
                </div>
                <div class="input-group-append col-md-1">
                        <button class="btn btn-danger removeItem" type="button">Remove</button>
                </div>
            </div>
                </form>
                        `); // Reset the form
                }
            });
        });
    });
    </script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Config -->
    <script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000",
    };
    </script>
</section>

<!-- Inject toastr script based on PHP validation -->
<?php echo $toastr_script; ?>
<?php include_once "footer.php"; ?>