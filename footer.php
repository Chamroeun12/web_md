<footer class="main-footer">
    <strong>រក្សាសិទ្ធិ &copy; ២០២៣-២០២៤ <a href="">ស្មាតប្រាយ អ៊ិនធើណាសិនណលស្គូល</a>,</strong>
    រក្សាសិទ្ធិគ្រប់យ៉ាង។
    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- Page specific script -->
<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultInfo').click(function() {
        Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultError').click(function() {
        Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultWarning').click(function() {
        Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.swalDefaultQuestion').click(function() {
        Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });

    $('.toastrDefaultSuccess').click(function() {
        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
        toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
        toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultTopLeft').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomRight').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultBottomLeft').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultAutohide').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultNotFixed').click(function() {
        $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultFull').click(function() {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
        })
    });
    $('.toastsDefaultFullImage').click(function() {
        $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
        })
    });
    $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultInfo').click(function() {
        $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultDanger').click(function() {
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
    $('.toastsDefaultMaroon').click(function() {
        $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
});
</script>
<script>
function preview(evt) {
    let img = document.getElementById('img');
    img.src = URL.createObjectURL(evt.target.files[0]);
}
</script>
<!-- active -->

<!-- Check box backup -->
<script>
function toggleCheckboxes(source) {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="tables[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked;
    });
}
</script>

<!-- Bootstrap JS for better styling (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- live search -->
<!-- <script>
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let search = $(this).val();
        if (search.length > 0) {
            $.ajax({
                url: 'student_list.php',
                method: 'POST',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#result').empty().show();
                    if (response.length > 0) {
                        response.forEach(user => {
                            $('#result').append('<div>' + user.name + '</div>');
                        });
                    } else {
                        $('#result').append('<div>No results found</div>');
                    }
                }
            });
        } else {
            $('#result').hide();
        }
    });
});
</script> -->

<!-- livesearch -->
<script>
$(document).ready(function() {
    $('.search').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function() {
            var lineStr = $(this).text().toLowerCase();
            if (lineStr.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
</script>

<!-- Cookie -->
<script>
$(document).ready(function() {
    $("#username").keyup(function() {
        function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key, value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
        }
        let u = $(this).val();
        if (u !== undefined) {
            $("#password").val(getCookie(u));
        }
    });
});
</script>
<!-- <script>
$(document).ready(function() {
    $("#username").keyup(function() {
        var user = $("#username").val();

        if (user == ) {
            $("#password").val("<?php echo $_COOKIE['Tii']; ?>");
        }

    });
})
</script> -->

<!-- Attendane -->
<script>
$(document).ready(function() {
    checkAll_count()

    $('#class_id, #class_date').change(function(e) {
        var class_id = $('#class_id').val()
        var class_date = $('#class_date').val()
        location.replace(`./?page=attendance&class_id=${class_id}&class_date=${class_date}`)
    })
    $('.status_check').change(function() {
        var student_id = $(this)[0].dataset?.id
        var isChecked = $(this).is(":checked")
        if (isChecked === true) {
            $(`.status_check[data-id='${student_id}']`).prop("checked", false)
            $(this).prop("checked", true)
        }
        checkAll_count()
    })
    $('.checkAll').change(function() {
        var _this = $(this)
        var isChecked = $(this).is(":checked")
        var id = $(this).attr('id')
        if (isChecked === true) {
            $('.checkAll').each(function() {
                if ($(this).attr('id') != id && $(this).is(":checked") == true) {
                    $(this).prop("checked", false)
                }
            })
            $('.status_check').prop('checked', false)
            if (id == 'PCheckAll') {
                $('.status_check[value="1"]').prop('checked', true)
            } else if (id == 'LCheckAll') {
                $('.status_check[value="2"]').prop('checked', true)
            } else if (id == 'ACheckAll') {
                $('.status_check[value="3"]').prop('checked', true)
            } else if (id == 'HCheckAll') {
                $('.status_check[value="4"]').prop('checked', true)
            }
        } else {
            if (id == 'PCheckAll') {
                $('.status_check[value="1"]').prop('checked', false)
            } else if (id == 'LCheckAll') {
                $('.status_check[value="2"]').prop('checked', false)
            } else if (id == 'ACheckAll') {
                $('.status_check[value="3"]').prop('checked', false)
            } else if (id == 'HCheckAll') {
                $('.status_check[value="4"]').prop('checked', false)
            }
        }
    })
    $('#manage-attendance').submit(function(e) {
        e.preventDefault()
        start_loader()
        var _this = $(this)
        $('#attendance-tbl .student-row').each(function() {
            var has_checks = $(this).find('.status_check:checked').length
            if (has_checks < 1) {
                var name = $(this).find('td').first().text() || "";
                name = String(name).trim();
                console.log(name)
                alert(`${name}'s attendance is not yet marked!`);
                end_loader()
                return false;
            }
        })
        $.ajax({
            url: './ajax-api.php?action=save_attendance',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            error: (err) => {
                console.error(err)
                alert("An error occurred while saving the data. kindly reload this page.")
                end_loader();
            },
            success: function(resp) {
                if (resp?.status == "success") {
                    location.reload()
                } else if (resp?.status == "error" && resp?.msg != "") {
                    var fd = $(flashdataHTML).clone()
                    fd.addClass('flashdata-danger')
                    fd.find('.flashdata-msg').html(resp.msg)
                    $('#msg').html(fd)
                    $('html, body').scrollTop(0)
                } else {
                    alert(
                        "An error occurred while saving the data. kindly reload this page."
                    )
                }
                end_loader();
            }
        })
    })
})

function checkAll_count() {
    var statuses = {
        'PCheckAll': 1,
        'LCheckAll': 2,
        'ACheckAll': 3,
        'HCheckAll': 4
    }
    $('.checkAll').each(function() {
        var id = $(this).attr('id')
        var checkedCount = $(`.status_check[value="${statuses[id]}"]:checked`).length
        var totalCount = $(`.status_check[value="${statuses[id]}"]`).length
        if (totalCount != checkedCount) {
            $(this).prop('checked', false)
        } else {
            $(`#${id}`).prop('checked', true)
        }
    })
}
</script>


<!-- Toastr Notification Script -->
<?php if (isset($_SESSION['message'])): ?>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000", // 5 seconds
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if ("<?php echo $_SESSION['message_type']; ?>" === "success") {
                toastr.success("<?php echo $_SESSION['message']; ?>");
            } else {
                toastr.error("<?php echo $_SESSION['message']; ?>");
            }
        });
    </script>
    <?php
    // Clear the message after displaying it
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    ?>
<?php endif; ?>
</body>

</html>
