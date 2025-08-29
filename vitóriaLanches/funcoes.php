<?php
    function CadastroCliente(){
    $conn = conectarBanco();

    $sql = "INSERT INTO tb_usuarios (TB_USUARIOS_USERNAME, TB_USUARIOS_PASSWORD, TB_USUARIOS_TIPO) VALUES (?, ?, cliente)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss" $usuario, $senha)
    $stmt->execute();

    $stmt->close();
    $conn->close();

    }

   // function LoginCliente(){
     //   $conn = conectarBanco();

       // $sql "SELECT * FROM tb_usuarios WHERE TB_USUARIOS_USERNAME = ? AND TB_USUARIO_PASSWORD = ?";
        //$stmt = $conn->prepare($sql);
        //$stmt->bind_param("ss", $usuario, $senha);
        //$stmt->execute();
        //$result = $stmt ->get_result();
    //}

?>