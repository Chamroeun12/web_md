<?php
include '../connection.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM schedules WHERE id = :id");
$stmt->execute(['id' => $id]);
$schedule = $stmt->fetch();

$teachers = $conn->query("SELECT * FROM teachers")->fetchAll();
?>

<!-- Same HTML as form.php with pre-filled data -->

<form id="scheduleForm" method="POST" action="update_schedule.php">
    <input type="hidden" name="id" value="<?= $schedule['id'] ?>">
    <!-- Add the rest of the form fields with pre-filled values -->
</form>
