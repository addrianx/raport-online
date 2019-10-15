<div class="content">

   <div class="d-flex align-content-scretch flex-wrap">
      <div class="card">
         <div class="card-body">
         <div class="table-responsive">
            <table class="table nowrap display" id="myTable">
               <thead>
                  <tr>
                     <th rowspan="2">No</th>
                     <th class="text-center bg-success text-white" colspan="<?=count($splith);?>">Nilai Harian</th>
                     <th class="text-center bg-primary text-white" colspan="<?=count($splitt);?>">Nilai Tugas</th>
                     <th class="text-center bg-secondary text-white" colspan="<?=count($splitm);?>">Nilai Mandiri</th>
                     <th class="text-center bg-info text-white" colspan="<?=count($splitut);?>">Nilai UTS</th>
                  </tr>
                  <tr>

                     <?php for($d=1;$d<=count($splith);$d++): ?>
                        <th class="bg-success text-white">Harian - <?=$d;?></th>
                     <?php endfor;?>

                     <?php for($t=1;$t<=count($splitt);$t++): ?>
                        <th class="bg-primary text-white">Tugas - <?=$t;?></th>
                     <?php endfor;?>

                     <?php for($m=1;$m<=count($splitm);$m++): ?>
                        <th class="bg-secondary text-white">Mandiri - <?=$m;?></th>
                     <?php endfor;?>

                     <?php for($ut=1;$ut<=count($splitut);$ut++): ?>
                        <th class="bg-info text-white">UTS - <?=$ut;?></th>
                     <?php endfor;?>
                  </tr>
               </thead>

               <tbody>
                  <tr class="text-center">

                     <td>1</td>

                     <?php foreach($splith as $sh):?>
                     <td><?=$sh;?></td>
                     <?php endforeach;?>

                     <?php foreach($splitt as $st):?>
                     <td><?=$st;?></td>
                     <?php endforeach;?>

                     <?php foreach($splitm as $sm):?>
                     <td><?=$sm;?></td>
                     <?php endforeach;?>

                     <?php foreach($splitut as $sut):?>
                     <td><?=$sut;?></td>
                     <?php endforeach;?>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   </div>

</div>