<?php
include 'connection.php';

?>

<?php include_once 'header.php'; ?>
<section class="content-wrapper">
    <div class="content-header">
        <div class="card">
            <div class="row">
                kjasfjk
            </div>
        </div>
    </div>
    <div class="conten-body">
        <div class="row m-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                            Add
                        </button>
                    </h3> -->
                        <div class="card-tools">
                            <div class="form-group" style="width: 300px;">
                                <input type="text" id="" name="namesearch" class="search form-control float-right"
                                    placeholder="Search" style="font-family:Khmer OS Siemreap;">
                                <div class="input-group-append">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 text-sm">
                        <table class="table table-hover text-nowrap" style="font-family:Khmer OS Siemreap;"
                            id="userTbl">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student Code</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                </tr>
                            </thead>
                            <tbody id="showdata">
                                <?php foreach ($data as $key => $value) { ?>
                                <tr>
                                    <td><?php
                                        if (isset($_GET['page']) && $_GET['page'] > 1)
                                            echo ($_GET['page'] - 1) * 10 + ($key + 1);
                                        else
                                            echo ($key + 1);
                                        ?></td>

                                    <td><?php echo $value['En_name']; ?></td>
                                    <td><?php echo $value['Kh_name']; ?></td>
                                    <td><?php echo $value['Gender']; ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($value['DOB'])); ?></td>
                                    <td><?php echo $value['Address']; ?></td>
                                    <td><?php echo $value['Stu_code']; ?></td>
                                    <td><?php echo $value['Level']; ?></td>
                                    <td><?php echo $value['Time']; ?></td>
                                    <td><?php echo $value['Status']; ?></td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">
                                <li class="page-item"><a class="page-link" href="student_list.php?page=
                     <?php
                        if (isset($_GET['page']) && $_GET['page'] > 1)

                            echo $_GET['page'] - 1;
                        else
                            echo 1;
                        ?>
                    ">&laquo;</a></li>
                                <?php for ($i = 1; $i <= $maxpage; $i++) { ?>
                                <li class="page-item
                      <?php
                                if (isset($_GET['page'])) {
                                    if ($i == $_GET['page'])
                                        echo ' active ';
                                } else {
                                    if ($i == 1)
                                        echo ' active ';
                                }
                        ?>"><a class="page-link" href="student_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php } ?>
                                <li class="page-item"><a class="page-link" href="student_list.php?page=
                     <?php
                        if (isset($_GET['page'])) {
                            if ($_GET['page'] == $maxpage) {
                                echo $maxpage;
                            } else {
                                echo $maxpage + 1;
                            }
                        } else {
                            echo 2;
                        }
                        ?>">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<?php include_once 'footer.php'; ?>