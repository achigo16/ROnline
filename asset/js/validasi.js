function validasi_input_siswa(form){
    var numbers=/^[0-9]+$/;
    if(form.nis.value == ""){
        alert("NIS masih kosong!");
        form.nis.focus();
        return(false);
    }
    if(!numbers.test(form.nis.value)){
        alert("NIS harus angka!");
        form.nis.focus();
        return(false);
    }
    if(form.nis.value.length != 9){
        alert("NIS harus berjumlah 9 digit!");
        form.nis.focus();
        return(false);
    }
    if(form.nisn.value == ""){
        alert("NISN masih kosong!");
        form.nisn.focus();
        return(false);
    }
    if(!numbers.test(form.nisn.value)){
        alert("NISN harus angka!");
        form.nisn.focus();
        return(false);
    }
    if(form.nisn.value.length != 10){
        alert("NISN harus berjumlah 10 digit!");
        form.nisn.focus();
        return(false);
    }
    if(form.nama.value == ""){
        alert("Nama siswa masih kosong!");
        form.nama.focus();
        return(false);
    }
    if(form.tempat.value == ""){
        alert("Tempat Lahir masih kosong!");
        form.tempat.focus();
        return(false);
    }
    if(form.agama.value == "Pilih"){
        alert("Anda belum memilih agama!");
        return(false);
    }
    if(form.kode_kelas.value == "Pilih"){
        alert("Anda belum memilih kelas!");
        return(false);
    }
    if(form.alamat.value == ""){
        alert("Alamat masih kosong!");
        form.alamat.focus();
        return(false);
    }
    if(form.telp.value == ""){
        alert("No. Telepon masih kosong!");
        form.telp.focus();
        return(false);
    }
    if(!numbers.test(form.telp.value)){
        alert("No. Telepon harus angka!");
        form.telp.focus();
        return(false);
    }
    
    return (true);
}

function validasi_edit_siswa(form){
    var numbers=/^[0-9]+$/;
    if(form.nama.value == ""){
        alert("Nama siswa masih kosong!");
        form.nama.focus();
        return(false);
    }
    if(form.tempat.value == ""){
        alert("Tempat Lahir masih kosong!");
        form.tempat.focus();
        return(false);
    }
    if(form.agama.value == "Pilih"){
        alert("Anda belum memilih agama!");
        return(false);
    }
    if(form.kode_kelas.value == "Pilih"){
        alert("Anda belum memilih kelas!");
        return(false);
    }
    if(form.alamat.value == ""){
        alert("Alamat masih kosong!");
        form.alamat.focus();
        return(false);
    }
    if(form.telp.value == ""){
        alert("No. Telepon masih kosong!");
        form.telp.focus();
        return(false);
    }
    if(!numbers.test(form.telp.value)){
        alert("No. Telepon harus angka!");
        form.telp.focus();
        return(false);
    }
    
    return (true);
}

function validasi_input_kelas(form){
    if(form.kelas.value == "Pilih"){
        alert("Anda Belum Memilih Kelas!");
        return(false);
    }
    if(form.jurusan.value == "Pilih"){
        alert("Anda Belum Memilih Jurusan!");
        return(false);
    }
    if(form.urutan.value == ""){
        alert("Urutan Kelas masih kosong!");
        form.urutan.focus();
        return(false);
    }
    if(form.tahun1.value == ""){
        alert("Tahun Awal Kelas masih kosong!");
        form.tahun1.focus();
        return(false);
    }
    if(form.tahun2.value == ""){
        alert("Tahun Akhir Kelas masih kosong!");
        form.tahun2.focus();
        return(false);
    } 
    return(true);
}

function validasi_input_mapel(form){
    if(form.nama.value == ""){
        alert("Nama Mata Pelajaran masih kosong!");
        form.nama.focus();
        return(false);
    }
    if(form.kkm.value == ""){
        alert("KKM masih kosong!");
        form.kkm.focus();
        return(false);
    }
    return(true);
}

function validasi_edit_mapel(form){
    if(form.kkm.value == ""){
        alert("KKM masih kosong!");
        form.kkm.focus();
        return(false);
    }
    return(true);
}

function validasi_input_nilai(form){
    if(form.nis.value == "Pilih"){
        alert("Anda Belum Memilih Siswa!");
        return(false);
    }
    if(form.kode_kelas.value == "Pilih"){
        alert("Anda Belum Memilih Kelas!");
        return(false);
    }
    if(form.semester.value == ""){
        alert("Anda Belum Memilih Semester!");
        form.semester.focus();
        return(false);
    }
    if(form.kode_mapel.value == "Pilih"){
        alert("Anda Belum Mata Pelajaran!");
        return(false);
    }
    if(form.harian.value == ""){
        alert("Nilai Harian masih kosong!");
        form.harian.focus();
        return(false);
    }
    if(form.uts.value == ""){
        alert("Nilai UTS masih kosong!");
        form.uts.focus();
        return(false);
    }
    if(form.uas.value == ""){
        alert("Nilai UAS masih kosong!");
        form.uas.focus();
        return(false);
    }
    if(form.praktek.value == ""){
        alert("Nilai Praktek masih kosong!");
        form.praktek.focus();
        return(false);
    }
    if(form.sikap.value == "Pilih"){
        alert("Anda Belum Memilih Nilai Sikap!");
        return(false);
    }
    return(true);
}

function validasi_edit_nilai(form){
    if(form.harian.value == ""){
        alert("Nilai Harian masih kosong!");
        form.harian.focus();
        return(false);
    }
    if(form.uts.value == ""){
        alert("Nilai UTS masih kosong!");
        form.uts.focus();
        return(false);
    }
    if(form.uas.value == ""){
        alert("Nilai UAS masih kosong!");
        form.uas.focus();
        return(false);
    }
    if(form.praktek.value == ""){
        alert("Nilai Praktek masih kosong!");
        form.praktek.focus();
        return(false);
    }
    return(true);
}