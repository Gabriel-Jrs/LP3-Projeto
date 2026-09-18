<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="header-action">
    <h1>Cadastrar Novo Usuário</h1>
    <a href="/lp3_projeto/usuarios" class="btn btn-secondary">Voltar</a>
</div>

<form action="/lp3_projeto/usuarios/criar" method="POST" class="card-form">
    <div class="form-group">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required class="form-control" placeholder="Ex: João Silva">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required class="form-control" placeholder="Ex: joao@email.com">
    </div>

    <button type="submit" class="btn btn-success">Salvar Cadastramento</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
