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
          <h1>Managemen Sertifikat</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Managemen Sertifikat</li>
            </ol><br>

              <table id="example1" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Kode Pelatihan</th>
                    <th>Nama Pelatihan</th>
                    <th>Nama Peserta</th>
                    <th>Status Pelatihan</th>
                    <th>sertifikat</th> 
                  </tr>
                </thead>
                  <tbody>
                <?php
                    session_start();
                    $ss = $_SESSION['sess_id'] ;

                    $sql = "SELECT * FROM peserta where Id_user='$ss'";
                    $cek = mysqli_query($config, $sql);
                    $Id;
                    $r = mysqli_fetch_assoc($cek);
                    $Id=$r['Id_peserta'];

                      $sql="SELECT detail_pelatihan.*, lembaga.*, pelatihan.*, peserta.* FROM detail_pelatihan, lembaga, pelatihan, peserta  WHERE detail_pelatihan.Id_peserta=peserta.Id_peserta AND detail_pelatihan.Id_pelatihan=pelatihan.Id_pelatihan AND detail_pelatihan.Id_lembaga=lembaga.Id_lembaga";
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
                      <td><?php echo $row['Nama_lengkap'];?></td>
                      <td><?php echo $row['status'];?></td>
                      <?php
                          if ($row[status] != 'lulus') {
                            echo "<td></td>";
                           } else {
                            echo '<td><a href="../image/'.$row['sertifikat'].'">download</a></td>';
                           }
                       ?>
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