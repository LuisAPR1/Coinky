
<style>


.button-14 {
  background-image: #20242c;
  border-color: #adb1b8 #a2a6ac #8d9096;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
 
  box-sizing: border-box;
  color: #ffacdc;
  cursor: pointer;
  display: inline-block;

  font-size: 14px;
  height: 29px;
  font-size: 13px;
  outline: 0;
  overflow: hidden;
  padding: 0 11px;
  text-align: center;
  text-decoration: none;
  text-overflow: ellipsis;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
}

.button-14:active {
  border-bottom-color: #a2a6ac;
}




label{
    color: #ffacdc ;
}
input{
    background-color:#20242c ;
    color: white ;
}

.form-l{

display: block;
width: 100%;
padding: 0.375rem 0.75rem;
padding-top: 0.375rem;
padding-right: 0.75rem;
padding-bottom: 0.375rem;
padding-left: 0.75rem;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #212529;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
border-radius: 0.25rem;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}


</style>


<div class="container">
    <div class="row my-5">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="text-center" style="font-size: 45px;letter-spacing:2.5px">Registo de Novo Cliente</h1>

            
            <form  action="?a=criar_cliente" method="post">
                <!-- email campo obrigatório-->
                <div class="my-3">
                <label>Email</label>
                <input style="background-color:#20242c;color: white ;"type="email" name="text_email" placeholder="Email"
                class="form-l" required>
                </div>
                
                <!-- password - senha1 campo obrigatório-->
                <div class="my-3">
                <label>Senha</label>
                <input style="background-color:#20242c;color: white ;"type="password" name="text_senha1" placeholder="Senha"
                class="form-l" required>
                </div>
                <!-- password - senha2 -->
                <div class="my-3">
                <label>Repetir a senha</label>
                <input style="background-color:#20242c;color: white ;"type="password" name="text_senha2" placeholder="Repetir a senha"
                class="form-l" required>
                </div>
                <!-- Nome completo campo obrigatório -->
                <div class="my-3">
                <label>Nome completo</label>
                <input style="background-color:#20242c;color: white ;"type="text" name="text_nome_completo" placeholder="Nome completo"
                class="form-l" required>
                </div>
                <!-- Morada obrigatório -->
                <div class="my-3">
                <label>Morada</label>
                <input style="background-color:#20242c;color: white ;"type="text" name="text_morada" placeholder="Morada"
                class="form-l" required>
                </div>
                <!-- Cidade obrigatório -->
                <div class="my-3">
                <label>Cidade</label>
                <input style="background-color:#20242c;color: white ;"type="text" name="text_cidade" placeholder="Cidade"
                class="form-l" required>
                </div>
                <!-- Telefone - não é obrigatório -->
                <div class="my-3">
                <label>Telefone</label>
                <input style="background-color:#20242c;color: white ;"type="text" name="text_telefone" placeholder="Telefone"
                class="form-l">
                </div>
                <!-- Botão submit -->
                <div class="my-4">
                    <input style="background-color:#20242c;color: white ;"type="submit" value="Criar Conta" class="button-14">
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