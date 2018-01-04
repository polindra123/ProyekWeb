    <footer class="main-footer">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <h1>Lembaga Pelatihan Kerja Indramayu</h1>
                        <br>Jl. Gatot Subroto Nomor 1, Indramayu, Pekandangan, Kec. Indramayu, Kabupaten Indramayu, Jawa Barat 45216
                        <br>Phone:(0234) 274382
                        <br>E-mail:upt.blk.imy@gmail.com
                        <br>Website:http://depnaker.indramayu.go.id
                    </div>
                </div> 

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <h1>Jenis pelatihan Yang Tersedia</h1>
                                            <?php
                      $sql="SELECT * FROM pelatihan WHERE Id_pelatihan=Id_pelatihan";
                                    if (!$result=  mysqli_query($config, $sql)){
                                        die('Error:'.mysqli_error($config));
                                    }               
                                    else {
                                        if (mysqli_num_rows($result)> 0){
                                            while ($row=  mysqli_fetch_assoc($result)){
                                                $id = $row['Id_pelatihan'];
                                            echo "<ul>
                                                <li>$row[Nama_pelatihan]</li>
                                            </ul>";
                                            }
                                        }
                                        else{
                                            echo "Belum Ada Pelatihan";
                                        }
                                    }
                                ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p align="center">Dinas Ketenaga Kerjaan Indramayu<br>Copyright&copy;2017</p>
                    </div>
                </div>
            </div>
        </div>
      <div class="control-sidebar-bg"></div>
    </div>

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    

    <!-- DataTables -->
       <script>
      $(function () {
        $("#example1").DataTable();
        $("#example2").DataTable();
        $("#example3").DataTable();
        $('#example5').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });
  });

    </script>
    <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
      $(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
      });
    </script>
    
  </body>
</html> 