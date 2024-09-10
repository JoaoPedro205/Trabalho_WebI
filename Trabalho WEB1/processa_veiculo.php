<?php
include 'conexao.php';

$modeloVeiculo = $_POST['modeloVeiculo'];
$marcaVeiculo = $_POST['marcaVeiculo'];
$anoVeiculo = $_POST['anoVeiculo'];
$precoVeiculo = $_POST['precoVeiculo'];

$sql_veiculo_existe = "SELECT id_veiculo FROM veiculos WHERE modelo = '$modeloVeiculo' AND marca = '$marcaVeiculo' AND ano = '$anoVeiculo'";
$resultado_veiculo = $conn->query($sql_veiculo_existe);

if ($resultado_veiculo->num_rows > 0) {
    $row = $resultado_veiculo->fetch_assoc();
    $id_veiculo = $row['id_veiculo'];
} else {
    $sql_veiculo = "INSERT INTO veiculos (modelo, marca, ano, preco) 
                    VALUES ('$modeloVeiculo', '$marcaVeiculo', '$anoVeiculo', '$precoVeiculo')";
    if ($conn->query($sql_veiculo) === TRUE) {
        $id_veiculo = $conn->insert_id; 
    } else {
        echo "Erro ao inserir veículo: " . $conn->error;
        exit();
    }
}

header("Location: venda.html");

$conn->close();
?>