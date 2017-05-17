<html>
    <head>
        <title>Konfigurasi PDF | Raport Online</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <h2>Daftar Konfigurasi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Isi</th>
                <th colspan="3">Aksi</th>
            </tr>
            
<?php
    if (count($isi)>0) {
        $i = 1; 
        foreach($isi as $r){
?>
            
            <tr>
                <td><?php echo $r->Cid ?></td>
                <td><?php echo $r->Cnama ?></td>
                <td><?php echo $r->Ctipe; ?></td>
                <td><?php echo $r->Cisi ?></td>
                <td><a href="RCPDF/editPDF/<?php echo $r->Cid; ?>">Edit Data</a></td>
                <td><a href="RCPDF/deletePDF/<?php echo $r->Cid; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Konfigurasi?')">Hapus Data</a></td>
            </tr>
            
<?php 
            $i++; 
        }
    }else{ echo "<td colspan='14' class='error'>Tidak Ada Data.</td>"; }
?>
            
        </table>
        <a href="RCPDF/conPDF">Tambah Konfigurasi</a><br>
        <a href="RCController">Kembali</a>
    </body>
</html>