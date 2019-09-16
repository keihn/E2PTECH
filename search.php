
  <?php
  include 'includes/header.php';


 if (isset($_POST['submit-search'])){
                include 'includes/dbh.inc.php';
                

    $search  = mysqli_real_escape_string($conn, $_POST['search']);



        $sql =  "SELECT * FROM gallery WHERE idGallery LIKE '%$search%' OR titleGallery LIKE '%$search%' OR descGallery LIKE '%$search%' OR imgFullNameGallery LIKE '%$search%' OR orderGallery LIKE '%$search%';";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        
        if ($queryResult > 0){
            while($row = mysqli_fetch_assoc($result)){

                echo '
                    <div class="container">
                    <h3>'.$row["titleGallery"].'</h3>
                    <hr>
                    <p>'.$row["descGallery"].'</p><br>
                    <p><p>'.$row["idGallery"].'</p></p>
                    </div>';
                    echo ' <a class="btn btn-danger" href="includes/delete.inc.php?id='.$row['idGallery'].'">Delete</a>';            
                }
        }else{
            echo '<h4>No Results</h4>';
        }
    
}else{
        echo "Something went wrong!!!";
    }


// include 'includes/footer.php';


?>