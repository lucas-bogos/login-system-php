<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../styles/form_register.css">
      <link rel="stylesheet" href="../styles/globals.css">
      <title>Cadastro</title>
  </head>
  <body>
    <?php
      $host = getenv("HOST");
      $username = getenv("USERNAME");
      $password = getenv("PASSWORD");
      $db_name = getenv("DATABASE_NAME");
    
      $connection = new \MySQLi($host, $username, $password, $db_name);

      if($connection->connect_error){
        die("Desconectado! Erro: " . $connection->connect_error);
      }
        
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name =  isset($_POST["name"])
          ? $_POST["name"] : "Não informado";
        $email = isset($_POST["email"])
          ? $_POST["email"] : "Não informado";
        $password = isset($_POST["password"])
          ? $_POST["password"] : "Não informado";
        $checked_password = isset($_POST["check_password"])
          ? $_POST["check_password"] : "Não informado";

        if ($checked_password === $password) {
          $sql = "INSERT INTO user (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";

          if ($connection->query($sql)) {
              echo '
                <p>Usuário <strong>'. $name .'</strong><span style="color: green;">
                cadastrado com sucesso!</span></p>
              ';
          } else {
              echo '
                <p><span style="color: red;"><strong>Error</strong></span>: '. $sql .'<br>'. 
                $connection->error .'</p>
              ';
          }
        } else {
            echo '<p style="color: red;"><strong>Ocorreu um erro</strong>: as senhas estão diferentes!</p>';
        }
        $connection->close();
      }
    ?>
  </body>
</html>