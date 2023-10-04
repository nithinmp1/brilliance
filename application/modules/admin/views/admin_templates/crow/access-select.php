                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Access:</label>
                           <div class="col-sm-9">
                              <select name="accessManagement_id" class="form-control mb-3">
                                 <option >Select Access</option>
                                 <?php 
                                    $accessManagement = $this->db->get('accessmanagement')->result();
                                    foreach ($accessManagement as $key => $value) {
                                 ?>
                                    <option <?=(isset($accessManagement_id) && $accessManagement_id === $value->accessManagement_id)?'selected':''?> value="<?=$value->accessManagement_id?>"><?=$value->name?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>