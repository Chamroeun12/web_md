<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM schedules WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: index.php?msg=Schedule_deleted_successfully");
}
?>
