
<h3>Product's Report</h3>

<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <!-- <th>Image</th> -->
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Status</th>
          <th>Created</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <!-- <td><?php //echo $d->image; ?></td> -->
          <td><?php echo $d->name; ?></td>
          <td><?php echo $d->description; ?></td> 
          <td><?php echo $d->price; ?></td> 
          <td><?php echo $d->status; ?></td>    
          <td><?php echo $d->created; ?></td>  
      </tr>
      <?php } ?>
  </tbody>
</table>
<a href=<?php echo base_url('reports/generate_products_pdf/');?>>Generate Products Report</a>
</div>


<?php if($this->session->flashdata('error')):?>
<div align="center" class="col-md-8 col-md-offset-2 bg-danger" > 
   <?php echo $this->session->flashdata('error');?>
</div>
<?php endif;?>