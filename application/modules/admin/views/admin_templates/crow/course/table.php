                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Si No</th>
                                    <th style="width:20px">Course</th>
                                    <th>Price</th>
                                    <th>Duration</th>
                                    <th>Age Limit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    // echo "<pre>";print_r();die;

                                    $this->db->order_by('course_id', 'desc');
                                    $data = $this->db->get_where('course')->result();
                                    foreach ($data as $key => $value) {
                                 ?>
                                 <tr>
                                    <td><?=$key+1?></td>
                                    <td><?=$value->name?></td>
                                    <td><?=$value->price?></td>
                                    <td><?=$value->duration.' Months'?></td>
                                    <td><?=$value->age_from." - ".$value->age_to?></td>
                                    <td>
                                       <?php 
                                       if ($value->status == 1) {
                                          echo "Active";
                                       }else{
                                          echo "In-Active";
                                       }
                                       ?>
                                    </td>
                                    <td>
                                        <i class="fas fa-edit action" do="edit" pid="<?=$value->course_id?>" actionUrl="<?=$this->action['editUrl']?>" style="color: blue" ></i>
                                        <i class="fas fa-trash action" do="delete" pid="<?=$value->course_id?>" actionUrl="<?=$this->action['deleteUrl']?>" style="color: black" ></i>
                                        <!-- <i class="fas fa-user action" do="login" pid="<?=$value->course_id?>" actionUrl="<?=$this->action['loginUrl']?>" style="color: red" ></i> -->
                                    </td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             