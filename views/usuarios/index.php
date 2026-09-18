<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="header-action">
    <h1>Usuários Cadastrados</h1>
    <a href="/lp3_projeto/usuarios/criar" class="btn btn-primary">+ Novo Usuário</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= htmlspecialchars($user['nome']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td>
                        <a href="/lp3_projeto/usuarios/editar?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        
                        <a href="/lp3_projeto/usuarios/excluir?id=<?= $user['id'] ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Nenhum usuário cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../layout/footer.php'; ?>