<html>
    <head>
        <title>Raport Siswa <?php echo $siswa['Snama']?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/style.css">
    </head>
    <body>
        <?php echo $header['Cisi'] ?>
        NIS/NISN : <?php echo $siswa['Snis']."/".$siswa['Snisn']; ?><br>
        Nama Siswa : <?php echo $siswa['Snama'] ?><br>
        Kelas : <?php echo $kelas['Kkelas']."-".$kelas['Kjurusan']." ".$kelas['Kurutan'] ?><br>
        Semester : <?php echo $semester ?><br><br>
        <table>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th rowspan="2">KKM</th>
                <th colspan="6">Nilai</th>
            </tr>
            <tr>
                <th>Harian</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Akhir</th>
                <th>Praktek</th>
                <th>Sikap</th>
            </tr>
            <?php
                $i = 1; 
                foreach($nilai as $r){
            ?>
            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r->Mnama_mapel; ?></td>
                <td><?php echo $r->Mkkm; ?></td>
                <td><?php echo $r->Nnilai_harian; ?></td>
                <td><?php echo $r->Nnilai_uts; ?></td>
                <td><?php echo $r->Nnilai_uas; ?></td>
                <td><?php echo $r->Nnilai_akhir; ?></td>
                <td><?php echo $r->Nnilai_praktek; ?></td>
                <td><?php echo $r->Nnilai_sikap; ?></td>
            </tr>
            
            <?php 
                    $i++; 
                }
            ?>
        </table>
        <?php echo $footer['Cisi'] ?>
    </body>
</html>