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
        <small>Edit Data Rekomendasi</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn x-s"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php 
            $id= @$_GET['id'];
            $sql_rekom= mysqli_query($con, "SELECT * FROM tb_rekom JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE id_rekom='$id'") or die (mysqli_error($con));
            $data= mysqli_fetch_array($sql_rekom);

            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="nama">Unit Pemilik Rekomendasi</label>
                     <input type="text" name="id" value="<?=$data['id_rekom']?>">
                    <select name="user" id="user" class="form-control">
                        <option value=""><?=$data['nama_user']?></option> 
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
                    <textarea type="text" name="rekomendasi" id="rekomendasi" value="<?=$data['rekomendasi']?>" class="form-control" required > <?=$data['rekomendasi']?> </textarea>
                </div>
                <div class="form-group">
                    <label for="unit_pen">Unit Pendukung:</label> 
                    <br>
                    <td>
                                    <?php
                                    $sql_unit= mysqli_query($con, "SELECT * FROM tb_rekom_unit_pen JOIN tb_unit_pen ON tb_rekom_unit_pen.id_unit_pen= tb_unit_pen.id_unit_pen WHERE id_rekom='$data[id_rekom]' ") or die(mysqli_error($con)); 
                                    while ($data_unit= mysqli_fetch_array($sql_unit)){
                                        echo $data_unit['nama_unit']. "<br>";
                                    }

                                     ?>
                    </td>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline"  id="deadline" value="<?=$data['deadline']?>" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="tanggapan">Tanggapan</label>
                    <br>
                    <td>
                      -  <?=$data['tanggapan']?>
                    </td>
                </div>
                 <div>
                    <label for="bukti_tl">Bukti Tindak Lanjut</label>
                    <br>
                    <td>
                       - <?=$data['bukti_tl']?> 
                    </td>
                </div>      
                
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php include_once('../_footer.php'); ?>