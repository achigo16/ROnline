<html>
    <head>
        <title>Cetak | Raport Online</title>
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
        <h2>Cetak Data</h2>
        <form autocomplete="off" onsubmit = "return validasi_input_kelas(this)" method="post" action="RCPDF">
            <table>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td>
                        <select name="nis" class="autocomplete">
                            <option value="Pilih" disabled selected>Pilih Siswa</option>
                            <?php foreach($siswa as $b){?>
                            <option value="<?php echo $b->Snis ?>"><?php echo $b->Snis." | ".$b->Snama ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>
                        <select name="kode_kelas"  class="autocomplete">
                            <option value="Pilih" disabled selected>Pilih Kelas</option>
                            <?php foreach($kelas as $b){?>
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
                    <td><button type="submit" name="type">Submit</button></td>
                </tr>
            </table>
        </form>
        <a href="../">Beranda</a>
    </body>
</html>