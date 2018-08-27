<?php 
    include "includes/header.php";
?>

    <div class="container">
    <!-- add item to table -->
        <?php addItem(); ?>
        <div class="formContent">
            <?php include "includes/form.php"; ?>
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
                <!-- build table     -->
                <?php populateTable(); ?>
                <!-- delete table items -->
                <?php deleteTableItem(); ?>
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
                    <?php }} ?> <!-- end of while loop -->

                    <?php 
                        // Update query
                        if(isset($_POST['update_item'])){
                            $new_item_name = $_POST['item_name'];
                            $new_item_qty = $_POST['item_quantity'];
                            $new_item_urg = $_POST['item_urgency'];
                            $query = "UPDATE items SET item_name = '{$new_item_name}', item_quantity = '{$new_item_qty}' WHERE item_id = {$item_id} ";
                            $update_query = mysqli_query($connection, $query);
                            if(!$update_query){
                                die("Please click edit first") . mysqli_error($connection);
                            }
                            // refresh page when deleted
                            header("Location: index.php");
                        }
                    ?>
                </div>
                <div class="editForm">
                    <input class="editBtn" type="submit" name="update_item" value="Update item">
                </div>
            </form> <!-- /update -->
            
        </div> <!-- /listContent -->
    
    </div> <!-- /container -->

<?php include "includes/footer.php";?>

