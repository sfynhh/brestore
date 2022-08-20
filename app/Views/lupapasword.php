<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa Pasword</title>
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
                        <h2 class="form-title">Cek Email</h2>
                        
                       <?= form_open('Home/lupapaswordproses') ?>
                       

                       <div>Masukan E-mail</div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Diisi Dengan E-mail" value="<?= set_value('emailuser')?>" >
                                <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('email') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong style="color: red;"><?= $validation->getError('email')?> </strong>
                                                </div>
                                        <?php
                                        }
                                    }

                                    if(isset($pesan)){?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong style="color: red;"><?= $pesan; ?> </strong>
                                                </div>
                                    <?php }
                                ?>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  
                             </div>
                         <!--    <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            

                            <!-- <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/> -->
                            <button type="submit" class="btn">Cek Email</button>
                            
                        </form>
                        
                    </div>
                    <div style="text-align: center;">
                        <img src="<?php echo base_url('assets/img/brestore.jpg') ?>" alt="" style="padding-top: 0%; height: 400px;">

                        <a href="<?php echo base_url('Registrasi') ?>" class="signup-image-link" style="margin-bottom: 0px;">Daftar</a>
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