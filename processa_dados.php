<?php
include 'banco.php';

$nome_sala = $_POST['nome_sala'];
$data_reserva = $_POST['data'];
$hora_inicio = $_POST['hora_inicio'];
$hora_fim = $_POST['hora_fim'];
$status_sala = $_POST['status_sala'];


if ($nome_sala === '1A' || $nome_sala === '2A') {
    $idbloco = 1;
} elseif ($nome_sala === '1B' || $nome_sala === '2B') {
    $idbloco = 2;
} else {
    echo "Sala inválida.";
    exit;
}

if (cadastrarSalas($nome_sala, $idbloco, $data_reserva, $hora_inicio, $hora_fim, $status_sala, )) {
    echo "<h1>Reserva realizada com sucesso!</h1>";
} else {
    echo "<h1>NÃO!</h1>";
}
?>
