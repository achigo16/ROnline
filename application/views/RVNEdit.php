<html>
    <head>
        <title>Edit Data Nilai | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Edit Data Nilai</h2>
        <form autocomplete="off" onsubmit="return validasi_edit_nilai(this)" method="post" action="../RNSave">
            <input type="hidden" name="kode_nilai" value="<?php echo $data_nilai['Nkode_nilai']?>">
            <table>
                <tr>
                    <td>Kode Nilai</td>
                    <td>:</td>
                    <td><input type="text" name="kode_nilai" value="<?php echo $data_nilai['Nkode_nilai']?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type="text" name="nis" value="<?php echo $data_siswa['Snama']?>" disabled></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kode_kelas" value="<?php echo $data_kelas['Kkelas']."-".$data_kelas['Kjurusan']." ".$data_kelas['Kurutan'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><input type="number" name="semester" min="1" max="4" value="<?php echo $data_nilai['Nsemester'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><input type="text" name="kode_mapel" value="<?php echo $data_mapel['Mnama_mapel']?>" disabled></td>
                </tr>
                <tr>
                    <td>Nilai Harian</td>
                    <td>:</td>
                    <td><input type="number" name="harian" min="0" max="100" value="<?php echo $data_nilai['Nnilai_harian'] ?>"></td>
                </tr>
                <tr>
                    <td>Nilai UTS</td>
                    <td>:</td>
                    <td><input type="number" name="uts" min="0" max="100" value="<?php echo $data_nilai['Nnilai_uts'] ?>"></td>
                </tr>
                <tr>
                    <td>Nilai UAS</td>
                    <td>:</td>
                    <td><input type="number" name="uas" min="0" max="100" value="<?php echo $data_nilai['Nnilai_uas'] ?>"></td>
                </tr>
                <tr>
                    <td>Nilai Akhir</td>
                    <td>:</td>
                    <td><input type="number" name="akhir" min="0" max="100" value="<?php echo $data_nilai['Nnilai_akhir'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nilai Praktek</td>
                    <td>:</td>
                    <td><input type="number" name="praktek" min="0" max="100" value="<?php echo $data_nilai['Nnilai_praktek'] ?>"></td>
                </tr>
                <tr>
                    <td>Nilai Sikap</td>
                    <td>:</td>
                    <td>
                        <select name="sikap">
                            <option value="Pilih" disabled>Pilih Nilai Sikap</option>
                            <?php echo parSikap($data_nilai['Nnilai_sikap']) ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="update">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    function parSikap($row){
        if($row == "SB"){
            return "<option value='SB' selected>Sangat Baik</option><option value='B'>Baik</option><option value='C'>Cukup</option><option value='K'>Kurang</option>";
        }
        else if($row == "B"){
            return "<option value='SB'>Sangat Baik</option><option value='B' selected>Baik</option><option value='C'>Cukup</option><option value='K'>Kurang</option>";
        }
        else if($row == "C"){
            return "<option value='SB'>Sangat Baik</option><option value='B'>Baik</option><option value='C' selected>Cukup</option><option value='K'>Kurang</option>";
        }
        else if($row == "K"){
            return "<option value='SB'>Sangat Baik</option><option value='B'>Baik</option><option value='C'>Cukup</option><option value='K' selected>Kurang</option>";
        }
    }
?>