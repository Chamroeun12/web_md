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
$sql = "SELECT * FROM tb_class
INNER join
    tb_course ON tb_class.course_id = tb_course.id
where Status = 'Active'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);







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
                                    <select name="Class_id" id="Class_id" class="form-control" style="font-size:14px;">
                                        <option value="">--ជ្រើសរើសថ្នាក់--</option>
                                        <?php foreach ($classes as $row) : ?>
                                        <option value="<?= htmlspecialchars($row['ClassID'], ENT_QUOTES, 'UTF-8'); ?>"
                                            <?= ($row['ClassID'] == $selected_class) ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($row['Class_name'], ENT_QUOTES, 'UTF-8'); ?> -
                                            <?= $row['Course_name']; ?> - <?= $row['Shift']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="class_date" class="form-label">ចាប់ផ្តើម</label>
                                    <input type="date" name="sch_start" id="sch_start" class="form-control" required
                                        style="font-size:14px;" value="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="class_date" class="form-label">បញ្ចប់</label>
                                    <input type="date" name="sch_end" id="sch_end" class="form-control" required
                                        style="font-size:14px;" value="">
                                </div>
                                <div class="col-sm-2">
                                    <label for="">&nbsp;</label>
                                    <div class="ml-2">
                                        <input type="hidden" name="action" value="show">
                                        <input type="submit" value="បង្ហាញ" name="btnsave"
                                            class="btn1 bg-sis text-white">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="content-body">

        <?php if (isset($_POST['btnsave'])) { ?>

        <h2>Add Items</h2>
        <form id="itemForm">
            <div id="itemContainer">
                <div class="form-group">
                    <input type="text" class="form-control" name="item[]" placeholder="Enter item" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="addItem">Add More</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div id="response" class="mt-3"></div>
        <?php   } ?>
    </div>

</section>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    // Add new input field
    $('#addItem').click(function() {
        $('#itemContainer').append(`
                    <div class="form-group">
                        <input type="text" class="form-control" name="item[]" placeholder="Enter item" required>
                    </div>
                `);
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
                            <div class="form-group">
                                <input type="text" class="form-control" name="item[]" placeholder="Enter item" required>
                            </div>
                        `); // Reset the form
            }
        });
    });
});
</script>

<?php include_once "footer.php"; ?>