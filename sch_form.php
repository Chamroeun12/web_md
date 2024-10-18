<?php
include 'connection.php';

// Check if editing an existing schedule
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM schedules WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $schedule = $stmt->fetch();
}

// Fetch teachers for the dropdown
$teachers = $conn->query("SELECT * FROM teachers")->fetchAll();
?>

<?php include_once "header.php"; ?>
<div class="content-wrapper">
    <form method="POST" action="sch_display.php">
    <input type="hidden" name="id" value="<?= isset($schedule) ? $schedule['id'] : '' ?>">
    
    <div class="form-group">
        <label for="teacher_id">Teacher</label>
        <select name="teacher_id" id="teacher_id" class="form-control" required>
            <option value="">Select Teacher</option>
            <?php foreach ($teachers as $teacher): ?>
                <option value="<?= $teacher['id'] ?>" <?= isset($schedule) && $schedule['teacher_id'] == $teacher['id'] ? 'selected' : '' ?>>
                    <?= $teacher['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="day">Day</label>
        <input type="text" name="day" class="form-control" id="day" value="<?= isset($schedule) ? $schedule['day'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" class="form-control" id="start_time" value="<?= isset($schedule) ? $schedule['start_time'] : '' ?>" required>
    </div>
    
    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" class="form-control" id="end_time" value="<?= isset($schedule) ? $schedule['end_time'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" value="<?= isset($schedule) ? $schedule['subject'] : '' ?>" required>
    </div>

    <div class="form-group">
        <label for="grade">Grade</label>
        <input type="text" name="grade" class="form-control" id="grade" value="<?= isset($schedule) ? $schedule['grade'] : '' ?>" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3"><?= isset($schedule) ? 'Update Schedule' : 'Add Schedule' ?></button>
</form>
</div>
<?php include_once "footer.php"; ?>

