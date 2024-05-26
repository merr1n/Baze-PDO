<?php
require_once ("connection.php");

mysqli_query($con, "DROP PROCEDURE IF EXISTS InsertUser");
$insertUserProcedure = "
CREATE PROCEDURE InsertUser(IN p_username VARCHAR(80), IN p_mail VARCHAR(80), IN p_password VARCHAR(80))
BEGIN
    INSERT INTO account (username, mail, password) VALUES (p_username, p_mail, p_password);
END;
";
mysqli_query($con, $insertUserProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS UpdateUser");

$updateUserProcedure = "

CREATE PROCEDURE UpdateUser(IN id INT, IN p_username VARCHAR(80), IN p_mail VARCHAR(80), IN p_password VARCHAR(80), IN p_position VARCHAR(80))
BEGIN
    UPDATE account SET username = p_username, mail = p_mail, password = p_password, position = p_position WHERE id = id;
END;
";
mysqli_query($con, $updateUserProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS DeleteUser");
$deleteUserProcedure = "
CREATE PROCEDURE DeleteUser(IN user_id INT)
BEGIN
    DELETE FROM account WHERE id = user_id;
END;
";
mysqli_query($con, $deleteUserProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS InsertGame");
$insertGameProcedure = "
CREATE PROCEDURE InsertGame(IN p_name VARCHAR(200), IN p_type VARCHAR(200), IN p_image VARCHAR(200), IN p_price INT(4), IN p_stock INT(4), IN p_abreviation VARCHAR(200), IN p_description VARCHAR(200), IN p_specifications VARCHAR(200))
BEGIN
    INSERT INTO games (name, type, image, price, stock, abreviation, description, specifications) VALUES (p_name, p_type, p_image, p_price, p_stock, p_abreviation, p_description, p_specifications);
END;
";
mysqli_query($con, $insertGameProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS UpdateGame");

$updateGameProcedure = "

CREATE PROCEDURE UpdateGame(IN id INT, IN p_name VARCHAR(200), IN p_type VARCHAR(200), IN p_image VARCHAR(200), IN p_price INT(4), IN p_stock INT(4), IN p_abreviation VARCHAR(200), IN p_description VARCHAR(200), IN p_specifications VARCHAR(200))
BEGIN
    UPDATE games SET name = p_name, type = p_type, image = p_image, price = p_price, stock = p_stock, abreviation = p_abreviation, description = p_description, specifications = p_specifications WHERE id = id;
END;
";
mysqli_query($con, $updateGameProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS DeleteGame");
$deleteGameProcedure = "
CREATE PROCEDURE DeleteGame(IN game_id INT)
BEGIN
    DELETE FROM games WHERE id = game_id;
END;
";
mysqli_query($con, $deleteGameProcedure);

?>