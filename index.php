<?php include("includes/header.php"); ?>


<?php

// PAGINATION

// (int) makes sure that it is an integer
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1; // setting initial value

$items_per_page = 4; // (LIMIT in SQL)

$items_total_count = Photo::count_all(); // how many photos we have

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$photos = Photo::find_by_query($sql);

// PAGINATION

// $photos = Photo::find_all();

?>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12"> <!-- 100% szélesség -->

                <div class="thumbnails row">
        
                    <?php foreach ($photos as $photo): ?>

                            <div class="col-xs-6 col-md-3">
                                
                                <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                                    <img class="home_page_photo img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                                </a>

                            </div>


                    <?php endforeach; ?>

                </div>

                <div class="row">
                    
                    <ul class="pagination">

                        <?php

                        // if we have any pages at all
                        if($paginate->page_total() > 1) {

                            // if we have a next page
                            if($paginate->has_next()) {

                                echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";

                            }

                            for ($i=1; $i <= $paginate->page_total() ; $i++) { 
                                
                                if($i == $paginate->current_page) {
                                    echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                } else {
                                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                }

                            }

                            // if we have a next page
                            if($paginate->has_previous()) {

                                echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";

                            }

                        }

                        ?>
                        
                    </ul>


                </div>

            </div>



            <!-- Blog Sidebar Widgets Column -->
            <!-- <div class="col-md-4"> -->

            
                 <?php // include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
