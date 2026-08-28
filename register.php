<?php

header('Content-Type: application/json; charset=utf-8');

$host = 'localhost';
$port = '3307';
$dbname = 'userspayment';
$username = 'root';
$password = '';

try {

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {

    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . $e->getMessage()
    ]);

    exit;
}


/* =========================================================
   HELPER FUNCTIONS
========================================================= */

function postValue($name)
{
    return isset($_POST[$name])
        ? trim($_POST[$name])
        : '';
}


function jsonError($message)
{
    echo json_encode([
        "success" => false,
        "message" => $message
    ]);

    exit;
}


/* =========================================================
   GET FORM VALUES
========================================================= */

$fullName = postValue('fullName');

$whatsappNumber = postValue('whatsappNumber');

$email = postValue('email');

$dob = postValue('dob');

$linkedinUrl = postValue('linkedinUrl');

$currentCity = postValue('currentCity');

$motherTongue = postValue('motherTongue');

$gender = postValue('gender');

$eventLocation = postValue('eventLocation');

$permanentAddress = postValue('permanentAddress');

$currentAddress = postValue('currentAddress');

$githubUrl = postValue('githubUrl');

$targetCategory = postValue('targetCategory');

$currentOrg = postValue('currentOrg');

$currentRole = postValue('currentRole');

$highestQual = postValue('highestQual');

$ugDegree = postValue('ugDegree');

$ugBranch = postValue('ugBranch');

$pgBranch = postValue('pgBranch');

$techSkills = postValue('techSkills');

$areasInterest = postValue('areasInterest');

$joinReason = postValue('joinReason');

$paymentDone = postValue('paymentDone');

$transactionId = postValue('transactionId');


/* =========================================================
   REQUIRED VALIDATION
========================================================= */

if ($fullName === '') {
    jsonError("Full Name is required.");
}

if ($whatsappNumber === '') {
    jsonError("WhatsApp Number is required.");
}

