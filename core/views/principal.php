<!DOCTYPE html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  *:not(body) {
    margin: 0;
    padding: 0;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    display: flex;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    padding: 20px;
    /* background: -webkit-linear-gradient(left, #a445b2, #fa4299); */
  }

  .wrapper {
    width: 800px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;

  }

  .wrapper .card {
    background: #41434c;
    width: calc(33% - 20px);
    height: 300px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
  }

  .wrapper .card .circle {
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 50%;
    cursor: default;
  }

  .card .circle .box,
  .card .circle .box span {
    position: absolute;
    top: 50%;
    left: 50%;
  }

  .card .circle .box {
    height: 100%;
    width: 100%;
    background: #41434c;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    transition: all 0.2s;
  }

  .card .circle:hover .box {
    transform: translate(-50%, -50%) scale(0.91);
  }

  .card .circle .box span,
  .wrapper .card .text {
    background: -webkit-linear-gradient(left, #c069c3, #fa4299);
    -webkit-background-clip: text;
    background-clip: none;
    -webkit-text-fill-color: transparent;
  }

  .circle .box span {
    font-size: 38px;
    font-family: sans-serif;
    font-weight: 600;
    transform: translate(-45%, -45%);
    transition: all 0.1s;
  }

  .card .circle:hover .box span {
    transform: translate(-45%, -45%) scale(1.09);
  }

  .card .text {
    font-size: 20px;
    font-weight: 600;
  }

  @media(max-width: 753px) {
    .wrapper {
      max-width: 700px;
    }

    .wrapper .card {
      width: calc(50% - 20px);
      margin-bottom: 20px;
    }
  }

  @media(max-width: 505px) {
    .wrapper {
      max-width: 500px;
    }

    .wrapper .card {
      width: 100%;
    }
  }
</style>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
</head>

<body>















<?php 
    
    $a="testeeeee";



 foreach ($maxprincipal as $maxprincipal) : ?>

  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->

  <div class="wrapper" style="position: absolute; top: 45%;  left: 35%;  margin: -100px 0 0 -150px;">
    <div class="card">
      <a href="?a=contaprincipal">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
      </a>
      <div class="text">Conta Principal <br> Centimos <?php echo( $maxprincipal->saldo_principal); ?> </div>
    </div>

    <a href="?a=contapoupancas">
      <div class="card js">
        <div class="circle">
          <div class="bar"></div>
          <div class="box"><span></span></div>
        </div>
    </a>
    <div class="text">Poupanças<br> Centimos <?php echo( $maxprincipal->saldo_poupanças); ?></div>
  </div>
  <a href="?a=contareserva">
    <div class="card react">
      <div class="circle">
        <div class="bar"></div>
        <div class="box"><span></span></div>
      </div>
  </a>
  <div class="text">Reserva <br> Centimos <?php echo( $maxprincipal->saldo_reserva); ?></div>
  </div>
  </div>

  <script>
    
    
    
    var principal = "<?= $maxprincipal->saldo_principal ?>";
    var reserva = "<?= $maxprincipal->saldo_reserva ?>";
    var poupanca = "<?= $maxprincipal->saldo_poupanças ?>";

    var max = (parseInt(principal) + parseInt(reserva) + parseInt(poupanca));


    
    let options = {
      startAngle: -1.55,
      size: 150,
      /* 1ST */
      
      value: ((principal / max)),
      fill: {
        gradient: ['#a445b2', '#fa4299']
      }
    }
    $(".circle .bar").circleProgress(options).on('circle-animation-progress',
      function(event, progress, stepValue) {
        $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
      });
    $(".js .bar").circleProgress({
      /* 2ND */
      value: ((poupanca / max)),
      
    });
    $(".react .bar").circleProgress({
      /* 3RD */
      value: ((reserva / max))
      
    });
  </script>
<?php endforeach; ?>
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->
  <!-- AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA -->

</body>

</html>