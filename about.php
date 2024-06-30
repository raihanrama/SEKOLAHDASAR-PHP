<?php
include "function.php";
session_start();

// Cek apakah pengguna telah login
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['logout'])) {
    // Sesi keluar akan dihandle di logout.php
    header("Location: logout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Informasi Sekolah Dasar</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

<!-- Navigasi -->
<nav>
    <a href="index.php"><img src="image/logosd.png" /></a>
    <div class="nav-link" id="navLink">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
</nav>


<div class="search-container">
    <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Cari sekolah...">
</div>

<section id="lokasi" class="lokasi">
    <h1>Daftar Sekolah Negeri</h1>
    <div class="row" id="negeriList">
        <!-- Contoh Sekolah -->
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU I</h3>
            <img src="image\SD NEGERI JATIBENING BARU I.png" alt="1" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU I</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU II</h3>
            <img src="image\SD NEGERI JATIBENING BARU II.png" alt="2" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU II</h2>
                <p>
                    <a href="https://maps.app.goo.gl/va3Aq3evJt4Wb8zg6" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU IV</h3>
            <img src="image\SD NEGERI JATIBENING BARU IV.png" alt="3" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU IV</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU V</h3>
            <img src="image\SD NEGERI JATIBENING BARU V.png" alt="4" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU V</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU VI</h3>
            <img src="image\SD NEGERI JATIBENING BARU VI.png" alt="5" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU VI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING BARU VII</h3>
            <img src="image\SD NEGERI JATIBENING BARU VII.png" alt="6" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING BARU VII</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING I</h3>
            <img src="image\SD NEGERI JATIBENING I.png" alt="7" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING I</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING II</h3>
            <img src="image\SD NEGERI JATIBENING II.png" alt="8" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING II</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING III</h3>
            <img src="image\SD NEGERI JATIBENING III.png" alt="9" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING III</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING IV</h3>
            <img src="image\SD NEGERI JATIBENING IV.png" alt="10" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING IV</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIBENING V</h3>
            <img src="image\SD NEGERI JATIBENING V.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIBENING V</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATICEMPAKA I</h3>
            <img src="image\SD NEGERI JATICEMPAKA I.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATICEMPAKA I</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATICEMPAKA IV</h3>
            <img src="image\SD NEGERI JATICEMPAKA IV.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATICEMPAKA IV</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATICEMPAKA VI</h3>
            <img src="image\SD NEGERI JATICEMPAKA VI.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATICEMPAKA VI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATICEMPAKA VII</h3>
            <img src="image\SD NEGERI JATICEMPAKA VII.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATICEMPAKA VII</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIMAKMUR I</h3>
            <img src="image\SD NEGERI JATIMAKMUR I.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIMAKMUR I</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIMAKMUR II</h3>
            <img src="image\SD NEGERI JATIMAKMUR II.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIMAKMUR II</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIMAKMUR V</h3>
            <img src="image\SD NEGERI JATIMAKMUR V.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIMAKMUR V</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIWARINGIN I</h3>
            <img src="image\SD NEGERI JATIWARINGIN I.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIWARINGIN I</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIWARINGIN II</h3>
            <img src="image\SD NEGERI JATIWARINGIN II.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIWARINGIN II</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIWARINGIN IX</h3>
            <img src="image\SD NEGERI JATIWARINGIN IX.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIWARINGIN IX</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIWARINGIN VI</h3>
            <img src="image\SD NEGERI JATIWARINGIN VII.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIWARINGIN VI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD NEGERI JATIWARINGIN VIII</h3>
            <img src="image\SD NEGERI JATIWARINGIN VIII.png" alt="11" />
            <div class="layer">
                <h2>SD NEGERI JATIWARINGIN VIII</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>

        
        <!-- Tambahkan lebih banyak sekolah di sini -->
    </div>
    <br>
    <br>
    <br>
    <br>
    <h1>Daftar Sekolah Swasta</h1>
    <div class="row" id="swastaList">
        <!-- Contoh Sekolah -->
        <div class="lokasi-col">
            <h3>SD AL SIDDIQ INTERNATIONAL</h3>
            <img src="image\SD AL SIDDIQ INTERNATIONAL.png" alt="SD Swasta Jatiwaringin 1" />
            <div class="layer">
                <h2>SD AL SIDDIQ INTERNATIONAL</h2>
                <p>
                    <a href="https://maps.app.goo.gl/4sgubh5wuZ3bgwga8" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD AL-AZHAR SYIFA BUDI JATIBENING</h3>
            <img src="image\SD AL-AZHAR SYIFA BUDI JATIBENING.png" alt="SD Swasta Jatiwaringin 2" />
            <div class="layer">
                <h2>SD AL-AZHAR SYIFA BUDI JATIBENING</h2>
                <p>
                    <a href="https://maps.app.goo.gl/va3Aq3evJt4Wb8zg6" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ASSHODRIYAH ISLAMIC SCHOOL</h3>
            <img src="image\SD ASSHODRIYAH ISLAMIC SCHOOL.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ASSHODRIYAH ISLAMIC SCHOOL</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD EDELWEISS</h3>
            <img src="image\SD EDELWEISS.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD EDELWEISS</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM AL-AMAL</h3>
            <img src="image\SD ISLAM AL-AMAL.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM AL-AMAL</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM ARMINA</h3>
            <img src="image\SD ISLAM ARMINA.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM ARMINA</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM AS SYAFIIYAH 02</h3>
            <img src="image\SD ISLAM AS SYAFIIYAH 02.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM AS SYAFIIYAH 02</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM RAUDHATUL MUTTAQIN</h3>
            <img src="image\SD ISLAM RAUDHATUL MUTTAQIN.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM RAUDHATUL MUTTAQIN</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM TERPADU AL BARKAH</h3>
            <img src="image\SD ISLAM TERPADU AL BARKAH.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM TERPADU AL BARKAH</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM TERPADU IQRO</h3>
            <img src="image\SD ISLAM TERPADU IQRO.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM TERPADU IQRO</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD ISLAM TERPADU MIFTAHUL JANNAH</h3>
            <img src="image\SD ISLAM TERPADU MIFTAHUL JANNAH.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD ISLAM TERPADU MIFTAHUL JANNAH</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD MARTHA</h3>
            <img src="image\SD MARTHA.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD MARTHA</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD PAMARDI YUWANA BHAKTI</h3>
            <img src="image\SD PAMARDI YUWANA BHAKTI.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD PAMARDI YUWANA BHAKTI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD PELITA ALAM</h3>
            <img src="image\SD PELITA ALAM.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD PELITA ALAM</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SD SANTO BELLARMINUS</h3>
            <img src="image\SD SANTO BELLARMINUS.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SD SANTO BELLARMINUS</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SDIT ANNAJM RABBANI</h3>
            <img src="image\SDIT ANNAJM RABBANI.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SDIT ANNAJM RABBANI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SDIT DARUL HIKAM INSANI</h3>
            <img src="image\SDIT DARUL HIKAM INSANI.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SDIT DARUL HIKAM INSANI</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SDIT GEMBIRA</h3>
            <img src="image\SDIT GEMBIRA.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SDIT GEMBIRA</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <div class="lokasi-col">
            <h3>SDIT HIRO QURANIC SCHOOL</h3>
            <img src="image\SDIT HIRO QURANIC SCHOOL.png" alt="SD Swasta Jatiwaringin 3" />
            <div class="layer">
                <h2>SDIT HIRO QURANIC SCHOOL</h2>
                <p>
                    <a href="https://maps.app.goo.gl/vQBEjwBGcQj6VmcT9" target="_blank">Lokasi di Google Maps</a>
                </p>
            </div>
        </div>
        <!-- Tambahkan lebih banyak sekolah di sini -->
    </div>
</section>

<script>
    var navLink = document.getElementById("navLink");

function showMenu() {
  navLink.style.right = "0";
}

function hideMenu() {
  navLink.style.right = "-200px";
}

// Add smooth scrolling behavior to navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
    });
  });
});
function searchFunction() {
    var input, filter, negeriList, swastaList, negeriCols, swastaCols, h3, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    negeriList = document.getElementById("negeriList");
    swastaList = document.getElementById("swastaList");
    
    negeriCols = negeriList.getElementsByClassName('lokasi-col');
    swastaCols = swastaList.getElementsByClassName('lokasi-col');

    // Filter Sekolah Negeri
    for (i = 0; i < negeriCols.length; i++) {
        h3 = negeriCols[i].getElementsByTagName("h3")[0];
        txtValue = h3.textContent || h3.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            negeriCols[i].style.display = "";
        } else {
            negeriCols[i].style.display = "none";
        }
    }

    // Filter Sekolah Swasta
    for (i = 0; i < swastaCols.length; i++) {
        h3 = swastaCols[i].getElementsByTagName("h3")[0];
        txtValue = h3.textContent || h3.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            swastaCols[i].style.display = "";
        } else {
            swastaCols[i].style.display = "none";
        }
    }
}
</script> <!-- Tambahkan file JavaScript custom -->
</body>
</html>
