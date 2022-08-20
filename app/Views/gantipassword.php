<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ganti Password</title>
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
                        <h2 class="form-title">Ganti Password</h2>
                        
                       <?= form_open('Home/gantipaswordproses') ?>
                       
                       <input type="hidden" name="username" value="<?php echo $username ?>">
                       <div>Masukan Password Baru
                            <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('pass') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                  : <strong style="color: red;"><?= $validation->getError('pass')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>
                       </div>

                             <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock" style="<?= (isset($validation)) ? ($validation->hasError('pass')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="password" name="pass" class="<?= (isset($validation)) ? ($validation->hasError('pass')) ? 'is-invalid' :'':'';?>" id="pass" placeholder="Password" value="<?= set_value('pass')?>" >

                            </div>
                            <div>Konfirmasi Password baru
                                 <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('re_pass') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                    : <strong style="color: red;"><?= $validation->getError('re_pass')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="re_pass"><i class="zmdi zmdi-lock-outline" style="<?= (isset($validation)) ? ($validation->hasError('re_pass')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="password" name="re_pass" id="re_pass" class="<?= (isset($validation)) ? ($validation->hasError('re_pass')) ? 'is-invalid' :'':'';?>" placeholder="Repeat your password" >
                                                               
                            </div> 
                         <!--    <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <button type="submit" class="btn">Ganti Password</button>
                            
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