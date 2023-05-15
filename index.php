<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service Diskominfotik </title>
    <link rel="stylesheet" href="style.css">
    <link href="../assets/assets_home/img/logonav.png" rel="icon">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title">Customer Service Diskominfotik</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>

                    <!-- <img width="50%" src="../assets/assets_home/img/logonav.png" alt=""> -->
                </div>
                <div class="msg-header">
                    <p>Hai, ada yang bisa saya bantu? </p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="text-pesan" type="text" placeholder="Ketikkan sesuatu disini..." required>
                <button id="send-btn">Kirim</button>
            </div>
        </div>
    </div>

</body>

</html>
<script>
$(document).ready(function() {
    // jika tombol kirim 
    $("#send-btn").on("click", function() {
        // ambil inputan pesan 
        $pesan = $("#text-pesan").val();
        // tampung 
        $msg = '<div class="user-inbox inbox"><div class="msg-header">' + $pesan + '</div></div>';
        // masukkan 
        $(".form").append($msg);
        // kosongkan 
        $("#text-pesan").val('');

        // ajax 
        $.ajax({
            url: 'pesan.php',
            type: 'POST',
            data: 'isi_pesan=' + $pesan,
            success: function(result) {
                // jika sukses ambildata,tampung kedalam balasan 
                $balasan =
                    '<div class="bot-inbox inbox"> <div class="icon"> <i class="fas fa-user"></i> </div> <div class="msg-header"> <p>' +
                    result + ' </p> </div> </div>'

                // masukkan kedalam form chat 
                $(".form").append($balasan);

                // buat otomatis scrolll jika ada pesan baru 
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }

        });



    });
})
</script>