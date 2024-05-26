<?php
require_once ("connection.php");

mysqli_query($con, "DROP TRIGGER IF EXISTS GameInserted");
$insertGameTrigger = "
CREATE TRIGGER GameInserted
AFTER INSERT ON games
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, game_id, timestamp) VALUES ('Game added', NEW.id, NOW());
END;
";
mysqli_query($con, $insertGameTrigger);

mysqli_query($con, "DROP TRIGGER IF EXISTS GameUpdated");

$updateGameTrigger = "
CREATE TRIGGER GameUpdated
AFTER UPDATE ON games
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, game_id, timestamp) VALUES ('Game updated', NEW.id, NOW());
END;
";
mysqli_query($con, $updateGameTrigger);

mysqli_query($con, "DROP TRIGGER IF EXISTS GameDeleted");
$deleteGameTrigger = "
CREATE TRIGGER GameDeleted
AFTER DELETE ON games
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, game_id, timestamp) VALUES ('User deleted', OLD.id, NOW());
END;
";
mysqli_query($con, $deleteGameTrigger);
?>