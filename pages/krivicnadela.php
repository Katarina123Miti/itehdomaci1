<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNOS KRIVICNIH DELA</title>
  <link rel="stylesheet" href="global.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>


<body>

  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <div class='h_div'>
        <h1 class='h1_text'>Krivicna dela</h1>
        <br>
        <hr>
      </div>
      <div class="row">
        <div class="col-3">
          <label>Sortiraj po datumu</label>
          <select id='sortiraj' class='form-control'>
            <option value="asc">Najskorije</option>
            <option value="desc">Najudaljenije</option>
          </select>
        </div>
        <div class="col-3">
        <label>Pretrazi po datumu</label>
          <input type="text" id="datum" onkeyup="funkcijaZaPretragu1()" placeholder="Pretrazi krivicna dela">
        </div>
        <div class="col-3">
        <label>Pretrazi po nazivu dela</label>
          <input type="text" id="nazivDela" onkeyup="funkcijaZaPretragu2()" placeholder="Pretrazi krivicna dela">
        </div>
      </div>

      <div class='table_div'>
        <table class="table">
          <thead class="thead-red" style="background-color: #D2CCE1 ;">
            <tr>
              <th scope="col"></th>
              <th scope="col">Osudjenik</th>
              <th scope="col">Datum</th>
              <th scope="col">NazivDela</th>
            </tr>
          </thead>
          <tbody id='krivicnadela'>

          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    let krivicnadela = [];
    let krivicnadelaSortirana = [];

    $(document).ready(function () {

      $.getJSON('../KrivicnoDeloHandlers/getAll.php', function (data) {
        console.log(krivicnadela);
        if (!data.status) {
          alert(data.greska);
          return;
        }
        krivicnadela = data.krivicnadela;

        krivicnadela.sort(function (a, b) {
          return a.datum.localeCompare(b.datum);

        })

        napuniTabelu(krivicnadela);
      });

      $('#sortiraj').change(function () {
        const option = $('#sortiraj').val();
        if (option === 'asc') {
          krivicnadela.sort(function (a, b) {
            return a.datum.localeCompare(b.datum);

          })
        } else {
          krivicnadela.sort(function (a, b) {
            console.log(b.marka_naziv);
            return b.datum.localeCompare(a.datum);
          })
        }

        napuniTabelu(krivicnadela);
      })
    })

    function funkcijaZaPretragu1() {
      input = document.getElementById("datum");
      filter = input.value;
      krivicnadelaSortirana = krivicnadela;

      if(filter != "") {
        krivicnadelaSortirana = krivicnadela.filter((element) => element.datum == filter);
      }
      napuniTabelu(krivicnadelaSortirana);
    }

    function funkcijaZaPretragu2() {
      input = document.getElementById("nazivDela");
      filter = input.value;
      krivicnadelaSortirana = krivicnadela;

      if(filter != "") {
        krivicnadelaSortirana = krivicnadela.filter((element) => element.nazivDela == filter);
      }
      napuniTabelu(krivicnadelaSortirana);
    }


    function napuniTabelu(niz) {
      $('#krivicnadela').html('');
      let i = 0;
      for (let krivicnodelo of niz) {
        $('#krivicnadela').append(`
            <tr>
              <td>${++i}</td>
              <td>${krivicnodelo.osudjenik_imePrezime}</td>
              <td>${krivicnodelo.datum}</td>
              <td>${krivicnodelo.nazivDela}</td>
            </tr>
          `)
      }
    }
  </script>
</body>

</html>