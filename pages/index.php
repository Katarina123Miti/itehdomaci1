<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRIVICNA DELA</title>
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
    <!-- Modal za izmenu - OSUDJENIKA pocetna stranica -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmena osudjenika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="imePrezime_osudjenika">Ime i prezime osudjenika:</label>
              <input type="text" class="form-control" id="imePrezime_osudjenika" value='' required>
            </div>
            <div class="form-group">
              <label for="sudija">Sudija:</label>
              <select type="text" class="form-control" id="sudija" value='' required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_krivicnih_dela">Broj krivicnih dela</label>
                <!-- placeholder/value -->
                <input type="text" id="broj_krivicnih_dela" class="form-control" placeholder="0">
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <a href='./krivicnadelaOsudjenika.php' id='svaKrivicnaDela'><button class="btn btn-warning" style="background-color: #5D7583; font-style:italic" type="button">Sva krivicna dela</button></a>
            </div>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj" style="background-color: #7C95A2;">Sacuvaj</button>
          <button type='button' class="btn btn-danger" data-dismiss="modal" id="button_delete" style="background-color: #5D7683;">Obrisi</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal za dodavanje - OSUDJENIK pocetna stranica -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodavanje novog osudjenika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="imePrezime_osudjenika_dodaj">Ime i prezime osudjenika:</label>
              <input type="text" class="form-control" id="imePrezime_osudjenika_dodaj" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="sudija_dodaj">Sudija:</label>
              <select class="form-control" id="sudija_dodaj" placeholder="" required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_krivicnih_dela_dodaj">Broj krivicnih dela</label>
                <!-- <select class="form-control" id="broj_krivicnihdela_dodaj" placeholder="" required></select> -->
                <input type="text" id="broj_krivicnih_dela_dodaj" class="form-control" placeholder="0">
              </div>
            </fieldset>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_dodaj" style="background-color: green;">Dodaj</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header.php'; ?>
 

<!-- SADRZAJ -->
<div class='centerDiv'>
  <div class='left_div grid-item'>
  </div>
  <div class='middle_div grid-item'>
    <div class='h_div'>
      <h1 class='h1_text'>Osudjenici</h1>
    </div>
    <div class='table_div table-hover'>
      <table class="table">
        <thead class="thead-red" style="background-color: pink;">
          <tr>
            <th scope="col"></th>
            <th scope="col">Osudjenik</th>
            <th scope="col">Sudija</th>
            <th scope="col">Broj krivicnih dela</th>
          </tr>
        </thead>
        <tbody id='osudjenici'>


        </tbody>
      </table>
    </div>

    <!-- DUGME NOVI OSUDJENIK -->
    <div class="button_div1">
      <button data-toggle="modal" data-target="#exampleModal" type="button" data-backdrop="static"
        class="btn btn-secondary btn-lg btn-block">NOVI OSUDJENIK</button>
    </div>

  </div>

  <div class='right_div grid-item'>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>
<script>
  let osudjenici = [];
  let sudije = [];
  let trenutniId = -1;

  $(document).ready(function () {

      ucitajOsudjenike();
      ucitajSudije();

    // Dugme za cuvanje izmena
    $('#button_sacuvaj').click(function () {
      if (trenutniId == -1) {
        return;
      }
      const imePrezime = $('#imePrezime_osudjenika').val();
      if(imePrezime === "") {
          alert("Morate uneti ime i prezime osudjenika!");
          return false;
      }
      const sudija = $('#sudija').val();
      $.post('../OsudjenikHandlers/update.php', { id: trenutniId, imePrezime: imePrezime, sudija: sudija }, function (data) {
        console.log(data);
        if (data != 1) {
          alert(data);
          return;
        }
        ucitajOsudjenike();
        trenutniId = -1;
      })
    })

    // Dugme za brisanje
    $('#button_delete').click(function () {
      if (trenutniId == -1) {
        return;
      }
      $.post('../OsudjenikHandlers/delete.php', { id: trenutniId }, function (data) {
        if (data != 1) {
          alert(data);
          return;
        }
        console.log({ trenutniId: trenutniId });
        if (data == 1) {
          console.log('filter')
          osudjenici = osudjenici.filter(function (elem) { return elem.id != trenutniId });
          iscrtajTabelu();
        }

        trenutniId = -1;
      })
    })

    // Dugme za dodavanje
    $('#button_dodaj').click(function (e) {
      const imePrezime = $('#imePrezime_osudjenika_dodaj').val();
      if(imePrezime === "") {
          alert("Morate uneti ime i prezime osudjenika!");
          return false;
      }
      
      else {
          const sudija = $('#sudija_dodaj').val();
          $.post('../OsudjenikHandlers/add.php', { imePrezime: imePrezime, sudija: sudija }, function (data) {
          console.log(data);
          if (data != 1) {
          alert(data);
          return;
        }
        ucitajOsudjenike();
      })
      }
    })

    // Modal za dodavanje
    $('#exampleModal').on('show.bs.modal', function (e) {
      $('#sudija_dodaj').html('');
      for (let sudija of sudije) {
        $('#sudija_dodaj').append(`
          <option value='${sudija.id}'>${sudija.imePrezime}</option>
        `)
      }
    })

    // Modal za izmenu
    $('#exampleModal2').on('show.bs.modal', function (e) {
      const button = $(e.relatedTarget);
      const id = button.data('id');
      trenutniId = id;

      $('#sudija').html('');
      for (let sudija of sudije) {
        $('#sudija').append(`
          <option value='${sudija.id}'>${sudija.imePrezime}</option>
        `)
      }

      const osudjenik = osudjenici.find(function (elem) {
        return elem.id == id;
      });
      if (!osudjenik) {
        return;
      }
      $('#svaKrivicnaDela').attr('href', 'krivicnadelaOsudjenika.php?id=' + id)
      $('#sudija').val(osudjenik.sudija);
      $('#imePrezime_osudjenika').val(osudjenik.imePrezime);
      $('#broj_krivicnih_dela').val(osudjenik.broj_krivicnih_dela);
    })

  })



  // Definicije funkcija
  function ucitajSudije() {
    $.getJSON('../sudijaHandlers/getAll.php', function (data) {
      if (!data.status) {
        alert(data.greska);
        return;
      }
      sudije = data.sudije;
      console.log(sudije);
    })
  }

  function ucitajOsudjenike() {
    $.getJSON('../OsudjenikHandlers/getAll.php', function (data) {
      if (!data.status) {
        alert(data.greska);
        return;
      }
      console.log(data.osudjenici)
      osudjenici = data.osudjenici;
      iscrtajTabelu();
    })
  }

  function iscrtajTabelu() {
    $('#osudjenici').html('');
    let index = 1;
    for (let osudjenik of osudjenici) {
      $('#osudjenici').append(`
        <tr data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-id=${osudjenik.id}  >
            <th scope="row">${index++}</th>
            <td>${osudjenik.imePrezime}</td>
            <td>${osudjenik.sudija_imePrezime}</td>
            <td>${osudjenik.broj_krivicnih_dela}</td>
          </tr>
        `)
    }
  }
</script>
</body>

</html>