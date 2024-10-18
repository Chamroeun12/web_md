<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_students');

//Backup Directory
define('BK_DIR', 'C://xampp//htdocs//kroeunz//backup_file');

//Create backup file
$date = date('Y-m-d_H-i-s');
$backup_file = BK_DIR . '//' . DB_NAME . '-' . $date . '.sql';
$command = "mysqldump --user=" . DB_USER . " --password=" . DB_PASS . " " . DB_NAME . " > " . $backup_file;

shell_exec($command);

//Compress backup file to zip
$gzip_command = "gzip " . $backup_file;
system($gzip_command);

//Remove old backup file 7days old
$find_command = "find " . BK_DIR . " -type f -name '*.gz' -mtime +7 -delete";
system($find_command);

header("Location: index.php");
exit;