<html>
    <head>
        <title>Tambah Data Siswa | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Tambah Data Siswa</h2>
        <form autocomplete="off" onsubmit = "return validasi_input_siswa(this)" method="post" action="RSSave">
            <table>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="nis"></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><input type="text" name="nisn"></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><input type="text" name="tempat"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <p><input type="radio" name="jk" value="L">Laki-Laki
                            <input type="radio" name="jk" value="P">Perempuan</p>
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <select name="agama">
                            <option value="Pilih" disabled selected>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Khatolik">Khatolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kode_kelas">
                            <option value="Pilih" disabled selected>Pilih Kelas</option>
                            <?php foreach($data_kelas as $b){?>
                            <option value="<?php echo $b->Kkode_kelas ?>"><?php echo $b->Kkelas."-".$b->Kjurusan." ".$b->Kurutan." (".$b->Ktahun1."/".$b->Ktahun2.")" ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea name="alamat"></textarea></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>:</td>
                    <td><input type="number" name="telp"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="insert">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>