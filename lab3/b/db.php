<?php
try {
    $db = new SQLite3(__DIR__ . '/app.sqlite');

    $db->exec("CREATE TABLE IF NOT EXISTS events (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        location TEXT NOT NULL,
        date DATE NOT NULL,
        type TEXT NOT NULL CHECK ( type IN ('public', 'private') )
    )");

    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        role TEXT NOT NULL DEFAULT 'user'
    )");
}
catch (Exception $e) {
    die($e->getMessage());
}

function connectDatabase(): SQLite3
{
    return new SQLite3(__DIR__ . '/app.sqlite');
}
