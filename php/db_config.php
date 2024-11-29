<?php 

try {
    $db = new PDO("sqlite:db.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL
    )");

    // Create appointmens table
    $db->exec("CREATE TABLE IF NOT EXISTS appointments(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        owner_email TEXT NOT NULL,
        pet_name TEXT NOT NULL,
        entry_date TEXT NOT NULL,
        exit_date TEXT NOT NULL,
        TYPE TEXT NOT NULL
    )");

    // Create baths table
    $db->exec("CREATE TABLE IF NOT EXISTS baths (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        owner_email TEXT NOT NULL,
        pet_name TEXT NOT NULL,
        date TEXT NOT NULL,
        time TEXT NOT NULL,
        TYPE TEXT NOT NULL
    )");

} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . " <a href='../html/index.html>Back to home page</a>'";
}
?>