if ($email === '') {
    jsonError("Email Address is required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonError("Invalid email address.");
}

if ($dob === '') {
    jsonError("Date of Birth is required.");
}

if ($linkedinUrl === '') {
    jsonError("LinkedIn URL is required.");
}


/* =========================================================
   LINKEDIN VALIDATION
   Accept:
   https://linkedin.com/in/name
   https://www.linkedin.com/in/name
========================================================= */

$linkedinUrl = trim($linkedinUrl);

if (
    !preg_match(
        '/^https?:\/\/(www\.)?linkedin\.com\/in\/[a-zA-Z0-9._%\-]+\/?$/i',
        $linkedinUrl
    )
) {

    jsonError(
        "Invalid LinkedIn URL. Example: https://www.linkedin.com/in/yourname"
    );
}


/* =========================================================
   OPTIONAL GITHUB
========================================================= */

if ($githubUrl !== '') {

    if (!filter_var($githubUrl, FILTER_VALIDATE_URL)) {

        jsonError("Invalid GitHub URL.");
    }
}


/* =========================================================
   OTHER REQUIRED FIELDS
========================================================= */

if ($currentCity === '') {
    jsonError("Current City is required.");
}

if ($motherTongue === '') {
    jsonError("Mother Tongue is required.");
}

if ($gender === '') {
    jsonError("Gender is required.");
}

if ($eventLocation === '') {
    jsonError("Event Location is required.");
}

if ($permanentAddress === '') {
    jsonError("Permanent Address is required.");
}

if ($currentAddress === '') {
    jsonError("Current Address is required.");
}

if ($targetCategory === '') {
    jsonError("Target Member Category is required.");
}

if ($currentOrg === '') {
    jsonError("Current Organisation / College Name is required.");
}

if ($currentRole === '') {
    jsonError("Current Role / Designation is required.");
}

if ($highestQual === '') {
    jsonError("Highest Qualification is required.");
}

if ($ugDegree === '') {
    jsonError("UG Degree is required.");
}

if ($ugBranch === '') {
    jsonError("UG Branch is required.");
}

if ($techSkills === '') {
    jsonError("Technical Skills are required.");
}

if ($areasInterest === '') {
    jsonError("Areas of Interest are required.");
}

if ($joinReason === '') {
    jsonError("Joining reason is required.");
}

if ($paymentDone !== 'Yes') {
    jsonError("Please confirm the payment.");
}

if ($transactionId === '') {
    jsonError("Transaction ID is required.");
}


/* =========================================================
   CHECK FILES
========================================================= */

if (!isset($_FILES['idProof']) ||
    $_FILES['idProof']['error'] !== UPLOAD_ERR_OK) {

    jsonError("Government ID Proof is required.");
}


if (!isset($_FILES['photo']) ||
    $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {

    jsonError("Profile Photo is required.");
}


if (!isset($_FILES['paymentProof']) ||
    $_FILES['paymentProof']['error'] !== UPLOAD_ERR_OK) {

    jsonError("Payment Proof is required.");
}


/* =========================================================
   UPLOAD DIRECTORIES
========================================================= */

$baseUploadDir = __DIR__ . "/uploads/";

$idDir = $baseUploadDir . "id_proof/";

$photoDir = $baseUploadDir . "photos/";

$paymentDir = $baseUploadDir . "payments/";


if (!is_dir($idDir)) {
    mkdir($idDir, 0777, true);
}

if (!is_dir($photoDir)) {
    mkdir($photoDir, 0777, true);
}

if (!is_dir($paymentDir)) {
    mkdir($paymentDir, 0777, true);
}


/* =========================================================
   FILE UPLOAD FUNCTION
========================================================= */

function uploadFile($file, $directory, $allowedExtensions)
{

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $originalName = $file['name'];

    $extension =
        strtolower(
            pathinfo(
                $originalName,
                PATHINFO_EXTENSION
            )
        );

    if (!in_array($extension, $allowedExtensions)) {
        return false;
    }

    $newName =
        date('YmdHis') .
        '_' .
        bin2hex(random_bytes(6)) .
        '.' .
        $extension;

    $destination =
        $directory . $newName;

    if (!move_uploaded_file(
        $file['tmp_name'],
        $destination
    )) {

        return false;
    }

    return $newName;
}


/* =========================================================
   UPLOAD FILES
========================================================= */

$idProofFile = uploadFile(
    $_FILES['idProof'],
    $idDir,
    ['pdf', 'jpg', 'jpeg', 'png']
);

if ($idProofFile === false) {
    jsonError("Invalid Government ID Proof file.");
}


$photoFile = uploadFile(
    $_FILES['photo'],
    $photoDir,
    ['jpg', 'jpeg', 'png']
);

if ($photoFile === false) {
    jsonError("Invalid Profile Photo file.");
}


$paymentProofFile = uploadFile(
    $_FILES['paymentProof'],
    $paymentDir,
    ['jpg', 'jpeg', 'png', 'pdf']
);

if ($paymentProofFile === false) {
    jsonError("Invalid Payment Proof file.");
}


/* =========================================================
   DECLARATIONS
========================================================= */

$foundingMember =
    isset($_POST['foundingMember'])
        ? 1
        : 0;

$lifetimeAccess =
    isset($_POST['lifetimeAccess'])
        ? 1
        : 0;

$transparentGuidelines =
    isset($_POST['transparentGuidelines'])
        ? 1
        : 0;

$consent =
    isset($_POST['consent'])
        ? 1
        : 0;


/* =========================================================
   FINAL CONSENT
========================================================= */

if ($consent !== 1) {

    jsonError(
        "You must accept the final consent."
    );
}

/* =========================================================
   INSERT DATABASE
========================================================= */

try {

    $sql = "
        INSERT INTO `members` (

            `full_name`,
            `whatsapp_number`,
            `email`,
            `dob`,
            `linkedin_url`,
            `current_city`,
            `mother_tongue`,
            `gender`,
            `event_location`,
            `permanent_address`,
            `current_address`,
            `github_url`,

            `target_category`,
            `current_org`,
            `current_role`,

            `highest_qualification`,
            `ug_degree`,
            `ug_branch`,
            `pg_branch`,

            `tech_skills`,
            `areas_interest`,
            `join_reason`,

            `id_proof`,
            `photo`,
            `payment_done`,
            `transaction_id`,
            `payment_proof`,

            `founding_member`,
            `lifetime_access`,
            `transparent_guidelines`,
            `consent`

        )

        VALUES (

            :full_name,
            :whatsapp_number,
            :email,
            :dob,
            :linkedin_url,
            :current_city,
            :mother_tongue,
            :gender,
            :event_location,
            :permanent_address,
            :current_address,
            :github_url,

            :target_category,
            :current_org,
            :current_role,

            :highest_qualification,
            :ug_degree,
            :ug_branch,
            :pg_branch,

            :tech_skills,
            :areas_interest,
            :join_reason,

            :id_proof,
            :photo,
            :payment_done,
            :transaction_id,
            :payment_proof,

            :founding_member,
            :lifetime_access,
            :transparent_guidelines,
            :consent

        )
    ";


    $stmt = $pdo->prepare($sql);


    $stmt->execute([

        ':full_name' =>
            $fullName,

        ':whatsapp_number' =>
            $whatsappNumber,

        ':email' =>
            $email,

        ':dob' =>
            $dob,

        ':linkedin_url' =>
            $linkedinUrl,

        ':current_city' =>
            $currentCity,

        ':mother_tongue' =>
            $motherTongue,

        ':gender' =>
            $gender,

        ':event_location' =>
            $eventLocation,

        ':permanent_address' =>
            $permanentAddress,

        ':current_address' =>
            $currentAddress,

        ':github_url' =>
            $githubUrl,

        ':target_category' =>
            $targetCategory,

        ':current_org' =>
            $currentOrg,

        ':current_role' =>
            $currentRole,

        ':highest_qualification' =>
            $highestQual,

        ':ug_degree' =>
            $ugDegree,

        ':ug_branch' =>
            $ugBranch,

        ':pg_branch' =>
            $pgBranch,

        ':tech_skills' =>
            $techSkills,

        ':areas_interest' =>
            $areasInterest,

        ':join_reason' =>
            $joinReason,

        ':id_proof' =>
            $idProofFile,

        ':photo' =>
            $photoFile,

        ':payment_done' =>
            $paymentDone,

        ':transaction_id' =>
            $transactionId,

        ':payment_proof' =>
            $paymentProofFile,

        ':founding_member' =>
            $foundingMember,

        ':lifetime_access' =>
            $lifetimeAccess,

        ':transparent_guidelines' =>
            $transparentGuidelines,

        ':consent' =>
            $consent

    ]);


    echo json_encode([
        "success" => true,
        "message" => "Application submitted successfully.",
        "id" => $pdo->lastInsertId()
    ]);

} catch (PDOException $e) {

    echo json_encode([
        "success" => false,
        "message" => "Database insert failed: " . $e->getMessage()
    ]);

}