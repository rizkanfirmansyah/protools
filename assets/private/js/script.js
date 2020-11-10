const baseurl = 'http://localhost:8090/chat/';
const currentURL = window.location.pathname + window.location.search + window.location.hash;


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function sAlert(title, subtitle, expression){
  return swal(title, subtitle, expression);
}

  date = new Date();
  detik = date.getSeconds();
  menit = date.getMinutes();
  jam = date.getHours();
  hari = date.getDay();
  tanggal = date.getDate();
  bulan = date.getMonth();
  tahun = date.getFullYear();
  const dateNow = tahun+"-"+bulan+"-"+tanggal+" "+jam+":"+menit+":"+detik

  
 function show_error(err){
  return alert(`${err.status} ${err.statusText}`)
}


function eventMod(parent, child, even){
  $(`#${parent}`).on(even, `#${child}`, function(){
      if($(this).attr('disabled')){
          alert('Save project and try again')
      }else{
          // console.log('ohh oke');
      }
  })
}