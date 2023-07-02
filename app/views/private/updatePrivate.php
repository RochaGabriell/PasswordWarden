<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="/static/img/favicon_io/favicon.ico" type="image/x-icon">
    <title>PasswordWarden - Novo Segredo</title>
</head>

<body>
    <section
        style="background-color: #508bfc; max-height: max-content; min-height: 100vh; display: flex; align-items: center;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="index.php?action=updatePrivateVerify" method="post"
                            class="card-body p-5 text-center">

                            <h3 class="mb-5">Alterar o Segredo -
                                <?= $result['description'] ?>
                            </h3>

                            <input type="hidden" name="id_private" value="<?= $result['id_private'] ?>" />

                            <div class="form-outline mb-4">
                                <input type="text" id="typedescriptionX-2" name="description"
                                    class="form-control form-control-lg" value="<?= $result['description'] ?>"
                                    required />
                                <label class="form-label" for="typedescriptionX-2">Nome do Site</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="typeuser_or_emailX-2" name="user_or_email"
                                    class="form-control form-control-lg" value="<?= $result['user_or_email'] ?>"
                                    required />
                                <label class="form-label" for="typeuser_or_emailX-2">Usuário ou E-email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" name="password"
                                    class="form-control form-control-lg" value="<?= $result['password'] ?>" required />
                                <label class="form-label" for="typePasswordX-2">Senha</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Alterar</button>

                            <hr class="my-4">

                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error'] ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                            <div class="text-center">
                                <p><a href="index.php?action=home">Voltar</a> para a Página Inicial</p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>