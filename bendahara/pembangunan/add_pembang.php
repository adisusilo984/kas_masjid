<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kegiatan Pembangunan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="kegiatan pembangunan" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <select name="status" id="status" class="form-control">
                        <option>- Pilih -</option>
                        <option>0%</option>
                        <option>20%</option>
                        <option>50%</option>
                        <option>80%</option>
                        <option>100%</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=pembangunan" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_pembangunan (tanggal,kegiatan,status) VALUES (
        '" . $_POST['tanggal'] . "',
        '" . $_POST['kegiatan'] . "',
        '" . $_POST['status'] . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=pembangunan';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=pembangunan';
          }
      })</script>";
    }
}
//selesai proses simpan data
?>