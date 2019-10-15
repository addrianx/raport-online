$(document).ready(function() {

// Javascript method's body can be found in assets/js/demos.js
md.initDashboardPageCharts();

$("div").removeClass("bmd-form-group");

function gethiddeninput(){
	let hiddeninputdata = $('#col-nilai').append('<div class="col-12 col-input"><input class="form-control" id="no_siswa" name="no_siswa" type="hidden"></div>');
	$('#col-nilai').append('<div class="col-12 col-input"><input class="form-control" id="kode_guru" name="kode_guru" type="hidden"></div>');
	$('#col-nilai').append('<div class="col-12 col-input"><input class="form-control" id="matpel_id" name="matpel_id" type="hidden"></div>');
	return hiddeninputdata;
}



// Tambah Siswa Dan Nilai
// ======================
$('.tambah_modal').on('click', function(){
	$('.col-input').remove();
	$('div').remove('#btn');
	$('.modal-title').html('Tambah Data Nilai Siswa');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/tambahDataNilai');
	

	$('#col-nilai').append('<div class="col-12 col-input"><div class="form-group"><label for="daftar_kelas">Pilih Kelas</label><select class="form-control" id="daftar_kelas" name="kelas"><option>-Pilih Kelas-</option></select></div></div>');

	$('#col-nilai').append('<div class="col-12 col-input"><div class="form-group"><label for="sub_kelas">Pilih Nama Kelas</label><select class="form-control" id="sub_kelas" name="sub_kelas"></select></div></div>');  

	$('#col-nilai').append('<div class="col-12 col-input"><div class="form-group"><label for="mata_pel">Pilih Mata Pelajaran</label><select class="form-control" id="mata_pel" name="matpel"><option>-Pilih Mata Pelajaran-</option></select></div></div>');    
	
	$('#col-nilai').append('<div class="col-12 col-input"><div class="form-group"><label for="guru">Pilih Guru</label><select class="form-control" id="daftar_guru" name="guru"></select></div></div>');
	

	$.ajax({
		url :'http:/web-nilai/admin/getDataKelasAjax',
		method : 'post',
		dataType : 'json',
		success : function(kelas){
		
			kelas.forEach(function(value, index){
				$('#daftar_kelas').append('<option data-id='+value.no_kelas+' value='+value.no_kelas+'>'+value.no_kelas+'</option>')
			})
		} 
	});



	$('#daftar_kelas').change(function(){
		$('#sub_kelas option').remove();
		const id = $(this).find(':selected').data('id')
		

		$.ajax({
			url :'http:/web-nilai/admin/getDataSubKelas',
			data: {kode_kelas: id},
			method : 'post',
			dataType : 'json',
			success : function(sub_kelas){
				
				sub_kelas.forEach(function(value, index){
					$('#sub_kelas').append('<option value='+value.kode_kelas+'>'+value.nama_kelas+'</option>');
				})          
			} 
		});
	})


   
	$.ajax({
			url : 'http:/web-nilai/admin/getMatapelajaranAjax',
			method: 'post',
			dataType: 'json',
			success: function(matpel){

			matpel.forEach(function(value, index){
				$('#mata_pel').append('<option data-id1='+value.matpel_id+' value='+value.matpel_id+'>'+value.nama_matpel+'</option>')
			});
		}
	});

	$('#mata_pel').change(function(){
		$('#daftar_guru option').remove();
		const id1 = $(this).find(':selected').data('id1');
		//console.log(id1);

		$.ajax({
			url :'http:/web-nilai/admin/getKodeGuruAjax',
			data: {kode_matpel: id1},
			method : 'post',
			dataType : 'json',
			success : function(guru){
			   
				guru.forEach(function(value, index){
					$('#daftar_guru').append('<option value='+value.guru_id+'>'+value.nama_guru+'</option>')
				})          
			} 
		});
	});




});  //---> $('.tambah_modal').on('click', function(){




// Edit Nilai Harian
// ============================================
// ============================================
// ============================================
$('.harian_modal').on('click', function(){
	$('.col-input').remove();
	$('div').remove('#btn')
	$('.modal-title').html('Nilai Harian Siswa');
	$('.modal-body').prepend('<div class="col-12" id="btn"><button class="btn btn-success" id="btn-tambah">Tambah Nilai</button></div>');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/updateNilaiHarian');
	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$('#btn-tambah').click(function(){
		$('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_baru">Nilai Harian baru</label><input class="form-control" id="nilai_baru" name="nilai[]" value="" type="number"></div></div>');
	})
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel:matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			//console.log(data);
			gethiddeninput();

			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);
			$('#matpel_id').val(data.matpel_id);

			if(data.harian){  //Jika Nilai ada di database
				let myNilai = data.harian;
				let myArray = myNilai.split(",");
				let dataLength = myArray.length;
				
				//loop every data array to input box
				myArray.forEach(function(value, index) {
					index_number = index+1;
					let input = $('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_'+index_number+'">Nilai Harian '+index_number+'</label><input class="form-control" id="nilai_'+index_number+'" name="nilai[]" value="'+value+'" type="number"></div></div>');  
					$('#nilai_'+index_number).val(value);
				});

			}else{ //jika nilai didatabase null

				//console.log('Nilai Kosong');
				
			}

		}
	});
});




