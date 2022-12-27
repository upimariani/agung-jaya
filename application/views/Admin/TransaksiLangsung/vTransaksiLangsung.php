<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Langsung</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi Langsung</li>
                    </ol>
                </div>

            </div>

        </div><!-- /.container-fluid -->
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>Transaksi
        </button>
        <!-- <a href="<?= base_url('Admin/cTransaksiLangsung/create') ?>" class="btn btn-app">
            <i class="fas fa-plus"></i> Transaksi
        </a> -->
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="callout callout-success">
                <h5>Sukses!</h5>
                <p><?= $this->session->userdata('success') ?></p>
            </div>
        <?php
        }
        ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Transaksi Langsung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal Order</th>
                                        <th>Total Order</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->id_order ?></td>
                                            <td><?= $value->name_cust ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td>Rp. <?= number_format($value->total_order)  ?></td>
                                            <td class="text-center"><a href="<?= base_url('Admin/cTransaksiLangsung/detail_order/' . $value->id_order) ?>" class="btn btn-success">Detail Order</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Transaksi</th>
                                        <th>Atas Nama</th>
                                        <th>Tanggal Order</th>
                                        <th>Total Order</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Memiliki Member?</p>
                <hr>
                <div class="row">

                    <div class="col-lg-6">
                        <form action="<?= base_url('Admin/cTransaksiLangsung/add_member') ?>" method="POST">

                            <strong class="text-danger">Jika Belum Maka Isi Data Di Bawah ini!</strong>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pelanggan</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat Pelanggan</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Enter Alamat Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon Pelanggan</label>
                                <input type="text" name="no_telepon" class="form-control" id="exampleInputEmail1" placeholder="Enter No Telepon Pelanggan" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select class="form-control" name="jk" required>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-danger">Save</button>
                        </form>
                    </div>


                    <div class="col-lg-6">
                        <form action="<?= base_url('Admin/cTransaksiLangsung/show_member') ?>" method="POST">
                            <strong class="text-success">Jika Sudah Ada Maka Pilih Nama Pelanggan!</strong>
                            <div class="form-group">
                                <label>Minimal</label>
                                <select class="form-control select2bs4" name="member" style="width: 100%;">
                                    <option value="">Pilih Member</option>
                                    <?php
                                    foreach ($member as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_cust ?>"><?= $value->no_phone ?> | <?= $value->name_cust ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>


                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->