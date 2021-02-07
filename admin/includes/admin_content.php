            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Dashboard</small>
                        </h1>



<!-- DASHBOARD -->



<div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $session->count; ?></div>
                                        <div>New Views</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                  <span class="pull-left">View Details</span> 
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-photo fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Photo::count_all(); ?></div>
                                        <div>Photos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="photos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Photos in Gallery</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo User::count_all(); ?>

                                        </div>

                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Comment::count_all(); ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Comments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                        </div> <!--First Row-->


<div class="row">
    
    <div id="piechart" style="width: 900px; height: 500px;"></div>

</div>


<!-- DASHBOARD -->

















                        <?php
                        
                        // $user = User::find_by_id(1);

                        // echo $user->username;

                        // $photo = Photo::find_by_id(4);

                        // echo $photo->filename;

                        // $result_set = User::find_all_users();

                        // while($row = mysqli_fetch_array($result_set)) {

                        //     echo $row['username'] . "<br>";

                        // }

                        // $found_user = User::find_user_by_id(2);

                        // $user = User::instantiation($found_user);

                        // echo $user->username;

                        // echo "<br>";

                        // $users = User::find_all_users();

                        // foreach ($users as $user) {
                        //     echo $user->id . "<br>";
                        // }

                        // $found_user = User::find_user_by_id(2);

                        // echo $found_user->username;

                        // $user = new User();

                        // $user->username = "Student";
                        // $user->password = "something_wierd";
                        // $user->first_name = "SOL";
                        // $user->last_name = "Don't know";

                        // $user->create();

                        // $user = User::find_by_id(9);
                        // $user->username = "David45";
                        // $user->password = "david1989";
                        // $user->first_name = "David";
                        // $user->last_name = "WILLIAMS";

                        // $user->update();

                        // $user = User::find_user_by_id(2);
                        // $user->delete();

                        // $user = User::find_user_by_id(7);

                        // $user->password = "justpassword";
                        // $user->save();

                        // $user = new User();

                        // $user->username = "NEW USER";
                        // $user->save();

                        // $users = User::find_all();

                        // foreach ($users as $user) {
                        //     echo $user->username;
                        // }

                        // $photos = Photo::find_all();

                        // foreach ($photos as $photo) {
                        //     echo $photo->title;
                        // }

                        // $photo = new Photo();

                        // $photo->title = "Just some test title";
                        // $photo->size = 20; // integer !!!

                        // $photo->create();

                        // echo INCLUDES_PATH;

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->