// Edit Nilai tugas
// ============================================
// ============================================
// ============================================
$('.tugas_modal').on('click', function(){
	$('.col-input').remove();
	$('div').remove('#btn')
	$('.modal-title').html('Nilai Tugas Siswa');
	$('.modal-body').prepend('<div class="col-12" id="btn"><button class="btn btn-success" id="btn-tambah">Tambah Nilai</button></div>');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/updateNilaiTugas');
	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$('#btn-tambah').click(function(){
		$('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_baru">Nilai Tugas baru</label><input class="form-control" id="nilai_baru" name="nilai[]" value="" type="number"></div></div>');
	})
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel:matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			gethiddeninput();

			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);
			$('#matpel_id').val(data.matpel_id);            
			
			if(data.tugas){
				let myNilai = data.tugas;
				let myArray = myNilai.split(",");
				let dataLength = myArray.length;
				
				myArray.forEach(function(value, index) {
					index_number = index+1;
					let input = $('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="tugas_'+index_number+'">Nilai Tugas '+index_number+'</label><input class="form-control" id="tugas_'+index_number+'" name="nilai[] "type="number"></div></div>');  
					$('#tugas_'+index_number).val(value);
				});  
			}else{
			  //kode else
			}
		}
	});
});




// Edit Nilai Mandiri
// ============================================
// ============================================
// ============================================
$('.mandiri_modal').on('click', function(){
	$('.col-input').remove();
	$('div').remove('#btn');
	$('.modal-body').prepend('<div class="col-12" id="btn"><button class="btn btn-success" id="btn-tambah">Tambah Nilai</button></div>');
	$('.modal-title').html('Nilai Mandiri Siswa');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/updateNilaiMandiri');

	$('#btn-tambah').click(function(){
		$('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_baru">Nilai Mandiri baru</label><input class="form-control" id="nilai_baru" name="nilai[]" value="" type="number"></div></div>');
	})
	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel: matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			console.log(data);

			gethiddeninput();

			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);
			$('#matpel_id').val(data.matpel_id);          

			let myNilai = (data.mandiri);
			let myArray = myNilai.split(",");
			let dataLength = myArray.length;



			myArray.forEach(function(value, index) {
				index_number = index+1;
				let input = $('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="mandiri_'+index_number+'">Nilai Mandiri '+index_number+'</label><input class="form-control" id="mandiri'+index_number+'" name="nilai[]" type="number"></div></div>');  
				$('#mandiri'+index_number).val(value);
			});
		}
	});
});



