<html>
    <head>
        <title>Siswa | Raport Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <h2>Daftar Siswa</h2>
        <table>
            <tr>
                <th>No</th>
                <th>NIS / NISN</th>
                <th>Nama Siswa</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Kelas Saat ini</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
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
                <td><?php echo $r->Snis."/".$r->Snisn; ?></td>
                <td><?php echo $r->Snama; ?></td>
                <td><?php echo $r->Stempat.", ".date('d M Y', strtotime($r->Stanggal)); ?></td>
                <td><?php echo parJK($r->Sjk); ?></td>
                <td><?php echo $r->Sagama; ?></td>
                <td><?php echo $r->Kkelas."-".$r->Kjurusan." ".$r->Kurutan." (".$r->Ktahun1."/".$r->Ktahun2.")"; ?></td>
                <td><?php echo $r->Salamat; ?></td>
                <td><?php echo $r->Stelp; ?></td>
                <td><?php echo parStatus($r->Sstatus); ?></td>
                <td><a href="RSController/RSEdit/<?php echo $r->Snis; ?>">Edit Data</a></td>
                <td><a href="RSController/RSDelete/<?php echo $r->Snis; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?\nSemua Data yang Berhubungan dengan Siswa akan ikut terhapus!')">Hapus Data</a></td>
            </tr>
            
<?php 
            $i++; 
        }
    }else{ echo "<td colspan='14' class='error'>Tidak Ada Data.</td>"; }
?>
            
        </table>
        <a href="RSController/RSInput">Tambah Siswa</a><br>
        <a href="RController">Beranda</a>
    </body>
</html>
<?php
    function parStatus($status){
        if($status == "N"){
           return "Lulus";
        }
        else{
           return "Belum Lulus";
        }
    }
    function parJK($jk){
        if($jk == "L"){
            return "Laki-laki";
        }
        else if($jk == "P"){
            return "Perempuan";
        }
    }
?>