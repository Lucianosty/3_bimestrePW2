<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <input type="hidden" name="acao" value="EntrarLog">
        

        Usuário: <input type="text" placeholder="Digite seu nome" name="nomeUsuario">


        Senha: <input type="password" placeholder="Digite sua senha" name="senhaUsuario">

    

        <button type="submit">Entrar</button>

</form>

</body>
</html>