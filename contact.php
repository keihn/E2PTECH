<<?php  include "includes/header.php"; ?> <div class="wrapper ">

    <div class="container">
        <form id="upload-form" action="includes/contact.inc.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <textarea type="text" name="message" placeholder="Message "></textarea><br>
            <button class="btn btn-primary" type="submit" name="submit">SEND</button>

        </form>
    </div>

    </div>


    <<?php  include "includes/footer.php"; ?>