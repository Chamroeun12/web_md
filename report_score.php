<?php
require('fpdf/fpdf.php');  // For PDF generation
require 'vendors/autoload.php'; // Autoloader for PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // Xlsx for better compatibility

include_once 'connection.php'; // Database connection


// Function to fetch student data
function fetchStudentData($conn) {
    if(isset($_POST['classname'])){
        $classname = $_POST['classname'];
        // echo $classname;
        }
    $query = "SELECT stu.En_name, ms.Homework, ms.Participation, ms.Attendance, ms.Monthly, ms.Average FROM tb_month_score ms
		INNER JOIN tb_student stu ON ms.Stu_id = stu.ID
		INNER JOIN tb_class c ON ms.Class_id = c.ClassID
		INNER JOIN tb_course co ON c.course_id = co.id
		INNER JOIN tb_teacher t ON c.Teacher_id = t.id WHERE c.`status` = 'active' AND c.Class_name='$classname'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch data from the database
$data = fetchStudentData($conn);

if (isset($_POST['export_excel'])) {
    // Generate Excel using PhpSpreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set column headers
    $headers = ['Student Name', 'Homework', 'Participation', 'Attendance', 'Monthly', 'Average'];
    $column = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($column . '1', $header);
        $column++;
    }

    // Fill data
    $rowCount = 2; // Start from the second row
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowCount, $row['En_name']);
        $sheet->setCellValue('B' . $rowCount, $row['Homework']);
        $sheet->setCellValue('C' . $rowCount, $row['Participation']);
        $sheet->setCellValue('D' . $rowCount, $row['Attendance']);
        $sheet->setCellValue('E' . $rowCount, $row['Monthly']);
        $sheet->setCellValue('G' . $rowCount, $row['Average']);
        $rowCount++;
    }

    // Save Excel file
    $writer = new Xlsx($spreadsheet); // Use Xlsx for better compatibility
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="report.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit; // Exit after outputting the file
} elseif (isset($_POST['export_pdf'])) {
    // Create a new PDF document using TCPDF
    $pdf = new TCPDF();
    $pdf->SetTitle('Students Score tables');
    $pdf->SetCreator(PDF_CREATOR);

    $pdf->AddPage();
//     $fontname = TCPDF_FONTS::addTTFfont('Suwannaphum.ttf', 'TrueTypeUnicode', '', 96);
// $pdf->SetFont($fontname, '', 10);
    $pdf->SetFont('FreeSerif', '', 10);

    // Add content to PDF
    $html = '<h1 style="color: #151515; text-align: center;">Student Scores Lists</h1>';
    $html .= '<table border="1" cellspacing="0" cellpadding="4">
              <tr style="background-color: #152550;">
                  <th style="color: white; text-align: center;">Student Name</th>
                  <th style="color: white; text-align: center;">Homework</th>
                  <th style="color: white; text-align: center;">Participation</th>
                  <th style="color: white; text-align: center;">Attendance</th>
                  <th style="color: white; text-align: center;">Monhtly</th>
                  <th style="color: white; text-align: center;">Average</th>
              </tr>';

    foreach ($data as $row) {
        $html .= '<tr>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['En_name']) . '</td>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['Homework']) . '</td>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['Participation']) . '</td>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['Attendance']) . '</td>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['Monthly']) . '</td>
                  <td style="text-align: center; font-size:12px;">' . htmlspecialchars($row['Average']) . '</td>
              </tr>';
    }

    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Student_Score_List.pdf', 'I'); // Output PDF inline
    exit; // Exit after outputting the file
}
?>
