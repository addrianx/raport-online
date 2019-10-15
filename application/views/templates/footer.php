<!--   Core JS Files   -->



<script src="<?= base_url().'public/vendor/js/core/popper.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url().'public/vendor/js/core/bootstrap-material-design.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url().'public/vendor/js/plugins/perfect-scrollbar.jquery.min.js'; ?>"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chartist JS -->
<script src="<?= base_url().'public/vendor/js/plugins/chartist.min.js' ;?>"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url().'public/vendor/js/plugins/bootstrap-notify.js' ;?>"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url().'public/vendor/js/material-dashboard.min.js?v=2.1.0' ;?>" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url().'public/vendor/demo/demo.js' ;?>"></script>
<script src="<?= base_url().'public/vendor/datatables/datatables.min.js';?>"></script>

<script src="<?= base_url().'public/js/my-script.js?v='.filemtime('public/js/my-script.js');?>';?>"></script>
<script src="<?= base_url().'public/js/filter-funct.js?v='.filemtime('public/js/filter-funct.js');?>';?>"></script>
<script src="<?= base_url().'public/js/hash_secure.js?v='.filemtime('public/js/hash_secure.js');?>.'; ?>"></script>
<script>

   $(document).ready( function () {

      $('#myTable').DataTable({
         //"responsive": true
      });

      $('#myTable2').DataTable();

      $('#myTable3').DataTable();
      
      // Service Worker Navigator
      if('serviceWorker' in navigator)
      {
         navigator.serviceWorker.register('<?=base_url();?>service_worker.js')
      }

   });

</script>
<noscript>
    <style type="text/css">
        .wrapper {display:none;}
    </style>
    <div class="noscriptmsg">
      <div class="container">
         <div class="row text-center d-block">
            <div class="col justify-content-center">
               JavaScript Di borwser anda tidak aktif, atau browser tidak mendukung JavaScript.
            </div>
         </div>
      </div>
    </div>
</noscript>
</body>
</html>

