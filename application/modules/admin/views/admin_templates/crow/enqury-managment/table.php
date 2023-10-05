                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Si No</th>
                                    <th>Profile</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Branch</th>
                                    <th>Stream</th>
                                    <th>Course</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 

                                    $this->db->order_by('id', 'desc');
                                    $this->Home_admin_model->setWhereCondition('staff', $this->user);
                                    $data = $this->db->get_where('users',['user_type' => 'potential_users' ])->result();
                                    foreach ($data as $key => $value) {
                                 ?>
                                 <tr>
                                    <td><?=$key+1?></td>
                                    <td><a target="_blank" style="text-decoration: none;" href="<?=sprintf($this->action['profileUrl'], $value->uuid)?>"><?=$value->uuid?></a></td>
                                    <td><?=$value->first_name?></td>
                                    <td><?=$value->last_name?></td>
                                    <td><?php
                                        $branch = $this->db->get_where('branch',['branch_id' => $value->branch_id])->row();
                                        echo $branch->name;
                                    ?></td>
                                    <td>
                                       <?php
                                       if(isset($value->stream_id) && $value->stream_id != ''){
                                        $stream = $this->db->get_where('stream',['stream_id' => $value->stream_id])->row();
                                        echo $stream->name;
                                       }
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       if(isset($value->course_id) && $value->course_id != ''){
                                        $course = $this->db->get_where('course',['course_id' => $value->course_id])->row();
                                        echo $course->name;
                                       }
                                       ?>
                                    </td>
                                    <td><?=$value->address?></td>
                                    <td><?=$value->mobile?></td>
                                    <td>
                                        <i class="fas fa-edit action" do="edit" pid="<?=$value->id?>" actionUrl="<?=$this->action['editUrl']?>" style="color: blue" ></i>
                                        <i class="fas fa-trash action" do="delete" pid="<?=$value->id?>" actionUrl="<?=$this->action['deleteUrl']?>" style="color: black" ></i>
                                    </td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             