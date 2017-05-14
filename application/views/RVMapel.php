<html>
    <head>
        <title>Mata Pelajaran | Raport Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <h2>Daftar Mata Pelajaran</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Kode Mapel</th>
                <th>Nama Mapel</th>
                <th>KKM</th>
                <th colspan="2">Aksi</th>
            </tr>
            
            <?php
                if (count($isi)>0) {
                    $i = 1; 
                    foreach($isi as $r){
            ?>
            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r->Mkode_mapel; ?></td>
                <td><?php echo $r->Mnama_mapel; ?></td>
                <td><?php echo $r->Mkkm; ?></td>
                <td><a href="RMController/RMEdit/<?php echo $r->Mkode_mapel; ?>">Edit Data</a></td>
                <td><a href="RMController/RMDelete/<?php echo $r->Mkode_mapel; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Data</a></td>
            </tr>
            
            <?php 
                        $i++; 
                    }
                }else{ echo "<td colspan='14' class='error'>Tidak Ada Data.</td>"; } 
            ?>
            
        </table>
        <a href="RMController/RMInput">Tambah Mata Pelajaran</a><br>
        <a href="RController">Beranda</a>
    </body>
</html>