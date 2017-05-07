<html>
    <head>
        <title>Edit Data Mata Pelajaran | Raport Online</title>
        <script type="text/javascript" src="<?php echo base_url()?>asset/js/validasi.js"></script>
    </head>
    <body>
        <h2>Edit Data Mata Pelajaran</h2>
        <form autocomplete="off" onsubmit="return validasi_edit_mapel(this)" method="post" action="../RMSave">
            <input type="hidden" name="kode_mapel" value="<?php echo $isi['Mkode_mapel']?>">
            <table>
                <tr>
                    <td>Kode Mata Pelajaran</td>
                    <td>:</td>
                    <td><input type="text" name="kode_mapel" value="<?php echo $isi['Mkode_mapel']?>" disabled></td>
                </tr>
                <tr>
                    <td>Nama Mata Pelajaran</td>
                    <td>:</td>
                    <td><input type="text" name="nama" value="<?php echo $isi['Mnama_mapel']?>" disabled></td>
                </tr>
                <tr>
                    <td>KKM</td>
                    <td>:</td>
                    <td><input type="number" name="kkm" min="0" max="100" value="<?php echo $isi['Mkkm']?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="type" value="update">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>