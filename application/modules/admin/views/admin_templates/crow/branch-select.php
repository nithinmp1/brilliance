                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Branch:</label>
                           <div class="col-sm-9">
                              <select name="branch_id" class="form-control mb-3">
                                 <option value="">Select Branch</option>
                                 <?php 
                                    $branch = $this->db->get('branch')->result();
                                    foreach ($branch as $key => $value) {
                                 ?>
                                    <option <?=(isset($branch_id) && $branch_id === $value->branch_id)?'selected':''?> value="<?=$value->branch_id?>"><?=$value->name?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>