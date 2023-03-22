<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conexão com o banco de dados
$conn = new mysql($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para obter os dados
$sql = "SELECT id, nome, email FROM clientes";
$result = $conn->query($sql);

// Verifica se há dados para exibir
if ($result->num_rows > 0) {
    // Cria um formulário para exibir e editar os dados
    echo '<form method="post" action="confirmar.php">';
    echo '<select name="id">';
    // Loop através dos dados e cria uma opção para cada um
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["id"] . '">' . $row["nome"] . '</option>';
    }
    echo '</select><br>';
    echo 'Nome: <input type="text" name="nome"><br>';
    echo 'Email: <input type="text" name="email"><br>';
    echo '<input type="submit" value="Atualizar">';
    echo '</form>';
} else {
    echo "Não há dados para exibir.";
}

$conn->close();
?>
