<html>
    <head>
        <title>Kelas | Raport Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <h2>Daftar Kelas</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Tahun Angkatan</th>
                <th>Jumlah Siswa</th>
                <th>Status</th>
                <th colspan="2">Aksi</th>
            </tr>
            
            <?php
                if (count($isi)>0) {
                    $i = 1; 
                    foreach($isi as $r){
            ?>
            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r->Kkode_kelas; ?></td>
                <td><?php echo $r->Kkelas."-".$r->Kjurusan." ".$r->Kurutan; ?></td>
                <td><?php echo $r->Ktahun1."/".$r->Ktahun2; ?></td>
                <td><?php echo $r->Kjumlah."/".$r->Kkuota." Siswa"; ?></td>
                <td><?php echo parStatus($r->Kstatus); ?></td>
                <td><a href="RKController/RKEdit/<?php echo $r->Kkode_kelas; ?>">Edit Data</a></td>
                <td><a href="RKController/RKDelete/<?php echo $r->Kkode_kelas; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Data</a></td>
            </tr>
            
            <?php 
                        $i++; 
                    }
                }else{ echo "<td colspan='14' class='error'>Tidak Ada Data.</td>"; } 
            ?>
            
        </table>
        <a href="RKController/RKInput">Tambah Kelas</a><br>
        <a href="RKController/RKExel">Import Exel</a><br>
        <a href="RController">Beranda</a>
    </body>
</html>
<?php
    function parStatus($status){
        if($status == "Y"){
           return "Aktif";
        }
        else{
            return "Nonaktif";
        }
    }
?>