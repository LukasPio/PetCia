<?php 

try {
    // Conexão com o banco de dados SQLite
    $db = new PDO("sqlite:db.sqlite");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o cookie de email está setado
    if (isset($_COOKIE['email'])) {
        $userEmail = $_COOKIE['email'];
    } else {
        echo "Email não encontrado no cookie.";
        exit;
    }

    // Consultando as reservas de acordo com o email do proprietário
    $stmt = $db->prepare("SELECT * FROM appointments WHERE owner_email = :email");
    $stmt->bindParam(':email', $userEmail, PDO::PARAM_STR);
    $stmt->execute();
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consultando os banhos de acordo com o email do proprietário
    $stmt_bath = $db->prepare("SELECT * FROM baths WHERE owner_email = :email");
    $stmt_bath->bindParam(':email', $userEmail, PDO::PARAM_STR);
    $stmt_bath->execute();
    $baths = $stmt_bath->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas e Banhos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Reservas de <?php echo htmlspecialchars($userEmail); ?></h2>

<h3>Reservas</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Pet</th>
            <th>Data de Entrada</th>
            <th>Data de Saída</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($appointments) > 0): ?>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($appointment['id']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['pet_name']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['entry_date']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['exit_date']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['TYPE']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhuma reserva encontrada.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h3>Banhos</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Pet</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($baths) > 0): ?>
            <?php foreach ($baths as $bath): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bath['id']); ?></td>
                    <td><?php echo htmlspecialchars($bath['pet_name']); ?></td>
                    <td><?php echo htmlspecialchars($bath['date']); ?></td>
                    <td><?php echo htmlspecialchars($bath['time']); ?></td>
                    <td><?php echo htmlspecialchars($bath['TYPE']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhum banho encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
