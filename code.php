<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
    $nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
    $horario = isset($_GET["horario"]) ? $_GET["horario"] : "";
    $day = isset($_GET["day"]) ? $_GET["day"] : "";
    $month = isset($_GET["month"]) ? $_GET["month"] : "";
    $year = isset($_GET["year"]) ? $_GET["year"] : "";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "site";
    $conexao = new mysqli($servername, $username, $password, $dbname);
    if ($conexao->connect_error) {
        die("Erro de conexão: " . $conexao->connect_error);
    }
    $query = "INSERT INTO calendario (tarefa, horario, dia, mes, ano) VALUES ('$nome', '$horario', '$day', '$month', '$year')";
    if ($conexao->query($query) === TRUE) {
        echo "Tarefa adicionada com sucesso!";
		header("Location: http://localhost/a3/code.php");

    } else {
        echo "Erro ao adicionar tarefa: " . $conexao->error;
    }
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3</title>
    <link rel="stylesheet" href="code.css" />

</head>

<body>

    <form action="" method="GET">
        <div class="poptrf">
            <label id="title">Evento</label><br>
        </div>
        <label for="day" id="day">Dia: </label>
        <select name="day" id="day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>

        </select>

        <label for="month">Mes:</label>
        <select name="month" id="title">
            <option value="Janeiro">Janeiro</option>
            <option value="Fevereiro">Fevereiro</option>
            <option value="Marco">Marco</option>
            <option value="Abril">Abril</option>
            <option value="Maio">Maio</option>
            <option value="Junho">Junho</option>
            <option value="Julho">Julho</option>
            <option value="Agosto">Agosto</option>
            <option value="Setembro">Setembro</option>
            <option value="Outubro">Outubro</option>
            <option value="Novembro">Novembro</option>
            <option value="Dezembro">Dezembro</option>
        </select>

        <label for="year" id="year">Ano: </label>
        <select name="year" id="year">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
            <option value="2032">2032</option>
            <option value="2033">2033</option>
        </select>

        <br>

        <div id="container">
            <div id="week">
                <div class="poptrf">
                    Tarefa:<input name="nome" id="nome">
                    Horario:<input name="horario" id="horario">
                    <input type="submit" name="submit" value="Adicione uma tarefa">
                </div>
            </div>
        </div>
		<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";
$conexao = new mysqli($servername, $username, $password, $dbname);
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}
$query_select = "SELECT tarefa, horario, dia, mes, ano FROM calendario";
$result = $conexao->query($query_select);
if ($result->num_rows > 0) {
    echo "<h2>Tarefas adicionadas:</h2>";
    while ($row = $result->fetch_assoc()) {
        $tarefa = $row["tarefa"];
        $horario = $row["horario"];
        $dia = $row["dia"];
        $mes = $row["mes"];
        $ano = $row["ano"];

        echo "Tarefa: $tarefa, Horario: $horario, Data: $dia/$mes/$ano<br>";
    }
} else {
    echo "<p>Não há tarefas.</p>";
}
$conexao->close();
?>

    </form>
    
</body>

</html>