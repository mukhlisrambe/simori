<?php
include_once('../_header.php');
//use Ramsey\Uuid\Uuid;
//use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
//$uuid4 = Uuid::uuid4();
//echo $uuid4->toString();

?>
<div class="box">
    <h1>Rekomendasi</h1>
    <h4>
        <small>Tambah Rekomendasi</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn x-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>

        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="user">Unit Pemilik Rekomendasi </label>
                    <select name="user" id="user" class="form-control" required>
                        <option value="">Pilih</option>
                        <?php 
                          $sql_user= mysqli_query($con, "SELECT * FROM tb_user") or die (mysqli_error($con));
                        while($data_user= mysqli_fetch_array($sql_user)){
                      echo '<option value="'.$data_user['id_user'].'">'.$data_user['nama_user'] .'</option>';
                          }
                        ?>   
                    </select>
                </div>
                <div class="form-group">
                    <label for="rekomendasi">Rekomendasi</label>
                    <textarea name="rekomendasi" id="rekomendasi" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="unit_pen">Unit Pendukung</label>
                    <select multiple name="unit_pen[]" id="unit_pen" class="form-control" required>
                        <?php 
                          $sql_unit_pen= mysqli_query($con, "SELECT * FROM tb_unit_pen") or die (mysqli_error($con));
                        while($data_unit_pen= mysqli_fetch_array($sql_unit_pen)){
                         echo '<option value="'.$data_unit_pen['id_unit_pen'].'">'.$data_unit_pen['nama_unit'] .'</option>';
                          }
                        ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" value=" " id="deadline" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control"> 
                    <option value="">Pilih Status </option>
                    <option value="Belum ditindaklanjuti"> Belum ditindaklanjuti </option>
                    <option value="Sudah ditindaklanjuti namun belum selesai">Sudah ditindaklanjuti namun belum selesai </option>
                    <option value="Selesai ditindaklanjuti">Selesai ditindaklanjuti </option>
                    </select>
                </div>
                 <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                </div>               
            </form>
        </div>
    </div>
    
</div>
<?php include_once('../_footer.php'); ?>