<?php
session_start();
?>

<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Deteksi Manipulasi Gambar</a></li>
          <li><a href="#" onclick="document.getElementById('id01').style.display='block'" class="nav-link px-2 text-white">Apa itu Manipulasi Gambar?</a></li>
        </ul>
      </div>
    </div>
  </header> 
  <div class="b-example-divider"></div>
  <br/>

  <div style="margin: auto; width: 50%">
        <?php 
        if (isset($_SESSION["output"])) {
            echo '<img id="gambar" src="saved/img/upload.jpg" style="display:block; margin: auto; width: 500px; height: 500px;">';  
            if (file_exists("saved/img/labels/upload.txt")) {
              echo "<div><center>Ada manipulasi pada gambar!<br/>
                    Cari tahu lebih tentang jenis-jenis manipulasi gambar<a href='#' style='display:inline-block;' onclick=\"document.getElementById('id01').style.display='block'\" class='nav-link px-2 text-blue'>Disini!</a></center></div>";
            } else {
              echo '<div><center>Tidak ada manipulasi pada gambar!</center></div>';
            }
            unset($_SESSION["output"]);
        } else {
            echo '<img id="gambar" src="Placeholder.png" style="display:block; margin: auto; width: 500px; height: 500px;">';
        }
        ?>
	<form method="POST" action="serv.php" enctype="multipart/form-data">
		<br/>
	    <input type="file" id="inputGambar" name="inputGambar" accept="image/jpeg, image/png" style="margin: auto; display: block;" onchange="document.getElementById('gambar').src = window.URL.createObjectURL(this.files[0])" required> 
	    <br/><br/>
	    <input name="insert" type="Submit" value="Submit" class="btn btn-primary" style="margin: auto; display: block;" onclick="processFile()">
	</form>
</div>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted"></span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
    </ul>
  </footer>
</div>
</body>

<div id="loader" class="modal">
  <!-- Modal content -->
  <div class="modal-content" style="position: relative; width: 40%; margin: 10% auto;">
    <span style="margin: auto;">Mohon tunggu sebentar, gambar sedang dalam proses</span>
    <img id="load" src="load.gif" style="margin: auto;"> 
  </div>
</div>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>Jenis-jenis manipulasi gambar</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Splicing')">Splicing</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Copy-Move')">Copy-Move</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Removal')">Removal</button>
  </div>

  <div id="Splicing" class="w3-container city">
   <h1>Splicing</h1>
   <p>Splicing merupakan salah satu jenis manipulasi gambar dimana ada gambar lain yang dimasukan ke dalam gambar.</p>
   <img id="gambar" src="splicing-example.png" style="display:block; margin: auto; width: 500px; height: 500px;">
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>

  <div id="Copy-Move" class="w3-container city">
   <h1>Copy-Move</h1>
   <p>Copy-Move merupakan salah satu jenis manipulasi gambar dimana objek pada gambar dikopi dan di duplikasikan.</p>
   <img id="gambar" src="copymove-example.png" style="display:block; margin: auto; width: 500px; height: 500px;">
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>

  <div id="Removal" class="w3-container city">
   <h1>Removal</h1>
   <p>Removal merupakan salah satu jenis manipulasi gambar dimana objek pada gambar dihapus dengan menutupinya dengan objek lain.</p>
   <img id="gambar" src="removal-example.png" style="display:block; margin: auto; width: 500px; height: 500px;"><br>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>

</html>

<script type="text/javascript">

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    // beforeSend: function() {
    //   $('#loader').show();
    // },
    // complete: function(){
    //   $('#loader').hide();
    // },
});

function processFile() {
    //let value = img;
    $('#loader').show();
    // $.ajax({
    //     type: "POST",
    //     url: "serv.php",
    //     data: {},  
    //     success: function(data) {
    //       print("abc");
    //     },
    //     error: function(XMLHttpRequest, textStatus, errorThrown) {
    //       print("bcd");
    //     },
    //     complete: function(){
    //     $('#loader').hide();
    //   }
    //   })};
}

document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>

