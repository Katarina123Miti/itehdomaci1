<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Krivicna dela osudjenika</title>
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



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="naslovModala">Dodavanje novog krivicnog dela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            
            <div class="form-group">
              <label for="datum">Datum:</label>
              <input type="text" class="form-control" id="datum" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="nazivDela">Naziv dela:</label>
              <input type="text" class="form-control" id="nazivDela" placeholder="" required>
            </div>

          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj" style="background-color: #7C95A2;">Sacuvaj</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" hidden id="button_delete" style="background-color: #5D7683;">Obrisi</button>
        </div>
      </div>
    </div>
  </div>



  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <div class='h_div'>
        <h1 class='h1_text' id='osudjenik_imePrezime'>Osudjenik: ime i prezime</h1>
        <h2 class='h1_text'>Krivicna dela</h2>
      </div>

      <div class='table_div'>
        <table class="table table-hover">
          <thead class="thead-red" style="background-color: #D2CCE1 ;">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Datum</th>
              <th scope="col">NazivDela</th>
            </tr>
          </thead>
          <tbody id='krivicnadela'>

          </tbody>
        </table>
      </div>

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-id='-1' type="button"
          class="btn btn-secondary btn-lg btn-block">NOVO KRIVICNO DELO</button>
      </div>

    </div>

    <div class='right_div grid-item'>
      <input type="text" id='osudjenikId' value="<?php echo $_GET['id']; ?>" hidden>
      </input>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    let osudjenik = undefined;
    let krivicnaDela = [];
    let trenutnoKrivicnoDeloId = -1;

    $(document).ready(function () {

        const osudjenikId = $('#osudjenikId').val();
        console.log(osudjenikId);

      $('#button_sacuvaj').click(function () {
        const datum = $('#datum').val();
        const nazivDela = $('#nazivDela').val();
        if( datum == "" || nazivDela == "") {
          alert("Morate popuniti sva polja!");
          return false;
        }
        if (trenutnoKrivicnoDeloId == -1) {
          $.post('../KrivicnoDeloHandlers/add.php', { datum: datum, nazivDela: nazivDela, osudjenik: osudjenik.id }, function (data) {
            vratiKrivicnaDela();
          })
        } else {
          $.post('../KrivicnoDeloHandlers/update.php',  {
            id:trenutnoKrivicnoDeloId,
            osudjenik:osudjenik.id,
            nazivDela:nazivDela,
            datum:datum
          } , function(data) {

            vratiKrivicnaDela();
          })
        }

      });

      $('#button_delete').click(function () {
        if (trenutnoKrivicnoDeloId == -1) {
          return;
        }
        $.post('../KrivicnoDeloHandlers/delete.php', { id: trenutnoKrivicnoDeloId }, function (data) {
            vratiKrivicnaDela();
        })
      })


      $("#exampleModal").on('show.bs.modal', function (e) {
        const tr = $(e.relatedTarget);
        trenutnoKrivicnoDeloId = tr.data('id');
        if (trenutnoKrivicnoDeloId == -1) {
          $('#naslovModala').html('Dodavanje novog krivicnog dela');
          $('#button_delete').attr('hidden', true);
          $('#button_sacuvaj').attr('hidden', false);
          $('#datum').val('');
          $('#nazivDela').val('');
        } else {
          const krivicnodelo = krivicnadela.find(function (element) { return element.id == trenutnoKrivicnoDeloId });
          $('#naslovModala').html('Izmena krivicnog dela');
          $('#button_delete').attr('hidden', false);
          $('#button_sacuvaj').attr('hidden', false);
          $('#datum').val(krivicnodelo.datum);
          $('#nazivDela').val(krivicnodelo.nazivDela);
        }
      })

      $.getJSON('../OsudjenikHandlers/getById.php', { id: osudjenikId }, function (data) {
        console.log(data);
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        osudjenik = data.osudjenik;
        console.log(osudjenik);
        $('#osudjenik_imePrezime').html('Osudjenik: ' + osudjenik.imePrezime);
        vratiKrivicnaDela();
      })
    })


    function vratiKrivicnaDela() {
      $.getJSON('../KrivicnoDeloHandlers/getAllByOsudjenik.php', { id: osudjenik.id }, function (data) {
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        $("#krivicnadela").html(data);
        krivicnadela = data.krivicnadela;
        krivicnadela.sort(function (a, b) {
          return a.datum.localeCompare(b.datum);

        })
        napuniTabelu();
      })
    }

    function napuniTabelu() {
      $('#krivicnadela').html('');
      let i = 0;
      for (let krivicnodelo of krivicnadela) {
        $('#krivicnadela').append(`
            <tr data-toggle='modal' data-target='#exampleModal' data-backdrop="static" data-id=${krivicnodelo.id} >
              <td>${++i}</td>
              <td>${krivicnodelo.datum}</td>
              <td>${krivicnodelo.nazivDela}</td>
            </tr>
          `)
      }
    }
  </script>


</body>

</html>