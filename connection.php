<?php

function conn()
{
  $host = getenv("HOST");
  $username = getenv("USERNAME");
  $password = getenv("PASSWORD");
  $db_name = getenv("DATABASE_NAME");
  
  $connection = new \MySQLi($host, $username, $password, $db_name);
  
  if ($connection->connect_error) {
    die("<p>Banco de dados desconectado! <strong>Erro</strong>: "
      . $connection->connect_error . "</p>");
  }

  return $connection;
}