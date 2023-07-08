<?php
// untuk mencari nama user
$id = $_SESSION["login_id"];
$query = "SELECT * FROM login where id = '$id'";
$result = mysqli_query($conn, $query);
$login = mysqli_fetch_assoc($result);

// total keuangan
$query = "SELECT * FROM transaksi where id_login = '$id'";
$data = mysqli_query($conn, $query);
$total = 0;
foreach ($data as $row) {
    if ($row['tipe'] == 'pemasukan') {
        $total += $row['keuangan'];
    } else {
        $total -= $row['keuangan'];
    }    
}

// total pemasukan
$query = "SELECT * FROM transaksi where id_login = '$id' AND tipe = 'pemasukan'";
$data = mysqli_query($conn, $query);
$pemasukan = 0;
foreach ($data as $row) {
    $pemasukan += $row['keuangan'];
}

// total pengeluaran
$query = "SELECT * FROM transaksi where id_login = '$id' AND tipe = 'pengeluaran'";
$data = mysqli_query($conn, $query);
$pengeluaran = 0;
foreach ($data as $row) {
    $pengeluaran -= $row['keuangan'];
}
?>