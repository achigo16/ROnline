<html>
    <head>
        <title>Edit Data Nilai | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Edit Data Nilai</h2>
        <form autocomplete="off" onsubmit = "return validasi_edit_siswa(this)" method="post" action="../RSSave">
            <input type="hidden" name="nis" value="<?php echo $isi['Snis'] ?>">
            <table>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="nis" value="<?php echo $isi['Snis'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><input type="text" name="nisn" value="<?php echo $isi['Snisn'] ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type="text" name="nama" value="<?php echo $isi['Snama'] ?>"></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><input type="text" name="tempat" value="<?php echo $isi['Stempat'] ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td><input type="date" name="tanggal" value="<?php echo $isi['Stanggal'] ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <?php 
                            if($isi['Sjk'] == "L"){
                                echo "<input type='radio' name='jk' value='L' checked>Laki-Laki";
                                echo "<input type='radio' name='jk' value='P'>Perempuan";
                            } 
                            else if($isi['Sjk'] == "P"){
                                echo "<input type='radio' name='jk' value='L'>Laki-Laki";
                                echo "<input type='radio' name='jk' value='P' checked>Perempuan";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <select name="agama">
                            <option value="Pilih" disabled>Pilih Agama</option>
                            <?php echo parAgama($isi['Sagama']) ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea name="alamat"><?php echo $isi['Salamat']?></textarea></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td>:</td>
                    <td><input type="number" name="telp" value="<?php echo $isi['Stelp'] ?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        <?php 
                            if($isi['Sstatus'] == "Y"){
                                echo "<input type='radio' name='status' value='Y' checked>Belum Lulus";
                                echo "<input type='radio' name='status' value='N'>Lulus";
                            } 
                            else if($isi['Sstatus'] == "N"){
                                echo "<input type='radio' name='status' value='Y'>Belum Lulus";
                                echo "<input type='radio' name='status' value='N' checked>Lulus";
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
<?php
    function parAgama($row){
        if($row == "Islam"){
            return "<option value='Islam' selected>Islam</option><option value='Khatolik'>Kristen Khatolik</option><option value='Protestan'>Kristen Protestan</option><option value='Hindu'>Hindu</option><option value='Buddha'>Buddha</option>";
        }
        else if($row == "Khatolik"){
            return "<option value='Islam'>Islam</option><option value='Khatolik' selected>Kristen Khatolik</option><option value='Protestan'>Kristen Protestan</option><option value='Hindu'>Hindu</option><option value='Buddha'>Buddha</option>";
        }
        else if($row == "Protestan"){
            return "<option value='Islam'>Islam</option><option value='Khatolik'>Kristen Khatolik</option><option value='Protestan' selected>Kristen Protestan</option><option value='Hindu'>Hindu</option><option value='Buddha'>Buddha</option>";
        }
        else if($row == "Hindu"){
            return "<option value='Islam' selected>Islam</option><option value='Khatolik'>Kristen Khatolik</option><option value='Protestan'>Kristen Protestan</option><option value='Hindu' selected>Hindu</option><option value='Buddha'>Buddha</option>";
        }
        else if($row == "Buddha"){
            return "<option value='Islam' selected>Islam</option><option value='Khatolik'>Kristen Khatolik</option><option value='Protestan'>Kristen Protestan</option><option value='Hindu'>Hindu</option><option value='Buddha'>Buddha</option>";
        }
    }
?>