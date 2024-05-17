<?php include("header.php") ?>

<div class="container mt-3">
   
  <h2>List of images</h2>
  <h4><?php if($this->session->flashdata('success')){ ?> <p style="padding-top:20px;color:#00d54b;"><?= $this->session->flashdata('success')?></p> <?php } ?></h4>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Si No</th>
        <th>Product Name</th>
        <th>image</th>
        <th>Date</th>
        <th>Dwonload your image</th>
      </tr>
    </thead>
    <tbody>

      <?php $si=$this->uri->segment(3); foreach ($product as $imagedata) { ?>
      <tr>
        <td><?=++$si;?></td>
        <td><?=$imagedata->p_name;?></td>
        <td><img src="<?= base_url('assets/img/'.$imagedata->productimage); ?>" style="height: 300px; width:300px;"></td>
        <td><?=$imagedata->date;?></td>
        <td><a href="<?= base_url('assets/img/'.$imagedata->productimage); ?>" download="image">Download Image</a></td>
 
      </tr>
      <?php } ?>
    </tbody>
   
  </table>
   <?php echo $this->pagination->create_links(); ?>
</div>

</body>
</html>
