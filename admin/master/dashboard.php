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
  </div><!--/.sidebar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div style="background-color: white; padding: 3%">
<div>
  <center><h2 style="margin-top: 20px;">Selamat Datang           
    <?php
           session_start();
                    $ss = $_SESSION['sess_id'] ;
                      $sql="SELECT  username FROM user WHERE Id_user='$ss'";
                        $result=  mysqli_query($config, $sql);
                       if (mysqli_num_rows($result)> 0){
                              while ($row=  mysqli_fetch_assoc($result)){
                                    echo "$row[username]";

                            }
                          }
                    ?></h2></center>
          </div>

          <div class="box" >
            <h1><center>Daftar Lembaga Yang Terdaftar</center></h1>
            <div class="box-body" style="color: black">
              <table id="example1" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Alamat Lembaga</th> 
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $sql="SELECT  * FROM lembaga";
                      $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?php echo $no ;?></td>
                      <td><?php echo $row['Kode_lembaga'];?></td>
                      <td><?php echo $row['Nama_lembaga'];?></td>
                      <td><?php echo $row['Alamat'];?></td>
                    </tr> 
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

            <div class="box" >
            <h1><center>Daftar Pelatihan Yang Terdaftar</center></h1>
            <div class="box-body" style="color: black">
              <table id="example2" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Kode Pelatihan</th>
                    <th>Nama Pelatihan</th>
                    <th>Kuota</th>
                    <th>Alamat Pelatihan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Deskripsi</th> 
                  </tr>
                </thead>
                  <tbody>
                    <?php
                      $sql="SELECT lembaga.*, pelatihan.* FROM lembaga, pelatihan WHERE pelatihan.Id_lembaga= lembaga.Id_lembaga ";
                      $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                      <td><?php echo $no ;?></td>
                      <td><?php echo $row['Kode_lembaga'];?></td>
                      <td><?php echo $row['Nama_lembaga'];?></td>
                      <td><?php echo $row['Kode_pelatihan'];?></td>
                      <td><?php echo $row['Nama_pelatihan'];?></td>
                      <td><?php echo $row['Kuota'];?></td>
                      <td><?php echo $row['Alamat'];?></td>
                      <td><?php echo $row['Tgl_mulai'];?></td>
                      <td><?php echo $row['Tgl_akhir'];?></td>
                      <td><?php echo $row['Deskripsi'];?></td>
                    </tr> 
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
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'theme/footer.php'; ?>