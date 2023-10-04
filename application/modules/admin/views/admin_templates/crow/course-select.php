                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="course_id">Course:</label>
                           <div class="col-sm-9">
                              <select name="course_id" class="form-control mb-3">
                                 <option value="">Select Course</option>
                                 <?php 
                                    $course = $this->db->get('course')->result();
                                    foreach ($course as $key => $value) {
                                 ?>
                                    <option <?=(isset($course_id) && $course_id === $value->course_id)?'selected':''?> value="<?=$value->course_id?>"><?=$value->name?></option>
                                 <?php
                                    }
                                 ?>
                              </select>
                           </div>
                        </div>