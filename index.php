<?php	/* Desenvolvido por Tiago Rodrigues */
	session_start();
	session_destroy();	
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/stylesLogin.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login Byte OS</title>
    
</head>

<body>

    <main class="form-login">

        <form method="post" action="login.php">
            <a href="http://www.byteos.com.br"><img class="mb-4" src="img/logo.png" hrel="logomarca" title="byteos.com.br"/></a>

            <h1 class="h3 mb-3 fw-normal">Bem Vindo!</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nome" placeholder="Usuário" required>
                <label for="floatingInput">Usuário</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                <label for="floatingPassword">Senha</label>
            </div>

            <span id="erroLogin">Usuário ou Senha Inválidos! </span>
            <?php if((isset($_SESSION['erro']))){echo $_SESSION['erro'];}?>
            <br />

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </main>
    <footer class="text-center fixed-bottom">
        <p>Desenvolvido por <a href="http://www.tsrweb.com.br" target="_blank">Tiago Rodrigues</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>

</html>