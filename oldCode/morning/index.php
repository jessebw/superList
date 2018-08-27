<?php 
    include "includes/header.php";
?>

    <div class="container">
    
        <?php 
            if(isset($_POST['submit'])){
                // set variables
                $item_name = $_POST['item_name'];
                $item_quantity = "";
                $item_urgency = "";

                // add quantity
                if (empty($_POST["item_quantity"])){
                    $item_quantity = 1;
                    $query = "INSERT INTO items($item_quantity)";
                }else {
                    $item_quantity = $_POST["item_quantity"];	
                }
                // add name
                if($item_name == "" || empty($item_name)){
                    echo "<p class='formError'>Opps<br> Please fill in an item you would like to add.</p>";
                }
                // add urgency
                if (empty($_POST["item_urgency"])) {
                    $item_urgencyErr = "You must select a field";
                } else {
                    $item_urgency = $_POST["item_urgency"];	
                }

                //  insert into table
                $query = "INSERT INTO items (item_quantity,item_name,item_urgency) VALUE ('{$item_quantity}', '{$item_name}', '{$item_urgency}' )";

                $create_item_query = mysqli_query($connection, $query);
                    if(!$create_item_query){
                        die('QUERY FAILED' . mysqli_error($connection));
                    }
            }                         
        ?>

        <div class="formContent">
            <form action="" method="POST">
                <h1>Shopping list</h1>
                <h2>Add and item</h2>
                <input type="text" name="item_name" placeholder="name" required>
                <input type="number" name="item_quantity" placeholder="quantity">
                <p>Item urgency</p>
                <select name="item_urgency" id="dropDown">
                    <option value="staple">Staple</option>
                    <option value="needed">Needed</option>
                    <option value="luxury">Luxury</option>
                </select>
                <input class="submitBtn" type="submit" name="submit">
            </form>
        </div>    
        <div class="listContent">
            <table class="table">
                <thead>
                    <tr>
                        <th class="hide">Item id</th>
                        <th>QTY</th>
                        <th>Name</th>
                        <th>Urgency</th>
                    </tr>
                </thead>
                <tbody>
                <?php populateTable(); ?>
                <?php deleteFromTable(); ?>
            </table>
            <!-- update form -->
            <form id="editForm" action="" method="post">
                <div class="form-group">
                    <p>Edit item name:</p>

                    <?php 
                        if(isset($_GET['edit'])){
                            $item_id = $_GET['edit'];
                        
                            // All catagories query
                            $query = "SELECT * FROM items WHERE item_id = $item_id ";
                            $select_item_id = mysqli_query($connection, $query);

                            // show items from database inside table
                            while($row = mysqli_fetch_assoc($select_item_id)){
                                $item_id = $row['item_id'];
                                $item_name = $row['item_name'];
                                $item_quantity = $row['item_quantity'];
                    ?>
                    
                    <input value="<?php if(isset($item_name)){echo $item_name;} ?>" class="editInput" type="text" name="item_name">
                    <input value="<?php if(isset($item_quantity)){echo $item_quantity;} ?>" class="editInput" type="number" name="item_quantity">
                    <select name="item_urgency" id="dropDown">
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="staple_item" >Staple</option>
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="needed_item" >Needed</option>
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="luxury_item">Luxury</option>
                    </select>

                    <?php }} ?>

                    <?php 
                        // Update query
                        if(isset($_POST['update_item'])){
                            $new_item_name = $_POST['item_name'];
                            $new_item_qty = $_POST['item_quantity'];
                            $new_item_urg = $_POST['item_urgency'];
                            $query = "UPDATE items SET item_name = '{$new_item_name}', item_quantity = '{$new_item_qty}, item_urgency = '{$new_item_urg}' WHERE item_id = {$item_id} ";
                            $update_query = mysqli_query($connection, $query);
                            if(!$update_query){
                                die("update failed") . mysqli_error($connection);
                            }
                            // refresh page when deleted
                            header("Location: index.php");
                        }
                    ?>
                </div>
                <div class="editForm">
                    <input class="editBtn" type="submit" name="update_item" value="Update item">
                </div>
            </form>
<!-- /update -->
        </div> 
    
    </div> <!-- /container -->

<?php include "includes/footer.php";?>

