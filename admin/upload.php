<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

$message = "";

// if(isset($_POST['submit'])) { // regular form upload
if(isset($_FILES['file'])) { // for dropzone

    // echo "<h1>HELLO</h1>";

    $photo = new Photo();

    $photo->user_id = $_SESSION['user_id'];

    $photo->title = $_POST['title']; // setting title (form properties)

    // $photo->set_file($_FILES['file_upload']); // setting upload properties REGULAR
    $photo->set_file($_FILES['file']); // setting upload properties DROPZONE

    if($photo->save()) {

        $message = "Photo uploaded Successfully";

    } else {

        $message = join("<br>", $photo->errors); // displaying the errors

    }

}

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            


        <?php include("includes/top_nav.php"); ?>




            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->



        <?php include("includes/side_nav.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Upload
                            <small></small>
                        </h1>

                        <div class="row">

                            <div class="col-md-6"> <!-- it takes half of the screen / container -->
                                <?php echo $message; ?>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <!-- <input type="file" name="file_upload"> --> <!-- regular form upload -->
                                        <input type="file" name="file"> <!-- for dropzone -->
                                    </div>

                                    <input type="submit" name="submit">

                                </form>
                            </div>

                        </div><!-- End of Row -->

                        <div class="row">
                            
                            <div class="col-lg-12">
                                
                                <form action="upload.php" class="dropzone"></form>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>