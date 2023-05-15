<?php 
$koneksi = mysqli_connect("localhost", "root", "", "diskominfotik") or die ("Database Error");
//ambil pesan dari ajax
$pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);
//cek pertanyaan dari tabel 
$cek_data = mysqli_query($koneksi, "SELECT jawaban FROM chatbot WHERE pertanyaan LIKE '%$pesan%'");
//jika pertanyaan ditemukan,maka tampil jawaban
if(mysqli_num_rows($cek_data) > 0) {
    //hasil
    $data = mysqli_fetch_assoc($cek_data);
    //tampung kedalam variabel
    $balasan = $data['jawaban'];
    echo $balasan;
} else {
    echo "Maaf, Kami tidak menemukan jawaban... :(";
}
 ?>