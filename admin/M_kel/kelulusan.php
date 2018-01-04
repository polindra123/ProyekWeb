<?php include 'theme/header.php'; ?>
  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="divider"></div>
        <ul class="nav menu">
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=lembaga">Management Lembaga</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=informasi">Management Pelatihan</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=kelulusan">Management Kelulusan</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=sertifikat">Management Sertifikat</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>   
  </div>
      
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="color: black">
          <h1>Managemen Kelulusan</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Managemen Kelulusan</li>
            </ol><br>

              <table id="example1" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Kode Pelatihan</th>
                    <th>Nama Pelatihan</th>
                    <th>Status Pelatihan</th>
                    <th>Nama Peserta</th>
                    <th>Sertifikat</th>
                    <th>Aksi</th> 
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $sql="SELECT detail_pelatihan.*, pelatihan.*, lembaga.* FROM detail_pelatihan, pelatihan, lembaga WHERE detail_pelatihan.Id_pelatihan=pelatihan.Id_pelatihan AND pelatihan.Id_lembaga=lembaga.Id_lembaga GROUP BY detail_pelatihan.Id_pelatihan";
                      $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    <form name='form1' method='post' action='../admin/aksi_ser.php' enctype='multipart/form-data'>
                      <input type="hidden" name="detail" value=<?php echo $row['Id_detail'];?>>
                    <tr>
                      <td><?php echo $no ;?></td>
                      <td>
                        <?php echo $row['Kode_lembaga'];?>
                          <input type="hidden" name="lembaga" value=<?php echo $row['Id_lembaga'];?>>    
                      </td>
                      <td><?php echo $row['Nama_lembaga'];?></td>
                      <td>
                        <?php echo $row['Kode_pelatihan'];?>
                          <input type="hidden" name="pelatihan" value=<?php echo $row['Id_pelatihan'];?>>   
                        </td>
                      <td><?php echo $row['Nama_pelatihan'];?></td>
                      <td><select name ="status" class="form-control">
                            <option value="lulus">Lulus</option>
                            <option value="tidak">Tidak Lulus</option>
                        </select></td>
                      <?php
                          $sql2  = "SELECT detail_pelatihan.Id_peserta, peserta.* FROM detail_pelatihan, peserta WHERE detail_pelatihan.Id_peserta=peserta.Id_peserta AND detail_pelatihan.Id_pelatihan='$row[Id_pelatihan]'";
                          $cek = mysqli_query($config, $sql2);
                          if(mysqli_num_rows($cek)>0){ 
                                echo "<td><select name=peserta>";
                                while ($r = mysqli_fetch_assoc($cek)) {
                                   
                      ?>        
                      <?php echo "<option value=$r[Id_peserta]>$r[Nama_lengkap]</option>";?>
                          <?php
                                  }
                                  echo "</select></td>";

                              }
                              else{
                                 echo "<select><option>Tidak Ada peserta yang mendafatar</option></select>";
                              }
                          ?>

                      <td><input type="file" name="sertifikat"></td>
                      <td><?php echo $row['Link'];?></td>
                      <td><input type=submit value=Simpan></td>
                    </tr> 
                    </form>
                      <?php    
                        $no++;                    
                      }
                        }  else {
                          echo '';    
                        }
                      }?>
                      
                  </tbody>   
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>     
     
<?php include 'theme/footer.php'; ?>
<script>
  $('[name=status]').on('change',function(){
    // $('[name=sertifikat]').attr('disabled',true);
    console.log($(this).val());
    var p =  $(this).parent().parent();
    if( $(this).val()=="tidak"){
     p.find('[name=sertifikat]').attr('disabled',true);
    } else {
      p.find('[name=sertifikat]').attr('disabled',false);
    }
  });
</script>
