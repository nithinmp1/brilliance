                            <table id="datatable-1" class="table data-table table-striped table-bordered" >
                              <thead>
                                 <tr>
                                    <th>Si No</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                    <th>Answer</th>
                                    <th>Strem</th>
                                    <th>Prilims/Main</th>
                                    <th>Grade</th>
                                    <th>Subject</th>
                                    <th>Section</th>
                                    <th>Topic/Model</th>
                                    <th>Mark/Negative</th>
                                    <?php if ($this->Home_admin_model->access('question_enable')) { ?>
                                    <th>Enabled</th>
                                    <?php } ?>
                                    <th>Options</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 

                                    $this->db->order_by('question_id', 'desc');
                                    $data = $this->db->get_where('question')->result();
                                    foreach ($data as $key => $value) {
                                 ?>
                                 <tr>
                                    <td><?=$key+1?></td>
                                    <td><?=$value->question?></td>
                                    <td>
                                       <ul>
                                       <li><?=$value->option1?></li>
                                       <li><?=$value->option2?></li>
                                       <li><?=$value->option3?></li>
                                       <li><?=$value->option4?></li>
                                       </ul>
                                    </td>
                                    <td><?=$value->answer?></td>
                                    <td><?php
                                        $stream = $this->db->get_where('stream',['stream_id' => $value->stream_id])->row();
                                        echo $stream->name;
                                    ?></td>
                                    <td>
                                       <?=($value->prilims)?'Prilims':''?>
                                       <?=($value->prilims && $value->main)?'&':''?>
                                       <?=($value->main)?'Main':''?>
                                    </td>
                                    <td>
                                       <?=($value->sslc)?'SSLC':''?>
                                       <?=($value->sslc && $value->hsc)?'&':''?>
                                       <?=($value->hsc)?'HSC':''?>
                                       <?=(($value->sslc && $value->degree) || ($value->hsc && $value->degree)  )?'&':''?>
                                       <?=($value->degree)?'Degree':''?>
                                    </td>
                                    <td>
                                       <?php
                                       $subject = $this->db->get_where('subject',['subject_id' => $value->subject_id])->row();
                                       echo $subject->name;
                                       ?>
                                    </td>
                                    <td>
                                       <?php
                                       $section = $this->db->get_where('section',['section_id' => $value->section_id])->row();
                                       echo $section->name;
                                       ?>
                                    </td>
                                    <td>
                                       <?=($value->topic)?'Topic':''?>
                                       <?=($value->topic && $value->model)?'&':''?>
                                       <?=($value->model)?'Model':''?>
                                    </td>
                                    <td>
                                       <?=$value->mark?>
                                       <?=(isset($value->mark) && isset($value->negative_mark))?'/':''?>
                                       <?=$value->negative_mark?>
                                    </td>
                                    <?php if ($this->Home_admin_model->access('question_enable')) { ?>
                                    <td>
                                       <a href="<?=$this->action['statusUpdate'].'/'.$value->question_id?>">
                                       <?php 
                                       ?>
                                       <?=($value->enabled_for_quiz == 1)?'Enabled':'Disabled'?>
                                       </a>
                                    </td>
                                    <?php } ?>
                                    <td>
                                        <!-- <i class="fas fa-edit action" do="edit" pid="<?=$value->question_id?>" actionUrl="<?=$this->action['editUrl']?>" style="color: blue" ></i> -->
                                        <i class="fas fa-trash action" do="delete" pid="<?=$value->question_id?>" actionUrl="<?=$this->action['deleteUrl']?>" style="color: black" ></i>
                                        <i class="fas fa-eye action" do="view" pid="<?=$value->question_id?>" actionUrl="<?=$this->action['viewUrl']?>" style="color: black" ></i>
                                    </td>
                                 </tr>
                                 <?php } ?>
                           </table>
                           
                           
                             