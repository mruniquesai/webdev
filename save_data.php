<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
// Include the PHPExcel library
require_once 'PHPExcel/PHPExcel.php';

// Get the form data
$name = $_POST['name'];
$bloodGroup = $_POST['blood_group'];
$location = $_POST['location'];

// Load the Excel file
$file = "example.xlsx";
$excelReader = PHPExcel_IOFactory::createReaderForFile($file);
$excelObj = $excelReader->load($file);

// Get the active sheet
$worksheet = $excelObj->getActiveSheet();

// Get the highest row in the worksheet
$highestRow = $worksheet->getHighestRow();

// Add the new data to the worksheet
$worksheet->setCellValue("A".($highestRow+1), $name);
$worksheet->setCellValue("B".($highestRow+1), $bloodGroup);
$worksheet->setCellValue("C".($highestRow+1), $location);

// Save the changes to the Excel file
$excelWriter = PHPExcel_IOFactory::createWriter($excelObj, 'EXCEL');
$excelWriter->save($file);

// Redirect back to the form page
header("Location: requestfrom.html");
exit();
?>
</body>

</html>