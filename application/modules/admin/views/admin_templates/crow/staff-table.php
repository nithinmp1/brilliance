                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Si No</th>
                                    <th style="width:20px">Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Branch</th>
                                    <th>Access</th>
                                    <th>Address</th>
                                    <!-- <th>Mobile</th> -->
                                    <th>WhatsApp</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    // echo "<pre>";print_r();die;

                                    $this->db->order_by('id', 'desc');
                                    $data = $this->db->get_where('users',['user_type' => 'staff' ])->result();
                                    foreach ($data as $key => $value) {
                                 ?>
                                 <tr>
                                    <td><?=$key+1?></td>
                                    <td>
                                        <img class="img-fluid " style="max-width: 44%;" src="<?=$this->Home_admin_model->loadImage('staff',$value->id)?>" >
                                    </td>
                                    <td><?=$value->first_name?></td>
                                    <td><?=$value->last_name?></td>
                                    <td><?php
                                        $branch = $this->db->get_where('branch',['branch_id' => $value->branch_id])->row();
                                        echo $branch->name;
                                    ?></td>
                                    <td><?php
                                        $accessmanagement = $this->db->get_where('accessmanagement',['accessManagement_id' => $value->accessManagement_id])->row();
                                        echo $accessmanagement->name;                                    
                                    ?></td>
                                    <td><?=$value->address?></td>
                                    <!-- <td><?=$value->mobile?></td> -->
                                    <td><?=$value->whatsapp?></td>
                                    <td><?=$value->email?></td>
                                    <td>
                                        <i class="fas fa-edit action" do="edit" pid="<?=$value->id?>" actionUrl="<?=$this->action['editUrl']?>" style="color: blue" ></i>
                                        <i class="fas fa-trash action" do="delete" pid="<?=$value->id?>" actionUrl="<?=$this->action['deleteUrl']?>" style="color: black" ></i>
                                        <!-- <i class="fas fa-user action" do="login" pid="<?=$value->id?>" actionUrl="<?=$this->action['loginUrl']?>" style="color: red" ></i> -->
                                    </td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             