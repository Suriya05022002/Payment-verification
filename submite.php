<?php
// Database Connection Configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "payment_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $fullName      = $conn->real_escape_string($_POST['fullName']);
    $phoneNumber   = $conn->real_escape_string($_POST['phoneNumber']);
    $emailId       = $conn->real_escape_string($_POST['emailId']);
    $transactionId = $conn->real_escape_string($_POST['transactionId']);

    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Function to handle file uploads
    function uploadFile($fileInputName, $targetDir) {
        $fileName = time() . '_' . basename($_FILES[$fileInputName]["name"]);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
        }
        return null;
    }

    $screenshotPath = uploadFile('paymentScreenshot', $targetDir);
    $govtIdPath     = uploadFile('govtId', $targetDir);
    $studentIdPath  = uploadFile('studentId', $targetDir);

    $sql = "INSERT INTO user_payments (full_name, phone_number, email_id, transaction_id, payment_screenshot, govt_id_pdf, student_id_pdf) 
            VALUES ('$fullName', '$phoneNumber', '$emailId', '$transactionId', '$screenshotPath', '$govtIdPath', '$studentIdPath')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Payment details submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>