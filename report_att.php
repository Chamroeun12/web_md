<?php
require('fpdf/fpdf.php');
require 'vendors/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include_once 'connection.php';

// Function to fetch student data
function fetchStudentData($conn) {
    if (isset($_POST['classname'])) {
        $classname = filter_input(INPUT_POST, 'classname', FILTER_SANITIZE_STRING);

        $query = "SELECT
              att.Date AS Attendance_Date,
              s.En_name AS Student_Name,
              s.Gender,
              s.DOB,
              c.Class_name AS Class_Name,
              co.Course_name AS Course_Name,
              att.Attendance AS Attendance_Status
          FROM
              tb_attendance att
          INNER JOIN
              tb_class c ON att.Class_id = c.ClassID
          INNER JOIN
              tb_course co ON c.course_id = co.id
          INNER JOIN
              tb_teacher t ON c.Teacher_id = t.id
          INNER JOIN
              tb_student s ON att.Stu_id = s.ID
          WHERE
              c.Class_name = :classname
          GROUP BY
              att.Date, s.En_name
          ORDER BY
              att.Date, s.En_name;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':classname', $classname, PDO::PARAM_STR);
        $stmt->execute();
        return [$classname, $stmt->fetchAll(PDO::FETCH_ASSOC)];
    }
    return [null, []];
}

// Fetch data from the database
list($classname, $data) = fetchStudentData($conn);

if (empty($data)) {
    echo "No records found for the specified class.";
    exit;
}

if (isset($_POST['export_excel'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $headers = ['Attendance Date', 'Student Name', 'Gender', 'DOB', 'Course Name', 'Class Name', 'Attendance Status'];

    // Set headers in the Excel file
    $column = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($column . '1', $header);
        $column++;
    }

    // Fill data in the Excel file
    $rowCount = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowCount, $row['Attendance_Date']);
        $sheet->setCellValue('B' . $rowCount, $row['Student_Name']);
        $sheet->setCellValue('C' . $rowCount, $row['Gender']);
        $sheet->setCellValue('D' . $rowCount, $row['DOB']);
        $sheet->setCellValue('E' . $rowCount, $row['Course_Name']);
        $sheet->setCellValue('F' . $rowCount, $row['Class_Name']);
        $sheet->setCellValue('G' . $rowCount, $row['Attendance_Status']);
        $rowCount++;
    }

    // Save Excel file with dynamic filename
    $filename = "attendance_report_{$classname}_" . date('Y-m-d') . ".xlsx";
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit;
} elseif (isset($_POST['export_pdf'])) {
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Students Report Attendance');
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 10);

    // Add content to PDF
    $html = '<h1 style="color: blue; text-align: center;">Students Report Attendance</h1>';
    $html .= '<table border="1" cellspacing="0" cellpadding="4">
              <tr style="background-color: powderblue;">
                  <th style="color: blue; text-align: center;">Attendance Date</th>
                  <th style="color: blue; text-align: center;">Student Name</th>
                  <th style="color: blue; text-align: center;">Gender</th>
                  <th style="color: blue; text-align: center;">DOB</th>
                  <th style="color: blue; text-align: center;">Class Name</th>
                  <th style="color: blue; text-align: center;">Course Name</th>
                  <th style="color: blue; text-align: center;">Attendance Status</th>
              </tr>';

    // Fill data in PDF
    foreach ($data as $row) {
        $html .= '<tr>
                  <td style="text-align: center;">' . htmlspecialchars($row['Attendance_Date']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['Student_Name']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['Gender']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['DOB']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['Class_Name']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['Course_Name']) . '</td>
                  <td style="text-align: center;">' . htmlspecialchars($row['Attendance_Status']) . '</td>
              </tr>';
    }

    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF with dynamic filename
    $pdfFilename = "students_report_attendance_{$classname}_" . date('Y-m-d') . ".pdf";
    $pdf->Output($pdfFilename, 'I');
    exit;
}
?>
