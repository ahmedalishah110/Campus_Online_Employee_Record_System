
<?php
// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sharp_db';

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve the employee records from the database
$sql = 'SELECT * FROM sharp_emp';
$result = $conn->query($sql);

// Create an empty array to store the records
$records = [];

// Add column headers to the records array
$columnNames = [
    'Employee ID',
    'First Name',
    'Middle Name',
    'Last Name',
    'Gender',
    'Phone Number',
    'Job Type',
    'Date Employed',
    'Employment Status',
    'Residential Address',
    'Location of Residence',
    'GPS Location of Residence',
    'Direction to Residence',
];
$records[] = $columnNames;

// Fetch the employee records and add them to the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $record = [
            $row['employee_id'],
            $row['first_name'],
            $row['middle_name'],
            $row['last_name'],
            $row['gender'],
            $row['phone'],
            $row['employee_image'],
            $row['id_type'],
            $row['id_number'],
            $row['id_card_number'],
            $row['residence_address'],
            $row['residence_location'],
            $row['residence_direction'],
            $row['residence_gps'],
            $row['next_of_kin'],
            $row['relationship'],
            $row['phone_kin'],
            $row['kin_residence'],
            $row['kin_residence_direction'],
            $row['date_employed'],
            $row['job_type'],
            $row['status'],
        ];
        $records[] = $record;
    }
}

// Close the database connection
$conn->close();

// Set the appropriate headers for download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="employee_records.csv"');

// Clear the output buffer
ob_clean();

// Create a file pointer
$output = fopen('php://output', 'w');

// Loop through the records and write them to the file pointer
foreach ($records as $record) {
    fputcsv($output, $record);
}

// Close the file pointer
fclose($output);

// Exit the script
exit();