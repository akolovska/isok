<?php
session_start();
require 'db.php';
require 'jwt_helper.php';

if (!isset($_SESSION['jwt']) || !decodeJWT($_SESSION['jwt'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $db = connectDatabase();
    $id = intval($_GET['id']);

    $stmt = $db->prepare("SELECT * FROM events WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $event = $result->fetchArray(SQLITE3_ASSOC);
    $db->close();
}
else {
    die("error");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Event</title>
</head>
<body>
<h1>Update Event</h1>

<?php if ($event): ?>
    <form action="update_handler.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($event['name']); ?>" required><br><br>
        <label for="name">Location:</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($event['location']); ?>" required><br><br>
        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>" required><br><br>
        <label for="type">Type:</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars($event['type']); ?>" required><br><br>
        <button type="submit">Update Event</button>
    </form>
<?php else: ?>
    <p>Event not found.</p>
<?php endif; ?>
</body>
</html>