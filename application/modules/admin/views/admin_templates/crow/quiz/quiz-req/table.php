                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Si No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Score</th>
                                    <th>Place</th>
                                    <th>Created At</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 

                                    $this->db->order_by('quiz_req_id', 'desc');
                                    $data = $this->db->get('quiz_req')->result();
                                    foreach ($data as $key => $value) {
                                       // echo "<pre>";print_r($value);die;
                                 ?>
                                 <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value->firstname; ?></td>
                                    <td><?=$value->mobile?></td>
                                    <td><?=$value->email?></td>
                                    <td><?=$value->score?></td>
                                    <td><?=$value->region?>, <?=$value->city?></td>
                                    <td><?=$value->created_at?></td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             