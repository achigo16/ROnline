<html>
    <head>
        <title>Edit Data Kelas | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Edit Data Kelas</h2>
        <form autocomplete="off" method="post" action="../RKSave">
            <input type="hidden" name="kode_kelas" value="<?php echo $isi['Kkode_kelas'] ?>">
            <input type="hidden" name="jumlah" value="<?php echo $isi['Kjumlah'] ?>">
            <table>
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kode_kelas" value="<?php echo $isi['Kkode_kelas'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kelas" value="<?php echo $isi['Kkelas'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td><input type="text" name="jurusan" value="<?php echo $isi['Kjurusan'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Urutan Kelas</td>
                    <td>:</td>
                    <td><input type="number" name="urutan" min="1" max="10" value="<?php echo $isi['Kurutan'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Jumlah Siswa</td>
                    <td>:</td>
                    <td><input type="number" name="jumlah" min="1" max="<?php echo $isi['Kkouta'] ?>" value="<?php echo $isi['Kjumlah'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Batas Siswa</td>
                    <td>:</td>
                    <td><input type="number" name="kouta" min="1" max="100" value="<?php echo $isi['Kkouta'] ?>"></td>
                </tr>
                <tr>
                    <td>Tahun Angkatan</td>
                    <td>:</td>
                    <td><input type="number" name="tahun1" min="1999" max="2050" value="<?php echo $isi['Ktahun1'] ?>" disabled> / 
                    <input type="number" name="tahun2" min="2000" max="2051" value="<?php echo $isi['Ktahun2'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <?php 
                            if($isi['Kstatus'] == "Y"){
                                echo "<input type='radio' name='status' value='Y' checked>Aktif";
                                echo "<input type='radio' name='status' value='N'>Nonaktif";
                            } 
                            else if($isi['Kstatus'] == "N"){
                                echo "<input type='radio' name='status' value='Y'>Aktif";
                                echo "<input type='radio' name='status' value='N' checked>Nonaktif";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="update">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>