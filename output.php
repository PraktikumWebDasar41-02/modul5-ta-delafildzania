<?php

session_start();
$konek = mysqli_connect('localhost','root','','d_modul5');

$sql="SELECT * FROM t_jurnal1";
$query=mysqli_query($konek, $sql);
$halo= mysqli_fetch_array($query);

echo "Nim : " .$halo['nim']."<br>";
echo "Nama : " .$halo['nama']."<br>";
echo "Email : " .$halo['email']."<br>";
echo "Tanggal Lahir : " .$halo['tgl']."<br>";
echo "Jenis Kelamin: " .$halo['jk']."<br>";
echo "Program Studi : " .$halo['prodi']."<br>";
echo "Fakultas : " .$halo['fakultas']."<br>";

session_destroy();
?>