<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require "../pages/db_connect.php";  // Make sure this includes a valid MySQLi connection
$response = [
    'success' => false,
    'message' => '',
    'data' => null,
];

// Get the action parameter from the URL
$action = $_GET['action'] ?? '';
switch ($action) {
    case "login":
        $response['success'] = true;
        $response['message'] = "Successfully login";
        break;
    case "delete":
        $targetid = $_POST['id'];
        $query = "DELETE FROM users WHERE id = '$targetid'";
        if (mysqli_query($conn, $query)) {
            $response['success'] = true;
            $response['message'] = "Delete!";
        } else {
            $response['message'] = "Database error: " . mysqli_error($conn);
        }
        break;
    case "create":
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "INSERT INTO users VALUES('','$email','$password')";
        if (mysqli_query($conn, $query)) {
            $response['success'] = true;
            $response['message'] = "Created!";
        } else {
            $response['message'] = "Database error: " . mysqli_error($conn);
        }
        break;
    case "update":
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "UPDATE users SET email = '$email', pass = '$password' WHERE id = '3' ";
            if (mysqli_query($conn, $query)) {
                $response['success'] = true;
                $response['message'] = "Created!";
            } else {
                $response['message'] = "Database error: " . mysqli_error($conn);
            }
            break;
            
    default:
        $response['message'] = "Invalid action.";
        break;
}

// Return JSON response
echo json_encode($response);
mysqli_close($conn);  // Close the database connection
?>