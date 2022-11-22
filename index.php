<?php

include 'connect_db.php';
session_start();
if (isset($_SESSION['loginfront']) && $_SESSION['rolefront'] == "Dosen") { //jika sudah login
    //menampilkan isi session
    // echo "<h1>Selamat Datang " . $_SESSION['login'] . "</h1>";
    // echo "<h2>Halaman ini hanya bisa diakses jika Anda sudah login</h2>";
    // echo "<h2>Klik <a href='session3.php'>di sini (session03.php)</a> untuk LOGOUT</h2>";
} else {
    die("Anda belum login! Anda tidak berhak masuk ke halaman ini.Silahkan login <a href='login.php'>di sini</a>");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input | Presensi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header text-center">
                <h4>Pengisian Kehadiran Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="mahasiswa.sql">
                    <!-- <div class="form-group"> -->
                    <div class="row form-row mb-1">
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="date" id="tgl" name="tgl" class="form-control" placeholder="Tgl"
                                    autofocus="autofocus" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <select name="makul" id="makul" class="form-control" autofocus="autofocus">
                                    <option value=""> -- Pilih Mata Kuliah -- </option>
                                    <option value="WebProg"> Pemrograman Web </option>
                                    <option value="WebProgLab"> Praktik Pemrograman Web </option>
                                    <option value="SoftDev"> Rekayasa Perangkat Lunak </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <select name="kelas" id="kelas" class="form-control" autofocus="autofocus">
                                    <option value=""> -- Pilih Kelas -- </option>
                                    <option value="5A"> 5A </option>
                                    <option value="5B"> 5B </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-4"><strong>Nomor Induk Mahasiswa</strong></div>
                        <div class="col-md-4"><strong>Nama Lengkap</strong></div>
                        <div class="col-md-4"><strong>Status Presensi</strong></div>
                    </div>
                    <hr>

                    <?php

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="row form-row mb-1">
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM"
                                    autofocus="autofocus" value="<?php echo $row['nim'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama"
                                    autofocus="autofocus" value="<?php echo $row['nama'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <select name="presensi" id="presensi" class="form-control" autofocus="autofocus">
                                    <option value=""> -- Pilih Status -- </option>
                                    <option value="Hadir"> Hadir </option>
                                    <option value="Sakit"> Sakit </option>
                                    <option value="Izin"> Izin </option>
                                    <option value="Alpa"> Alpa </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
?>



            </div>


        </div>
        <br>
        <p class="text-center">
            <input type="submit" name="submit" value="Simpan Presensi" class="btn btn-primary btn-block">

            <a class="btn btn-secondary btn-block" href="logout.php">Cancel</a>
        </p>
        </form>
        <div class="text-center">
            <br>Copyright © Program Studi Teknik Informatika - <?=date('Y');?><br>
        </div>
    </div>
    </div>

</body>

</html>