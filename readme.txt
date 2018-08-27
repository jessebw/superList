setup:
CREATE DATABASE super_list_db;
USE super_list_db;
CREATE TABLE items (
    item_id INT NOT NULL AUTO_INCREMENT,
    item_quantity INT NOT NULL DEFAULT 1,
    item_name VARCHAR(255) NOT NULL DEFAULT 'unknown',
    item_urgency VARCHAR(255) NOT NULL DEFAULT 'staple',
    PRIMARY KEY (item_id)
    );

includes/db.php:
$db_host = 'localhost';
$db_user = 'root';
$db_pw = 'root';
$db_name = 'super_list_db';  


Running the script:

Please add:
1. Please add juice into the name feild.
2. Specify quantity of juice needed (upto 999).
3. Specify how urgently the item is needed.
4. Click submit for result.

To Edit the list:
1. Press edit on the right side.
2. specify changes needed in the fields below.
3. Click submit to activate changes.

To delete item:
1. Press delete to the right side of the table.

refrences:

https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/content
https://www.bitdegree.org/learn/mysql-insert-multiple-rows/
https://www.tutorialspoint.com/php/php_complete_form.htm