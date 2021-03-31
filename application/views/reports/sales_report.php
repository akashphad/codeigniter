<h3>Sales's Report</h3>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
          <th>ID</th>
          <th>Order ID</th>
          <th>Product ID </th>
          <th>Quantity</th>
          <th>SubTotal</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $d) { ?>      
      <tr>
          <td><?php echo $d->id; ?></td>
          <td><?php echo $d->order_id; ?></td>
          <td><?php echo $d->product_id; ?></td>
          <td><?php echo $d->quantity; ?></td> 
          <td><?php echo $d->sub_total; ?></td>      
    </tr>
      <?php } ?>
  
    </tbody>
</table>
<a href=<?php echo base_url('reports/generate_sales_pdf/');?>>Generate Sales Report</a>
</div>


<?php if($this->session->flashdata('error')):?>
<div align="center" class="col-md-8 col-md-offset-2 bg-danger" > 
   <?php echo $this->session->flashdata('error');?>
</div>
<?php endif;?>