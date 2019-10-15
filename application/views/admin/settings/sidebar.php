<div class="content">
	
	<div class="container mb-5">
		
			<div class="row">


            <form action="<?= base_url('admin/setting_submit'); ?>" class="form-inline" method="post" enctype="multipart/form-data">

            <div class="col-12 mb-4">
                        
            <?php if($this->session->flashdata()==TRUE):?>
               <div class="alert <?=$this->session->flashdata('css');?> alert-dismissible fade show" role="alert">
                  <strong><?=$this->session->flashdata('flash');?> </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif;?>

            <div class="card bg-primary p-2">
            <h4>Warna Accent Sidebar</h4>
            </div>


               <div class="d-flex align-content-stretch flex-wrap">
               
                  <div class="m-2">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="nvcolor" id="nvcolor" value="purple" <?php if($navcolor['color_nav'] == 'purple') echo 'checked' ?>>
                           <img src="<?=base_url('public/img/side-image/purple.png');?>" width="150" class="rounded">
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>
                  
                  <div class="m-2">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="nvcolor" id="nvcolor" value="azure" <?php if($navcolor['color_nav'] == 'azure') echo 'checked' ?>>
                           <img src="<?=base_url('public/img/side-image/azure.png');?>" width="150" class="rounded">
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>

                  <div class="m-2">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="nvcolor" id="nvcolor" value="green" <?php if($navcolor['color_nav'] == 'green') echo 'checked' ?>>
                           <img src="<?=base_url('public/img/side-image/green.png');?>" width="150" class="rounded">
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>

                  <div class="m-2">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="nvcolor" id="nvcolor" value="orange" <?php if($navcolor['color_nav'] == 'orange') echo 'checked' ?>>
                           <img src="<?=base_url('public/img/side-image/orange.png');?>" width="150" class="rounded">
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>

                  <div class="m-2">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="nvcolor" id="nvcolor" value="danger" <?php if($navcolor['color_nav'] == 'danger') echo 'checked' ?>>
                           <img src="<?=base_url('public/img/side-image/red.png');?>" width="150" class="rounded">
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>

               </div>

            </div>

            <div class="col-12 mb-4">
            <h4>Warna Lapisan Depan Sidebar</h4>
               <div class="row">

                  <div class="col-12 d-flex justify-content-start">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="bg_color" id="bg_color" value="black" <?php if($bgcolor['bg_color'] == 'black') echo 'checked' ?>>
                           Black
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>
                  <div class="col-12 d-flex justify-content-start">
                     <div class="form-check form-check-radio">
                        <label class="form-check-label">
                           <input class="form-check-input" type="radio" name="bg_color" id="bg_color" value="white" <?php if($bgcolor['bg_color'] == 'white') echo 'checked' ?>>
                           White
                           <span class="circle">
                                 <span class="check"></span>
                           </span>
                        </label>
                     </div>
                  </div>                  

               </div>
            </div>


            <div class="col-12 mb-4 upload-container">
            <h4>Sidebar Image</h4>
               <div class="row">
                     <input type="file" class="image" name="image" id="image">
               </div>            
            </div>


            <div class="container">
               <div class="row">
                  <div class="col-12 col-md-3 mt-4">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div> 
               </div>
            </div>

            </form>

         </div>
   
   </div>

</div>