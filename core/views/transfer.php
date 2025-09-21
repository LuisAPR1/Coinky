<?php

use core\classes\Store;
?>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* From uiverse.io */
        button {
            width: 90vmin;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 30px 20px;
            border-radius: 5px;
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            border: 0;
            vertical-align: middle;
            text-decoration: none;
            background: transparent;
            padding: 0;
            font-size: inherit;
            font-family: inherit;
            font-weight: bold;

        }

        button.learn-more {
            width: 12.9rem;
            height: auto;
        }

        button.learn-more .circle {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: relative;
            display: block;
            margin: 0;
            width: 3rem;
            height: 3rem;
            background: #282936;
            border-radius: 1.625rem;
        }

        button.learn-more .circle .icon {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            background: #f28deb;
        }

        button.learn-more .circle .icon.arrow {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            left: 0.500rem;
            width: 1.125rem;
            height: 0.125rem;
            background: none;
        }

        button.learn-more .circle .icon.arrow::before {
            position: absolute;
            content: "";
            top: -0.29rem;
            right: 0.0625rem;
            width: 0.625rem;
            height: 0.625rem;
            border-top: 0.200rem solid #f28deb;
            border-right: 0.200rem solid #f28deb;
            transform: rotate(45deg);
        }

        button.learn-more .button-text {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            left: 1000;
            right: 0;
            bottom: 0;
            padding: 0.4rem 0;
            margin: 0 0 0 1rem;
            color: #a0569d;
            font-weight: 600;
            line-height: 1.3;

            text-transform: uppercase;

        }

        button:hover .circle {
            width: 115%;
        }

        button:hover .circle .icon.arrow {
            background: #f28deb;
            transform: translate(1rem, 0);
        }

        button:hover .button-text {
            color: #f28deb;
            filter: brightness(1.1);
            filter: contrast(2);
        }

        .container {
            background-color: #41434c;
            width: 90vmin;
            /* transform: translate(-50%, -50%); */
            top: 50%;
            left: 50%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 30px 20px;
            border-radius: 5px;
        }

        input[type="range"] {
            position: relative;
            -webkit-appearance: none;
            -moz-appearance: none;
            display: block;
            width: 80%;
            height: 8px;
            background-color: #f28deb;
            border-radius: 8px;
            outline: none;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            -webkit-appearance: none;
            height: 8px;
        }

        input[type="range"]::-moz-track {
            -moz-appearance: none;
            height: 8px;
        }

        input[type="range"]::-ms-track {
            appearance: none;
            height: 8px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            background-color: #c069c3;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -6px;
            border: none;
        }

        input[type="range"]::-moz-range-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            background-color: #c069c3;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -6px;
            border: none;
        }

        input[type="range"]::-ms-thumb {
            appearance: none;
            height: 20px;
            width: 20px;
            background-color: #f28deb;
            border-radius: 50%;
            cursor: pointer;
            margin-top: -6px;
            border: none;
        }

        input[type="range"]:active::-webkit-slider-thumb {
            background-color: #fff;
            border: 3px solid #f28deb;
        }

        #slider-value {
            width: 13%;
            position: relative;
            background-color: #c069c3;
            color: #fff;
            text-align: center;
            font-family: "Roboto Mono", monospace;
            padding: 1px 0;
            border-radius: 5px;
            font-size: 22.5px;
        }


        .select {
            display: flex;
            flex-direction: column;

            width: 250px;
            height: 40px;
            position: absolute;

            top: 36.8rem;
            right: 69rem;

        }

        .option {

            padding: 0 30px 0 10px;
            min-height: 40px;
            display: flex;
            align-items: center;
            background: #333;
            border-top: #222 solid 1px;
            position: absolute;
            top: 0;
            width: 100%;
            pointer-events: none;
            order: 2;
            z-index: 1;
            transition: background .4s ease-in-out;
            box-sizing: border-box;
            overflow: hidden;
            white-space: nowrap;

        }

        .option:hover {
            background: #666;
        }

        .select:focus .option {
            position: relative;
            pointer-events: all;
        }



        input:checked+.option {
            order: 1;
            z-index: 2;
            background: #333;
            border-top: none;
            position: relative;
        }

        input:checked+.option:after {
            content: '';
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid white;
            position: absolute;
            right: 10px;
            top: calc(50% - 2.5px);
            pointer-events: none;
            z-index: 3;
        }

        input:checked+.option:before {
            position: absolute;
            right: 0;
            height: 40px;
            width: 40px;
            content: '';
            background: #333;
        }
    </style>
