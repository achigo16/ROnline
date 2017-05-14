<html>
    <head>
        <title>Nilai | Raport Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <h2>Daftar Nilai</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Kode Nilai</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Nama Mapel</th>
                <th>Nilai Harian</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Nilai Praktek</th>
                <th>Nilai Sikap</th>
                <th colspan="2">Aksi</th>
            </tr>
            
            <?php
                if (count($isi)>0) {
                    $i = 1; 
                    foreach($isi as $r){
            ?>
            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r->Nkode_nilai; ?></td>
                <td><?php echo $r->Snama; ?></td>
                <td><?php echo $r->Kkelas."-".$r->Kjurusan." ".$r->Kurutan." (".$r->Ktahun1."/".$r->Ktahun2.")"; ?></td>
                <td><?php echo $r->Nsemester; ?></td>
                <td><?php echo $r->Mnama_mapel; ?></td>
                <td><?php echo $r->Nnilai_harian; ?></td>
                <td><?php echo $r->Nnilai_uts; ?></td>
                <td><?php echo $r->Nnilai_uas; ?></td>
                <td><?php echo $r->Nnilai_akhir; ?></td>
                <td><?php echo $r->Nnilai_praktek; ?></td>
                <td><?php echo $r->Nnilai_sikap; ?></td>
                <td><a href="RNController/RNEdit/<?php echo $r->Nkode_nilai; ?>">Edit Data</a></td>
                <td><a href="RNController/RNDelete/<?php echo $r->Nkode_nilai; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Data</a></td>
            </tr>
            
            <?php 
                        $i++; 
                    }
                }else{ echo "<td colspan='14' class='error'>Tidak Ada Data.</td>"; } 
            ?>
            
        </table>
        <a href="RNController/RNInput">Tambah Nilai</a><br>
        <a href="RController">Beranda</a>
    </body>
</html>