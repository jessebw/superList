<?php 
    include "includes/header.php";
?>

    <div class="container">
    <!-- Add form items to table -->
        <?php addToTable()?>

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
                <!-- show table     -->
                <?php populateTable() ?>
                <!-- delete items from table -->
                <?php deleteFromTable() ?>

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
                    <!-- <select name="item_urgency" id="dropDown">
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="staple_item" >Staple</option>
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="needed_item" >Needed</option>
                        <option value="<?php if(isset($item_urgency)){echo $item_urgency;} ?>" name="luxury_item">Luxury</option>
                    </select> -->
                    <?php }} ?>
                    <!-- update table items -->
                    <?php updateTableItems() ?>
                    <input class="editBtn" type="submit" name="update_item" value="Update item">
                </div>


            </form>
<!-- /update -->
        </div> 
    
    </div> <!-- /container -->

<?php include "includes/footer.php";?>

