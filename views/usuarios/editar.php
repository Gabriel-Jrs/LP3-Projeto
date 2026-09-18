<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="header-action">
    <h1>Editar Usuário</h1>
    <a href="/lp3_projeto/usuarios" class="btn btn-secondary">Voltar</a>
</div>

<form action="/lp3_projeto/usuarios/editar?id=<?= $usuario['id'] ?>" method="POST" class="card-form">
    <div class="form-group">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required class="form-control">
    </div>

    <button type="submit" class="btn btn-warning">Atualizar Cadastro</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>