<html>
    <head>
        <title>Apotek Sehat | Halaman Utama</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand">Apotek Sehat
                    </a>
                    <button class="navbar-toggler" tyle="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" aria-current="page">Pasien</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </nav>
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tabel Pasien</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover table-sm">
                    <tr>
                        <th>No</th>
                        <th>ID Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $hasil = $koneksi->query("SELECT * FROM pasien");

                    while($row = $hasil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['idPasien']; ?></td>
                        <td><?= $row['nmPasien']; ?></td>
                        <td><?= $row['jk']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><a href="editpasien.php?edit=<?=$row['idPasien']; ?>" class="btn btn-warning btn-sm">Edit </a>
                        <div class="row mt-3">
  
                    <a href="tambahobat.php" class="btn btn-primary btn-sm">Tambah Obat</a>

                    <a href="koneksi.php?idPasien=<?= $row['idPasien']; ?>" class="delete-link btn btn-danger btn-sm">Hapus</a></td>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                        const deleteLinks = document.querySelectorAll('.delete-link');

                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                            event.preventDefault();

                            const deleteUrl = this.getAttribute('href');

                            Swal.fire({
                                title: 'Apakah anda ingin menghapus data?',
                                text: ' tidak bisa dibatalkan!',
                                icon: 'warning',
                                color: 'blue',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Hapus',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                window.location.href = deleteUrl; 
                                }
                                
                            });
                            });
                        });
                        });
                        </script>

                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        </div>
    </body> 