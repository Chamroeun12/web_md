<?php
include '../connection.php';

// Fetch all schedules
$sql = "SELECT schedules.*, teachers.name AS teacher_name
        FROM schedules
        JOIN teachers ON schedules.teacher_id = teachers.id";
$schedules = $conn->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching Schedules</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Teaching Schedules</h2>
    <a href="form.php" class="btn btn-primary mb-3">Add New Schedule</a>

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
                        <a href="edit_schedule.php?id=<?= $schedule['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_schedule.php?id=<?= $schedule['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
