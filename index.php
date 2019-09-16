<?php
include 'includes/header.php';
?>


<div id="pageDesc" class="container">
    <h1 class="text-muted">Home</h1>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
        <?php
include_once 'includes/dbh.inc.php';
$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed!";
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                <a id="img-link" href="">
                <h3>' . $row["titleGallery"] . '</h3>
                <p>' . $row["descGallery"] . '</p>
                <br>
				<div id="post-item" style="background-image: url(images/gallery/' . $row["imgFullNameGallery"] . ')">
				</div>
				<hr>
				
				</a>';
    }
}

?>
        </div>
        
        <div class="col-sm-3 sticky" id="social-feed">
            <h4>SOCIAL</h4>
            <HR></HR>


        </div>

    </div>
</div>

<?php
include 'includes/footer.php';
?>


