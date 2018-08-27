<?php


function insert_greeting(){
    echo "functions connected";
}

// Add form items to table
function addToTable(){
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
}

// build table
function populateTable(){
    // Select all from items table
    $query = "SELECT * FROM items";
    $select_items = mysqli_query($connection, $query);
    // show catagories from database inside table
    while($row = mysqli_fetch_assoc($select_items)){
        $item_id = $row['item_id'];
        $item_quantity = $row['item_quantity'];
        $item_name = $row['item_name'];
        $item_urgency = $row['item_urgency'];
        echo "<tr>";
        echo "<td class='hide'>{$item_id}</td>";
        echo "<td>{$item_quantity}</td>";
        echo "<td>{$item_name}</td>";
        echo "<td>{$item_urgency}</td>";
        echo "<td><a href='index.php?delete={$item_id}'>Delete</a></td>";
        echo "<td><a href='index.php?edit={$item_id}'>Edit</a></td>";
        echo "</tr>";
    }
}  

// Delete from table query
function deleteFromTable(){
    if(isset($_GET['delete'])){
        $del_item_id = $_GET['delete'];
        $query = "DELETE FROM items WHERE item_id = {$del_item_id} ";
        $delete_query = mysqli_query($connection, $query);
        // refresh page when deleted
        header("Location: index.php");
    }
}

// Update table items query
function editTableItems(){
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