<div class="content">
   <div class="container">
      <div class="row">

         <div class="col-12 col-md-8">            
         
         <?php if($this->session->flashdata()==TRUE):?>
            <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
               <strong><?=$this->session->flashdata('alert');?> </strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php endif;?>

            <div class="card">
               <div class="card-header card-header-primary">
                  <h4>Ubah Password</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-10">
                        <form action="<?=base_url('admin/ganti_password');?>" method="post">

                           <div class="form-group">
                              <label for="current_pass">Password Lama</label>
                              <input type="password" id="current_pass" name="current_pass" class="form-control">
                              <?=form_error('current_pass', '<small class="text-danger pl-1">','</small>');?>
                           </div>

                           <div class="form-group">
                              <label for="">Password Baru</label>
                              <input type="password" id="new_pass" name="new_pass" class="form-control">
                              <?=form_error('new_pass', '<small class="text-danger pl-1">','</small>');?>
                           </div>

                           <div class="form-group">
                              <label for="repeat_new_pass">Ulangi Password Baru</label>
                              <input type="password" id="repeat_new_pass" name="repeat_new_pass" class="form-control">
                              <?=form_error('repeat_new_pass', '<small class="text-danger pl-1">','</small>');?>
                           </div>

                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">Ubah Password</button>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>