  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php 
                        $query = "SELECT * FROM catagories";
                        $select_all_catagories_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_all_catagories_query)){
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    ?>




                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

