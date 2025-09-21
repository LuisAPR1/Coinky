<style>
  /* Import Google Font - Poppins */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

  *:not(body) {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {

    min-height: 100vh;
    padding: 0 10px;

  }

  ::selection {
    color: #fff;
    background: #675AFE;
  }

  .wrapper {
    width: 370px;
    padding: 30px;
    border-radius: 7px;
    background: #41434c;
    box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.05);
    /* color:linear-gradient(left, #c069c3, #fa4299);; */
  }

  .wrapper header {
    font-size: 28px;
    font-weight: 500;
    text-align: center;
  }

  .wrapper form {
    margin: 40px 0 20px 0;
  }

  form :where(input, select, button) {
    width: 100%;
    outline: none;
    border-radius: 5px;
    border: none;
  }

  form p {
    font-size: 18px;
    margin-bottom: 5px;

  }



  /* .text{
  font-size: 18px;
  margin-bottom: 5px;
  background: -webkit-linear-gradient(left, #c069c3, #fa4299);
} */

  form input {
    height: 50px;
    font-size: 17px;
    padding: 0 15px;
    border: 1px solid #999;
  }

  form input:focus {
    padding: 0 14px;
    border: -webkit-linear-gradient(left, #c069c3, #fa4299);
  }

  form .drop-list {
    display: flex;
    margin-top: 20px;
    align-items: center;
    justify-content: space-between;
  }

  .drop-list .select-box {
    display: flex;
    width: 115px;
    height: 45px;
    align-items: center;
    border-radius: 5px;
    justify-content: center;
    border: 1px solid #999;
  }

  .select-box img {
    max-width: 21px;
  }

  .select-box select {
    width: auto;
    font-size: 16px;
    background: none;
    margin: 0 -5px 0 5px;
  }

  .select-box select::-webkit-scrollbar {
    width: 8px;
  }

  .select-box select::-webkit-scrollbar-track {
    background: #fff;
  }

  .select-box select::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 8px;
    border-right: 2px solid #ffffff;
  }

  .drop-list .icon {
    cursor: pointer;
    margin-top: 30px;
    font-size: 22px;
  }

  form .exchange-rate {
    font-size: 17px;
    margin: 20px 0 30px;
  }

  form button {
    height: 52px;
    color: #fff;
    font-size: 17px;
    cursor: pointer;
    background: -webkit-linear-gradient(left, #c069c3, #fa4299);
    transition: 1s ease;
    transition: background-color 1s;
  }

  .gradient-text,
  .exchange-rate {
    background-color: #f3ec78;
    background: -webkit-linear-gradient(left, #fa4299, #c069c3, #c069c3);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
    font-weight: bold;
  }

  .button:focus,
  .button:active {
    transition: 1s ease;
    transition: background-color 1s;

  }

  form button:hover {
    transition: 1s ease;
    transition: background-color 1s;
    background: -webkit-linear-gradient(left, #fa4299, #c069c3);
    transition: 1s ease;
    transition: background-color 1s;
  }
</style>


<head>
  <meta charset="utf-8">
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->

  <!-- MUDAR FUNDO DOS SELECT -->
  <!-- MUDAR SELECIONAR COM RATO QUE ESTÁ ROXO -->

  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->

  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FontAweome CDN Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>


<div style="position: relative; left:6.8%; top:10%" class="container">
        <div class="row my-5">
            <div class="col-sm-6 offset-sm-3">
        <div class="wrapper">
          <header class="gradient-text" style="font-family: 'Marker Felt', fantasy; font-size:xx-large; padding: 0px; margin-top:0px;margin-bottom: 0px;">Conversor de Moeda</header>
          <form action="#">
            <div class="amount">
              <div class="gradient-text" style="font-size: 18px;">Insira o valor:</div>
              <input style="background-color: transparent; color:#fff;" type="text" value="1">
            </div>
            <div class="drop-list">
              <div class="from">
                <p class="gradient-text">De</p>
                <div style="color: #a7a8a8;" class="select-box">
                  <img src="https://flagcdn.com/48x36/us.png" alt="flag">
                  <select style="color: #a7a8a8;" style="background: #1f2029;">
                    <!-- Options tag are inserted from JavaScript -->
                  </select>
                </div>
              </div>
              <div class="icon"><i class="fas fa-exchange-alt"></i></div>
              <div class="to">
                <p class="gradient-text">Para</p>
                <div style="color: #a7a8a8;" class="select-box">
                  <img src="https://flagcdn.com/48x36/np.png" alt="flag">
                  <select style="color: #a7a8a8;">
                    <!-- Options tag are inserted from JavaScript -->
                  </select>
                </div>
              </div>
            </div>
            <div class="exchange-rate">Fazendo a conversão...</div>
            <button>Fazer Conversão</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    let country_list = {
      "AED": "AE",
      "AFN": "AF",
      "XCD": "AG",
      "ALL": "AL",
      "AMD": "AM",
      "ANG": "AN",
      "AOA": "AO",
      "AQD": "AQ",
      "ARS": "AR",
      "AUD": "AU",
      "AZN": "AZ",
      "BAM": "BA",
      "BBD": "BB",
      "BDT": "BD",
      "XOF": "BE",
      "BGN": "BG",
      "BHD": "BH",
      "BIF": "BI",
      "BMD": "BM",
      "BND": "BN",
      "BOB": "BO",
      "BRL": "BR",
      "BSD": "BS",
      "NOK": "BV",
      "BWP": "BW",
      "BYR": "BY",
      "BZD": "BZ",
      "CAD": "CA",
      "CDF": "CD",
      "XAF": "CF",
      "CHF": "CH",
      "CLP": "CL",
      "CNY": "CN",
      "COP": "CO",
      "CRC": "CR",
      "CUP": "CU",
      "CVE": "CV",
      "CYP": "CY",
      "CZK": "CZ",
      "DJF": "DJ",
      "DKK": "DK",
      "DOP": "DO",
      "DZD": "DZ",
      "ECS": "EC",
      "EEK": "EE",
      "EGP": "EG",
      "ETB": "ET",
      "EUR": "EU",
      "FJD": "FJ",
      "FKP": "FK",
      "GBP": "GB",
      "GEL": "GE",
      "GGP": "GG",
      "GHS": "GH",
      "GIP": "GI",
      "GMD": "GM",
      "GNF": "GN",
      "GTQ": "GT",
      "GYD": "GY",
      "HKD": "HK",
      "HNL": "HN",
      "HRK": "HR",
      "HTG": "HT",
      "HUF": "HU",
      "IDR": "ID",
      "ILS": "IL",
      "INR": "IN",
      "IQD": "IQ",
      "IRR": "IR",
      "ISK": "IS",
      "JMD": "JM",
      "JOD": "JO",
      "JPY": "JP",
      "KES": "KE",
      "KGS": "KG",
      "KHR": "KH",
      "KMF": "KM",
      "KPW": "KP",
      "KRW": "KR",
      "KWD": "KW",
      "KYD": "KY",
      "KZT": "KZ",
      "LAK": "LA",
      "LBP": "LB",
      "LKR": "LK",
      "LRD": "LR",
      "LSL": "LS",
      "LTL": "LT",
      "LVL": "LV",
      "LYD": "LY",
      "MAD": "MA",
      "MDL": "MD",
      "MGA": "MG",
      "MKD": "MK",
      "MMK": "MM",
      "MNT": "MN",
      "MOP": "MO",
      "MRO": "MR",
      "MTL": "MT",
      "MUR": "MU",
      "MVR": "MV",
      "MWK": "MW",
      "MXN": "MX",
      "MYR": "MY",
      "MZN": "MZ",
      "NAD": "NA",
      "XPF": "NC",
      "NGN": "NG",
      "NIO": "NI",
      "NPR": "NP",
      "NZD": "NZ",
      "OMR": "OM",
      "PAB": "PA",
      "PEN": "PE",
      "PGK": "PG",
      "PHP": "PH",
      "PKR": "PK",
      "PLN": "PL",
      "PYG": "PY",
      "QAR": "QA",
      "RON": "RO",
      "RSD": "RS",
      "RUB": "RU",
      "RWF": "RW",
      "SAR": "SA",
      "SBD": "SB",
      "SCR": "SC",
      "SDG": "SD",
      "SEK": "SE",
      "SGD": "SG",
      "SKK": "SK",
      "SLL": "SL",
      "SOS": "SO",
      "SRD": "SR",
      "STD": "ST",
      "SVC": "SV",
      "SYP": "SY",
      "SZL": "SZ",
      "THB": "TH",
      "TJS": "TJ",
      "TMT": "TM",
      "TND": "TN",
      "TOP": "TO",
      "TRY": "TR",
      "TTD": "TT",
      "TWD": "TW",
      "TZS": "TZ",
      "UAH": "UA",
      "UGX": "UG",
      "USD": "US",
      "UYU": "UY",
      "UZS": "UZ",
      "VEF": "VE",
      "VND": "VN",
      "VUV": "VU",
      "YER": "YE",
      "ZAR": "ZA",
      "ZMK": "ZM",
      "ZWD": "ZW"
    }
  </script>

  <script>
    const dropList = document.querySelectorAll("form select"),
      fromCurrency = document.querySelector(".from select"),
      toCurrency = document.querySelector(".to select"),
      getButton = document.querySelector("form button");

    for (let i = 0; i < dropList.length; i++) {
      for (let currency_code in country_list) {
        let selected = i == 0 ? currency_code == "USD" ? "selected" : "" : currency_code == "NPR" ? "selected" : "";
        let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
        dropList[i].insertAdjacentHTML("beforeend", optionTag);
      }
      dropList[i].addEventListener("change", e => {
        loadFlag(e.target);
      });
    }

    function loadFlag(element) {
      for (let code in country_list) {
        if (code == element.value) {
          let imgTag = element.parentElement.querySelector("img");
          imgTag.src = `https://flagcdn.com/48x36/${country_list[code].toLowerCase()}.png`;
        }
      }
    }

    window.addEventListener("load", () => {
      getExchangeRate();
    });

    getButton.addEventListener("click", e => {
      e.preventDefault();
      getExchangeRate();
    });

    const exchangeIcon = document.querySelector("form .icon");
    exchangeIcon.addEventListener("click", () => {
      let tempCode = fromCurrency.value;
      fromCurrency.value = toCurrency.value;
      toCurrency.value = tempCode;
      loadFlag(fromCurrency);
      loadFlag(toCurrency);
      getExchangeRate();
    })

    function getExchangeRate() {
      const amount = document.querySelector("form input");
      const exchangeRateTxt = document.querySelector("form .exchange-rate");
      let amountVal = amount.value;
      if (amountVal == "" || amountVal == "0") {
        amount.value = "1";
        amountVal = 1;
      }
      exchangeRateTxt.innerText = "Fazendo a Conversão...";
      let url = `https://v6.exchangerate-api.com/v6/622a6c384726bcf5372a3b2f/latest/${fromCurrency.value}`;
      fetch(url).then(response => response.json()).then(result => {
        let exchangeRate = result.conversion_rates[toCurrency.value];
        let totalExRate = (amountVal * exchangeRate).toFixed(2);
        exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
      }).catch(() => {
        exchangeRateTxt.innerText = "Algo correu mal X";
      });
    }
  </script>



</body>

</html>