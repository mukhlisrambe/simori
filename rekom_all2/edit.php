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
                    <label for="nama">Unit Pemilik Rekomendasi</label>
                     <input type="hidden" name="id" value="<?=$data['id_rekom']?>">   
                     <select name="user" id="user" class="form-control">

                      <option value="0a1b4b59-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '0a1b4b59-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi Manifes </option>  
                    
                    <option value="0a1b6e2d-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '0a1b6e2d-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >PFPD </option>

                    <option value="0a1ba799-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '0a1ba799-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi Perbend </option>

                    <option value="0a1bc2b4-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '0a1bc2b4-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PLI </option>

                    <option value="85cacac8-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '85cacac8-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PDAD </option>

                    <option value="b62661d1-47e1-11ea-8bd4-88d7f6d93984"
                         <?php 
                        if($data["id_user"] ==  'b62661d1-47e1-11ea-8bd4-88d7f6d93984'){
                            echo "selected";
                        }
                     ?>
                    >Seksi KI </option>

                    <option value="b626a408-47e1-11ea-8bd4-88d7f6d93984"
                         <?php 
                        if($data["id_user"] ==  'b626a408-47e1-11ea-8bd4-88d7f6d93984'){
                            echo "selected";
                        }
                     ?>
                    >Subbagian Umum </option>

                    <option value="1a38ed1a-494a-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '1a38ed1a-494a-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi P2 </option>

                    <option value="12ae7f2f-494b-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '12ae7f2f-494b-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PKC I </option>

                    <option value="85caa317-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '85caa317-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PKC II </option>

                    <option value="12ae6a8e-494b-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '12ae6a8e-494b-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PKC III </option>

                     <option value="0a1bd83b-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '0a1bd83b-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PKC IV </option>

                    <option value="85cab81a-494c-11ea-9d62-dcfe0713ce12"
                         <?php 
                        if($data["id_user"] ==  '85cab81a-494c-11ea-9d62-dcfe0713ce12'){
                            echo "selected";
                        }
                     ?>
                    >Seksi PKC V </option>

                    </select> 
                </div>
                <div class="form-group">
                    <label for="rekomendasi">Rekomendasi</label>
                    <textarea type="text" name="rekomendasi" id="rekomendasi" value="<?=$data['rekomendasi']?>" class="form-control" required > <?=$data['rekomendasi']?> </textarea>
                </div>
               
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline"  id="deadline" value="<?=$data['deadline']?>" class="form-control" required >
                </div>
                 <div class="form-group">
                    <label for="komentar_ki">Komentar KI</label>
                    <textarea type="text" name="komentar_ki" id="komentar_ki" value="<?=$data['komentar_ki']?>" class="form-control" required > <?=$data['komentar_ki']?> </textarea>
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
                       - <?=$data['file']?> 
                    </td>
                </div>  

                <div class="form-group">
                    <label for="status">Status</label>

                    <select name="status" id="status" class="form-control"> 
                        
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
                
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php include_once('../_footer.php'); ?>