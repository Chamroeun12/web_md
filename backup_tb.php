<?php
// Database connection settings
$host = 'localhost';
$dbname = 'db_students';
$username = 'root';
$password = '';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<?php include_once 'header.php'; ?>
<?php
echo '<section class="content-wrapper">';
// Check if tables were selected
if (isset($_POST['tables']) && !empty($_POST['tables'])) {
    // Get selected tables
    $selectedTables = $_POST['tables'];

    // Initialize the SQL for the backup
    $backupSql = "";

    // Loop through the selected tables and create a backup SQL dump
    foreach ($selectedTables as $table) {
        // Get the CREATE TABLE statement
        $stmt = $pdo->query("SHOW CREATE TABLE `$table`");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $backupSql .= "\n\n" . $row['Create Table'] . ";\n\n";

        // Get the data from the table
        $stmt = $pdo->query("SELECT * FROM `$table`");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $columns = array_map(function ($column) {
                return "`$column`";
            }, array_keys($row));

            $values = array_map(function ($value) use ($pdo) {
                return $pdo->quote($value);
            }, array_values($row));

            $backupSql .= "INSERT INTO `$table` (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ");\n";
        }

        $backupSql .= "\n\n";
    }

    // Save the backup SQL to a file
    $backupFile = 'backup_on_' . date('Y-m-d_H-i-s') . '.sql';
    file_put_contents($backupFile, $backupSql);

    // Provide a download link to the user
    echo "<div class='container mt-5'><div class='alert alert-success text-center'>
            Backup successfully created! <br>
            <a href='$backupFile' class='btn btn-success mt-3'>Download Backup</a>
          </div></div>";
} else {
    echo "<div class='container mt-5'><div class='alert alert-light-emphasis text-center'>
            No tables selected for backup. Please select at least one table.
          </div>";
}
echo '
<div class="container mt-5"><p class="alert alert-light-emphasis text-center"><a href="backup.php" class="btn1 bg-sis text-white">Back to backup</a></hp>';
echo '</section>'; // Close the section
?>

<?php include_once 'footer.php'; ?>
