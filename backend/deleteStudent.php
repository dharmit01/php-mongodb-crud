<?php
include('../connection.php');
require_once "../vendor/autoload.php";

$studentModel = $database->students;

if (isset($_POST['student_id'])) {
    $id = $_POST['student_id'];
    try {
        $result = $studentModel->findOneAndDelete(["_id" => new MongoDB\BSON\ObjectId("$id")]);
        echo json_encode(array("message" => "success"));
    } catch (\Throwable $th) {
        echo json_encode(array("message" => "failure"));
    }
}
