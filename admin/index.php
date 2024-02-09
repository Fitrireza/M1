<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>ADMINISTRATOR</title>
</head>

<body>
<?php include "page/navbar.php";
?>
    <div class="row no-gutters mt-3">
        <div class="col-md-2 bg-dark mt-4 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="index.php"><i
                            class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dosen.php"><i class="fas fa-user-graduate mr-2"></i>Daftar
                        Dosen</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><i class="fas fa-users mr-2"></i>Daftar
                        Mahasiswa</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-users mr-2"></i>Daftar
                        Pegawai</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jadwal.php"><i class="far fa-calendar-alt mr-2"></i>Jadwal
                        Kuliah</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md mt-5 p-2">
            <h1 class="text-center"><i class="fas fa-user-graduate mr-2"></i>Daftar Mahasiswa</h1>
            <hr>
            <table class="table table-striped table-bordered bg-primary">
                <div class="mt-3 mb-3">
                    <button data-bs-toggle="modal" data-bs-target="#tambahmhs" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA</button>
                </div>
                <thead>
                    <tr>
                        <td scope="col">NO</td>
                        <td scope="col">NIM</td>
                        <td scope="col">NAMA MAHASISWA</td>
                        <td scope="col">ALAMAT</td>
                        <td scope="col">JURUSAN</td>
                        <td colspan="5" scope="col">AKSI</td>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tbody>
                            <?php include "koneksi.php";
                            $sql = "SELECT * FROM mahasiswa";
                            $query = mysqli_query($koneksi, $sql);


                            if (mysqli_num_rows($query) < 1): ?>
                                <tr>
                                    <td colspan="100%">Tidak ada data yang ditemukan !</td>
                                </tr>
                            <?php endif;
                            foreach ($query as $key => $value):
                                ?>
                                <tr>
                                    <td>
                                        <?= $key + 1 ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($value['nim']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($value['nama']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($value['alamat']) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($value['jurusan']) ?>
                                    </td>
                                    <td>
                                        <a href="ubah_mhs.php?nim=<?= htmlspecialchars($value['nim']) ?>"
                                            class="btn btn-warning btn-sm p-2 text-white rounded">
                                            <i class="fas fa-edit mr-2"></i> Edit</a>
                                        <a href="hapus_mhs.php?nim=<?= htmlspecialchars($value['nim']) ?>"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus ?')"
                                            class="btn btn-danger btn-sm p-2 text-white rounded">
                                            <i class="fas fa-trash-alt mr-2"></i> Hapus</a>
                                    </td>
                                </tr>


                            <?php endforeach; ?>


                        </tbody>
                    </table>


                    <!-- Update modal -->
                    <div class="example-modal">
                        <div id="ubahmhs<?php echo $data['nim']; ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Mahasiswa</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update_mhs.php" method="post" role="form">
                                            <?php
                                            $nim = $data['nim'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                                ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">NIM </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control" name="nim"
                                                                value="<?php echo
                                                                    $data1['nim']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="nama" value="<?php echo
                                                                    $data1['nama']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Alamat </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="alamat" value="<?php echo
                                                                    $data1['alamat']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                                                        <div class="col-sm-8"><input type="text" name="jurusan"
                                                                class="form-control" value="<?php echo
                                                                    $data1['jurusan']; ?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="noedit" type="button" class="btn btn-danger pull-left"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete modal -->
                    <div class="example-modal">
                        <div id="deletemhs<?php echo $data['nim']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus NIM
                                            <?php echo
                                                $data['nim']; ?><strong><span class="grt"></span></strong> ?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>"
                                            class="btn btn-primary">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </table>

            <!-- Simpan Modal -->
            <div class="modal fade" id="tambahmhs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_mhs.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIM</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nim"
                                                placeholder="NIM" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                                                placeholder="NamaMahasiswa" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Alamat</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat"
                                                placeholder="Alamat" id="alamat" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jurusan </label>
                                        <div class="col-sm-8"><input type="text" name="jurusan" class="form-control"
                                                placeholder="Jurusan">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


</body>

</html>