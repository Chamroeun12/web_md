<?php
include 'connection.php'; // Include your database connection here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    $class_id = $_POST['Class_id'] ?? null;
    $start_date = $_POST['sch_start'] ?? null;
    $end_date = $_POST['sch_end'] ?? null;
    $schedule_items = $_POST['item'] ?? [];

    // Check if required fields are filled
    if (empty($class_id) || empty($start_date) || empty($end_date)) {
        echo "Please fill all required fields.";
    } elseif (empty($schedule_items)) {
        echo "No schedule items to add.";
    } else {
        try {
            // Start a transaction
            $conn->beginTransaction();

            // Insert each schedule item into the database
            for ($i = 0; $i < count($schedule_items); $i += 7) {
                $teacher_id = $schedule_items[$i] ?? null;
                $start_time = $schedule_items[$i + 1] ?? null;
                $end_time = $schedule_items[$i + 2] ?? null;
                $field1 = $schedule_items[$i + 3] ?? null; // Extra fields
                $field2 = $schedule_items[$i + 4] ?? null;
                $field3 = $schedule_items[$i + 5] ?? null;
                $field4 = $schedule_items[$i + 6] ?? null;

                if ($teacher_id && $start_time && $end_time) {
                    // Prepare SQL to insert schedule
                    $sql = "INSERT INTO tb_sch_student (Class_id, teacher_id, Start_class, End_Class, Time_in, Time_out, Monday, Tuesday, Wednesday, Thursday)
                            VALUES (:class_id, :teacher_id, :start_date, :end_date, :start_time, :end_time, :field1, :field2, :field3, :field4)";

                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        ':class_id' => $class_id,
                        ':teacher_id' => $teacher_id,
                        ':start_date' => $start_date,
                        ':end_date' => $end_date,
                        ':start_time' => $start_time,
                        ':end_time' => $end_time,
                        ':field1' => $field1,
                        ':field2' => $field2,
                        ':field3' => $field3,
                        ':field4' => $field4
                    ]);
                }
            }

            // Commit transaction
            $conn->commit();
            echo "Schedule added successfully!";
        } catch (Exception $e) {
            // Roll back transaction if an error occurs
            $conn->rollBack();
            echo "Failed to add schedule: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Form</title>
</head>

<body>
    <h2>Add Schedule</h2>
    <form method="post" action="">
        <label for="Class_id">Class ID:</label>
        <input type="text" id="Class_id" name="Class_id" required><br><br>

        <label for="sch_start">Start Date:</label>
        <input type="date" id="sch_start" name="sch_start" required><br><br>

        <label for="sch_end">End Date:</label>
        <input type="date" id="sch_end" name="sch_end" required><br><br>

        <h3>Schedule Items:</h3>
        <div id="schedule-container">
            <!-- First Schedule Item -->
            <div class="schedule-item">
                <label for="teacher">Teacher ID:</label>
                <input type="text" name="item[]" required>

                <label for="start_time">Start Time:</label>
                <input type="time" name="item[]" required>

                <label for="end_time">End Time:</label>
                <input type="time" name="item[]" required>

                <label for="field1">Field 1:</label>
                <input type="text" name="item[]">

                <label for="field2">Field 2:</label>
                <input type="text" name="item[]">

                <label for="field3">Field 3:</label>
                <input type="text" name="item[]">

                <label for="field4">Field 4:</label>
                <input type="text" name="item[]"><br><br>
            </div>
        </div>

        <button type="button" onclick="addScheduleItem()">Add Another Item</button><br><br>

        <input type="submit" value="Submit Schedule">
    </form>

    <script>
        // JavaScript to add more schedule items dynamically
        function addScheduleItem() {
            let container = document.getElementById('schedule-container');
            let item = document.createElement('div');
            item.classList.add('schedule-item');
            item.innerHTML = `
                <label for="teacher">Teacher ID:</label>
                <input type="text" name="item[]" required>

                <label for="start_time">Start Time:</label>
                <input type="time" name="item[]" required>

                <label for="end_time">End Time:</label>
                <input type="time" name="item[]" required>

                <label for="field1">Field 1:</label>
                <input type="text" name="item[]">

                <label for="field2">Field 2:</label>
                <input type="text" name="item[]">

                <label for="field3">Field 3:</label>
                <input type="text" name="item[]">

                <label for="field4">Field 4:</label>
                <input type="text" name="item[]"><br><br>
            `;
            container.appendChild(item);
        }
    </script>
</body>

</html>



<select class="form-control">
    <option>option 1</option>
    <option>option 2</option>
    <option>option 3</option>
    <option>option 4</option>
    <option>option 5</option>
</select>