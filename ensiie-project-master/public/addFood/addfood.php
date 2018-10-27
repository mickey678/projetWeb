<div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
</div> 
<?php

$userJSON["mickey"] = ["salut","mickey"];
 echo json_encode($userJSON, JSON_PRETTY_PRINT);

 ?>