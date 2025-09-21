

<style>

.form1{    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
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
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;}

.button-14 {
  background-image: #20242c;

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
.form-control:focus{

    box-shadow: none;
    
}
.button-14:active {
  border-bottom-color: #a2a6ac;
}

.button-14:active:hover {
  border-bottom-color: #a2a6ac;
}



.button-14:focus {
 

  outline: 0;

}</style>


<div style="position: relative; top:10%" class="container">
    <div class="row my-5">
        <div style="color: #ffacdc;" class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1">

        <form style="color: #ffacdc;" action="?a=alterar_dados_pessoais_submit" method="post">

            <div style="color: #ffacdc;  " >
                <label>Email:</label>
                <input style="background-color:#20242c;color: white ; focus-border-color: black" type="email" maxlength="50" name="text_email" class="form-control" style="box-shadow: none;" required value="<?= $dados_pessoais->email ?>">
            </div>

            <div style="color: #ffacdc;   " >
                <label>Nome completo:</label>
                <input style="background-color:#20242c;color: white ;" type="text" maxlength="50" name="text_nome_completo" class="form-control " required value="<?= $dados_pessoais->nome_completo ?>">
            </div>

            <div style="color: #ffacdc;  " >
                <label>Morada:</label>
                <input style="background-color:#20242c;color: white ;" type="text" maxlength="100" name="text_morada" class="form-control" required value="<?= $dados_pessoais->morada ?>">

            <div style="color: #ffacdc;  " >
                <label>Cidade:</label>
                <input style="background-color:#20242c;color: white ;" type="text" maxlength="50" name="text_cidade" class="form-control" required value="<?= $dados_pessoais->cidade ?>">
            </div>

            <div style="color: #ffacdc;  " >
                <label>Telefone:</label>
                <input style="background-color:#20242c;color: white ;" type="text" maxlength="20" name="text_telefone" class="form-control" value="<?= $dados_pessoais->telefone ?>">
            </div>

            <div  class="text-center my-4">
                <button style="color: #ffacdc;  " href="?a=perfil" class="btn btn-100 button-14 text-center ">Cancelar</button>
                <input  style="color: #ffacdc ;" type="submit" value="Guardar" class="btn btn-100 button-14">
            </div>

        </form>

        <?php if(isset($_SESSION['erro'])):?>
            <div class="alert alert-danger text-center p-2">
                <?= $_SESSION['erro'] ?>
                <?php unset($_SESSION['erro']) ?>
            </div>
        <?php endif; ?>

        </div>
    </div>
</div>