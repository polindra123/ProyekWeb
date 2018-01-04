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
          <h1>Managemen Lembaga</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
              <li class="active">Managemen Lembaga</li>
            </ol><br>
            <section class="content"> 
            <?php
              $Id_lembaga = $_GET['Id_lembaga'];
                $sql="SELECT  * FROM lembaga where Id_lembaga='$Id_lembaga' ";
                  if (!$result=  mysqli_query($config, $sql)){
                    die('Error:'.mysqli_error($config));
                    }  else {
                        if (mysqli_num_rows($result)> 0){
                            while ($row=  mysqli_fetch_assoc($result)){
            ?>

            <div class="box">
              <div class="box-header with-border">Edit Lembaga 
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div> 
              </div> 
              <form action="aksi_lem.php?sender=edit" method="POST">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label>Nama Lembaga</label>
                        <input readonly="" type="hidden" name="Id_lembaga" value="<?php echo $row['Id_lembaga'];?>" class="form-control" placeholder="Enter..." required="">
                        <input type="text" name="Nama_lembaga" value="<?php echo $row['Nama_lembaga'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  
                    <div class="col-md-12 form-group">
                      <label>Alamat Lembaga</label>
                         <textarea class="form-control" placeholder="Enter..." name="Alamat" type="text"><?php echo $row['Alamat'];?></textarea>
                    </div>
                    <div class="col-md-12 form-group"> 
                      <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                    </div>
                  </div> 
                </div>
              </form>
            </div>
              <?php                
                }
              }  else {
                echo '';    
                }
              }?>

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-striped dataTable no-footer">
                <thead>
                  <tr> 
                    <th>Nomer</th>
                    <th>Kode Lembaga</th>
                    <th>Nama Lembaga</th>
                    <th>Alamat Lembaga</th>
                    <th>Aksi</th>   
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
                      <td>
                        <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=lembaga&Id_lembaga=<?php echo $row['Id_lembaga'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                        <a href="aksi_lem.php?sender=hapus&id=<?php echo $row['Id_user']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
                      </td>
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
            </div><!-- /.box-body -->

          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div>
  </div>
</div>
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
  <form action="aksi_lem.php?sender=lembaga" method="POST" >
    <div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color: black;">
      <div class="modal-dialog" role="document">       
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Tambah Lembaga</h4>
          </div> 
          <div class="modal-body center"> 
 <!--Content-->
            <div class="form-group">
                <label>Kode Lembaga</label>
                  <input type="text" name="Kode_lembaga" class="form-control" required="" placeholder="Enter ...">
            </div>

             <div class="form-group">
                <label>Nama Lembaga</label>
                  <input type="text" name="Nama_lembaga" class="form-control" required="" placeholder="Enter ...">
            </div>

            <div class="form-group">
              <label>Alamat Lembaga</label>
              <textarea type="text" name="Alamat" class="form-control" placeholder="Enter ..."></textarea> 
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            <button type="submit" class="btn btn-info"> Simpan</button> 
          </div>   
        </div>
      </div>
    </div>
  </form>
      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>