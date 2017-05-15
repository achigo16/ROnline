<html>
    <head>
        <title>Tambah Data Kelas | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
        <link href="<?php echo base_url()?>asset/css/select2.min.css" rel="stylesheet" />
        <script src="<?php echo base_url()?>asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>asset/js/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".autocomplete").select2();
            });
        </script>
    </head>
    <body>
        <h2>Tambah Data Kelas</h2>
        <form autocomplete="off" onsubmit = "return validasi_input_kelas(this)" method="post" action="RKSave">
            <input type="hidden" name="kode_kelas" value="<?php echo $kode ?>">
            <table>
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><input type="text" name="kode_kelas" value="<?php echo $kode ?>" disabled></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kelas" class="autocomplete">
                            <option value="Pilih" disabled selected>Pilih Kelas</option> 
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td>
                        <select name="jurusan" class="autocomplete">
                            <option value="Pilih" disabled selected>Pilih Jurusan</option> 
                            <option value="Elektro">Elekronika Industri</option>
                            <option value="Mesin">Pemesinan</option>
                            <option value="Tekstil">Teknik Penyempurnaan Tekstil</option>
                            <option value="TKR">Teknik Kendaraan Ringan</option>
                            <option value="TKJ">Teknik Komputer Jaringan</option>
                            <option value="MM">Multimedia</option>
                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Urutan Kelas</td>
                    <td>:</td>
                    <td><input type="number" name="urutan" min="1" max="10"></td>
                </tr>
                <tr>
                    <td>Batas Siswa</td>
                    <td>:</td>
                    <td><input type="number" name="kuota" min="1" max="100"></td>
                </tr>
                <tr>
                    <td>Tahun Angkatan</td>
                    <td>:</td>
                    <td><input type="number" name="tahun1" min="1999" max="2050"> / 
                    <input type="number" name="tahun2" min="2000" max="2051"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="type" value="insert">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>