               <style>
                  .square-container {
                     width: 200px; /* Adjust the size as needed */
                     height: 200px; /* Adjust the size as needed */
                     overflow: hidden; /* Clips the image inside the square */
                  }

                  .square-container img {
                     width: 100%;
                     height: 100%;
                     object-fit: cover; /* Maintains the aspect ratio and covers the square */
                  }
                  </style>
               <div class="card">
                  <div class="card-header d-flex justify-content-between text-center">
                     <div class="header-title ">
                        <h4 class="card-title"><?=strtoupper( str_replace('_', ' ', $title))?></h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form class="form-horizontal" enctype="multipart/form-data"  method="post" id="form<?=(isset($id)?'-edit':'')?>">
                        <?php $this->load->view($this->template.'token') ?>
                        <?php
                        $data = new stdClass();
                        if (isset($id)) {
                           $data = $this->db->get_where('users',['id' => $id])->row();
                           echo form_hidden('id', $id);
                        }
                        ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Email:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->email))?$data->email:''?>" type="email" name="email" class="form-control" id="email" placeholder="Enter Your  email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="mobile">Mobile Number:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->mobile))?$data->mobile:''?>" type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="first_name">First Name:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->first_name))?$data->first_name:''?>" type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter Your  First Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="last_name">Last Name:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->last_name))?$data->last_name:''?>" type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Your  Last Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="address">Address:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->address))?$data->address:''?>" type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                           </div>
                        </div>
                        <?php if (!isset($id)) { ?>
                        <?php $this->load->view($this->template.'branch-select',$data) ?>
                        <?php $this->load->view($this->template.'stream-select',$data) ?>
                        <?php $this->load->view($this->template.'course-select',$data) ?>
                        <?php $this->load->view($this->template.'qualification-select',$data) ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="dob">DOB:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->dob))?$data->dob:''?>" type="date" name="dob" class="form-control"  id="dob">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="callback">Call Back:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->callback))?$data->callback:''?>" type="date" name="callback" class="form-control"  id="datepicker">
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="remark">Remark:</label>
                           <div class="col-sm-9">
                              <textarea class="form-control" id="remark" name="remark" rows="4" cols="50">
                                 <?=(isset($data->remark))?$data->remark:''?>
                              </textarea>
                           </div>
                        </div>
                        <?php } ?>
                        <?php $this->load->view($this->template.'staff-select',$data) ?>
                        <div id="validation_error">
                        </div>
                        <div class="form-group mb-0">
                           <button type="submit" class="btn btn-primary mr-2">Submit</button>
                           <a class="btn bg-danger" id="close-modal">Close</a>
                        </div>
                     </form>
                  </div>
               </div>                  
                     <script src="https://exam.brilliance.college/assets/js/multiselect.js"></script>
               
               <script type="text/javascript">
                  $("#close-modal").click(function() {
                      $(".modal, .overlay").fadeOut();
                  });


                  $(document).ready(function() {
                      $('#form').submit(function(e) {
                          e.preventDefault(); // Prevent the default form submission
                          var formData = new FormData();
                          // Serialize the form data into a JSON object
                          var serializedData  = $(this).serializeArray();
                           $.each(serializedData, function(index, item) {
                             formData.append(item.name, item.value);
                           });

                           // var fileInput = document.getElementById('Photo');
                           // formData.append('file', fileInput.files[0]);

                           $.ajax({
                              type: 'POST',
                              url: '<?=$this->action['addUrl']?>',
                              processData: false, // Prevent jQuery from processing the data
                              contentType: false, // Prevent jQuery from setting the content type
                              data: formData,
                              dataType: 'json',
                              success: function(response) {
                                 if(response.status){
                                    $("#ajax-table").html(response.result);
                                    $("#close-modal").trigger('click');
                                    $('#datatable-1').DataTable();
                                 }else{
                                    $("#validation_error").html(response.result);
                                 }

                                 fetch('<?=site_url('assets/js/table-action.js')?>')
                                 .then(response => response.text())
                                 .then(scriptContent => {
                                    var script = document.createElement('script');
                                    script.type = 'text/javascript';
                                    script.text = scriptContent; // Set the script content to the fetched script
                                    document.body.appendChild(script);
                                 })
                                 .catch(error => {
                                    console.error('Error loading script:', error);
                                 });
                              },
                              error: function(xhr, status, error) {
                                  console.error(xhr.responseText);
                              }
                          });
                      });


                      $('#form-edit').submit(function(e) {
                          e.preventDefault(); // Prevent the default form submission
                          var formData = new FormData();
                          var serializedData  = $(this).serializeArray();
                           $.each(serializedData, function(index, item) {
                             formData.append(item.name, item.value);
                           });

                           var fileInput = document.getElementById('Photo');
                           formData.append('file', fileInput.files[0]);

                           $.ajax({
                              type: 'POST',
                              url: '<?=$this->action['updateUrl']?>',
                              processData: false, // Prevent jQuery from processing the data
                              contentType: false, // Prevent jQuery from setting the content type
                              data: formData,
                              dataType: 'json',
                              success: function(response) {
                                 if(response.status){
                                    $("#ajax-table").html(response.result);
                                    $("#close-modal").trigger('click');
                                    $('#datatable-1').DataTable();
                                 }else{
                                    $("#validation_error").html(response.result);
                                 }

                                 // Make an AJAX request to fetch an external script
                                 fetch('<?=site_url('assets/js/table-action.js')?>')
                                 .then(response => response.text())
                                 .then(scriptContent => {
                                    var script = document.createElement('script');
                                    script.type = 'text/javascript';
                                    script.text = scriptContent; // Set the script content to the fetched script
                                    document.body.appendChild(script);
                                 })
                                 .catch(error => {
                                    console.error('Error loading script:', error);
                                 });

                              },
                              error: function(xhr, status, error) {
                                  console.error(xhr.responseText);
                              }
                          });
                      });
                  });

                  $("#sameAsAbove").click(function() {
                     var parentFormGroup = $(this).closest(".form-group");
                     var secondFormGroup = parentFormGroup.prev("div");
                     var inputElement = secondFormGroup.find("input[type='text']");
                     var inputValue = inputElement.val();

                     parentFormGroup.find("input[type='text']").val(inputValue);
                  });



               </script>
