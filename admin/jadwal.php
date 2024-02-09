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
<?php include "page/navbar.php"; ?>
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
            <h1 class="text-center"><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</h1>
            <hr>
            <table class="table table-striped table-bordered bg-primary">
                <div class="mt-3 mb-3">
                    <button data-bs-toggle="modal" data-bs-target="#tambahjdw" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA JADWAL KULIAH</button>
                </div>
                <thead>
                    <tr>
                        <td scope="col">NO</td>
                        <td scope="col">KODE</td>
                        <td scope="col">MATKUL</td>
                        <td scope="col">TANGGAL</td>
                        <td scope="col">JAM</td>
                        <td scope="col">RUANGAN</td>
                        <td scope="col">DOSEN</td>
                        <td colspan="5" scope="col">AKSI</td>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM jadwal");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                    <tr>
                        <td>
                            <?= $no++ ?>
                        </td>
                        <td>
                            <?= $data['kode'] ?>
                        </td>
                        <td>
                            <?= $data['matkul'] ?>
                        </td>
                        <td>
                            <?= $data['tanggal'] ?>
                        </td>
                        <td>
                            <?= $data['jam'] ?>
                        </td>
                        <td>
                            <?= $data['ruangan'] ?>
                        </td>
                        <td>
                            <?= $data['dosen'] ?>
                        </td>
                        <td align="center">
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#ubahjdw<?php echo $data['kode']; ?>"><i
                                    class="fa fa-edit bg-success p-2 text-white rounded"></i>Edit</button>

                            <button data-bs-toggle="modal" data-bs-target="#deletejdw<?php echo $data['kode']; ?>"><i
                                    class="fa fa-trash-alt bg-danger p-2 text-white rounded"></i>Delete</button>
                        </td>
                    </tr>

                    <!-- Update modal -->
                    <div class="example-modal">
                        <div id="ubahjdw<?php echo $data['kode']; ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Mahasiswa</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update_jdw.php" method="post" role="form">
                                            <?php
                                            $kode = $data['kode'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE kode='$kode'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                                ?>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Kode </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="kode" value="<?php echo
                                                                    $data1['kode']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Mata Kuliah </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="matkul" value="<?php echo
                                                                    $data1['matkul']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Tanggal </label>
                                                        <div class="col-sm-8"><input type="date" class="form-control"
                                                                name="tanggal" value="<?php echo
                                                                    $data1['tanggal']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Jam </label>
                                                        <div class="col-sm-8"><input type="time" name="jam" class="form-control"
                                                                value="<?php echo $data1['jam']; ?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Ruangan </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="ruangan" value="<?php echo
                                                                    $data1['ruangan']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row mb-3 ">
                                                        <label class="col-sm-3 control-label text-right">Dosen </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="dosen" value="<?php echo
                                                                    $data1['dosen']; ?>">
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
                        <div id="deletejdw<?php echo $data['kode']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus KODE
                                            <?php echo
                                                $data['kode']; ?><strong><span class="grt"></span></strong> ?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-bs-dismiss="modal">Cancel</button>
                                            <a href="hapus_jdw.php?kode=<?php echo $data['kode']; ?>"
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
            <div class="modal fade" id="tambahjdw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_jdw.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Kode</label>
                                        <div class="col-sm-8 mb-2"><input type="text" class="form-control" name="kode"
                                                placeholder="kode" value="" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Matkul </label>
                                        <div class="col-sm-8 mb-2"><input type="text" class="form-control" name="matkul"
                                                placeholder="Mata Kuliah" value="" required></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Tanggal</label>
                                        <div class="col-sm-8 mb-2"><input type="date" class="form-control"
                                                name="tanggal" placeholder="Tanggal" id="alamat" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jam </label>
                                        <div class="col-sm-8 mb-3"><input type="time" name="jam" class="form-control"
                                                placeholder="Jam" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Ruangan </label>
                                        <div class="col-sm-8 mb-3"><input type="text" name="ruangan"
                                                class="form-control" placeholder="Ruangan" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Dosen </label>
                                        <div class="col-sm-8 mb-3"><input type="text" name="dosen" class="form-control"
                                                placeholder="Dosen" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


</body>

</html>