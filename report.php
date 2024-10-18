<?php
include_once'connection.php';

require 'vendors/autoload.php'; // Include PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once 'connection.php'; // Include your database connection

// Define the query to fetch student data
$query = "SELECT
  Stu_code,
  En_name,
  Kh_name,
  Gender,
  DOB,
  Dad_name,
  Dad_job,
  Mom_name,
  Mom_job,
  Phone,
  Address
FROM tb_student";

// Execute the query
$stmt = $conn->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if data is retrieved
if (empty($data)) {
    echo "No records found.";
    exit;
}

// Check if the export button is clicked
if (isset($_POST['btnexcel'])) {
    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $headers = array_keys($data[0]);
    $sheet->fromArray($headers, NULL, 'A1');

    // Fill data
    $sheet->fromArray($data, NULL, 'A2');

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Report Students.xlsx"');
    $writer->save('php://output');
    exit;
}

if (isset($_POST['btnpdft'])) {
    require('fpdf/fpdf.php'); // Include FPDF for PDF export

    // Create new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);

    // Add title
    $pdf->Cell(0, 10, 'Students Report', 0, 1, 'C');

    // Add header row
    $header = ['Stu Code', 'English Name', 'Khmer Name', 'Gender', 'DOB', 'Dad Name', 'Dad Job', 'Mom Name', 'Mom Job', 'Phone', 'Address'];
    foreach ($header as $col) {
        $pdf->Cell(30, 10, $col, 1);
    }
    $pdf->Ln();

    // Fill data rows
    foreach ($data as $row) {
        foreach ($row as $col) {
            $pdf->Cell(30, 10, $col, 1);
        }
        $pdf->Ln();
    }

    // Output PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Report Students.pdf"');
    $pdf->Output('D'); // 'D' for download
    exit;
}

// Assuming this is within a PHP script handling exports
if (isset($_POST['btnexcel1'])) {
  // Execute the SQL query to get teacher data
  $stmt = $conn->prepare("SELECT En_name, Kh_name, Gender, DOB, Age, Position, Nation, Ethnicity, Address, Phone FROM tb_teacher");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $headers = array_keys($data[0]);
    $sheet->fromArray($headers, NULL, 'A1');

    // Fill data
    $sheet->fromArray($data, NULL, 'A2');

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Report Students.xlsx"');
    $writer->save('php://output');
    exit;
}

if (isset($_POST['btnpdft1'])) {
  // Execute the SQL query to get teacher data
  $stmt = $conn->prepare("SELECT En_name, Kh_name, Gender, DOB, Age, Position, Nation, Ethnicity, Address, Phone FROM tb_teacher");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  require('fpdf/fpdf.php'); // Include FPDF for PDF export

  // Create new PDF document
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 10);

  // Add title
  $pdf->Cell(0, 10, 'Teathers Report', 0, 1, 'C');

  // Add header row
  $header = ['Stu Code', 'English Name', 'Khmer Name', 'Gender', 'DOB', 'Position', 'Nation', 'Ethnicity', 'Address', 'Phone', 'Phone'];
  foreach ($header as $col) {
      $pdf->Cell(30, 10, $col, 1);
  }
  $pdf->Ln();

  // Fill data rows
  foreach ($data as $row) {
      foreach ($row as $col) {
          $pdf->Cell(30, 10, $col, 1);
      }
      $pdf->Ln();
  }

  // Output PDF
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="Report Teather.pdf"');
  $pdf->Output('D'); // 'D' for download
  exit;
}

// Assuming this is within a PHP script handling exports
if (isset($_POST['btnexcel2'])) {
  // Execute the SQL query to get course data
  $stmt = $conn->prepare("SELECT co.Course_name, s.Subject_name, co.Date FROM tb_course co INNER JOIN tb_subject s ON co.Sub_id = s.SubID;");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set headers
    $headers = array_keys($data[0]);
    $sheet->fromArray($headers, NULL, 'A1');

    // Fill data
    $sheet->fromArray($data, NULL, 'A2');

    // Save Excel file
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Report Courses.xlsx"');
    $writer->save('php://output');
    exit;
}
if (isset($_POST['btnpdft2'])) {
  // Execute the SQL query to get teacher data
  $stmt = $conn->prepare("SELECT co.Course_name, s.Subject_name, co.Date FROM tb_course co INNER JOIN tb_subject s ON co.Sub_id = s.SubID;");
  $stmt->execute();
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  require('fpdf/fpdf.php'); // Include FPDF for PDF export

  // Create new PDF document
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 10);

  // Add title
  $pdf->Cell(0, 10, 'Courses Report', 0, 1, 'C');

  // Add header row
  $header = ['Course Name', 'Subject Name', 'Date'];
  foreach ($header as $col) {
      $pdf->Cell(30, 10, $col, 1);
  }
  $pdf->Ln();

  // Fill data rows
  foreach ($data as $row) {
      foreach ($row as $col) {
          $pdf->Cell(30, 10, $col, 1);
      }
      $pdf->Ln();
  }

  // Output PDF
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="Courses Teather.pdf"');
  $pdf->Output('D'); // 'D' for download
  exit;
}
?>

<?php include_once "header.php"; ?>

<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 card-header">
            <div class="col-sm-6">
                <h1 class="m-0">|របាយការណ៍</h1>
            </div>
            <!-- /.col -->

        </div>
    </div>
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                        <h3 class="card-title">ទាញយករបាយការណ៍សរុប</h3>
                    </div>
                <div class="card-header">
                <form name="classform" method="post" action="">
                            <div class="row">
                               <!-- /.col For Students -->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-danger elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍សិស្ស</span>
                                          <input type="submit" value="ទាញយកជា​ pdf" name="btnpdft" class="btn btn-danger btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                <!-- /.col -->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-success elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍សិស្ស</span>
                                          <input type="submit" value="ទាញយកជា​ excel" name="btnexcel" class="btn btn-success btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                    <!-- /.col For Teacher-->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-danger elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍គ្រូ</span>
                                          <input type="submit" value="ទាញយកជា​ pdf" name="btnpdft1" class="btn btn-danger btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                <!-- /.col -->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-success elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍គ្រូ</span>
                                          <input type="submit" value="ទាញយកជា​ excel" name="btnexcel1" class="btn btn-success btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <div class="mt-4"></div>
                              <!-- /.col For Course-->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-danger elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍វគ្គសិក្សា</span>
                                          <input type="submit" value="ទាញយកជា​ pdf" name="btnpdft2" class="btn btn-danger btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                <!-- /.col -->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-success elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍វគ្គសិក្សា</span>
                                          <input type="submit" value="ទាញយកជា​ excel" name="btnexcel2" class="btn btn-success btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col For Sna-->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-danger elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍ថ្នាក់រៀន</span>
                                          <input type="submit" value="ទាញយកជា​ pdf" name="btnpdft3" class="btn btn-danger btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                <!-- /.col -->
                              <div class="col-md-3">
                                  <div class="info-box mb-3">
                                      <span class="info-box-icon bg-success elevation-1 "><i class="fas fa-file-download"></i></span>

                                      <div class="info-box-content">
                                          <span class="info-box-text text-center">របាយការណ៍ថ្នាក់រៀន</span>
                                          <input type="submit" value="ទាញយកជា​ excel" name="btnexcel3" class="btn btn-success btn-sm">
                                      </div>
                                      <!-- /.info-box-content -->
                                  </div>
                                  <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                </div>
                    </form>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div>

</section>

<?php include_once "footer.php"; ?>

