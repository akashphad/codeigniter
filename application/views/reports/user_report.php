<h3>User's Report</h3>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Phone Number</th>
          <th>Created</th>
          <!-- <th>Description</th>  -->
      <!-- <th>Action</th> -->
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->id; ?></td>
          <td><?php echo $d->first_name; ?></td>
          <td><?php echo $d->last_name; ?></td>
          <td><?php echo $d->email; ?></td> 
          <td><?php echo $d->gender; ?></td> 
          <td><?php echo $d->phone; ?></td>
          <td><?php echo $d->created; ?></td> 
         
    </tr>
      <?php } ?>
  
    </tbody>
</table>
<a href=<?php echo base_url('reports/generate_user_pdf/');?>>Generate User Report</a>
</div>


<?php if($this->session->flashdata('error')):?>
<div align="center" class="col-md-8 col-md-offset-2 bg-danger" > 
   <?php echo $this->session->flashdata('error');?>
</div>
<?php endif;?>