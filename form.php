
<form method="post">
<table border="0">
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim" required="required"></td>
	</tr>
	<tr>
		<td>Nama :</td>
		<td><input type="text" name="nama" required="required"></td>
	</tr>
	<tr>
		<td>Email : </td>
		<td><input type="text" name="email" required="required"></td>
	</tr>
	<tr>
		<td>Tanggal lahir : </td>
		<td><input type="date" name="tgl"></td>
	<tr>
		<td>Jenis Kelamin : </td>
		<td><input type="radio" name="jk" value="pria" required="required" >Pria<br>
			<input type="radio" name="jk" value="wanita" required="required">Wanita
		</td>
	</tr>
	<tr>
		<td>Program Studi : </td>
		<td><select name="prodi" required="required">
			<option value="">--Pilih Program Studi--</option>
			<option value="Teknik Telekomunikasi">Teknik Telekomunikasi</option>
			<option value="Teknik Informatika">Teknik Informatika</option>
			<option value="Teknik Komputer">Teknik Komputer</option>
			<option value="Manajemen Informatika">Manajemen Informatika</option>
			<option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
			<option value="Manajemen Pemasaran">Manajemen Pemasaran</option>
			<option value="Sistem Multimedia">Sistem Multimedia</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas : </td>
		<td><select name="fakultas" required="required">
			<option value="">--Pilih Fakultas--</option>
    		<option value="FTE">Fakultas Teknik Elektro</option>
    		<option value="FIT">Fakultas Ilmu Terapan</option>
    		<option value="FEB">Fakultas Ekonomi Bisnis</option>
    		<option value="FIK">Fakultas Industri Kreatif</option>
    		<option value="FRI">Fakultas Rekayasa Industri</option>
    		</select>
    	</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit"></td>
	</tr>
</table>

<?php
session_start();
if(isset($_POST['submit'])){
$nim=$_POST['nim'];
$nama= $_POST['nama'];
$email=$_POST['email'];
$tgl=$_POST['tgl'];
$jk= $_POST['jk'];
$prodi= $_POST['prodi'];
$fakultas= $_POST['fakultas'];
$panjangnim=strlen($_POST['nim']);
$panjangnama=strlen($_POST['nama']);
$cek=true;
	if(empty($_POST['nim'])) {
		echo"nim harus diisi";
		$cek=false;
	}else if($panjangnim>10){
		echo"nim max 10 digit";
		$cek=false;
	}else{
		$nim=$_POST['nim'];
	}

	if(empty($_POST['nama'])) {
		echo"nama harus diisi";
		$cek=false;
	}else if($panjangnama>20){
		echo"nama harus 20 digit";
		$cek=false;
	}else{
		$nama=$_POST['nama'];
	}

	if(empty($_POST['email'])) {
		echo"email harus diisi";
		$cek=false;
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo"format email salah";
		$cek=false;
	}else{
		$email=$_POST['email'];
	}

	if($cek){
	$konek= mysqli_connect('localhost','root','','d_modul5');
	$sql = "INSERT INTO t_jurnal1 (nim,nama, email, jk, prodi, fakultas) VALUES ('$nim' , '$nama' , '$email', '$jk', '$prodi', '$fakultas')";
	mysqli_query($konek , $sql);
	if($sql){
		echo"Koneksi Berhasil";
	}else{
		echo "Koneksi gagal";
	}

	header("Location: output.php");
	}
}

 
?>
