                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="qualification_id">Qualification:</label>
                           <div class="col-sm-9">
                              <select name="qualification_id" class="form-control mb-3">
                                 <option value="">Select Qualification</option>
                                 <?php 
                                    $qualification = $this->db->get('qualification')->result();
                                    foreach ($qualification as $key => $value) {
                                 ?>
                                    <option <?=(isset($qualification_id) && $qualification_id === $value->qualification_id)?'selected':''?> value="<?=$value->qualification_id?>"><?=$value->name?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>