<!DOCTYPE html>
<html>
<head>
    <title>Create </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h2>Fill the Details of New Product: </h2>

<script>
function validateForm() {
  var x = document.forms["createproduct"]["name"].value;
  if (x == "" ) {
    alert("Name must be filled out");
    return false;
  }

  var x = document.forms["createproduct"]["description"].value;
  if (x == "") {
    alert("Description must be filled out");
    return false;
  }

  var x = document.forms["createproduct"]["price"].value;
  if (x == "" || isNaN(x)) {
    alert("Valid Price must be filled out");
    return false;
  }

  var x = document.forms["createproduct"]["image"].value;
  if (x == "") {
    alert("Description must be filled out");
    return false;
  }

  var x = document.forms["createproduct"]["status"].value;
  if (x == "") {
    alert("Status must be filled out");
    return false;
  }
}
</script>


<form name="createproduct" method="post" onsubmit="return validateForm()" action="<?php echo base_url('productsCreate'); ?>"  >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Name</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Description</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Price</label>
                <div class="col-md-9">
                    <input type="text" name="price" class="form-control">
                </div>
            </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Image Name</label>
                <div class="col-md-9">
                    <input type="text" name="image" class="form-control">
                </div>
            </div>    
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Status</label>
                <div class="col-md-9">
                    <input type="number" min="0" max="1"name="status" class="form-control">
                </div>
            </div>    
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn">
        </div>
    </div>
    
</form>

<?php if($this->session->flashdata('error')):?>
<div align="center" class="col-md-8 col-md-offset-2 bg-danger" > 
   <?php echo $this->session->flashdata('error');?>
</div>
<?php endif;?>