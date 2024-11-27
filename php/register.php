<?php
include("./db_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo "Email already is registered.";
            echo "<br><a href='../html/register.html'>Back to register page</a>";
            exit();
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        header("Location: ../html/login.html");

    } catch (PDOException $e) {
        echo "Ocorreu um problema: " . $e->getMessage();
    }
}
?>
