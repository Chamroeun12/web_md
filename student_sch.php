<?php
include 'connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT * FROM tb_sch_student";
$stmt = $conn->prepare($sql);
$stmt->execute();
$sch = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <div class="container-fluid">

        <div class="card m-2">
            <div class="card-header">
                <h3>|Student Schedule</h3>
            </div>
            <!-- create table with school schedule from monday to friday -->
            <table class="table table-bordered table-hover my-2" id="table1">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sch as $key => $value) { ?>
                        <tr>
                            <td>
                                <span><?php echo $value['Time_in']; ?></span>
                                :<span><?php echo $value['Time_out']; ?></span>
                            </td>
                            <td><?php echo $value['Monday']; ?></td>
                            <td><?php echo $value['Tuesday']; ?></td>
                            <td><?php echo $value['Wednesday']; ?></td>
                            <td><?php echo $value['Thursday']; ?></td>
                            <td><?php echo $value['Friday']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</section>

<?php include_once "footer.php"; ?>