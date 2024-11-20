<?php
include 'banco.php';
//processa_dados_arduino(){
    $sala01 = $_GET['estadoChave1'] ;
    $sala02 = $_GET['estadoChave2'] ;
    $sala03 = $_GET['estadoChave3'] ;
    $sala04 = $_GET['estadoChave4'] ;

    armazenaDadosSalas('sala01',$sala01);
    armazenaDadosSalas('sala02',$sala02);
    armazenaDadosSalas('sala03',$sala03);
    armazenaDadosSalas('sala04',$sala04);

//}
function armazenaDadosSalas($id_sala, $status_sala){
    $usuario = 'root';
    $senha = '12345';
    try{
    $pdo = new PDO("mysql:host=localhost;dbname=feira","$usuario","$senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo>prepare("UPDATE salas SET status_sala = :status_sala WHERE id_sala = :idsala");
    $stmt->bindParam(':status_sala', $status_sala);
    $stmt->bindParam(':idsala', $id_sala);
    
    $stmt->execute();
}
catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    return false;
} }
  
?>
function armazenaDadosSalas($nome_sala, $status_sala){
    $usuario = 'root';
    $senha = '12345';
    try{
    $pdo = new PDO("mysql:host=localhost;dbname=feira","$usuario","$senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo>prepare("UPDATE salas SET status_sala = :status_sala WHERE nome_sala = :idsala");
    $stmt->bindParam(':status_sala', $status_sala);
    $stmt->bindParam(':nome_sala', $nome_sala);
    
    $stmt->execute();
}
catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    return false;
} }
  
?>