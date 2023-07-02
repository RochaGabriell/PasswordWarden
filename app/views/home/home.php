<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/static/img/favicon_io/favicon.ico" type="image/x-icon">
    <title>PasswordWarden - Minhas Senhas</title>
</head>

<body style="background-color: #f5f5f5;">

    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <a class="navbar-brand" href="index.php?action=home">PasswordWarden</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?action=home">Minhas Senhas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?action=editProfile">Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?action=logout">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success'] ?>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'] ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif ?>

    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Bem Vindo,
                <?= $_SESSION['user']['username'] ?>!
            </h1>
            <p class="lead">Aqui você pode gerenciar suas senhas de forma não segura, só prática.</p>
            <p>Para começar, clique no botão abaixo.</p>
            <a class="btn btn-primary btn-lg" href="index.php?action=createPrivate" role="button">Nova Senha</a>
        </div>
    </div>

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Usuário/E-mail</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $private) { ?>
                        <tr>
                            <td>
                                <?= $private['description'] ?>
                            </td>
                            <td>
                                <?= $private['user_or_email'] ?>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="password" id="<?= $private['id_private'] ?>" readonly class="form-control"
                                        value="<?= $private['password'] ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary"
                                            onclick="mostrarSenha('<?= $private['id_private'] ?>')">Mostrar</button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="index.php?action=updatePrivate&id_private=<?= $private['id_private'] ?>"
                                    class="btn btn-outline-success">Editar</a>
                                <a href="index.php?action=deletePrivate&id_private=<?= $private['id_private'] ?>"
                                    class="btn btn-outline-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function mostrarSenha(inputId) {
            var senhaInput = document.getElementById(inputId);
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
            } else {
                senhaInput.type = "password";
            }
        }
    </script>

</body>

</html>