<?php

ini_set("display_errors","Off");
include "header.php";
include "menu.php";

include("connect.php");

?>


    <?php
    
    $id=$_GET['idk'];
    $show_kelas="SELECT * FROM login WHERE user ='$id'";
    $hasil_kelas=mysqli_query($koneksi,$show_kelas);
    $view_kelas=mysqli_fetch_row($hasil_kelas);

    ?>


<div class="page-wrapper">
            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">UBAH LIST PEMAKAI</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ubah List Pemakai</li>
                        </ol>
                    </div>
                   
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                  
                  
                                
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>Username</label>
                                <input readonly type="text" class="form-control" name="id_user" value="<?php print($view_kelas[0]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama_user" value="<?php print($view_kelas[1]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email_user" value="<?php print($view_kelas[4]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" name="no_user" value="<?php print($view_kelas[3]);?>"/>
                              </div>
                              <div class="form-group">
                                <label>Ubah Password</label>
                                <input type="password" class="form-control" name="password_user" value=""/>
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat_user" rows="5" cols="50"><?php print($view_kelas[2]);?></textarea>
                              </div>                              
                              <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Simpan" />
                                <a class="btn btn-warning" href="pemilik.php">Kembali</a>
                              </div>
                              
                            </form>

                            <?php
                                      

                                      $nama=$_POST['nama_user'];
                                      $email=$_POST['email_user'];
                                      $no=$_POST['no_user'];
                                      $password= md5($_POST['password_user']);
                                      $alamat=$_POST['alamat_user'];

                                      if(isset($nama,$email,$no)){
                                        if((!$nama)||(!$email)||(!$no)){
                                        print "<script>alert ('Harap semua data diisi...!!');</script>";
                                        print"<script> self.history.back('Gagal Menyimpan');</script>"; 
                                        exit();
                                        } 

                                      $add_kelas="UPDATE login SET nama='$nama', alamat='$alamat', no_telepon='$no', email='$email', password ='$password' 
                                      WHERE user ='$id'";
                                      mysqli_query($koneksi, $add_kelas);

                                      echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
                                      echo '<meta http-equiv="refresh" content="1; url=user.php" />';


                                      } 

                                ?>
                  
                  
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

<?php
include 'footer.php';
?>

