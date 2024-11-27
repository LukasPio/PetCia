<?php
include("./db_config.php");

$email = $_POST["email"];
$password = $_POST["password"];

try {
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set cookie login for 3 days
        setcookie("login_expires_date", date("Y-m-d\TH:i:s", time() + (60 * 60 * 24 * 3)), time() + (60 * 60 * 24 * 3), "/");
        
        echo "Login bem-sucedido!";
        header("Location: ../html/index.html");
        exit();
    } else {
        echo "E-mail ou senha inválidos.";
        echo "<br><a href='../html/index.html'>Voltar para a página inicial</a>";
    }
} catch (PDOException $e) {
    echo "Ocorreu um problema: " . $e->getMessage();
}
?>
