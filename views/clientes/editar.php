<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Cliente</h3>
        </div>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        
        <form action="/lp3_projeto/clientes/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome do Cliente:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($dado['nome']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email do Cliente:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($dado['email']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="cpf">CPF do Cliente:</label>
                <input type="text" id="cpf" name="cpf" value="<?= htmlspecialchars($dado['cpf']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="salario">Salário do Cliente:</label>
                <input type="number" id="salario" name="salario" step="0.01" value="<?= $dado['salario'] ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo do Cliente:</label>
                <select id="sexo" name="sexo" required class="form-control">
                    <option value="">Selecione...</option>
                    <option value="M" <?= $dado['sexo'] === 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $dado['sexo'] === 'F' ? 'selected' : '' ?>>Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data de Nascimento:</label>
                <input type="date" id="data" name="data" value="<?= htmlspecialchars($dado['data']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="obs">Observações:</label>
                <textarea id="obs" name="obs" required class="form-control"><?= htmlspecialchars($dado['obs']) ?></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>