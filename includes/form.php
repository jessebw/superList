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