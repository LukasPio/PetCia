<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include("./db_config.php");
    
    try {        
        $pet_name = $_POST['pet_name'];
        $entry_date = $_POST['entry'];
        $exit_date = $_POST['exit'];
        $type = 'Hotel';
        $email = $_COOKIE["email"];

        $query = "INSERT INTO appointments (pet_name, entry_date, exit_date, TYPE, owner_email) VALUES (:pet_name, :entry_date, :exit_date, :type, :owner_email)";
        $stmt = $db->prepare($query);

        $stmt->bindParam(':pet_name', $pet_name);
        $stmt->bindParam(':entry_date', $entry_date);
        $stmt->bindParam(':exit_date', $exit_date);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':owner_email', $email);

        $stmt->execute();

        header("Location: http://localhost:8000/html/index.html");
    } catch (PDOException $e) {
        echo "An error occurred" . $e->getMessage() . " - <a href='../html/index.html'>Back to home page</a>";
    }
}
?>
