<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi akun Bre Store</title>
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
        background-size: 105%;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    
        <!-- Sign up form -->
        <div class="main">
      
            <div class="container">
                <div class="main">
                    <div class="signup-form">
                        <h2 class="form-title">Registrasi</h2>
                        
                       <?= form_open('Registrasi/process') ?>

                       <div>E-Mail
                        <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('email') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            $class="is-invalid"
                                            ?>
                                                
                                                    : <strong style="color: red;"> <?= $validation->getError('email')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>  
                       </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email" style="<?= (isset($validation)) ? ($validation->hasError('email')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="email" name="email" id="email" class="<?= (isset($validation)) ? ($validation->hasError('email')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Email" value="<?= set_value('email')?>" >          
                            </div>
                            
                            <div>No Telepon
                                <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('notlp') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                              
                                                    : <strong style="color: red;"><?= $validation->getError('notlp')?> </strong>
                                               
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="notlp"><i class="zmdi zmdi-phone material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('notlp')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="text" name="notlp" id="notlp" class="<?= (isset($validation)) ? ($validation->hasError('notlp')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan No Telepon" value="<?= set_value('notlp')?>" >
                            </div>
                             
                            <div>Tanggal Lahir
                                 <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('tgllahir') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                               
                                                    : <strong style="color: red;"><?= $validation->getError('tgllahir')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                             <div class="form-group">
                                <label for="tgllahir"><i class="zmdi zmdi-calendar material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('tgllahir')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="date" name="tgllahir" id="tgllahir" class="<?= (isset($validation)) ? ($validation->hasError('tgllahir')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('tgllahir')?>" >
                               
                            </div>
                            <div>Jenis Kelamin
                                 <?php 
                                 if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('jenis_kel') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                               
                                                    : <strong style="color: red;"><?= $validation->getError('jenis_kel')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                             <div class="form-group">
                                <label for="jenis_kel"><i class="zmdi zmdi-male-female material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('jenis_kel')) ? 'color:red;' :'':'';?>"></i></label>
                                <select name="jenis_kel" id="jenis_kel" class="<?= (isset($validation)) ? ($validation->hasError('jenis_kel')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('jenis_kel')?>" >
                                    <?php
                                        $lk=""; $pr = ""; $cm = "";
                                        
                                        if(set_value('jenis_kel')=='L'){$lk="selected";}
                                        elseif(set_value('jenis_kel')=='P'){$pr="selected";}
                                        else{$cm="selected";}
                                        
                                        //echo set_value('jeniskosan');
                                    ?>
                                    <option value="0" <?= $cm; ?>>-pilih-</option>
                                    <option value="L" <?= $lk; ?>>Laki-Laki</option>
                                    <option value="P" <?= $pr; ?>>Perempuan</option>
                                </select>                                                
                                 
                            </div>
                            
                            <div>Alamat</div>
                            <div><?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('prov') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                    : <strong style="color: red;"><?= $validation->getError('prov')?> </strong>
                                        <?php
                                        }
                                    }
                                ?></div>
                                <div class="form-group">
                                <label for="prov"><i class="zmdi zmdi-map material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('prov')) ? 'color:red;' :'':'';?>"></i></label>
                                <select name="prov" id="prov" class="<?= (isset($validation)) ? ($validation->hasError('prov')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('prov')?>" onchange="myFunction1()">
                                    <option value="0">-Pilih Provinsi-</option>
                                    <?php
                                        // $lk=""; $pr = ""; $cm = "";
                                        
                                        // if(set_value('jenis_kel')=='L'){$lk="selected";}
                                        // elseif(set_value('jenis_kel')=='P'){$pr="selected";}
                                        // else{$cm="selected";}
                                        
                                        //echo set_value('jeniskosan');
                                     foreach ($provinsi as $value) {?>
                                      
                                            <option value="<?=$value->prov_id.'|'.$value->prov_name; ?>"><?= $value->prov_name; ?></option>
                                     
                                        <?php
                                          
                                      }
                                        ?>
                                    
                                </select>                                                
                                 
                            </div>
                            <div><?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('kabkot') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                    : <strong style="color: red;"><?= $validation->getError('kabkot')?> </strong>
                                        <?php
                                        }
                                    }
                                ?></div>
                            <div class="form-group">
                                <label for="kabkot"><i class="zmdi zmdi-city material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('kabkot')) ? 'color:red;' :'':'';?>"></i></label>
                                <select name="kabkot" id="kabkot" class="<?= (isset($validation)) ? ($validation->hasError('kabkot')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('kabkot')?>" onchange="myFunction2()" >
                           
                                    <option value="0">-Pilih Kabupaten/Kota-</option>
                                </select>                                                
                                 
                            </div>
                            <div><?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('kec') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                    : <strong style="color: red;"><?= $validation->getError('kec')?> </strong>
                                        <?php
                                        }
                                    }
                                ?></div>
                            <div class="form-group">
                                <label for="kec"><i class="zmdi zmdi-pin material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('kec')) ? 'color:red;' :'':'';?>"></i></label>
                                <select name="kec" id="kec" class="<?= (isset($validation)) ? ($validation->hasError('kec')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('kec')?>" onchange="myFunction3()" >
                           class="<?= (isset($validation)) ? ($validation->hasError('email')) ? 'is-invalid' :'':'';?>"
                                    <option value="0">-Pilih Kecamatan-</option>
                                </select>                                                
                                 
                            </div>
                            <div><?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('kelurahan') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                                
                                                    : <strong style="color: red;"><?= $validation->getError('kelurahan')?> </strong>
                                        <?php
                                        }
                                    }
                                ?></div>
                            <div class="form-group">
                                <label for="kelurahan"><i class="zmdi zmdi-pin-drop material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('kelurahan')) ? 'color:red;' :'':'';?>"></i></label>
                                <select name="kelurahan" id="kelurahan" class="<?= (isset($validation)) ? ($validation->hasError('kelurahan')) ? 'is-invalid' :'':'';?>" placeholder="Diisi Dengan Tanggal Lahir" value="<?= set_value('kelurahan')?>" >
                           
                                    <option value="0">-Pilih Desa-</option>
                                </select>                                                
                                 
                            </div>
                            <div>
                                 <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('kodepos') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                               
                                                    : <strong style="color: red;"><?= $validation->getError('kodepos')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                             <div class="form-group">
                                <label for="kodepos"><i class="zmdi zmdi-local-shipping material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('kodepos')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="text" name="kodepos" id="kodepos" class="<?= (isset($validation)) ? ($validation->hasError('kodepos')) ? 'is-invalid' :'':'';?>" placeholder="Masukan Kode Pos" value="<?= set_value('kodepos')?>" >
                               
                            </div>
                            <div>
                                 <?php
                                    if(isset($validation)){
                                        //untuk mengecek apakah ada error pada elemen field namakosan
                                        if ( $validation->hasError('detailalamat') )
                                        { //untuk mendapatkan label error yang diset bisa menggunakan getError(namfield)
                                            ?>
                                               
                                                    : <strong style="color: red;"><?= $validation->getError('detailalamat')?> </strong>
                                                
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                             <div class="form-group">
                                <label for="detailalamat"><i class="zmdi zmdi-home material-icons-name" style="<?= (isset($validation)) ? ($validation->hasError('detailalamat')) ? 'color:red;' :'':'';?>"></i></label>
                                <input type="text" name="detailalamat" id="detailalamat" class="<?= (isset($validation)) ? ($validation->hasError('detailalamat')) ? 'is-invalid' :'':'';?>" placeholder="Harap masukan Desa/Dusun,Nama jalan,No.rumah" value="<?= set_value('detailalamat')?>" >
                               
                            </div>
                           <!--  <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-pin material-icons-name"></i></label>
                                <input type="addres" name="alamat" id="alamat" placeholder="Diisi Dengan Alamat" value="" >
                                
                            </div> -->
                            <div>Buat Pasword
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
                            <div>Konfirmasi Password
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
                            

                            <!-- <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/> -->
                            <button type="submit" class="btn">Daftar</button>
                            
                        </form>
                    </div>
                    <div style="text-align: center;">
                        <img src="<?php echo base_url('assets/img/brestore.jpg') ?>" alt="" style="padding-top: 20%; height: 400px;">

                        <a href="<?php echo base_url('Home/login') ?>" class="signup-image-link" style="margin-bottom: 0px;">Gue Udah Punya Akun</a>
                    </div>
                </div>
               
            </div>
        </div>

    <!-- JS -->
    <script src=" <?php echo base_url('login_register/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('login_register/js/main.js') ?>"></script>
    <script src="<?= base_url('jquery/jquery.mask.js') ?>"></script>
    <!-- <script src="<?= base_url('jquery/jquery.js') ?>"></script> -->

      <script>
    $(document).ready(function(){
      // Format mata uang.
      // $('#NIP').mask('000000000000000000000000', {reverse: true});   

            // Format nomor telepon
      $('#notlp').mask('0000-0000-0000-0000', {reverse: true});
      $('#kodepos').mask('00000', {reverse: true}); 
      
    })
   </script>

   <script type="text/javascript">
        function myFunction1(){
        //pilih elemen yang akan kita manipulasi atribut obyeknya
        var var_combobox = document.getElementById("prov"); 
        // // //harga adalah komponen pertama dari nilai idbuah ID|HARGA
        var myarr = var_combobox.value.split("|");
        var id_prov = myarr[0];
        return id_prov;
        }
      
        $("#prov").change(function(){

            // variabel dari nilai combo box kendaraan
            var id_prov =myFunction1();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
         if (id_prov != 0){
            $.ajax({
                url : "<?php echo base_url('/Registrasi/ambilkota');?>",
                method : "POST",
                data : {id_prov:id_prov},
                async : false,
                dataType : "json",
                success: function(data){
                    
                    var html = '<option value="0">-Pilih Kabupaten/Kota-</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].city_id+'|'+data[i].city_name+'">'+data[i].city_name+'</option>';
                    }
                    $('#kabkot').html(html);
                }
            });
        }
       
        $('#kabkot').val(0);
        $('#kec').val(0);
        $('#kelurahan').val(0);
           
        });
     function myFunction2(){
        //pilih elemen yang akan kita manipulasi atribut obyeknya
        var var_combobox1 = document.getElementById("kabkot"); 
        // // //harga adalah komponen pertama dari nilai idbuah ID|HARGA
        var myarr1 = var_combobox1.value.split("|");
        var id_kabkot = myarr1[0];
        return id_kabkot;
        }
        $("#kabkot").change(function(){

            var id_kabkot=myFunction2();
         if (id_kabkot != 0){
            $.ajax({
                url : "<?php echo base_url('/Registrasi/ambilkecamatan');?>",
                method : "POST",
                data : {id_kabkot:id_kabkot},
                async : false,
                dataType : "json",
                success: function(data){

                    var html = '<option value="0">-Pilih Kecamatan-</option>';
                    var i;
                    
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].dis_id+'|'+data[i].dis_name+'">'+data[i].dis_name+'</option>';
                    }
                    $('#kec').html(html);

                }
            });
           }
           $('#kec').val(0);
            $('#kelurahan').val(0);

        });
         function myFunction3(){
        //pilih elemen yang akan kita manipulasi atribut obyeknya
        var var_combobox2 = document.getElementById("kec"); 
        // // //harga adalah komponen pertama dari nilai idbuah ID|HARGA
        var myarr2 = var_combobox2.value.split("|");
        var id_kec = myarr2[0];
        return id_kec;
        }
         $("#kec").change(function(){

            var id_kec=myFunction3();
         if (id_kec != 0){
            $.ajax({
                url : "<?php echo base_url('/Registrasi/ambildesa');?>",
                method : "POST",
                data : {id_kec:id_kec},
                async : false,
                dataType : "json",
                success: function(data){

                    var html = '<option value="0">-Pilih Desa-</option>';
                    var i;
                    
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].subdis_id+'|'+data[i].subdis_name+'">'+data[i].subdis_name+'</option>';
                    }
                    $('#kelurahan').html(html);

                }
            });
           }
        
            $('#kelurahan').val(0);

        });
</script>
 
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>