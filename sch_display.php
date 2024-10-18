<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST['teacher_id'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $id = $_POST['id'];

    // Check if updating or creating
    if (!empty($id)) {
        // Update the schedule
        $sql = "UPDATE schedules SET teacher_id = :teacher_id, day = :day, start_time = :start_time, end_time = :end_time, subject = :subject, grade = :grade WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'teacher_id' => $teacher_id,
            'day' => $day,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'subject' => $subject,
            'grade' => $grade,
            'id' => $id
        ]);
        header("Location: sch_edit_del.php?msg=Schedule updated successfully");
    } else {
        // Create a new schedule
        $sql = "INSERT INTO schedules (teacher_id, day, start_time, end_time, subject, grade) 
                VALUES (:teacher_id, :day, :start_time, :end_time, :subject, :grade)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'teacher_id' => $teacher_id,
            'day' => $day,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'subject' => $subject,
            'grade' => $grade
        ]);
        header("Location: sch_edit_del.php?msg=New schedule added successfully");
    }
}
?>
