<?php include 'theme/header.php'; ?>
  
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="divider"></div>
        <ul class="nav menu">
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=Dat_lem">Data Lembaga</a></li>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=Dat_pel">Pelatihan Saya</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul> 
  </div><!--/.sidebar-->
      
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div class="well" style="color: black">
          <h1>Pelatihan Saya</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Pelatihan Saya</li>
            </ol><br>
        <!-- Main content -->

          <!-- Default box -->
          <table id="example1" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Kode Pelatihan</th>
                    <th>Nama Pelatihan</th>
                    <th>Kuota</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                  </tr>
                </thead>
                  <tbody>
               <?php
                    session_start();
                    $ss = $_SESSION['sess_id'] ;

                    $sql = "SELECT * FROM lembaga where Id_user='$ss'";
                    $cek = mysqli_query($config, $sql);
                    $Id;
                    $r = mysqli_fetch_assoc($cek);
                    $Id=$r['Id_lembaga'];

                      $sql="SELECT lembaga.*, pelatihan.* FROM lembaga, pelatihan WHERE lembaga.Id_lembaga='$Id' AND lembaga.Id_lembaga=pelatihan.Id_lembaga";
                      $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                  <tr> 
                      <td><?php echo $no ;?></td>
                      <td><?php echo $row['Kode_lembaga'];?></td>
                      <td><?php echo $row['Nama_lembaga'];?></td>
                      <td><?php echo $row['Kode_pelatihan'];?></td>
                      <td><?php echo $row['Nama_pelatihan'];?></td>
                      <td><?php echo $row['Kuota'];?></td>
                      <td><?php echo $row['Tgl_mulai'];?></td>
                      <td><?php echo $row['Tgl_akhir'];?></td>
                      <?php    
                        $no++;                    
                      }
                        }  else {
                          echo '';    
                        }
                      }?>
                      </tr>
                    </tbody>
                  </table>
                </div>


     
<?php include 'theme/footer.php'; ?>