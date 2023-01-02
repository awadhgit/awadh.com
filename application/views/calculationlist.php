
 <?php include('header.php') ?>
<div class="main-panel" id="main-panel">
<div class="container adminbody" >
   <?php if($this->session->flashdata('success')){ ?> <p class="alert alert-success"><?= $this->session->flashdata('success')?></p> <?php } ?>
  <a href="<?=base_url();?>" class=""> <button>CALCULATE ME</button></a>
           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Si no</th>
        <th>Saved Calculation</th>
        <th>Acton</th>
      </tr>
    </thead>
     <?php $count=1;?>
     <?php foreach(@$totalcalculation as $data){ ?>
    <tbody>
      <tr>
        <td><?= $count++; ?></td>
        <td><?= $data->calculation_item ;?></td>
     
        <td>
         <a href="<?=base_url("calculator/deleterecord/{$data->id}")?>"> <button>Delete</button></a>

        </td>
      </tr>
     <?php } ?>

    </tbody>
  </table>
</div>
</div>