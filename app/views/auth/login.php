<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="/static/img/favicon_io/favicon.ico" type="image/x-icon">
    <title>PasswordWarden - Entrar</title>
</head>

<body>
    <section style="background-color: #508bfc; max-height: max-content; min-height: 100vh; display: flex; align-items: center;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="index.php?action=loginVerify" method="post" class="card-body p-5 text-center">

                            <h3 class="mb-5">Entrar</h3>

                            <div class="form-outline mb-4">
                                <input type="email" id="typeEmailX-2" name="email"
                                    class="form-control form-control-lg" required />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" name="password"
                                    class="form-control form-control-lg" required />
                                <label class="form-label" for="typePasswordX-2">Senha</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>

                            <hr class="my-4">

                            <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['error'] ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_SESSION['success'] ?>
                                <?php unset($_SESSION['success']); ?>
                            </div>
                            <?php endif; ?>

                            <div class="text-center">
                                <p>Não é um membro? <a href="index.php?action=create">Registrar</a></p>
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