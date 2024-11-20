<?php
function Sala1A()
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $query = "SELECT salas.id_salas, salas.nome_sala, blocos.nome_bloco, salas.data_reserva, salas.inicio_reserva, salas.fim_reserva, salas.status_sala
          FROM salas
          JOIN blocos ON salas.idbloco = blocos.id_bloco
          WHERE salas.nome_sala = '1A';";

        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}

function Sala2A()
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $query = "SELECT salas.id_salas, salas.nome_sala, blocos.nome_bloco, salas.data_reserva, salas.inicio_reserva, salas.fim_reserva, salas.status_sala
          FROM salas
          JOIN blocos ON salas.idbloco = blocos.id_bloco
          WHERE salas.nome_sala = '2A';";

        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}

function Sala1B()
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $query = "SELECT salas.id_salas, salas.nome_sala, blocos.nome_bloco, salas.data_reserva, salas.inicio_reserva, salas.fim_reserva, salas.status_sala
          FROM salas
          JOIN blocos ON salas.idbloco = blocos.id_bloco
          WHERE salas.nome_sala = '1B';";

        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}

function Sala2B()
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $query = "SELECT salas.id_salas, salas.nome_sala, blocos.nome_bloco, salas.data_reserva, salas.inicio_reserva, salas.fim_reserva, salas.status_sala
          FROM salas
          JOIN blocos ON salas.idbloco = blocos.id_bloco
          WHERE salas.nome_sala = '2B';";

        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}
function listar_blocos()
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $luiz = $conn->prepare("SELECT * FROM blocos");  // Alterado para buscar na tabela 'blocos'
        $luiz->execute();
        $blocos = $luiz->fetchAll(PDO::FETCH_ASSOC); // Alterado para armazenar em $blocos
        return $blocos;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return null;
    }
}

function cadastrarSalas($nome_sala,$idbloco, $data_reserva, $hora_inicio, $hora_fim, $status_sala )
{
    $usuario = 'root';
    $senha = '12345';

    try {

        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT COUNT(*) FROM salas 
                                WHERE nome_sala = :nome_sala 
                                AND data_reserva = :data_reserva 
                                AND ((inicio_reserva < :hora_fim AND fim_reserva > :hora_inicio))");

        $stmt->bindParam(':nome_sala', $nome_sala);
        $stmt->bindParam(':data_reserva', $data_reserva);
        $stmt->bindParam(':hora_inicio', $hora_inicio);
        $stmt->bindParam(':hora_fim', $hora_fim);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            echo "<h1>Sala já reservada para o horário selecionado.</h1>";
            return false;
        }

        $stmt = $conn->prepare("INSERT INTO salas (nome_sala, idbloco, data_reserva, inicio_reserva, fim_reserva, status_sala)
                                VALUES (:nome_sala, :idbloco, :data_reserva, :inicio_reserva, :fim_reserva, :status_sala)");

        $stmt->bindParam(':nome_sala', $nome_sala);
        $stmt->bindParam(':idbloco', $idbloco);
        $stmt->bindParam(':data_reserva', $data_reserva);
        $stmt->bindParam(':inicio_reserva', $hora_inicio);
        $stmt->bindParam(':fim_reserva', $hora_fim);
        $stmt->bindParam(':status_sala', $status_sala);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return false;
    }
}

function excluirSalaPorId($id_salas)
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM salas WHERE id_salas = :id");
        $stmt->bindParam(':id', $id_salas, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return false;
    }
}
function atualizar($id_salas)
{
    $usuario = 'root';
    $senha = '12345';
    try {
        $conn = new PDO('mysql:host=localhost;dbname=feira', $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE salas set data_reserva, inicio_reserva, fim_reserva  WHERE id_salas = :id");
        $stmt->bindParam(':id', $id_salas, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
        return false;
    }
}
