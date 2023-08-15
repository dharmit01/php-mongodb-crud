<?php include("./connection.php"); ?>
<?php include("./header.php") ?>

<?php
// Selecting the Collection;
$studentsModel = $database->students;

// Getting Data
$students = $studentsModel->find([])->toArray();
?>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>All Students</h1>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                Student</button>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-responsive table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Displaying Data -->
                <?php
                // Variable for Sr. No
                $srNo = 1;

                // Check if Data is available
                if (count($students) > 0) {
                    foreach ($students as $student) {
                ?>
                <tr>
                    <td><?php echo $srNo; ?></td>
                    <td><?php echo $student['name'] ?></td>
                    <td><?php echo $student['email'] ?></td>
                    <td><?php echo $student['year'] ?></td>
                    <td><?php echo $student['department'] ?></td>
                    <td>
                        <a href="./edit.php?id=<?php echo $student['_id'] ?>"
                            class="btn btn-outline-primary btn-sm">Edit</a>
                        <button class="btn btn-outline-danger btn-sm delete"
                            id="<?php echo $student['_id'] ?>">Delete</button>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    ?>
                <tr>
                    <td colspan="6">No Data Available</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="backend/addStudent.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Name of Student" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email of Student</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Email Address of Student" required>
                    </div>
                    <div class="mb-3">
                        <label for="passout_year" class="form-label">Passout Year of Student</label>
                        <input type="number" class="form-control" id="passout_year" name="passout_year"
                            placeholder="Passout Year of Student" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department"
                            placeholder="Department of Student" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-success mt-3 px-4"
                            name="addStudent">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include("./footer.php") ?>

<!-- Additional Client Side JavaScript -->
<script>
$(document).ready(function() {
    $('.delete').on('click', function() {
        let studentId = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "backend/deleteStudent.php",
            data: {
                student_id: studentId
            },
            success: function(response) {
                let res = JSON.parse(response);
                if (res.message === 'success') {
                    alert('Deleted Successfully');
                    window.location.reload();
                } else {
                    alert('Something went wrong. Please try again later');
                    window.location.reload();
                }
            }
        });
    })
});
</script>