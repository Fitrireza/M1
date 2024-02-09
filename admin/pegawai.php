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
                    <a class="nav-link text-white" href="jadwal.php"><i class="far fa-calendar-alt mr-2"></i>Jadwal Kuliah</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
        <div class="col-md mt-5 p-2">
            <h1 class="text-center"><i class="fas fa-users mr-2"></i>Daftar Pegawai</h1>
            <hr>
            <table class="table table-striped table-bordered bg-primary">
                <div class="mt-3 mb-3">
                    <button data-bs-toggle="modal" data-bs-target="#tambahpgw" class="btn btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA PEGAWAI</button>
                </div>
                <thead>
                    <tr>
                        <td scope="col">NO</td>
                        <td scope="col">NIK</td>
                        <td scope="col">NAMA PEGAWAI</td>
                        <td scope="col">BAGIAN</td>
                        <td colspan="5" scope="col">AKSI</td>
                    </tr>
                </thead>
                <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * FROM pegawai");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $data['nik'] ?>
                        </td>
                        <td>
                            <?php echo $data['nama'] ?>
                        </td>
                        <td>
                            <?php echo $data['bagian'] ?>
                        </td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#ubahpgw<?php echo $data['nik']; ?>"><i
                                    class="fa fa-edit bg-success p-2 text-white rounded"></i>Edit</button>
                            <button data-bs-toggle="modal" data-bs-target="#deletepgw<?php echo $data['nik']; ?>"><i
                                    class="fa fa-trash-alt bg-danger p-2 text-white rounded"></i>Delete</button>
                        </td>
                    </tr>

                    <!-- Update modal -->
                    <div class="example-modal">
                        <div id="ubahpgw<?php echo $data['nik']; ?>" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Edit Data Pegawai</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update_pgw.php" method="post" role="form">
                                            <?php
                                            $nik = $data['nik'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nik='$nik'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                                ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">NIK </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control" name="nik"
                                                                value="<?php echo
                                                                    $data1['nik']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Nama Pegawai</label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="nama" value="<?php echo
                                                                    $data1['nama']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Bagian </label>
                                                        <div class="col-sm-8"><input type="text" class="form-control"
                                                                name="bagian" value="<?php echo
                                                                    $data1['bagian']; ?>">
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
                        <div id="deletepgw<?php echo $data['nik']; ?>" class="modal fade" role="dialog"
                            style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus NIK
                                            <?php echo
                                                $data['nik']; ?><strong><span class="grt"></span></strong> ?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <a href="hapus_pgw.php?nik=<?php echo $data['nik']; ?>"
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
            <div class="modal fade" id="tambahpgw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah Data Baru</h3>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_pgw.php" method="post" role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIK</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nik"
                                                placeholder="NIK" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Pegawai</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                                                placeholder="NamaPegawai" value=""></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Bagian</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="bagian"
                                                placeholder="Bagian" id="bagian" value="">
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