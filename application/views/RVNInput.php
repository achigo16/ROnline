<html>
    <head>
        <title>Tambah Data Nilai | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Tambah Data Nilai</h2>
        <form autocomplete="off" onsubmit="return validasi_input_nilai(this)" method="post" action="RNSave">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode ?>">
            <table>
                <tr>
                    <td>Kode Nilai</td>
                    <td>:</td>
                    <td><input type="text" name="kode_nilai" value="<?php echo $kode ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td>
                        <select name="nis">
                            <option value="Pilih" disabled selected>Pilih Siswa</option>
                            <?php foreach($data_siswa as $b){?>
                            <option value="<?php echo $b->Snis ?>"><?php echo $b->Snama ?></option>
                            <?php } ?>
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
                    <td>Semester</td>
                    <td>:</td>
                    <td><input type="number" name="semester" min="1" max="6"></td>
                </tr>
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td>
                        <select name="kode_mapel">
                            <option value="Pilih" disabled selected>Pilih Mata Pelajaran</option>
                            <?php foreach($data_mapel as $b){?>
                            <option value="<?php echo $b->Mkode_mapel ?>"><?php echo $b->Mnama_mapel ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai Harian</td>
                    <td>:</td>
                    <td><input type="number" name="harian" min="1" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai UTS</td>
                    <td>:</td>
                    <td><input type="number" name="uts" min="1" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai UAS</td>
                    <td>:</td>
                    <td><input type="number" name="uas" min="1" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai Praktek</td>
                    <td>:</td>
                    <td><input type="number" name="praktek" min="1" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai Sikap</td>
                    <td>:</td>
                    <td>
                        <select name="sikap">
                            <option value="Pilih" disabled selected>Pilih Nilai Sikap</option>
                            <option value="SB">Sangat Baik</option>
                            <option value="B">Baik</option>
                            <option value="C">Cukup</option>
                            <option value="K">Kurang</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="insert">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>