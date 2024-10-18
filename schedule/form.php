<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching Schedule</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Teaching Schedule Form</h2>
    <form id="scheduleForm" method="POST" action="save_schedule.php">
        <div class="form-group">
            <label for="teacher">Teacher</label>
            <select name="teacher_id" id="teacher" class="form-control" required>
                <option value="">Select Teacher</option>
                <!-- PHP code to dynamically fill teacher options -->
                <?php
                include 'db.php';
                $teachers = $conn->query("SELECT * FROM teachers")->fetchAll();
                foreach ($teachers as $teacher) {
                    echo "<option value='{$teacher['id']}'>{$teacher['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="day">Day</label>
            <select name="day" id="day" class="form-control" required>
                <option value="">Select Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_time">Start Time</label>
                <input type="time" name="start_time" id="start_time" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="end_time">End Time</label>
                <input type="time" name="end_time" id="end_time" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="text" name="grade" id="grade" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Optional: Add custom jQuery validation or enhancements
    $(document).ready(function() {
        // Example: Validate form before submission
        $('#scheduleForm').on('submit', function(e) {
            if (!$('#teacher').val()) {
                alert("Please select a teacher");
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html>
