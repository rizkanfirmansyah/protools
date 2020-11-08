const baseurl = 'http://localhost:8090/chat/';


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

  date = new Date();
  detik = date.getSeconds();
  menit = date.getMinutes();
  jam = date.getHours();
  hari = date.getDay();
  tanggal = date.getDate();
  bulan = date.getMonth();
  tahun = date.getFullYear();
  const dateNow = tahun+"-"+bulan+"-"+tanggal+" "+jam+":"+menit+":"+detik