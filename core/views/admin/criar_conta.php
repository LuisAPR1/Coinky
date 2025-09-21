
<div class="container">
    <div class="row my-5">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Registo de Novo Cliente ADM</h3>

            
            <form action="?a=criar_conta" method="post">
                <!-- email campo obrigatório-->
                <div class="my-3">
                <label>Email</label>
                <input type="email" name="text_email" placeholder="Email "
                class="form-control" pattern= '[\w\.]+@([\w-]+\.)+[\w-]{2,4}' title="Formato de email incorreto" required>
                </div>
                
                <!-- password - senha1 campo obrigatório-->
                <div class="my-3">
                <label>Senha</label>
                <input type="password" name="text_senha1" placeholder="Senha" class="form-control" pattern='\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*' title="senha deve ter entre 8 e 60Caracteres" required>
                </div>
                <!-- password - senha2 -->
                <div class="my-3">
                <label>Repetir a senha</label>
                <input type="password" name="text_senha2" placeholder="Repetir a senha" class="form-control" pattern='\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*' title="senha deve ter entre 8 e 60Caracteres" required>
                </div>
                <!-- Nome completo campo obrigatório -->
                <div class="my-3">
                <label>Nome completo</label>
                <input type="text" name="text_nome_completo" placeholder="Nome completo" class="form-control" pattern= '[a-zA-ZáéíóúàâêôãõüçÁÉÍÓÚÀÂÊÔÃÕÜÇ \s]{4,50}' title="Nome deve ter entre 4 e 50Caracteres" required>
                </div>
                <!-- Morada obrigatório -->
                <div class="my-3">
                <label>Morada</label>
                <input type="text" name="text_morada" placeholder="Morada"
                class="form-control" required>
                </div>
                <!-- Cidade obrigatório -->
                <div class="my-3">
                <label>Cidade</label>
                <input type="text" name="text_cidade" placeholder="Cidade"
                class="form-control" required>
                </div>
                <!-- Telefone - não é obrigatório -->
                <div class="my-3">
                <label>Telefone</label>
                <input type="text" name="text_telefone" placeholder="Telefone"
                class="form-control">
                </div>
                <!-- Botão submit -->
                <div class="my-4">
                    <input type="submit" value="Criar Conta" class="btn btn-primary">
                </div>

                <?php
                if(isset($_SESSION['erro'])): ?>
                    <div class="alert alert-danger text-center p-2">
                        <?= $_SESSION['erro'] ?>
                        <?php unset ($_SESSION['erro']) ?>
                    </div>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>