<?php  
require_once 'index.php';  
?>  
  
<form action="index.php" method="post">  
  <label for="name">Nama Gudang:</label>  
  <input type="text" id="name" name="name"><br><br>  
  <label for="location">Lokasi Gudang:</label>  
  <input type="text" id="location" name="location"><br><br>  
  <label for="capacity">Kapasitas Gudang:</label>  
  <input type="number" id="capacity" name="capacity"><br><br>  
  <label for="status">Status Gudang:</label>  
  <select id="status" name="status">  
    <option value="aktif">Aktif</option>  
    <option value="tidak_aktif">Tidak Aktif</option>  
  </select><br><br>  
  <label for="opening_hour">Waktu Buka Gudang:</label>  
  <input type="time" id="opening_hour" name="opening_hour"><br><br>  
  <label for="closing_hour">Waktu Tutup Gudang:</label>  
  <input type="time" id="closing_hour" name="closing_hour"><br><br>  
  <input type="submit" value="Tambah Gudang" name="create">  
</form>  
  
<form action="index.php" method="get">  
  <input type="submit" value="Tampilkan Gudang" name="read">  
</form>  
  
<form action="index.php" method="post">  
  <label for="id">ID Gudang:</label>  
  <input type="number" id="id" name="id"><br><br>  
  <label for="name">Nama Gudang:</label>  
  <input type="text" id="name" name="name"><br><br>  
  <label for="location">Lokasi Gudang:</label>  
  <input type="text" id="location" name="location"><br><br>  
  <label for="capacity">Kapasitas Gudang:</label>  
  <input type="number" id="capacity" name="capacity"><br><br>  
  <label for="status">Status Gudang:</label>  
  <select id="status" name="status">  
    <option value="aktif">Aktif</option>  
    <option value="tidak_aktif">Tidak Aktif</option>  
  </select><br><br>  
  <label for="opening_hour">Waktu Buka Gudang:</label>  
  <input type="time" id="opening_hour" name="opening_hour"><br><br>  
  <label for="closing_hour">Waktu Tutup Gudang:</label>  
  <input type="time" id="closing_hour" name="closing_hour"><br><br>  
  <input type="submit" value="Update Gudang" name="update">  
</form>  
  
<form action="index.php" method="get">  
  <label for="id">ID Gudang:</label>  
  <input type="number" id="id" name="id"><br><br>  
  <input
