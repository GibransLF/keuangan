<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi Pemasukan Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../transaksi/index_transaksi.php">Transaksi Keuangan</a></li>
              <li class="breadcrumb-item active">Pemasukan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Pemasukan Keuangan</h3>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
              </div>
              <?php include "addModal.php"; ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>keuangan</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $total = 0;
                  $i = 1;
                  foreach ($data as $row) :
                    if ($row['tipe'] == 'pemasukan') {
                      $total += $row['keuangan'];
                    } else {
                      $total -= $row['keuangan'];
                    }                  
                  ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row["tgl"] ?></td>
                        <td><?= $row["ket"] ?></td>
                        <td class=<?= ( $row["tipe"] == "pemasukan") ? "text-success" : "text-danger" ; ?> ><?= $row["keuangan"] ?></td>
                        <td class="font-weight-bold"> <?= $total; ?> </td>
                        <td>
                          <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $row["id"] ?>">
                              <i class="fas fa-edit"></i>
                            </button>
                            <?php include "editModal.php" ?>

                            <!-- Tombol Delete -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row["id"] ?>">
                              <i class="fas fa-trash"></i>
                            </button>
                            <?php include "deleteModal.php" ?>
                        </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr class="text-center">
                    <th colspan="4">Total Jumlah</th>
                    <th colspan="2"><?= $total; ?></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>