<?php
session_start();
include('../connection.php');
$studentModel = $database->students;

if (isset($_POST['editStudent'])) {
    $studentId = $_SESSION['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passoutYear = $_POST['passout_year'];
    $department = $_POST['department'];

    try {
        $newStudent = $studentModel->findOneAndUpdate(
            ["_id" => new MongoDB\BSON\ObjectId("$studentId")],
            ['$set' => [
                "name" => $name,
                "email" => $email,
                "year" => $passoutYear,
                "department" => $department
            ]]
        );

        echo "<script>alert('Student Edited Successfully')</script>";
        echo "<script>window.open('../index1.php', '_self')</script>";
    } catch (\Throwable $th) {        
        echo "<script>alert('Something Went Wrong. Please try again after sometime.')</script>";
        echo "<script>window.open('../index1.php', '_self')</script>";
    }
} else {
    echo "Hello";
}