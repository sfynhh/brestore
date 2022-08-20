<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aktivasi akun Bre Store</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/brestore.jpg') ?>">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('login_register/fonts/material-icon/css/material-design-iconic-font.min.css') ?>">



    <!-- Main css -->
    <link rel="stylesheet" href=" <?php echo base_url('login_register/css/style.css') ?>">
    <!--  <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <style type="text/css">
    body{
        background-image: url(<?php echo base_url('login_register/images/bg_body.jpeg') ?>);
        overflow: auto;
         background-repeat: no-repeat;
        background-size: 100%;
    }
</style>
</head>

<body>

    
        <!-- Sign up form -->
        <div class="main log-in">
        
            <div class="container">

                <div class="main log-in">
                    <div class="signup-form">
                        <h2 class="form-title">Aktivasi Akun Anda</h2>
                        
                       <?= form_open('Registrasi/aktivasiakun') ?>
                       

                       <div>Masukan Kode Aktivasi</div>
                       <br>

                            <div class="form-group">
                                <label for="kode"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="kode" id="kode" placeholder="Diisi Dengan kode ativasi" value="<?= set_value('kode')?>" >
                                <!--  -->
                                <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('kode') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong style="color: red;"><?= $validation->getError('kode')?> </strong>
                                                </div>
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                            
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 <strong style="color: red;"><?php if(isset($pesan)){ echo $pesan;} ?> </strong>
                             </div>
                         <!--    <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                             

                            <!-- <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/> -->
                            <button type="submit" class="btn">Submit</button>
                            
                        </form>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                     <p>Note: Kode Aktivasi Sudah Dikirim Melalui Email Kamu</p>               
                            </div>
                        <p id="timer" class="cencel" style="padding-bottom: 0px; font-size: 15px;"></p>
                        
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                            <script>
                                var count = 20; // dalam detik
                                function countDown() {
                                    if (count >= 0) {
                                        count--;
                                        var waktu = count + 1;
                                        $('#timer').html('Email Tidak Masuk? <a class="cencel" style="padding-bottom: 0px; font-size: 15px; color: blue;" onclick="javascript:history.go(-1);">Cek email</a> atau Kirim Ulang Email Dalam ' +waktu+ ' detik.');
                                        setTimeout("countDown()", 1000);
                                    } else {
                                        document.getElementById("timer").innerHTML = 'Email Tidak Masuk? <a class="cencel" style="padding-bottom: 0px; font-size: 15px; color: blue;" onclick="javascript:history.go(-1);">Cek email</a> atau <a href="<?php echo base_url('Registrasi/sendemailregistrasi/'.$email.'/'.$username.'/'.$kodeaktivasi) ?>"class="cencel" style="padding: 0px 0px 0px; font-size: 15px; color: blue;" id="link">Kirim ulang</a>';
                                    }
                                }
                                countDown();
                            </script>
                    </div>

                    <div style="text-align: center;">
                        <img src="<?php echo base_url('assets/img/brestore.jpg') ?>" alt="" style="padding-top: 0%; height: 400px;">
                    </div>
                    
                </div>
                    
            </div>
        </div>

    <!-- JS -->
    
    <script src=" <?php echo base_url('login_register/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('login_register/js/main.js') ?>"></script>
    <script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>

      <script>
    $(document).ready(function(){
      // Format mata uang.
      // $('#NIP').mask('000000000000000000000000', {reverse: true});   

            // Format nomor telepon
      $('#notlp').mask('0000-0000-0000-0000', {reverse: true}); 
      
    })
   </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>