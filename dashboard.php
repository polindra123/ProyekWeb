<?php include 'header.php'; 
?>

      <div class="slide">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="image/menjahit.jpg" alt="First Slide">
                                <div class="carousel-caption">
                                    <h3>Pelatihan Menjahit</h3>
                                </div>
                        </div>
                        <div class="item">
                            <img src="image/komputer.png" alt="Second Slide">
                                <div class="carousel-caption">
                                    <h3>Pelatihan Komputer</h3>
                                </div>
                        </div>
                        <div class="item">
                            <img src="image/mesin.jpg" alt="Third Slide">
                                <div class="carousel-caption">
                                    <h3>Pelatihan Mesin</h3>
                                </div>
                        </div>
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                
                            </a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                
                            </a>
                    </div>
            </div>
        </div>

    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12"><!--GRID 6 DI LAYAR SMALL-->
                        <div class="aside">
                            <h3 id="login" align="center">LOGIN</h3>
                                <div class="login">
                                    <h5 align="center">Jika Sudah Mempunyai akun</h5>
                                        <form>
                                            <input type="button" value="Login" name="Login" onclick="window.location.href='<?php $_SERVER[SCRIPT_NAME];?>?page=login'" />
                                        </form>
                                    <h5 align="center">Jika Tidak Memiliki Akun</h5>
                                        <form>
                                            <input type="button" value="Daftar" name="Daftar" onclick="window.location.href='<?php $_SERVER[SCRIPT_NAME];?>?page=daftar'" />
                                        </form>
                                </div>
                        </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-12"><!--GRID 6 DI LAYAR SMALL-->
                   <div class="aside2">
                        <h3 id="login">INFORMASI</h3>
                            <div class="login">
                                <div class="box" >
                                    <div class="box-body" style="color: black">
                                        <table id="example1" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr> 
                                                    <th>lembaga</th>
                                                    <th>Pelatihan</th>
                                                    <th>Alamat Pelatihan</th>
                                                    <th>Kuota</th>
                                                    <th>Tanggal mulai</th>
                                                    <th>Tanggal Berakhir</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>  
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <?php
                                                include "koneksi.php";
                                                    $sql="SELECT lembaga.*, pelatihan.* FROM lembaga, pelatihan WHERE pelatihan.Id_lembaga= lembaga.Id_lembaga ";
                                                        if (!$result=  mysqli_query($config, $sql)){
                                                            die('Error:'.mysqli_error($config));
                                                            }               
                                                            else {
                                                                if (mysqli_num_rows($result)> 0){
                                                                    while ($row=  mysqli_fetch_assoc($result)){
                                                                        $id = $row['Id_pelatihan'];
                                                                        $kd = $row['Id_lembaga'];
                                                                    echo "<tr>
                                                                        <td>$row[Nama_lembaga]</td>
                                                                        <td>$row[Nama_pelatihan]</td>
                                                                        <td>$row[Alamat]</td>
                                                                        <td>$row[Kuota]</td>
                                                                        <td>$row[Tgl_mulai]</td>
                                                                        <td>$row[Tgl_akhir]</td>
                                                                        <td>$row[Deskripsi]</td>
                                                                        <td>
                                                                            <a href='direct_daftar.php?id=$id&kd=$kd' class='btn btn-success'>Daftar</a>
                                                                        </td>
                                                                    </tr>";
                                                                    }
                                                                }
                                                                else{
                                                                    echo "Belum Ada Pelatihan";
                                                                }
                                                            }
                                                        ?>
                                        </tbody>   
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php'; ?>