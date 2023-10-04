                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="stream">
                              <?php  
                              if ($this->uri->segment(1) === 'enqury-managment') {
                                 echo "Assign To :";
                              } else {
                                 echo "Staff :";
                              } 
                              ?>
                           </label>
                           <div class="col-sm-9">
                              <select name="staff_id[]" class="form-control mb-3">
                                 <option value="">Select Staff</option>
                                 <?php 
                                    $staff = $this->db->get_where('users',['user_type' => 'staff'])->result();
                                    foreach ($staff as $key => $value) {
                                 ?>
                                    <option <?=(isset($staff_id) && $staff_id === $value->id)?'selected':''?> value="<?=$value->id?>"><?=$value->username.'('.$value->uuid.')'?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>
                     