<?php
	include 'includes/header.php';
?>

<link rel="stylesheet" href="styles/gallery_style.css">

<section>
<div class="container" id="wrapper">
    <div class="row">

        <?php
            include_once 'includes/dbh.inc.php';
            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL STATEMENT FAILED";
            } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <a class="col-sm-3" id="grid-link" href="#">
                            <div class="col-sm-3" id="grid-item" style="background-image: url(images/gallery/'.$row["imgFullNameGallery"].')">
                            </div>
                            </a>';	
                        }
                    }


                    
                    ?>

    </div>



</div>
</section>


<?php
	include 'includes/footer.php';
?>