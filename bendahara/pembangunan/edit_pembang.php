<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pembangunan WHERE id_pemb='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type='hidden' class="form-control" name="id_pemb" value="<?php echo $data_cek['id_pemb']; ?>" readonly />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data_cek['tanggal']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="<?php echo $data_cek['kegiatan']; ?>" />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <?php
                        //menhecek data yg dipilih sebelumnya
                        if ($data_cek['status'] == "0%") echo "<option value='0%' selected>0%</option>";
                        else echo "<option value='0%'>0%</option>";
                        if ($data_cek['status'] == "20%") echo "<option value='20%' selected>20%</option>";
                        else echo "<option value='20%'>20%</option>";
                        if ($data_cek['status'] == "50%") echo "<option value='50%' selected>50%</option>";
                        else echo "<option value='50%'>50%</option>";
                        if ($data_cek['status'] == "80%") echo "<option value='80%' selected>80%</option>";
                        else echo "<option value='80%'>80%</option>";
                        if ($data_cek['status'] == "100%") echo "<option value='100%' selected>100%</option>";
                        else echo "<option value='100%'>100%</option>";
                        ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=pembangunan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>



<?php

if (isset($_POST['Ubah'])) {
    $sql_ubah = "UPDATE tb_pembangunan SET
        tanggal='" . $_POST['tanggal'] . "',
        kegiatan='" . $_POST['kegiatan'] . "',
        status='" . $_POST['status'] . "'
        WHERE id_pemb='" . $_POST['id_pemb'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Data Berhasil di Ubah',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=pembangunan';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=pembangunan';
        }
      })</script>";
    }
}
?>

<script type="text/javascript">
    function change() {
        var x = document.getElementById('pass').type;

        if (x == 'password') {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        } else {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML;
        }
    }
</script>