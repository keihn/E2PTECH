<?php
        

        $id = $_GET['id'];
        
        
                include_once "dbh.inc.php";

                $sql = "DELETE FROM gallery WHERE idGallery=".$id.";";
                if(mysqli_query($conn, $sql)){
                    header("Location: ../index.php?detete=success");
                }
                
        exit();

