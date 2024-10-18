<?php
include 'connection.php';

$schedules = $conn->query("SELECT schedules.*, teachers.name AS teacher_name FROM schedules JOIN teachers ON schedules.teacher_id = teachers.id")->fetchAll();
?>


<?php include_once "header.php"; ?>
<div class="content-wrapper">
<div class="container my-5">
    <h2>Schedules</h2>
    <a href="sch_form.php" class="btn btn-success mb-3">Add New Schedule</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Teacher</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= $schedule['teacher_name'] ?></td>
                    <td><?= $schedule['day'] ?></td>
                    <td><?= $schedule['start_time'] ?></td>
                    <td><?= $schedule['end_time'] ?></td>
                    <td><?= $schedule['subject'] ?></td>
                    <td><?= $schedule['grade'] ?></td>
                    <td>
                        <a href="sch_form.php?id=<?= $schedule['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="sch_delete.php?id=<?= $schedule['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once "footer.php"; ?>