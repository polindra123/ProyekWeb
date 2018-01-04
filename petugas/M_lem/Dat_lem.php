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
          <h1>Managemen Lembaga</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Managemen Lembaga</li>
            </ol><br>
        <!-- Main content -->
                <section class="content"> 
            <!--edit-->
                <?php
                  $Id_lembaga = $_GET['Id_lembaga'];
                    $sql="SELECT  * FROM lembaga where Id_lembaga='$Id_lembaga' ";
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
                      $sql="SELECT  * FROM lembaga WHERE Id_user='$ss'";
                        if (!$result=  mysqli_query($config, $sql)){
                          die('Error:'.mysqli_error($config));
                            }  else {
                              if (mysqli_num_rows($result)> 0){
                                while ($row=  mysqli_fetch_assoc($result)){
                    ?>
              <table class="table table-striped">
                <thead>
                  <th colspan="2">Data Lembaga <?php echo $row['Nama_lembaga'];?></th>
                  <tr> 
                    <td>Nama lembaga</th>
                    <td><?php echo $row['Nama_lembaga'];?></td>
                  </tr>
                    <td>Alamat lembaga</th>
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
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
      
          <?php
            $ss = $_SESSION['sess_id'] ;
            $sql="SELECT  * FROM lembaga WHERE Id_user='$ss'";
            $result=  mysqli_query($config, $sql);
              if (mysqli_num_rows($result)> 0){
                while ($row=  mysqli_fetch_assoc($result)){
          ?>
  
    <div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color: black;">
      <div class="modal-dialog" role="document">       
        <form action="aksi_lem.php?sender=edit" method="POST" >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Data lembaga</h4>
          </div> 
          <div class="modal-body center"> 
 <!--Content-->

            <div class="form-group">
              <input type="hidden" name="Id_lembaga" value=<?php echo $row['Id_lembaga'];?>>
                <label>Nama Lembaga</label>
                  <input type="text" name="Nama_lembaga" class="form-control" value="<?php echo $row['Nama_lembaga'];?>">
            </div>

             <div class="form-group">
                <label>Alamat lembaga</label>
                  <textarea type="text" name="Alamat" class="form-control" value=><?php echo $row['Alamat'];?></textarea> 
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