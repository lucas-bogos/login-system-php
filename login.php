<?php
    $host = getenv("HOST");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");
    $db_name = getenv("DATABASE_NAME");

    $connection = new \MySQLi($host, $username, $password, $db_name);

    if($connection->connect_error){
        die("<p>Banco de dados desconectado! <strong>Erro</strong>: " 
        . $connection->connect_error . "</p>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = isset($_POST["email"])
            ? $_POST["email"] : "Não informado";
        $password = isset($_POST["password"])
            ? $_POST["password"] : "Não informado";
            
        $sql = "SELECT COUNT(*) FROM user WHERE email = '{$email}' and password = '{$password}'";
        $result = $connection->query($sql);
        $row = $result->fetch_row();

        if ($row[0] > 0) {
            echo '
                <h2>E-mail <span style="color:red;">'. $email .'</span> já está cadastrado</h2>
                <p>Caso a intensão seja fazer outro cadastro, use 
                <a href="/cadastro/">página de cadastro</a></p>
            ';
        } else {
            echo '
                <h2>Usuário inexistente</h2>
                <p>Realize seu cadastro em nosso site, através do 
                <a href="/cadastro/">link</a></p>
            ';
        }
        $connection->close();
    }
?>