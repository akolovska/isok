<?php
session_start();
require 'db.php';
require 'jwt_helper.php';

if (!isset($_SESSION['jwt']) || !decodeJWT($_SESSION['jwt'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $db = connectDatabase();
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    $stmt = $db->prepare("UPDATE events SET name = :name, location = :location, date = :date, type = :type WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(":name", $name, SQLITE3_TEXT);
    $stmt->bindValue(":location", $location, SQLITE3_TEXT);
    $stmt->bindValue(":date", $date, SQLITE3_TEXT);
    $stmt->bindValue(":type", $type, SQLITE3_TEXT);

    $result = $stmt->execute();
    $exercise = $result->fetchArray(SQLITE3_ASSOC);
    $db->close();
    header("Location: index.blade.php");
    exit;
}
else {
    echo "error";
}