// Edit Nilai uts
// ============================================
// ============================================
// ============================================
$('.uts_modal').click(function(){
	$('.col-input').remove();
	$('div').remove('#btn')
	$('.modal-body').prepend('<div class="col-12" id="btn"><button class="btn btn-success" id="btn-tambah">Tambah Nilai</button></div>');
	$('.modal-title').html('Nilai UTS Siswa');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/updateNilaiUts');

	$('#btn-tambah').click(function(){
		$('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_baru">Nilai Harian baru</label><input class="form-control" id="nilai_baru" name="nilai[]" value="" type="number"></div></div>');
	})

	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel: matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			console.log(data)

			gethiddeninput();

			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);
			$('#matpel_id').val(data.matpel_id);             

			let myNilai = (data.uts);
			let myArray = myNilai.split(",");
			let dataLength = myArray.length;

			myArray.forEach(function(value, index) {
				index_number = index+1;
				let input = $('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="uts_'+index_number+'">Nilai UTS '+index_number+'</label><input class="form-control" name="nilai[]" id="uts_'+index_number+'" type="number"></div></div>');  
				$('#uts_'+index_number).val(value);
			});
		}
	});
	
});



$('#button-eklas').on('click', function(event){
	event.preventDefault();
	//console.log('clicked !');
	$('#kode_kelas').prop('disabled', false);
	$('#nama_kelas').prop('disabled', false);
});

// Edit Nilai uas
// ============================================
// ============================================
// ============================================
$('.uas_modal').one('click', function(){
	$('.col-input').remove();
	$('div').remove('#btn')
	$('.modal-body').prepend('<div class="col-12" id="btn"><button class="btn btn-success" id="btn-tambah">Tambah Nilai</button></div>');
	$('.modal-title').html('Nilai UAS Siswa');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/updateNilaiUas');

	$('#btn-tambah').click(function(){
		$('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="nilai_baru">Nilai Harian baru</label><input class="form-control" id="nilai_baru" name="nilai[]" value="" type="number"></div></div>');
	})

	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel: matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			console.log(data)

			gethiddeninput();

			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);
			$('#matpel_id').val(data.matpel_id);             

			let myNilai = (data.uas);
			let myArray = myNilai.split(",");
			let dataLength = myArray.length;


			myArray.forEach(function(value, index) {
				index_number = index+1;
				let input = $('#col-nilai').append('<div class="col-6 col-input"><div class="form-group"><label for="uas_'+index_number+'">Nilai UAS '+index_number+'</label><input class="form-control" id="uas_'+index_number+'" name="nilai[]" type="number"></div></div>');  
				$('#uas_'+index_number).val(value);
			});
		}
	});
		
});



// Hapus Data
$('.hapus_modal').one('click', function(){
	$('.modal-title').html('Hapus Nilai');
	$('.modal-footer .btn-primary').html('Hapus Nilai');
	$('.modal-body .form').attr('action', 'http:/web-nilai/admin/hapus_nilai_matpel');


	const id = $(this).data('id');
	const matpel = $(this).data('matpel');
	
	$.ajax({
		url :'http:/web-nilai/admin/getDataNilaiAjax',
		data : {id: id, matpel: matpel},
		method : 'post',
		dataType : 'json',
		success : function(data){
			
			$('#col-nilai').append('<div class="col-12 col-input"><input class="form-control" id="no_siswa" name="no_siswa" type="hidden"></div>')
			$('#col-nilai').append('<div class="col-12 col-input"><input class="form-control" id="kode_guru" name="kode_guru" type="hidden"></div>')
			$('#no_siswa').val(data.no_siswa);
			$('#kode_guru').val(data.kode_guru);

		   
		}
	});
		
});

	// =============================================
	// =============================================

	$('#sortkelas').change(function(){
		// ambil ajax response
		$.ajax({
			type: "post",
			url: "<?= base_url("+admin/urut_nilai_per_kelas+");?>",
			data: "{id_kelas: id}",
			success: function(data){
				console.log(data)
			}
		})
	})


			
	$('input[name="check[]"]').click(function(){
		data_arr = [];
			$.each($("input[name='check[]']:checked"), function(){
				data_arr.push($(this).data('id'));
			});
			if(data_arr.length > 0){
			$('#tombol_hapus').prop('disabled', false);
			}else{
			$('#tombol_hapus').prop('disabled', true);
			}
	});

	$('#tombol_hapus').on('click', function(){
		const url_data = $(this).data('uri');
		$.ajax({
			url :'http:/web-nilai/admin/'+url_data,
			data : {id: data_arr},
			method : 'post',
			success : function(data){
				console.log(data);
			}
		});
	});
		 









});