</head>

<body>

    <script>
        window.onload = function() {
            slider();
            slider();
        };
    </script>





    <?php

    $a = "testeeeee";



    foreach ($maxprincipal as $maxprincipal) : ?>



        <form action="?a=send" style="position: relative; right: 23%; top:30%" method="post">

            <!-- ==================RADIOS================= -->
            <div style="position: absolute; right:34%;top:135px" class="select" tabindex="1">
                <input style="opacity:0;position:absolute;left:-99999px;" class="selectopt" name="opt1" oninput="slider()" type="radio" id="opt1" value="saldo_principal" checked>
                <label for="opt1" class="option">Principal</label>

                <input style="opacity:0;position:absolute;left:-99999px;" class="selectopt" name="opt1" oninput="slider()" type="radio" value="saldo_reserva" id="opt2">
                <label for="opt2" class="option">Reserva</label>

                <input style="opacity:0;position:absolute;left:-99999px;" class="selectopt" name="opt1" oninput="slider()" type="radio" value="saldo_poupanças" id="opt3">
                <label for="opt3" class="option">Poupanças</label>

            </div>


            <!-- ==================SLIDER================= -->
            <div class="container">
                <input type="range" id="my-slider" name="my-slider" min="0" max="10" value="10" oninput="slider()">

                <div id="slider-value">0</div>
            </div>





            <div style="position: absolute; left:62%; top: 155px">
                <!-- ==================BOTAO1================= -->
                <button style="margin-right: 25px;" type="submit" id="a1" name="a1" value="null" class="learn-more">
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>

                    <b><span class="button-text" id="htmlvariable" name="htmlvariable"> </span></b>
                </button>



                <!-- ==================BOTAO2================= -->
                <button style="margin-left: 20px;" type="submit" id="a2" name="a2" value="null" class="learn-more">
                    <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                    </span>
                    <b><span class="button-text" id="htmlvariable2" name="htmlvariable2"> </span></b>
                </button>
            </div>

        </form>

        <script>
            var principal = "<?= $maxprincipal->saldo_principal ?>";
            var reserva = "<?= $maxprincipal->saldo_reserva ?>";
            var poupanca = "<?= $maxprincipal->saldo_poupanças ?>";

            

            var input = document.getElementById("my-slider");
            var b1 = document.getElementById("a1");
            var b2 = document.getElementById("a2");

            input.setAttribute("max", principal);

            const mySlider = document.getElementById("my-slider");
            const sliderValue = document.getElementById("slider-value");

            slider();

            function slider() {


                document.getElementById("opt1")

                if (opt1.checked == true) {
                    input.setAttribute("max", principal);
                    // button.a1.setAttribute("value", reserva);
                    // button.a2.setAttribute("value", poupanca);
                    document.getElementById("htmlvariable").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Reserva ";
                    b1.setAttribute("value", "reserva");
                    document.getElementById("htmlvariable2").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Poupanças";
                    b2.setAttribute("value", "poupanças");
                }
                if (opt2.checked == true) {
                    input.setAttribute("max", reserva);
                    // button.a1.setAttribute("value", poupanca);
                    // button.a2.setAttribute("value", principal);
                    document.getElementById("htmlvariable").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Poupanças";
                    b1.setAttribute("value", "poupanças");
                    document.getElementById("htmlvariable2").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Principal";
                    b2.setAttribute("value", "principal");
                }
                if (opt3.checked == true) {
                    input.setAttribute("max", poupanca);
                    // button.a1.setAttribute("value", principal);
                    // button.a2.setAttribute("value", reserva);
                    document.getElementById("htmlvariable").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Principal";
                    b1.setAttribute("value", "principal");
                    document.getElementById("htmlvariable2").innerHTML = "Enviar " + mySlider.value + " Euros <br>para Reserva";
                    b2.setAttribute("value", "reserva");
                }
                valPercent = (mySlider.value / mySlider.max) * 100;
                mySlider.style.background = `linear-gradient(to right, #f28deb ${valPercent}%, #322f3d ${valPercent}%)`;
                sliderValue.textContent = mySlider.value;

            }
            slider();
        </script>


        <!-- Script -->

    <?php endforeach; ?>
</body>

</html>