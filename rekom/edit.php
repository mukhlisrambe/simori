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
            $sql_rekom= mysqli_query($con, "SELECT * FROM tb_rekom        
            WHERE id_rekom='$id'") or die (mysqli_error($con));
            $data=mysqli_fetch_array($sql_rekom);
            ?>

            <form enctype="multipart/form-data" action="proses.php" method="post">              
                <div class="form-group">
                    <label for="id"> </label>
                    <input type="hidden" name="id" value="<?=$data['id_rekom']?>">
                    <input type="hidden" name="filelama" value="<?=$data['file']?>">
                </div>
                <div class="form-group">
                    <label for="rekomendasi">Rekomendasi</label>
                    <textarea readonly="readonly" type="text" name="rekomendasi" id="rekomendasi" value="<?=$data['rekomendasi']?>" class="form-control" required > <?=$data['rekomendasi']?> </textarea>
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input readonly="readonly" type="date" name="deadline"  id="deadline" value="<?=$data['deadline']?>" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="tanggapan">Tanggapan</label>
                    <textarea type="text" name="tanggapan" id="tanggapan" value="<?=$data['tanggapan']?>" class="form-control" required > <?=$data['tanggapan']?> </textarea>
                </div>

                <div class="form-group">
                    <label for="fupload">File</label>
                    <?=$data['file']?>
                    <input type="file" name="fupload" id="fupload" class="form-control" >   
                </div>

                <div class="form-group">
                    <label for="status">Status</label>

                    <select readonly="readonly" name="status" id="status" class="form-control"> 
                        
                    <option value="Belum ditindaklanjuti"
                    <?php 
                        if($data["status"] ==  'Belum ditindaklanjuti'){
                            echo "selected";
                        }
                     ?>
                    >Belum ditindaklanjuti </option>
                    <option value="Sudah ditindaklanjuti namun belum selesai"
                    <?php 
                        if($data["status"] ==  'Sudah ditindaklanjuti namun belum selesai'){
                            echo "selected";
                        }
                     ?>
                    >Sudah ditindaklanjuti namun belum selesai </option>
                    <option value="Selesai ditindaklanjuti"
                    <?php 
                        if($data["status"] ==  'Selesai ditindaklanjuti'){
                            echo "selected";
                        }
                     ?>
                    >Selesai ditindaklanjuti </option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="komentar_ki">Komentar KI</label>
                    <textarea readonly="readonly" type="text" name="komentar_ki" id="komentar_ki" value="<?=$data['komentar_ki']?>" class="form-control" required > <?=$data['komentar_ki']?> </textarea>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php include_once('../_footer.php'); ?>