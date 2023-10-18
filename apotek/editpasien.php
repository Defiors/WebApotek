<html>
    <head>
        <title>My App | Halaman Utama</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row mt-3">
                <div class="col-4">
                    <h3>Edit Data Pasien</h3>
                    <?php
                    include 'koneksi.php';
                    $panggil = $koneksi->query("SELECT * FROM pasien where idPasien='$_GET[edit]'");
                    while ($row = $panggil->fetch_assoc()) {
                    ?>
                    <form action="koneksi.php" method="POST">
                        <div class="form-group">
                            <label for="idPasien">ID Pasien</label>
                            <input type="text" class="form-control mb-3" name="idPasien" placeholder="ID Pasien" value="<?= $row['idPasien'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nmPasien">Nama Pasien</label>
                            <input type="text" class="form-control mb-3" name="nmPasien" placeholder="Nama Pasien" value="<?= $row['nmPasien'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if (($row['jk']) === "Perempuan"){
                                    echo "checked";
                                }?>>Perempuan
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jk" value="Laki-laki" <?php if (($row['jk']) === "Laki-laki"){
                                    echo "checked";
                                }?>>Laki-Laki
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="5" rows="3" placeholder="Alamat" <?= $row['alamat'] ?>></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" name="edit" value="Simpan" class="form-control btn btn-primary">
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
