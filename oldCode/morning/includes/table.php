<?php
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
?>