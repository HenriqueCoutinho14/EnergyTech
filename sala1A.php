<?php 
include 'banco.php';

if (isset($_GET['excluir_id'])) {
    $idParaExcluir = $_GET['excluir_id'];

    if (excluirSalaPorId($idParaExcluir)) {
        echo "<div class='alert alert-success text-center mt-4'> <br> A sala com ID <strong>$idParaExcluir</strong> foi excluída com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Erro ao tentar excluir a sala com ID <strong>$idParaExcluir</strong>. Tente novamente.</div>";
    }
}
if (isset($_GET['atualizar_id'])) {
    $idParaExcluir = $_GET['atualizar_id'];

    if (excluirSalaPorId($idParaExcluir)) {
        echo "<div class='alert alert-success text-center mt-4'> <br> A sala com ID <strong>$idParaExcluir</strong> foi excluída com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Erro ao tentar excluir a sala com ID <strong>$idParaExcluir</strong>. Tente novamente.</div>";
    }
}

$sala_info = Sala1A();

if ($sala_info) {
    echo '<table style="border: 1px solid;">';
    echo '<thead>
            <tr>
                <th>Sala</th>
                <th>Bloco</th>
                <th>Início da Reserva</th>
                <th>Fim da Reserva</th>
                <th>Status</th>
                <th>Editar</th>
                <th>Excluir</th>
                  <th>Atualizar</th>
            </tr>
          </thead>';
    echo '<tbody>';

    foreach ($sala_info as $sala) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($sala['nome_sala']) . "</td>";
        echo "<td>" . htmlspecialchars($sala['nome_bloco']) . "</td>";
        echo "<td>" . htmlspecialchars($sala['inicio_reserva']) . "</td>";
        echo "<td>" . htmlspecialchars($sala['fim_reserva']) . "</td>";
        echo "<td>" . htmlspecialchars($sala['status_sala']) . "</td>";
        echo "<td>"."</td>";
        echo "<td><a href='?excluir_id=" . urlencode($sala['id_salas']) . "' onclick='return confirm(\"Tem certeza que deseja excluir a sala " . htmlspecialchars($sala['nome_sala']) . "?\");'>Excluir</a></td>";
        echo "</tr>";
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "Não foi possível encontrar informações da sala.";
}
?>
<a href="Escolha_salas.php">Voltar ao Menu</a>
