<html>
    <head>
        <title>Tambah Configurasi PDF | Raport Online</title>
        <link href="<?php echo base_url()?>asset/css/select2.min.css" rel="stylesheet" />
        <script src="<?php echo base_url()?>asset/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>asset/js/select2.min.js"></script>
        <script src='<?php echo base_url()?>asset/js/tinymce/tinymce.min.js'></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".autocomplete").select2();
                tinymce.init({
                    selector:"#wysiwyg",

                    plugins: [
                          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                          'searchreplace wordcount visualblocks visualchars code fullscreen',
                          'insertdatetime media nonbreaking save table contextmenu directionality',
                          'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
                          ],
                    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | imageupload',
                    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                    image_advtab: true,
                    setup: function(editor) {
                        var inp = $('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');
                        $(editor.getElement()).parent().append(inp);

                        inp.on("change",function(){
                            var input = inp.get(0);
                            var file = input.files[0];
                            var fr = new FileReader();
                            fr.onload = function() {
                                var img = new Image();
                                img.src = fr.result;
                                editor.insertContent('<img src="'+img.src+'"/>');
                                inp.val('');
                            }
                            fr.readAsDataURL(file);
                        });

                        editor.addButton( 'imageupload', {
                            text:"IMAGE",
                            icon: false,
                            onclick: function(e) {
                                inp.trigger('click');
                            }
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <h2>Tambah Configurasi PDF</h2>
        <form autocomplete="off" onsubmit = "return validasi_input_kelas(this)" method="post" action="SaveConPDF">
            <table>
                <tr>
                    <td>Nama Konfigurasi</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required/></td>
                </tr>
                <tr>
                    <td>Tipe Konfigurasi</td>
                    <td>:</td>
                    <td>
                        <select name="tipe"  class="autocomplete" style="width:40%">
                            <option value="Pilih" disabled selected>Pilih Tipe</option>
                            <option value="header">Header</option>
                            <option value="footer">Footer</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><textarea name="isi" id="wysiwyg"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="type" value="insert">Submit</button></td>
                </tr>
            </table>
        </form>
        <a href="../RCController">Kembali</a>
    </body>
</html>