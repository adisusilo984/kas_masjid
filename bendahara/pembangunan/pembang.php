<div class="card card-info">
    <div class="card-body">
        <h2>Rencana Pembangunan</h2>
        <ul class="list-group">
            <li class="list-group-item">1. Pemasangan Pintu</li>
            <li class="list-group-item">2. Pembuatan Teras Mushalla</li>
        </ul>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <div>
                <a href="?page=add_pembang" class="btn btn-primary">
                    <i class="fa fa-edit"></i> Tambah Data</a>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kegiatan Pembangunan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from tb_pembangunan");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php $tgl = $data['tanggal'];
                                echo date("d/M/Y", strtotime($tgl)) ?>
                            </td>
                            <td>
                                <?php echo $data['kegiatan']; ?>
                            </td>
                            <td>
                                <?php
                                if ($data['status'] == '0%') { ?>
                                    <span class="badge badge-warning"><?php echo $data['status']; ?></span>
                                <?php } ?>
                                <?php
                                if ($data['status'] == '20%') { ?>
                                    <span class="badge badge-primary"><?php echo $data['status']; ?></span>
                                <?php } ?>
                                <?php
                                if ($data['status'] == '50%') { ?>
                                    <span class="badge badge-secondary"><?php echo $data['status']; ?></span>
                                <?php } ?>
                                <?php
                                if ($data['status'] == '80%') { ?>
                                    <span class="badge badge-danger"><?php echo $data['status']; ?></span>
                                <?php } ?>
                                <?php
                                if ($data['status'] == '100%') { ?>
                                    <span class="badge badge-success"><?php echo $data['status']; ?></span>
                                <?php } ?>

                            </td>
                            <td align="center">
                                <a href="?page=edit_pembang&kode=<?php echo $data['id_pemb']; ?>" title="Ubah" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->