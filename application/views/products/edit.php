<h2>Edit the Details of the Available Product: </h2>
<script>
function validateForm() {
  var x = document.forms["editproducts"]["name"].value;
  if (x == "" ) {
    alert("Name must be filled out");
    return false;
  }

  var x = document.forms["editproducts"]["description"].value;
  if (x == "") {
    alert("Description must be filled out");
    return false;
  }

  var x = document.forms["editproducts"]["price"].value;
  if (x == "" || isNaN(x)) {
    alert("Valid Price must be filled out");
    return false;
  }

  var x = document.forms["editproducts"]["image"].value;
  if (x == "") {
    alert("Image Name must be filled out");
    return false;
  }

  var x = document.forms["editproducts"]["status"].value;
  if (x == "") {
    alert("Status must be filled out");
    return false;
  }
}
</script>
<form name="editproducts" onsubmit="return validateForm()" method="post" action="<?php echo base_url('AdminProducts/update/'.$product->id);?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Name</label>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" value="<?php echo $product->name; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Description</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control"><?php echo $product->description; ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Price</label>
                <div class="col-md-9">
                    <input type="text" name="price" class="form-control"value="<?php echo $product->price; ?>">
                </div>
            </div>
            </div>    
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Product Image</label>
                <div class="col-md-9">
                    <input type="text" name="image"class="form-control" value="<?php echo $product->image; ?>">
                </div>
            </div>    
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Status</label>
                <div class="col-md-9">
                    <input type="number" min="0" max="1" name="status" class="form-control" value="<?php echo $product->status; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn">
        </div>
    </div>
    
</form>


