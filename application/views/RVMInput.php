<html>
    <head>
        <title>Tambah Data Mata Pelajaran | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Tambah Data Mata Pelajaran</h2>
        <form autocomplete="off" onsubmit="return validasi_input_mapel(this)" method="post" action="RMSave">
            <input type="hidden" name="kode_mapel" value="<?php echo $kode ?>">
            <table>
                <tr>
                    <td>Kode Mata Pelajaran</td>
                    <td>:</td>
                    <td><input type="text" name="kode_mapel" value="<?php echo $kode ?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Mata Pelajaran</td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>KKM</td>
                    <td>:</td>
                    <td><input type="number" name="kkm" min="0" max="100"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="insert">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>