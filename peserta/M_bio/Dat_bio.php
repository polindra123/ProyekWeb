<?php include 'theme/header.php'; ?>
  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="divider"></div>
        <ul class="nav menu">
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=biodata">Biodata</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=pelatihan">Pelatihan Saya</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=profil">Profil Depnaker</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=kontak">Kontak Depnaker</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tentang">Tentang Website</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=lpk">Daftar Lembaga</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
  </div><!--/.sidebar-->
      
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="color: black">
          <h1>Managemen Biodata</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Managemen Biodata</li>
            </ol><br>
        <!-- Main content -->
            <section class="content"> 
            <!--edit-->
            <?php
              $Id_peserta = $_GET['Id_peserta'];

              $sql="SELECT  * FROM peserta where Id_peserta='$Id_peserta' ";
                  if (!$result=  mysqli_query($config, $sql)){
                    die('Error:'.mysqli_error($config));
                    }  else {
                        if (mysqli_num_rows($result)> 0){
                            while ($row=  mysqli_fetch_assoc($result)){
            ?>
              <?php                
                }
              }  else {
                echo '';    
                }
              }?>

          <!-- Default box -->
          <div class="box">
            
            <div class="box-body">
                <?php
                    session_start();
                    $ss = $_SESSION['sess_id'] ;
                      $sql="SELECT  * FROM peserta WHERE Id_user='$ss'";
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
              <table class="table table-striped">
                <thead>
                  <th colspan="2">Biodata <?php echo $row['Nama_lengkap'];?></th>
                  <tr> 
                    <td>Nama lengkap</th>
                    <td><?php echo $row['Nama_lengkap'];?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $row['Jenis_kelamin'];?></td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td><?php echo $row['Agama'];?></td>
                  </tr>
                  <tr>
                    <td>Telepon</th>
                    <td><?php echo $row['Telepon'];?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</th>
                    <td><?php echo $row['Tempat_lahir'];?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</th>
                    <td><?php echo $row['Tanggal_lahir'];?></td>
                  </tr>
                  <tr>
                    <td>Email</th>
                    <td><?php echo $row['Email'];?></td>
                  </tr>
                  <tr>
                    <td>Alamat</th>
                    <td><?php echo $row['Alamat'];?></td>
                  </tr>
                </thead>
                  <tbody>
                      <?php    
                        $no++;                    
                      }
                        }  else {
                          echo '';    
                        }
                      }?>
                  </tbody>   
              </table>
              <div class="box-header with-border">
              <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li>Edit</a></h3>
                <div class="box-tools pull-left">
                </div>
            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div>
  </div>
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->  
<!-- Modal -->
<?php
                    $ss = $_SESSION['sess_id'] ;
                      $sql="SELECT  * FROM peserta WHERE Id_user='$ss'";
                        $result=  mysqli_query($config, $sql);
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
  
    <div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color: black;">
      <div class="modal-dialog" role="document">       
        <form action="aksi_bio.php?sender=edit" method="POST" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Data Diri</h4>
          </div> 
          <div class="modal-body center"> 
 <!--Content-->

            <div class="form-group">
              <input type="hidden" name="Id_peserta" value=<?php echo $row['Id_peserta'];?>>
                <label>Nama Lengkap</label>
                  <input type="text" name="Nama_lengkap" class="form-control" required="" placeholder="" value="<?php echo $row['Nama_lengkap'];?>">
            </div>

            <div class="form-group">
              <label>Jenis kelamin</label>
                <select name ="Jenis_kelamin" class="form-control">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <select name ="Agama" class="form-control">
                <option>Islam</option>
                <option>Hindu</option>
                <option>Budha</option>
                <option>Kristen</option>
              </select>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                  <input type="text" name="Telepon" class="form-control" required="" placeholder="" value=<?php echo $row['Telepon'];?>>
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                  <input type="text" name="Tempat_lahir" class="form-control" required="" placeholder="" value=<?php echo $row['Tempat_lahir'];?>>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label><br>
                            <select name="tanggal">
                            <?php
                                for($i=1; $i<=31; $i++)
                                echo "<option value=$i>$i</option>";
                            ?>
                            </select>
                            <select name="bulan">
                                <option value="1">Januari</option><option value="2">Februari</option><option value="3">Maret</option>
                                <option value="4">April</option><option value="5">Mei</option><option value="6">Juni</option>
                                <option value="7">Juli</option><option value="8">Agustus</option><option value="9">September</option>
                                <option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>
                            </select>
                            <select name="tahun">
                            <?php
                                for($i=1970; $i<=2000; $i++)
                                echo "<option value=$i>$i</option>";
                            ?>
                            </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                  <input type="text" name="Email" class="form-control" required="" placeholder="" value=<?php echo $row['Email'];?>>
            </div>

             <div class="form-group">
                <label>Alamat</label>
                  <textarea type="text" name="Alamat" class="form-control" placeholder=""><?php echo $row['Alamat'];?></textarea> 
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            <button type="submit" class="btn btn-info"> Simpan</button> 
          </div>   
        </div>
      </div>
    </form>
  </div>
</div>
  
  <?php } } ?>
      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>