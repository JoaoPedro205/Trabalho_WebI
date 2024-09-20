<?php
include 'conexao.php';

$nomeCliente = $_POST['nomeCliente'];
$emailCliente = $_POST['emailCliente'];
$telefoneCliente = $_POST['telefoneCliente'];

$sql_cliente_existe = "SELECT id_cliente FROM clientes WHERE nome_cliente = '$nomeCliente'";
$result_cliente = $conn->query($sql_cliente_existe);

if ($result_cliente->num_rows > 0) {
    $row = $result_cliente->fetch_assoc();
    $id_cliente = $row['id_cliente'];
} else {
    $sql_cliente = "INSERT INTO clientes (nome_cliente, email_cliente, telefone_cliente) 
                    VALUES ('$nomeCliente', '$emailCliente', '$telefoneCliente')";
    if ($conn->query($sql_cliente) === TRUE) {
        $id_cliente = $conn->insert_id; 
    } else {
        echo "Erro ao inserir cliente: " . $conn->error;
        exit();
    }
}

header("Location: veiculo.html");

$conn->close();
?>