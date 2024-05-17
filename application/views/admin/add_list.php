<?php  include 'header.php';?>
                <div class="user-dashboard">
                  <div class="container mt-3">
   
  <h2>Address List</h2>
  <h4><?php if($this->session->flashdata('success')){ ?> <p style="padding-top:20px;color:#00d54b;"><?= $this->session->flashdata('success')?></p> <?php } ?></h4>
  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Si No</th>
          <th>image</th>
        <th>Address</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
      
        <th>Date</th>
      </tr>
    </thead>
    <tbody>

      <?php $si=$this->uri->segment(3); foreach ($useraddress as $userdata) { ?>
      <tr>
        <td><?=++$si;?></td>
        <td><img src="<?= base_url('assets/img/'.$userdata->image); ?>" style="height: 100px; width:100px;"></td>
        <td><b>Primary address:</b> <?=$userdata->p_address;?><br><b>Primary address:</b> <?=$userdata->s_address;?></td>
        <td><?=$userdata->countryname;?></td>
        <td><?=$userdata->statename;?></td>
        <td><?=$userdata->cityname;?></td>

        
        <td><?=$userdata->date;?></td>
       
 
      </tr>
      <?php } ?>
    </tbody>
   
  </table>
   <?php echo $this->pagination->create_links(); ?>
</div>

    </div>



  

</body>