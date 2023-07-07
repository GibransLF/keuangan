<?php
// untuk mencari nama user
$id = $_SESSION["login_id"];
$query = "SELECT * FROM login where id = '$id'";
$result = mysqli_query($conn, $query);
$login = mysqli_fetch_assoc($result);

// untuk tabel 
$query = "SELECT * FROM transaksi where id_login = '$id'";
$data = mysqli_query($conn, $query);

// insert data
if(isset($_POST["tambah"])){
    $tgl        = $_POST["tgl"];
    $tipe       = $_POST["tipe"];
    $keuangan   = $_POST["keuangan"];
    $ket        = $_POST["ket"];

    $id_login   = $_SESSION["login_id"];

    $query = "INSERT INTO transaksi (id_login, tgl, tipe, keuangan, ket) VALUES ('$id_login', '$tgl','$tipe', '$keuangan', '$ket')";

    if(mysqli_query($conn, $query)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    $id =  $_POST["id"];

    $query = "DELETE FROM transaksi WHERE id='$id'";

    if(mysqli_query($conn, $query)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// edit data 
if(isset($_POST["edit"])){
    $id = $_POST["id"];

    $query = "SELECT * FROM transaksi where id = '$id'";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);

    if(
    $_POST["tgl"]       == $row["tgl"] &&
    $_POST["tipe"]      == $row["tipe"] &&
    $_POST["keuangan"]  == $row["keuangan"] &&
    $_POST["ket"]       == $row["ket"]
    ){
        $_SESSION['error'] = "Data yang anda masukan tidak ada yang di Ubah!";
    }
    else{
        $tgl        = $_POST["tgl"];
        $tipe       = $_POST["tipe"];
        $keuangan   = $_POST["keuangan"];
        $ket        = $_POST["ket"];

        $id_login   = $_SESSION["login_id"];

        $query = "UPDATE transaksi SET id_login = '$id_login', tgl = '$tgl', tipe = '$tipe', keuangan = '$keuangan', ket = '$ket' WHERE id = '$id'";

    if(mysqli_query($conn, $query)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    }
}
?>