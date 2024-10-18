<?php include_once 'header.php'; ?>

<div class="content-wrapper">
    <div class="content">
        <!-- <div class="row mt-2">
        <div class="col-md-8">
            <form action="backup_tb.php" method="POST">
                <select class="form-control ml-1" name="tables[]" id="">
                    <option selected disabled>--select table to backup--</option>
                    <option value="tb_teacher">Teacher</option>
                    <option value="tb_subject">Subject</option>
                    <option value="tb_class">Class</option>
                    <option value="tb_add_to_class">Add Student to Class</option>
                    <option value="tb_attendance">Attendance</option>
                    <option value="tb_course">Course</option>
                    <option value="tb_final_score">Final Score</option>
                    <option value="tb_mid_score">Mid-Term Score</option>
                    <option value="tb_month_score">Month Score</option>
                    <option value="tb_monthly">Monthly</option>
                    <option value="tb_sch_student">Student Schedule</option>
                    <option value="tb_sch_teacher">Teacher Schedule</option>
                    <option value="tb_student">Student</option>
                </select>
        </div>
        <div class="col-md-4">
            <div class="">
                <button type="submit" class="btn btn-primary">Start Backup</button>
            </div>
        </div>
        </form>
    </div> -->
        <div class="row">
            <div class="card col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="">|ជ្រើសរើស Table</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="checkAll"
                                onclick="toggleCheckboxes(this)">
                            <label class="form-check-label" for="checkAll">Check/Uncheck All</label>
                        </div>
                    </div>
                    <form action="backup_tb.php" method="POST">
                        <div class="row m-2">
                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            value="tb_teacher" name="tables[]">
                                        <label for="customCheckbox1" class="custom-control-label">Teacher</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                            value="tb_student" name="tables[]">
                                        <label for="customCheckbox2" class="custom-control-label">Student</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3"
                                            value="tb_subject" name="tables[]">
                                        <label for="customCheckbox3" class="custom-control-label">Subject</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4"
                                            value="tb_add_to_class" name="tables[]">
                                        <label for="customCheckbox4" class="custom-control-label">Add Student to
                                            Class</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5"
                                            value="tb_attendance" name="tables[]">
                                        <label for="customCheckbox5" class="custom-control-label">Attendance</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox6"
                                            value="tb_class" name="tables[]">
                                        <label for="customCheckbox6" class="custom-control-label">Class</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mt-3 ml-5">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox7"
                                            value="tb_course" name="tables[]">
                                        <label for="customCheckbox7" class="custom-control-label">Course</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox8"
                                        value="tb_login" name="tables[]">
                                    <label for="customCheckbox8" class="custom-control-label">User</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox9"
                                        value="tb_final_score" name="tables[]">
                                    <label for="customCheckbox9" class="custom-control-label">Final
                                        Score</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox10"
                                        value="tb_mid_score" name="tables[]">
                                    <label for="customCheckbox10" class="custom-control-label">MidTerm
                                        Score</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox11"
                                        value="tb_month_score" name="tables[]">
                                    <label for="customCheckbox11" class="custom-control-label">Final
                                        Score</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-3">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox12"
                                        value="tb_monthly" name="tables[]">
                                    <label for="customCheckbox12" class="custom-control-label">Monthly</label>
                                </div>
                                <!-- <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox13"
                                        value="tb_sch_teacher" name="tables[]">
                                    <label for="customCheckbox13" class="custom-control-label">Teacher Schedule</label>
                                </div> -->
                                <div class="custom-control custom-checkbox mt-3">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox14"
                                        value="tb_sch_student" name="tables[]">
                                    <label for="customCheckbox14" class="custom-control-label">Student
                                        Schedule</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="">
                                    <button type="submit" class="btn1 bg-sis text-white ml-3 mt-4 mb-4">Start Backup</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
