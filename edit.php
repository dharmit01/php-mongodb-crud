<?php
session_start();
include("./header.php");
include("./connection.php");

$studentId = $_GET['id'];

$_SESSION['student_id'] = $studentId;
$studentsModel = $database->students;

$student = ($studentsModel->find(["_id" => new MongoDB\BSON\ObjectId("$studentId")])->toArray())[0];
?>

<div class="container mt-5">
    <div class="row w-50 mx-auto">
        <h1>Edit Student</h1>
        <form method="POST" class="mt-3" action="backend/editStudent.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name of Student</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Student"
                    required value="<?php echo $student['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email of Student</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address of Student"
                    value="<?php echo $student['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="passout_year" class="form-label">Passout Year of Student</label>
                <input type="number" class="form-control" id="passout_year" name="passout_year"
                    placeholder="Passout Year of Student" value="<?php echo $student['year']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="department" name="department"
                    placeholder="Department of Student" value="<?php echo $student['department']; ?>" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-success mt-3 px-4" name="editStudent">Edit</button>
            </div>
        </form>

    </div>
</div>

<?php include("./footer.php"); ?>