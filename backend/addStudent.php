<?php
include('../connection.php');
$studentModel = $database->students;

if (isset($_POST['addStudent'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passoutYear = $_POST['passout_year'];
    $department = $_POST['department'];

    try {
        $newStudent = $studentModel->insertOne([
            "name" => $name,
            "email" => $email,
            "year" => $passoutYear,
            "department" => $department
        ]);

        echo "<script>alert('Student Added Successfully')</script>";
        echo "<script>window.open('../index1.php', '_self')</script>";
    } catch (\Throwable $th) {
        echo "<script>alert('Something Went Wrong. Please try again after sometime.')</script>";
        echo "<script>window.open('../index1.php', '_self')</script>";
    }
} else {
    echo "Hello";
}
