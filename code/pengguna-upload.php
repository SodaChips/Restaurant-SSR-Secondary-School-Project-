<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header , kawalan-admin
include('header.php');
include('kawalan-admin.php');
?>

<!-- Tajuk Laman -->
 <h3> Muat Naik Data Pekerja (*.txt) </h3>

<!-- Borang untuk memuat naik fail -->
 <form action=''    method='POST'   enctype='multipart/form-data'>

    <h3><b> Sila Pilih Fail txt yang ingin diupload </b></h3>
    <input      type='file'     name='data_pengguna'>
    <button     type='submit'   name='upload'> Muat Naik </button>
 </form>

 <?php include('footer.php'); ?>

<!-- Bahagian Memproses Data yang dimuat naik -->
 <?PHP
 # Data validation : menyemak kewujudan data dari borang
 if(isset($_POST['upload']))
 {
    # Memanggil fail connection
    include('connection.php');

    # Mengambil nama sementara fail
    $namafailsementara  =   $_FILES["data_pengguna"]["tmp_name"];

    # Mengambil nama fail
    $naamfail   =   $_FILES['data_pengguna']['name'];

    # Mengambil jenis fail
    $jenisfail  =   pathinfo($naamfail , PATHINFO_EXTENSION);
    
    # Menguji jenis fail dan sail fail
    if ($_FILES["data_pengguna"]["size"]>0 AND $jenisfail=="txt")
    {
        # Membuka fail yang diambil
        $fail_data_pengguna =   fopen($namafailsementara , "r");

        $bil =  0;
        
        # Mendapatkan data dari fail baris dalam baris
        while(!feof($fail_data_pengguna))
        {
            # Mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata =  fgets($fail_data_pengguna);

            # Memecahkan baris data mengikut tanda pipe
            $pecahkanbaris  =   explode("|",$ambilbarisdata);

            # Selepas pecahan tadi akan diumpukan kepada 5
            list($notel , $nama , $katalaluan)  =   $pecahkanbaris;
        
            $pilih  =   mysqli_query($condb , " select* from pengguna where notel='".$notel."' ");
            if(mysqli_num_rows($pilih)==1)
            {
                 echo "<script>
                      alert('notel $notel di fail txt telah digunakan. TUKAR NOTEL DI FAIL TXT');
                      </script>";
            }
            else
            {
                # Arahan SQL untuk menyimpan data
                $arahan_sql_simpan  =   "insert into pengguna
                                        (notel , nama , katalaluan , tahap) values
                                        ('$notel' , '$nama' , '$katalaluan' , 'ADMIN')";
                # Memasukkan data kedalam jadual pengguna
                $laksana_arahan_simpan  =   mysqli_query($condb , $arahan_sql_simpan);
                $bil++;
            }
        }
    # Menutup fail txt yang  dibuka
    fclose($fail_data_pengguna);

    echo "<script>
            alert('import fail Data Selesai.Sebanyak $bil data telah disimpan');
            window.location.href = 'pengguna-senarai.php';
          </script>";
    }
    else
    {
        # Jika fail yang dimuat naik kosong atau tersalah format.
        echo "<script> alert('hanya fail berformat txt sahaja dibenarkan'); </script>";
    }
 } 
?>