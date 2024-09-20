<?php 
include 'conexao.php';

$idVendedor = $_POST['idVendedor'];
$nomeVendedor = $_POST['nomeVendedor'];
$id_cliente = $_POST['clienteVenda'];
$id_veiculo = $_POST['veiculoVenda'];
$dataVenda = $_POST['dataVenda'];
$valorPagamento = $_POST['valorPagamento'];
$dataPagamento = $_POST['dataPagamento'];

$sql_vendedor_existe = "SELECT id_vendedor FROM vendedores WHERE nome_vendedor = '$nomeVendedor'";
$result_vendedor = $conn->query($sql_vendedor_existe);

if ($result_vendedor->num_rows > 0) {
    $row = $result_vendedor->fetch_assoc();
    $id_vendedor = $row['id_vendedor']; 
} else {
    $sql_vendedor = "INSERT INTO vendedores (nome_vendedor) VALUES ('$nomeVendedor')";
    if ($conn->query($sql_vendedor) === TRUE) {
        $id_vendedor = $conn->insert_id; 
    } else {
        echo "Erro ao inserir vendedor: " . $conn->error;
        exit();
    }
}

$sql_venda = "INSERT INTO vendas (id_cliente, id_veiculo, id_vendedor, data_venda) 
              VALUES ('$id_cliente', '$id_veiculo', '$id_vendedor', '$dataVenda')";

if ($conn->query($sql_venda) === TRUE) {
    $id_venda = $conn->insert_id; 
} else {
    echo "Erro ao inserir venda: " . $sql_venda . "<br>" . $conn->error;
    exit();
}

$sql_pagamento = "INSERT INTO pagamentos (id_venda, valor_pagamento, data_pagamento) 
                  VALUES ('$id_venda', '$valorPagamento', '$dataPagamento')";

if ($conn->query($sql_pagamento) === TRUE) {
    echo "Pagamento registrado com sucesso!";
} else {
    echo "Erro ao inserir pagamento: " . $sql_pagamento . "<br>" . $conn->error;
}

$conn->close();

header("Location: relatorios.php");
exit();
?>