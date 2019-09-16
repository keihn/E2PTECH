<?php
include 'includes/header.php';
?>

<link rel="stylesheet" href="styles/style.css">








<div class="wrapper">
    <h2>SEARCH</h2>
    <hr>
    <form id="search-form" action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit-search">search</button>
    </form><br>

    <h2>UPLOAD A POST</h2>
    <hr>
    <form id="upload-form" action="includes/fileUpload.inc.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="fileName" placeholder="File name"><br>
        <input  type="text" name="fileTitle" placeholder="Image title "><br>
        <textarea type="text" name="fileDesc" placeholder="Image description"></textarea><br>
        <input type="file" name="file"><br>
        <button class="btn btn-primary" type="submit" name="submit">UPLOAD</button>

    </form>
</div>












<!-- 
<?php
include 'includes/footer.php';
?> -->