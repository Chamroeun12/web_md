<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select All / Unselect All Checkboxes</title>
    <!-- Bootstrap CSS for better styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .container {
        margin-top: 50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Select Tables to Backup</h2>

        <!-- Toggle Check/Uncheck All -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="checkAll" onclick="toggleCheckboxes(this)">
            <label class="form-check-label" for="checkAll">Check/Uncheck All</label>
        </div>

        <form action="backup.php" method="POST">
            <!-- Example checkboxes for tables -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tables[]" value="table1" id="table1">
                <label class="form-check-label" for="table1">Table 1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tables[]" value="table2" id="table2">
                <label class="form-check-label" for="table2">Table 2</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tables[]" value="table3" id="table3">
                <label class="form-check-label" for="table3">Table 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tables[]" value="table4" id="table4">
                <label class="form-check-label" for="table4">Table 4</label>
            </div>
            <!-- Add more checkboxes for other tables as needed -->

            <br>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Backup Selected Tables">
            </div>
        </form>
    </div>

    <!-- JavaScript for Check/Uncheck All -->
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
</body>

</html>