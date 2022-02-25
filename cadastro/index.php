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
    <div class="form_container">
    <form action="register.php" method="post">
        <fieldset>
            <legend>Cadastro</legend>
            <label for="name">Nome</label>
            <div>
                <input type="text" name="name" id="name">
            </div>
            <label for="name">Email</label>
            <div>
                <input type="email" name="email" id="email">
            </div>
            <label for="password">Senha</label>
            <div>
                <input type="password" name="password" id="password">
            </div>
            <label for="check_password">Confirme a senha</label>
            <div>
                <input type="password" name="check_password" id="check_password">
            </div>
            <button type="submit">Registrar</button>
        </fieldset>
    </form>
    </div>
</body>
</html>