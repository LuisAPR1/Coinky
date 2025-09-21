<style>

/* CSS */
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



h1,h2{
  text-align:center;
}
h1{
  color:rgba(0, 250, 255, 299);
}
.PULSE {
   /* Chrome, Safari, Opera */
  -webkit-animation: PULSE 1s infinite; 
  
  /* Internet Explorer */
  -ms-animation: PULSE 1s infinite;
  
  /* Standard Syntax */
  animation: PULSE 1s infinite; 
}

/* Chrome, Safari, Opera */
@-webkit-keyframes PULSE{
   0%{color:rgba(187, 0, 212, 1);}	
	110%{color: black;}
}

/* Internet Explorer */
@-ms-keyframes PULSE{
  0%{color:rgba(187, 0, 212, 1);}	
	110%{color: black;}
}

/* Standard Syntax */
@keyframes PULSE{
  0%{color:rgba(187, 0, 212, 1);}	
	110%{color: black;}
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

                <h1 class="text-center" style="font-size: 45px;letter-spacing:2.5px ;">Login</h1>


                <form action="?a=login_submit" method="post">

                    <!-- email campo obrigatório-->
                    <div class="my-3">
                        <label style="color: #ffacdc ;">Email</label>
                        <input style="background-color:#20242c;color: white ;" type="email" name="text_email"  class="form-l" required>
                    </div>

                    <!-- password - senha1 campo obrigatório-->
                    <div class="my-3">
                        <label style="color: #ffacdc ;">Senha</label>
                        <input style="background-color:#20242c ;color: white ;" type="password" name="text_senha1"  class="form-l" required>
                    </div>


                    <!-- Botão submit -->
                    <div class="my-4 text-center">
                        <input style="background-color:#20242c ;color: #ffacdc ;" type="submit" value="Login" class="button-14">
                    </div>


                    <?php
                    if (isset($_SESSION['erro'])) : ?>
                        <div class="text-center p-2 PULSE" style="color: #ffacdc; font-weight: bold; font-size: 25 jbvdasd hjkvad uhksva uhkgsda ygdvasgyasdv gvaygpx">
                            <?= $_SESSION['erro'] ?>
                            <?php unset($_SESSION['erro']) ?>
                        </div>
                    <?php endif; ?>


                </form>
            </div>
        </div>
    </div>
</div>