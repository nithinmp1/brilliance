                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Mobile</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Follow On</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 

                                    $this->db->order_by('id', 'desc');
                                    $this->Home_admin_model->setWhereCondition('staff', $this->user);
                                    $user_ids = $this->db->select('id')->get_where('users',['user_type' => 'potential_users' ])->result();
                                    $user_ids = array_column($user_ids,'id');

                                    $data = [];

                                    if (isset($user_ids) && !empty($user_ids)) {
                                       if (isset($param1)) {

                                          if ($param1 == 'active') {
                                             $this->db->where('status !=' , 'Completed' );
                                          }
                                       }
                                       $data = $this->db->where_in('user_id', $user_ids)->get_where('follow_up')->result();
                                    }
                                    foreach ($data as $key => $value) {
                                    $user = $this->db->get_where('users', ['id' => $value->user_id])->row();
                                    
                                    if (!isset($user) || empty($user)) {
                                       continue;
                                    }
                                 ?>
                                 <tr>
                                    <td>
                                       <a target="_blank" style="text-decoration: none;" href="<?=sprintf($this->action['profileUrl'], $user->uuid)?>"><?=$user->uuid?></a>
                                    </td>
                                    <td><?=$user->first_name?> <?=$user->last_name?></td>
                                    <td>
                                       <?php
                                       if(isset($value->course_id) && $value->course_id != ''){
                                        $course = $this->db->get_where('course',['course_id' => $value->course_id])->row();
                                        echo $course->name;
                                       }
                                       ?>
                                    </td>
                                    <td><?=$user->mobile?></td>
                                    <td><?=$value->remark?></td>
                                    <td><?=$value->status?></td>
                                    <td><?=$value->callback_on?></td>
                                    <td>
                                       <ul>
                                       <?php
                                       $assigned_to = json_decode($user->assigned_to, TRUE);
                                       $assignedTo = $this->db->where_in('id',$assigned_to)->get_where('users')->result();
                                       foreach ($assignedTo as $staff) { ?>
                                          <li style="list-style: none;"><?=$staff->username?> (<?=$staff->uuid?>)</li>
                                       <?php } ?>
                                       </ul>
                                    </td>
                                    <td>
                                        <i class="fas fa-edit action" do="edit" pid="<?=$value->follow_up_id?>" actionUrl="<?=$this->action['editUrl']?>" style="color: blue" ></i>
                                        <i class="fas fa-trash action" do="delete" pid="<?=$value->follow_up_id?>" actionUrl="<?=$this->action['deleteUrl']?>" style="color: black" ></i>
                                        <i class="fas fa-plus action" do="add" pid="<?=$value->follow_up_id?>" actionUrl="<?=$this->action['appendNew']?>" style="color: black" ></i>
                                    </td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             