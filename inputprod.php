<?php
session_start();

$nama_user = $_SESSION['username'];
$nik_user  = $_SESSION['nik'];

$conn = mysqli_connect("localhost:3306", "root", "", "db_iphylon");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['simpan'])) {

    $bucket = $_POST['bucket'];
    $colour = $_POST['colour'];
    $model  = $_POST['model'];
    $qty    = $_POST['qty'];

    foreach ($qty as $size => $value) {

        $size = strtoupper($size);

        if ($value != "") {
            mysqli_query($conn, "
                INSERT INTO tbl_transprod (bucket, colour, model, size, qty, nama_user, nik_user)
                VALUES ('$bucket','$colour','$model','$size','$value','$nama_user','$nik_user')
            ");
        }
    }

    echo "<script>
    window.location.href='inputprod.php?success=1';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data output | iphylon</title>
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Header -->
    <?php include 'header.php';?>
  <!-- End Header -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Output<Output></Output></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Output</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-pr">
          <div class="card-header">
            <h3 class="card-title">Input Data Output</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bucket</label>
                    <select class="form-control select2" name="bucket" id="bucket" style="width: 100%;" required>
                      <option disabled selected value="">Enter Your Bucket</option>
                        <option value="250101SO">250101SO</option>
                        <option value="260406SO">260406SO</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                  <label>Colour</label>
                    <select class="form-control select2" name="colour" id="colour" style="width: 100%;" required>
                      <option disabled selected value="">Enter Your Colour</option>
                        <option value="White">White</option>
                        <option value="Red">Red</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                  <label>Model</label>
                    <select class="form-control select2" name="model" id="model" style="width: 100%;" required>
                      <option disabled selected value="">Enter Your Model</option>
                        <option value="Giannis">Giannis</option>
                        <option value="Court Vision">Court Vision</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">1</label>
                      <input type="text" class="form-control" id="qty1" name="qty[1]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">1T</label>
                      <input type="text" class="form-control" id="model" name="qty[1T]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">2</label>
                      <input type="text" class="form-control" id="model" name="qty[2]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">2T</label>
                      <input type="text" class="form-control" id="model" name="qty[2t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">3</label>
                      <input type="text" class="form-control" id="model" name="qty[3]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">3T</label>
                      <input type="text" class="form-control" id="model" name="qty[3t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">4</label>
                      <input type="text" class="form-control" id="model" name="qty[4]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">4T</label>
                      <input type="text" class="form-control" id="model" name="qty[4t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">5</label>
                      <input type="text" class="form-control" id="model" name="qty[5]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">5T</label>
                      <input type="text" class="form-control" id="model" name="qty[5t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">6</label>
                      <input type="text" class="form-control" id="model" name="qty[6]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">6T</label>
                      <input type="text" class="form-control" id="model" name="qty[6t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">7</label>
                      <input type="text" class="form-control" id="model" name="qty[7]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">7T</label>
                      <input type="text" class="form-control" id="model" name="qty[7t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">8</label>
                      <input type="text" class="form-control" id="model" name="qty[8]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">8T</label>
                      <input type="text" class="form-control" id="model" name="qty[8t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">9</label>
                      <input type="text" class="form-control" id="model" name="qty[9]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">9T</label>
                      <input type="text" class="form-control" id="model" name="qty[9t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">10</label>
                      <input type="text" class="form-control" id="model" name="qty[10]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">10T</label>
                      <input type="text" class="form-control" id="model" name="qty[10t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">11</label>
                      <input type="text" class="form-control" id="model" name="qty[11]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">11T</label>
                      <input type="text" class="form-control" id="model" name="qty[11t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">12</label>
                      <input type="text" class="form-control" id="model" name="qty[12]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">12T</label>
                      <input type="text" class="form-control" id="model" name="qty[12t]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">13</label>
                      <input type="text" class="form-control" id="model" name="qty[13]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">13T</label>
                      <input type="text" class="form-control" id="model" name="qty[13t]" placeholder="Qty" >
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">14</label>
                      <input type="text" class="form-control" id="model" name="qty[14]" placeholder="Qty" >
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <label for="model" class="text-center d-block">15</label>
                      <input type="text" class="form-control" id="model" name="qty[15]" placeholder="Qty" >
                  </div>
                </div>

                

            </div>
          </div>
             

          
              <div class="row">
                <div class="col-md-6">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">Save Data</button>
                </div>
              </div>
              <div class="modal fade" id="confirmModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    
                    <div class="modal-header">
                      <h5 class="modal-title">Konfirmasi Data</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                      <p>Apakah data yang diinput sudah benar?</p>
                      <div id="previewData"></div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      
                      <!-- tombol submit asli -->
                      <button type="submit" name="simpan" class="btn btn-success">
                        Ya, Simpan
                      </button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
          

        <!-- /.row -->
        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>2024 
    <strong><a href="#">Mfg Project Officer</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
$(document).ready(function(){

  $('#confirmModal').on('show.bs.modal', function () {

    let bucket = $('[name="bucket"]').val();
    let colour = $('[name="colour"]').val();
    let model  = $('[name="model"]').val();

    let sizeRow = '';
    let qtyRow  = '';
    let totalQty = 0;

    let html = `
      <table class="table table-bordered">
        <tr><th>Bucket</th><td>${bucket || '-'}</td></tr>
        <tr><th>Colour</th><td>${colour || '-'}</td></tr>
        <tr><th>Model</th><td>${model || '-'}</td></tr>
      </table>

      <h5>Size Run</h5>
      <table class="table table-bordered table-sm text-center">
        <tr>
    `;

    // loop semua input qty
    $('input[name^="qty"]').each(function(){
      let value = $(this).val();

      if(value !== '') {
        let name = $(this).attr('name');
        let size = name.replace('qty[','').replace(']','');

        sizeRow += `<th>${size.toUpperCase()}</th>`;
        qtyRow  += `<td>${value}</td>`;

        totalQty += parseInt(value) || 0; // 🔥 aman dari error
      }
    });

    html += sizeRow + `</tr><tr>` + qtyRow + `
        </tr>
      </table>

      <p class="text-left text-success">
        <b>Total Qty: ${totalQty}</b>
      </p>
    `;

    $('#previewData').html(html);
  });

});
</script>

<script>
const urlParams = new URLSearchParams(window.location.search);

if (urlParams.get('success') === '1') {
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data berhasil disimpan',
    showConfirmButton: false,
    timer: 2000
  });

  // hapus parameter dari URL biar ga muncul lagi
  window.history.replaceState({}, document.title, window.location.pathname);
}
</script>

</body>
</html>
