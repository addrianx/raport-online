<div class="d-flex align-items-center h-100 bg-light">
   <div class="container">
      <div class="row justify-content-center">

         <div class="col-12 col-lg-8">
            <div class="card">

               <div class="card-header">
                  <h3 class="text-dark">Reset Password</h3>
                  <p>Enter Your registered email to receive link for reset account</p>
               </div>

               <form action="<?=base_url('login/send_mail');?>" method="post">
                  <div class="card-body">

                     <?php if($this->session->flashdata()==TRUE):?>
                        <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
                           <strong><?=$this->session->flashdata('alert');?> </strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     <?php endif;?>

                     <div class="form-group">
                        <input type="text" class="form-control" id="reset" name="reset">
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-success">Send me reset link</button>
                     </div>
                     <a href="<?=base_url('login');?>" class="text-right">Back To login</a>
                  </div>
                  
               </form>

            </div>
         </div>

      </div>
   </div>
</div>