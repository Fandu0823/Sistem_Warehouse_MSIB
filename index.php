<?php 
$host = "localhost";  
$user = "root";  
$pass = "";  
$db = "warehouse_msib";  

$koneksi = new mysqli($host, $user, $pass, $db);  
if ($koneksi->connect_error) {  
    die("Koneksi gagal: " . $koneksi->connect_error);  
}  

$name = "";  
$location = "";  
$capacity = "";  
$status = "";  
$opening_hour = "";  
$closing_hour = "";  
$sukses = "";  
$error = "";  

$op = isset($_GET['op']) ? $_GET['op'] : ""; 

if ($op == 'delete') {  
    $id = $_GET['id'];  
    $sql1 = "DELETE FROM gudang WHERE id = $id";  
    $q1 = mysqli_query($koneksi, $sql1);  
    $sukses = $q1 ? "Data berhasil dihapus" : "Data gagal dihapus";  
}  

if ($op == 'edit') {  
    $id = $_GET['id'];  
    $sql1 = "SELECT * FROM gudang WHERE id = $id";  
    $q1 = mysqli_query($koneksi, $sql1);  
    if ($q1 && mysqli_num_rows($q1) > 0) {  
        $r1 = mysqli_fetch_array($q1);  
        $name = $r1['name'];  
        $location = $r1['location'];  
        $capacity = $r1['capacity'];  
        $status = $r1['status'];  
        $opening_hour = $r1['opening_hour'];  
        $closing_hour = $r1['closing_hour'];  
    } else {  
        $error = "Data tidak ditemukan";  
    }  
}  

if (isset($_POST['simpan'])) {  
    $name = $_POST['name'];  
    $location = $_POST['location'];  
    $capacity = $_POST['capacity'];  
    $status = $_POST['status'];  
    $opening_hour = $_POST['opening_hour'];  
    $closing_hour = $_POST['closing_hour'];  

    if ($name && $location && $capacity && $status) {  
        if ($op == 'edit') {  
            $sql1 = "UPDATE gudang SET name = '$name', location = '$location', capacity = $capacity, status = '$status', opening_hour = '$opening_hour', closing_hour = '$closing_hour' WHERE id = $id";  
            $q1 = mysqli_query($koneksi, $sql1);  
            $sukses = $q1 ? "Data Berhasil diupdate" : "Data Gagal diupdate";  
        } else {  
            $sql1 = "INSERT INTO gudang (name, location, capacity, status, opening_hour, closing_hour) VALUES ('$name', '$location', $capacity, '$status', '$opening_hour', '$closing_hour')";  
            $q1 = mysqli_query($koneksi, $sql1);  
            $sukses = $q1 ? "Berhasil Memasukkan Data Baru" : "Gagal Memasukkan Data";  
        }  
    } else {  
        $error = "Silahkan Masukkan Semua Data";  
    }  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>List Gudang</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        .mx-auto {  
            width: 800px;  
        }  
        .card {  
            margin-top: 10px;  
        }  
    </style>  
</head>  
<body>  
    <div class="mx-auto">  
        <div class="card">  
            <div class="card-header bg-primary text-dark text-center">  
                List Gudang  
            </div>  
            <div class="card-body">  
                <?php if ($error) { ?>  
                    <div class="alert alert-danger" role="alert">  
                        <?php echo $error ?>  
                    </div>  
                    <?php header("refresh:5;url=index.php"); ?>  
                <?php } ?>  
                <?php if ($sukses) { ?>  
                    <div class="alert alert-success" role="alert">  
                        <?php echo $sukses ?>  
                    </div>  
                    <?php header("refresh:5;url=index.php"); ?>  
                <?php } ?>  
                <form action="" method="POST">  
                    <div class="mb-3 row">  
                        <label for="name" class="col-sm-2 col-form-label">Nama Gudang</label>  
                        <div class="col-sm-10">  
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">  
                        </div>  
                    </div>  
                    <div class="mb-3 row">  
                        <label for="location" class="col-sm-2 col-form-label">Lokasi Gudang</label>  
                        <div class="col-sm-10">  
                            <textarea class="form-control" id="location" name="location"><?php echo $location ?></textarea>  
                        </div>  
                    </div>  
                    <div class="mb-3 row">  
                        <label for="capacity" class="col-sm-2 col-form-label">Kapasitas Gudang</label>  
                        <div class="col-sm-10">  
                            <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo $capacity ?>">  
                        </div>  
                    </div>  
                    <div class="mb-3 row">  
                        <label for="status" class="col-sm-2 col-form-label">Status</label>  
                        <div class="col-sm-10">  
                            <select class="form-control" id="status" name="status">
                                <option value="aktif" <?php echo ($status == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                <option value="tidak_aktif" <?php echo ($status == 'tidak_aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>  
                        </div>  
                    </div>
                    <div class="mb-3 row">  
                        <label for="opening_hour" class="col-sm-2 col-form-label">Jam Buka</label>  
                        <div class="col-sm-10">  
                            <input type="time" class="form-control" id="opening_hour" name="opening_hour" value="<?php echo $opening_hour ?>">  
                        </div>  
                    </div>
                    <div class="mb-3 row">  
                        <label for="closing_hour" class="col-sm-2 col-form-label">Jam Tutup</label>  
                        <div class="col-sm-10">  
                            <input type="time" class="form-control" id="closing_hour" name="closing_hour" value="<?php echo $closing_hour ?>">  
                        </div>  
                    </div>  
                    <div class="col-12">  
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">  
                    </div>  
                </form>  
            </div>  
        </div>  
        <div class="card">  
            <div class="card-header bg-primary text-dark text-center">  
                List Gudang  
            </div>  
            <div class="card-body">  
                <table class="table">  
                    <thead>  
                        <tr>  
                            <th scope="col">#</th>  
                            <th scope="col">Nama Gudang</th>  
                            <th scope="col">Lokasi Gudang</th>  
                            <th scope="col">Kapasitas</th>  
                            <th scope="col">Status</th>  
                            <th scope="col">Jam Buka</th>  
                            <th scope="col">Jam Tutup</th>  
                            <th scope="col">Aksi</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php  
                        $sql2 = "SELECT * FROM gudang ORDER BY id DESC";  
                        $q2 = mysqli_query($koneksi, $sql2);  
                        $urut = 1;  
                        while ($r2 = mysqli_fetch_array($q2)) {  
                            $id = $r2['id'];  
                            $name = $r2['name'];  
                            $location = $r2['location'];  
                            $capacity = $r2['capacity'];  
                            $status = $r2['status'];  
                            $opening_hour = $r2['opening_hour'];  
                            $closing_hour = $r2['closing_hour'];  
                        ?>  
                        <tr>  
                            <th scope="row"><?php echo $urut++ ?></th>  
                            <td><?php echo $name ?></td>  
                            <td><?php echo $location ?></td>  
                            <td><?php echo $capacity ?></td>  
                            <td><?php echo $status ?></td>  
                            <td><?php echo $opening_hour ?></td>  
                            <td><?php echo $closing_hour ?></td>  
                            <td>  
                                <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-danger">Edit</button></a>  
                                <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-warning">Delete</button></a>  
                            </td>  
                        </tr>  
                        <?php } ?>  
                    </tbody>  
                </table>  
            </div>  
        </div>  
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>  
</body>  
</html>
