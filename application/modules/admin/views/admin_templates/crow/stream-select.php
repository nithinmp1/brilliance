                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="stream">Stream:</label>
                           <div class="col-sm-9">
                              <select name="stream_id" class="form-control mb-3">
                                 <option value="">Select Stream</option>
                                 <?php 
                                    $stream = $this->db->get('stream')->result();
                                    foreach ($stream as $key => $value) {
                                 ?>
                                    <option <?=(isset($stream_id) && $stream_id === $value->stream_id)?'selected':''?> value="<?=$value->stream_id?>"><?=$value->name?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>