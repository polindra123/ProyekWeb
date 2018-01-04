<?php include 'header.php'; ?>
<!-- end: header -->
 
<!-- start: container artikel -->
   <div id="content">
        <div class="container-fluid">
            <div class="col-sm-12"><!--GRID 6 DI LAYAR SMALL-->                        
                <div class="box" >
                    <h1><center>Daftar Lembaga Yang Terdaftar</center></h1>
                        <div class="box-body" style="color: black">
                            <table id="example1" class="table table-striped dataTable no-footer">
                                <thead>
                                    <tr> 
                                        <th>Kode Lembaga</th>
                                        <th>Nama Lembaga</th>
                                        <th>Alamat Lembaga</th> 
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php
                                            include "koneksi.php";
                                                $sql="SELECT * FROM lembaga";
                                                    if (!$result=  mysqli_query($config, $sql)){
                                                    die('Error:'.mysqli_error($config));
                                                    }           
                                                    else {
                                                        if (mysqli_num_rows($result)> 0){
                                                            while ($row=  mysqli_fetch_assoc($result)){
                                                                echo "<tr>
                                                                        <td>$row[Kode_lembaga]</td>
                                                                        <td>$row[Nama_lembaga]</td>
                                                                        <td>$row[Alamat]</td>
                                                                    </tr>";
                                                                }
                                                            }
                                                            else{
                                                                echo "Belum Ada lembaga";
                                                            }
                                                        }
                                                    ?>
                                          
                                    </tbody>   
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php'; ?>