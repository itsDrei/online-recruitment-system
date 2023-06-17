<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "capstone";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select only distinct job titles with active status
$query = "SELECT DISTINCT job_title, job_desc FROM job_vacancy WHERE job_status='active'";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    while ($job = mysqli_fetch_array($query_run)) {
        ?>
        <div style=" max-width: 90%;" class="col">
            <div class="card h-100 shadow custom-card">
                <div class="card-body">
                    <form action="application.php" method ="post">
                        <input type="hidden" name ="jobt" value="<?= $job['job_title'] ?>">
                        <h4 class="card-title" ><?= $job['job_title'] ?></h4>
                        <p class="card-text"><?= $job['job_desc'] ?></p>
                        <button type="submit" name ="job" class ="btn btn-danger">Apply now!</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "No active jobs found.";
}
?>
