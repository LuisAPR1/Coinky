<div class="container-fluid">
    <div class="row">
        <div class="col-12"></div>
        <h3> ALUNOS </h3>

        <form action="?a=14_alunos" method="post">
                <!-- email campo obrigatório-->
                <div class="my-3">
                <label>Nome do Aluno</label>
                <input type="text" name="text_nome_aluno" placeholder="Nome"
                class="form-control" required>
                </div>
                
        
                <div class="my-3">
                <label>Email</label>
                <input type="email" name="text_email_aluno" placeholder="Email"
                class="form-control" required>
                </div>
                
                <!-- Botão submit -->
                <div class="my-4">
                    <input type="submit" value="Criar Aluno" class="btn btn-primary">
                </div>

    </div>
</div>