<?php include 'theme/header.php'; 
?>

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
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="color: black">
      <div class="row">
        <div class="col-lg-12">
 
     <div id="content">
        <div class="container-fluid">
                <div class="col-sm-12"><!--GRID 6 DI LAYAR SMALL-->                        
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
          </div>
        </div>
      </div>
    
 
 <?php include 'theme/footer.php'; ?>