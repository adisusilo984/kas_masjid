<div class="card-body">
    <div class="table-responsive">
        <br>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor telephone</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $sql = $koneksi->query("select * from tb_pesan");
                while ($data = $sql->fetch_assoc()) {
                ?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nama']; ?>
                        </td>
                        <td>
                            <?php echo $data['no_hp']; ?>
                        </td>
                        <td>
                            <?php echo $data['pesan']; ?>
                        </td>
                        <td align="center">
                            <a href="?page=m_del&kode=<?php echo $data['id_pesan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
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