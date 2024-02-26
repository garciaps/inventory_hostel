<?php
include_once('../data/user_session.php'); // Check if there is any session; otherwise, redirect to login
$con = new Connection();
$pdo = $con->getPDO();

// Assuming you have some form data to determine the operation
$operation = $_POST['operation']; // Change this based on your actual form data

switch ($operation) {
    case 'insert':
        // Implement your insert logic here
        $name = $_POST['name']; // Change this based on your actual form data
        $department = $_POST['department']; // Change this based on your actual form data

        $sql = "INSERT INTO borrower (name, department) VALUES (:name, :department)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':department', $department);

        if ($stmt->execute()) {
            echo "Data inserted successfully!";
            header('location: user_borrow.php');
        } else {
            echo "Error inserting data.";
        }
        break;

    case 'update':
        // Implement your update logic here
        $borrower_id = $_POST['borrower_id']; // Change this based on your actual form data
        $name = $_POST['name']; // Change this based on your actual form data
        $department = $_POST['department']; // Change this based on your actual form data

        $sql = "UPDATE borrower SET name = :name, department = :department WHERE borrower_id = :borrower_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':borrower_id', $borrower_id);

        if ($stmt->execute()) {
            echo "Data updated successfully!";
            header('location: user_borrow.php');
        } else {
            echo "Error updating data.";
        }
        break;

    case 'delete':
        // Implement your delete logic here
        $borrower_id = $_POST['borrower_id']; // Change this based on your actual form data

        $sql = "DELETE FROM borrower WHERE borrower_id = :borrower_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':borrower_id', $borrower_id);

        if ($stmt->execute()) {
            echo "Data deleted successfully!";
            header('location: user_borrow.php');
        } else {
            echo "Error deleting data.";
        }
        break;

    default:
        echo "Invalid operation!";
        break;
}
?>
