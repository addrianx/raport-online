<?php 

      $hr1 = '50';
         if(($nilai['0']['mandiri'])==TRUE){
            $nilai = $nilai['0']['mandiri'];
            $nilai_arr = explode(',', $nilai);
            $push_data = array_push($nilai_arr, $hr1);
            
         }else{
            $nilai = array(); 
            $push_data = array_push($nilai, $hr1);
            $nilai_akhir = implode(',', $push_data);
            return $this->db->insert('nilai');
         }


         $nilai_harian = $nilai['0']['harian'];
         $data_arr = explode(',', $nilai_harian);
         $data_arr['1'] = '70';
         $equal = $data_arr['0'] + $data_arr['1'] ;
         var_dump($data_arr);
         $new_data=implode(',',$data_arr);
         var_dump($new_data);
         var_dump($equal);

        
         var_dump($data);
         $export_data = implode(',', $data);
         var_dump($export_data);
         $import_data = explode(',', $export_data);
         var_dump($import_data);
         $plus = $import_data['0'] + $import_data['1'];
         



      ;?>