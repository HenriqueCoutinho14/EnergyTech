<?php
include 'banco.php';
$blocos = listar_blocos();
?>
<h1>Reservar Sala</h1>
<form method="post" action="processa_dados.php">
    <label>Nome da Sala:</label>
    <select name="nome_sala">
        <option value="1A">Sala 1A</option>
        <option value="2A">Sala 2A</option>
        <option value="1B">Sala 1B</option>
        <option value="2B">Sala 2B</option>
    </select><br><br>

    <label>Data:</label>
    <input type="date" name="data" required><br><br>

    <label>Hora de Início:</label>
    <input type="time" name="hora_inicio" required><br><br>

    <label>Hora de Fim:</label>
    <input type="time" name="hora_fim" required><br><br>

    <label>Status:</label>
    <input type="string" name="status_sala" required><br><br>

    <input type="submit" value="Reservar">
</form>
<a href="Escolha_salas.php">Voltar ao Menu</a>
