                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Status:</label>
                           <div class="col-sm-9">
                              <select name="status" class="form-control mb-3">
                                 <option value="">Select Status</option>
                                 <?php 
                                    $Status = ['Assigned', 'Pending', "RNR", "Call Back", "Completed", "In-Active"];
                                    foreach ($Status as $key => $value) {
                                 ?>
                                    <option <?=(isset($status) &&  $status === $value)?'selected':''?> value="<?=$value?>"><?=$value?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>