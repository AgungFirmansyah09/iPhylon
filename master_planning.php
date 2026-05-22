<?php
require 'function.php';

$Planning = mysqli_query($conn,"
    SELECT *
    FROM tbl_jo_spk
    ORDER BY tanggal_upload DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">

  <title>iPhylon | Master Planning</title>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet"
        href="plugins/fontawesome-free/css/all.min.css">

  <!-- DataTables -->
  <link rel="stylesheet"
        href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet"
        href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <link rel="stylesheet"
        href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet"
        href="dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- HEADER -->
  <?php include 'header.php'; ?>

  <!-- CONTENT -->
  <div class="content-wrapper">

    <!-- HEADER CONTENT -->
    <section class="content-header">

      <div class="container-fluid">

        <!-- DELETE ALERT -->
        <?php if(isset($_GET['delete'])) : ?>
          <div id="deleteAlert"
               class="alert alert-danger alert-dismissible fade show">

            Planning berhasil dihapus

          </div>
        <?php endif; ?>

        <!-- SUCCESS ALERT -->
        <?php if(isset($_GET['success'])) : ?>
          <div id="successAlert"
               class="alert alert-success alert-dismissible fade show">

            SPK Planning berhasil diupload

          </div>
        <?php endif; ?>

        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Master Planning</h1>
          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>

              <li class="breadcrumb-item active">
                SPK Planning
              </li>

            </ol>

          </div>

        </div>

      </div>

    </section>

    <!-- MAIN CONTENT -->
    <section class="content">

      <div class="container-fluid">

        <!-- UPLOAD CARD -->
        <div class="row">

          <div class="col-md-12">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">
                  Upload SPK Planning
                </h3>

              </div>

              <div class="card-body">

                <form action="./UploadData/upload_master_planning.php"
                      method="POST"
                      enctype="multipart/form-data">

                  <div class="row">

                    <!-- FILE -->
                    <div class="col-md-4">

                      <label>Upload Excel</label>

                      <div class="custom-file">

                        <input type="file"
                               class="custom-file-input"
                               id="spkPlanning"
                               name="spkPlanning"
                               accept=".xls,.xlsx"
                               required>

                        <label class="custom-file-label">
                          Choose Excel File
                        </label>

                      </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="col-md-2">

                      <label>&nbsp;</label>

                      <button type="submit"
                              name="upload"
                              class="btn btn-primary btn-block">

                        <i class="fas fa-upload"></i>
                        Upload

                      </button>

                    </div>

                    <!-- TEMPLATE -->
                    <div class="col-md-2">

                      <label>&nbsp;</label>

                      <a href="./Template/template_spk_planning.xlsx"
                         download
                         class="btn btn-success btn-block">

                        <i class="fas fa-download"></i>
                        Download Template

                      </a>

                    </div>

                  </div>

                </form>

              </div>

            </div>

          </div>

        </div>

        <!-- TABLE -->
        <div class="row">

          <div class="col-12">

            <div class="card card-default">

              <div class="card-header">

                <h3 class="card-title">
                  Data SPK Planning
                </h3>

              </div>

              <div class="card-body">

                <table id="example1"
                       class="table table-bordered table-striped">

                  <thead>

                    <tr>

                      <th>No</th>
                      <th>No JO</th>
                      <th>Item</th>
                      <th>Mesin</th>
                      <th>Injector</th>
                      <th>Line</th>
                      <th>Tanggal SPK</th>
                      <th>Upload Date</th>
                      <th width="120">Action</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php $i = 1; ?>
                    <?php foreach($Planning as $Plan) : ?>

                    <tr>

                      <td><?= $i++; ?></td>
                      <td><?= $Plan['no_jo']; ?></td>
                      <td><?= $Plan['item']; ?></td>
                      <td><?= $Plan['mesin']; ?></td>
                      <td><?= $Plan['injector']; ?></td>
                      <td><?= $Plan['line_produksi']; ?></td>
                      <td><?= $Plan['tanggal_spk']; ?></td>
                      <td><?= $Plan['tanggal_upload']; ?></td>

                      <td>

                        <!-- DETAIL -->
                        <button type="button"
                                class="btn btn-info btn-sm"
                                data-toggle="modal"
                                data-target="#detailSPK<?= $Plan['id_jo_spk']; ?>">

                          <i class="fas fa-eye"></i>

                        </button>

                        <!-- GENERATE QR -->
                        <a href="generate_qr.php?id=<?= $Plan['id_jo_spk']; ?>"
                           class="btn btn-success btn-sm">

                          <i class="fas fa-qrcode"></i>

                        </a>

                        <!-- DELETE -->
                        <a href="delete_planning.php?id=<?= $Plan['id_jo_spk']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this planning?')">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- FOOTER -->
  <footer class="main-footer">

    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    2024
    <strong>
      <a href="#">Mfg Project Officer</a>
    </strong>
    All rights reserved.
  </footer>

  <!-- SIDEBAR -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- ================= MODAL SECTION ================= -->
<?php foreach($Planning as $Plan) : ?>

<div class="modal fade"
     id="detailSPK<?= $Plan['id_jo_spk']; ?>"
     tabindex="-1">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!-- HEADER -->
      <div class="modal-header bg-info">

        <h4 class="modal-title">
          Detail SPK Planning
        </h4>

        <button type="button"
                class="close"
                data-dismiss="modal">

          <span>&times;</span>

        </button>

      </div>

      <!-- BODY -->
      <div class="modal-body">
<!-- QUERY DETAIL -->
                <?php
                $detail = mysqli_query($conn,"
                    SELECT *
                    FROM tbl_spk_detail
                    WHERE id_jo_spk = '".$Plan['id_jo_spk']."'
                ");
                ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th>No JO</th>
                    <th>Item</th>
                    <th>Mesin</th>
                    <th>Injector</th>
                    <th>Line</th>
                    <th>Tanggal SPK</th>
                    <th>Upload By</th>
                    <th>Style</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?= $Plan['no_jo']; ?></td>
                    <td><?= $Plan['item']; ?></td>
                    <td><?= $Plan['mesin']; ?></td>
                    <td><?= $Plan['injector']; ?></td>
                    <td><?= $Plan['line_produksi']; ?></td>
                    <td><?= $Plan['tanggal_spk']; ?></td>
                    <td><?= $Plan['uploaded_by']; ?></td>
                    <td><?= $Plan['style']; ?> x </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

      <!-- FOOTER -->
      <div class="modal-footer">

        <button type="button"
                class="btn btn-secondary"
                data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>

<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.min.js"></script>

<!-- FILE INPUT -->
<script>
$('.custom-file-input').on('change', function () {

    let fileName = $(this).val().split('\\').pop();

    $(this).next('.custom-file-label').html(fileName);

});
</script>

<!-- DATATABLE -->
<script>
$(document).ready(function () {

    $('#example1').DataTable({

        "paging": true,
        "pageLength": 10,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true

    });

});
</script>

<!-- SUCCESS ALERT -->
<script>
setTimeout(function(){

    $('#successAlert').fadeOut('slow');

}, 1000);
</script>

<!-- DELETE ALERT -->
<script>
setTimeout(function(){

    $('#deleteAlert').fadeOut('slow');

}, 1000);
</script>

</body>
</html>