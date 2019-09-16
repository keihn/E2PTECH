<?php

//check if submit button is pressed
if (isset($_POST['submit'])) {

  //check if the name field in the form is left empty
    $newfilename = $_POST['fileName'];
    if (empty($newfilename)) {
        $newfilename = "gallery";
    } else {
        $newfilename = strtolower(str_replace(" ", "-", $newfilename));
    }


    $imgTitle = $_POST['fileTitle'];
    $imgDesc = $_POST['fileDesc'];


    $file = $_FILES['file'];



    //get attributes of the uploaded file
     $fileName = $file['name'];
     $fileTempName = $file['tmp_name'];
     $fileError = $file['error'];
     $fileSize = $file['size'];

     //split the file name and extract the extension
     $fileExtension = explode(".", $fileName);
     $fileActualExtension = strtolower(end($fileExtension));

    
     $allowedFileType = array("jpg", "jpeg", "png");

     //check if uploaded file is amongst the accepted list of files
     if (in_array($fileActualExtension, $allowedFileType)) {
      
      //ckeck for file error and specified file size
      if ($fileError === 0) {
         if ($fileSize < 20000000) {

          //create a special ID for each file uploaded
           $imageFullName = $newfilename . "." . uniqid("", true) . "." . $fileActualExtension;
           $filedestination = "../images/gallery/" . $imageFullName;

           //include database connection
           include_once 'dbh.inc.php';

           if (empty($imgTitle) || empty($imgDesc)) {
             header("location: ../gallery.php?upload=empty");

           }else {
             $sql = "SELECT * FROM gallery;";

             //initialize prepared statement
             $stmt = mysqli_stmt_init($conn);
             if (!mysqli_stmt_prepare($stmt, $sql)) {
               echo "SQL statement failed!";
             }else {

              //execute prepared statement
               mysqli_stmt_execute($stmt);
               $result = mysqli_stmt_get_result($stmt);

               //check if there is a result
               $rowCount = mysqli_num_rows($result);

               //once there is a new ipload, give it an index for ordering items in the database
               $setImageOrder = $rowCount + 1;


               $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?,?,?,?);";
                //check if prepared statement is still working
               if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "something failed";
               }else {
                 //bind prepared statement with database values
                 mysqli_stmt_bind_param($stmt, "ssss", $imgTitle, $imgDesc, $imageFullName, $setImageOrder);
                 mysqli_stmt_execute($stmt);


                 move_uploaded_file($fileTempName, $filedestination);

                 header("location: ../gallery.php?upload=succes");
               }

             }
           }

         }else {
           echo "File size exceeds maximum requirement";
           exit();
         }
       }else {
         echo "An error occured";
         exit();
       }
     }else {
       echo "File type not supported";
       exit();
     }

}
