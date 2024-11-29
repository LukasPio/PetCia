<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include("./db_config.php");
    
    try {        
        $pet_name = $_POST['pet_name'];
        $entry_date = $_POST['entry'];
        $time = $_POST['time'];
        $type = $_POST['service'];
        $email = $_COOKIE["email"];

        $query = "INSERT INTO baths (pet_name, date, time, TYPE, owner_email) VALUES (:pet_name, :date, :time, :type, :owner_email)";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':pet_name', $pet_name);
        $stmt->bindParam(':date', $entry_date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':owner_email', $email);

        $stmt->execute();

        header("Location: http://localhost:8000/html/index.html");
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage() . " - <a href='../html/index.html'>Back to home page</a>";
    }
}
?>
