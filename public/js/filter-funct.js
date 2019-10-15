$(document).ready(function(){



$('.btn-sort-data').prop("disabled", true);

$('.sort_no_kelas').change(function(){
   $('#nama_kelas option').remove();
   $('#nama_kelas').append('<option>--Pilih Nama Kelas--</option>');
   $('.nm_kelas').prop("disabled", false);
   

   const id = $(this).find(':selected').data('id')
   $.ajax({
      url : 'http:/web-nilai/admin/sortirCabKelas',
      data: {kode_kelas: id},
      method: 'post',
      dataType : 'json',
      success: function(data){

         data.forEach(function(value, index){
            $('#nama_kelas').append('<option data-id='+value.kode_kelas+' value='+value.kode_kelas+'>'+value.nama_kelas+'</option>');  
         });
         //console.log(data['']);
         
      }
   });
});

// 
// 
// Sort daftar nilai

// Global scope variabel
var MyVar = {};

$('#no_kelas').change(function(){
   $('#nama_kelas option').remove();
   $('#nama_kelas').append('<option>--Pilih Nama Kelas--</option>');
   //MyVar.kd_kelas = $(this).find(':selected').data('id');

   $.ajax({
       url :'http:/web-nilai/admin/getDataSubKelas',
       method : 'post',
       dataType : 'json',
       success : function(sub_kelas){
           
           sub_kelas.forEach(function(value, index){
               $('#sub_kelas').prepend('<option value='+value.kode_kelas+'>'+value.nama_kelas+'</option>');
               $('.btn-sort-data').prop("disabled", false);
           })          
       } 
   });
});

$('#nama_kelas').change(function(){
   $('#mata_pelajaran option').remove();
   $('#mata_pelajaran').append('<option>--Pilih Mata Pelajaran--</option>');
   MyVar.matpel_id = $(this).find(':selected').data('id')
   
   $.ajax({
       url :'http:/web-nilai/admin/getMatapelajaranAjax',
       data: {kode_kelas: MyVar.matpel_id },
       method : 'post',
       dataType : 'json',
       success : function(matpel){
         if(MyVar.matpel_id){
           matpel.forEach(function(value, index){
               $('#mata_pelajaran').append('<option data-matpel_id='+value.matpel_id+' value='+value.matpel_id+'>'+value.nama_matpel+'</option>');
               $('.btn-sort-data').prop("disabled", false);
           });
            
         }else{
            $('#mata_pelajaran option').remove();
            $('#mata_pelajaran').prepend('<option value="locked">-- Pilih Mata Pelajaran --</option>');
         }         
       } 
   });
})

$('#mata_pelajaran').change(function(){
   $('#pengajar option').remove();
   $('#pengajar').append('<option>--Pilih Pengajar--</option>');
   MyVar.kd_matpel = $(this).find(':selected').data('matpel_id')

   $.ajax({
      url: 'http:/web-nilai/admin/getKodeGuruAjax',
      data : {matpel_id: MyVar.kd_matpel},
      method : 'post',
      dataType : 'json',
      success : function(pengajar){
         
         if(MyVar.kd_matpel){
            pengajar.forEach(function(value, index){
                $('#pengajar').append(`
                  <option data-pengajar=`+value.guru_id+` value=`+value.guru_id+`>`+value.nama_guru+`</option>
                `);
                $('.btn-sort-data').prop("disabled", false);
                
            });
          }else{
             $('#pengajar option').remove();
             $('#pengajar').prepend('<option value="locked">--Pilih Pengajar--</option>');
          }     
      }
   })

   // $('.btn-sort-data').click(function(e){
   //    e.preventDefault();
   //    MyVar.guru_id = $('#pengajar').find('option:selected').data('pengajar');
   //    console.log(MyVar.guru_id)
   //    $.ajax({
   //       url: 'http:/web-nilai/admin/test_data',
   //       data : {kode_kelas: MyVar.matpel_id, matpel_id: MyVar.kd_matpel,  pengajar: MyVar.guru_id},
   //       method : 'post',
   //       dataType : 'json',
   //       success : function(data){
   //          console.log(data);
   //          data.forEach(function(value, index){
   //             $('.odd').remove();
   //             $('#tbody').append(`
   //                <tr>
   //                   <td></td>
   //                   <td>`+value.no_siswa+`</td>
   //                   <td>`+value.no_siswa+`</td>
   //                   <td>`+value.kode_kelas+`</td>
   //                   <td>`+value.matpel_id+`</td>
   //                   <td>`+value.harian+`</td>
   //                   <td>`+value.tugas+`</td>
   //                   <td>`+value.mandiri+`</td>
   //                   <td>`+value.uts+`</td>
   //                   <td>`+value.uas+`</td>
   //                   <td>
   //                      <a href='' class='btn btn-sm btn-info text-white'>Edit</a>
   //                      <a href='' class='btn btn-sm btn-danger text-white'>Delete</a>
   //                   </td>
   //                <tr>
   //             `);
   //         });

   //       }
   //    })
   // })       

})










// 
// 
// ======= Tambah Mata Pelajaran

$('.btn-tambah-matapel').on('click', function(){

   $('.modal-header > h5').html('Tambah Mata Pelajaran');
   $('.modal-footer > .btn-primary').text('Simpan Data');
   $('.modal-content > form').attr('action', 'http:/web-nilai/admin/tambah_mata_pelajaran');

   $(".modal").on("hidden.bs.modal", function(){
      $(".modal-body").html("");
   });

   $('.modal-body').append(`
         <div class='form-group kode'>   
            <input type='text' class='form-control' id='kode' placeholder='Kode Mata Pelajaran' name='kode' >
         </div>
         <div class='form-group nama'>   
            <input type='text' class='form-control' id='nama' placeholder='Nama Mata Pelajaran' name='nama' >
         </div>
    `);

});



// 
// 
// ======= Edit Mata Pelajaran

$('.btn-edit').on('click', function(){
 
   $('.modal-header > h5').html('Edit Mata Pelajaran');
   $('.modal-footer > .btn-primary').text('Simpan Data');
   $('.modal-content > form').attr('action', 'http:/web-nilai/admin/edit_mata_pelajaran');
   
   $(".modal").on("hidden.bs.modal", function(){
      $(".modal-body").html("");
   });

   const id = $(this).data('id');

   $.ajax({
      url: "http:/web-nilai/admin/getDataMatpel",
      method : 'post',
      data : {id: id},
      dataType : 'json',
      success: function(data){
         $('.modal-body').append('<div id="kode-input" class="form-group"><label>Kode Mata Pelajaran</label><input type="text" class="form-control" name="kode" id="kode" value="'+data.id_matpel+'"></div>');
         $('.modal-body').append('<div id="nama-input" class="form-group"><label>Kode Nama Pelajaran</label><input type="text" class="form-control" name="nama" id="nama" value="'+data.nama_matpel+'"></div>');
         $('.modal-body').append('<div id="hidden-input" class="form-group"><input type="hidden" class="form-control" name="hidden" id="hidden" value="'+data.matpel_id+'"></div>');
      }
   })

})




$('.tambah-kelas').on('click', function(){

   $('.modal-header > h5').html('Tambah Kelas Baru');
   $('.modal-footer > .btn-primary').text('Simpan Data');
   $('.modal-content > form').attr('action', 'http:/web-nilai/admin/tambah_kelas');

   $(".modal").on("hidden.bs.modal", function(){
      $(".modal-body").html("");
   });
 
   $('.modal-body').append(`
         <div class='form-group'>
            <label>Kelas</label>
            <select class='form-control' name='no_kelas_list' id='no_kelas_list'></select>
         </div>
         <div class='form-group kode'>
            <label>Kode Kelas</label>   
            <input type='text' class='form-control' id='kode_kelas' name='kode_kelas' autocomplete='off'>
         </div>
         <div class='form-group nama'>
            <label>Nama Kelas</label>   
            <input type='text' class='form-control' id='nama_kelas' name='nama_kelas' autocomplete='off'>
         </div>
      `);
   
   $.ajax({
      url : 'http:/web-nilai/admin/daftarKelasAjax',
      method: 'post',
      dataType: 'json',
      success: function(data){
         data.forEach(function(value, index) {
            //console.log(value.no_kelas)
            $('#no_kelas_list').append('<option value="'+value.no_kelas+'">'+value.no_kelas+'</option>');
        });
         
      }
   })

})


$('#kode_kelas').on('change', function(){
  $('#nama_kelas option').remove();
  const noklas = $(this).find(':selected').data('id')

     $.ajax({
      url: 'http:/web-nilai/admin/fetchDataNamaKelas',
      data : {noklas: noklas},
      method : 'post',
      dataType : 'json',
      success : function(noklas){
        noklas.forEach(function(value, index){
                $('#nama_kelas').append('<option value="'+value.kode_kelas+'">'+value.nama_kelas+'</option>');
        })
      }
   })
})


$('.btn-edit-kelas').on('click', function(){
 
   $('.modal-header > h5').html('Edit Kelas');
   $('.modal-footer > .btn-primary').text('Simpan Data');
   $('.modal-content > form').attr('action', 'http:/web-nilai/admin/edit_kelas');
   
   $(".modal").on("hidden.bs.modal", function(){
      $(".modal-body").html("");
   });

   const idk = $(this).data('id');
 

   $.ajax({
      url: "http:/web-nilai/admin/daftarKelasById",
      method : 'post',
      data : {idk: idk},
      dataType : 'json',
      success: function(data){

         $('.modal-body').append('<div class="form-group"><label for="kode_kelas">Kelas</label><select class="form-control" name="no_kelas_edit" id="no_kelas_edit"></select></div>');
         $('.modal-body').append('<div class="form-group"><label for="kode_kelas">Kode Kelas</label><input class="form-control" name="kode_kelas" id="kode_kelas" value='+data.kode_kelas+' type="text"></div>');
         $('.modal-body').append('<div class="form-group"><label for="kode_kelas">Nama Kelas</label><input class="form-control" name="nama_kelas" id="nama_kelas" value='+data.nama_kelas+' type="text"></div>');
         $('.modal-body').append('<div class="form-group"><input class="form-control" name="id" id="id" value='+data.id_cab+' type="hidden"></div>');

         $.ajax({
            url: "http:/web-nilai/admin/daftarKelasAjax",
            method : 'post',
            dataType : 'json',
            success: function(kelas){
               kelas.forEach(function(value, index){
                  $('#no_kelas_edit').append('<option value="'+value.no_kelas+'">'+value.no_kelas+'</option>');
               })
               $('#no_kelas_edit').val(data.no_kelas);
            }
         })         
         
         
      }
   })

})









})