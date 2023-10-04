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
                        <?php
                        $data = new stdClass();
                        if (isset($id)) {
                           $data = $this->db->get_where('users',['id' => $id])->row();
                           echo form_hidden('id', $id);
                        }
                        ?>
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
                        <?php $this->load->view($this->template.'branch-select',$data) ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="address">Address:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->address))?$data->address:''?>" type="text" name="address" class="form-control" id="address" placeholder="Enter Your  Last Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="mobile">Mobile:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->mobile))?$data->mobile:''?>" type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your  Mobile Number">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="whatsapp">WhatsApp:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->whatsapp))?$data->whatsapp:''?>" type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Enter Your  WhatsApp">
                              
                           </div>
                           <div class="form-check" style="padding-left: 29%;">
                              <input class="form-check-input" type="checkbox" id="sameAsAbove">
                              <label class="form-check-label" for="sameAsAbove">
                                 use same as above
                              </label>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="Photo">Photo:</label>
                           <div class="col-sm-9">
                              <?php if (isset($id)) {  ?>
                                 <div class="square-container">
                                    <img src="<?=$this->Home_admin_model->loadImage('staff',$data->id)?>" alt="Image">
                                 </div>
                              <?php } ?>
                              <div class="custom-file">
                                 <input type="file" name="photo" class="custom-file-input" id="Photo">
                                 <label class="custom-file-label" for="Photo">Choose file</label>
                              </div>
                           </div>
                        </div>
                        <?php if (!isset($id)) {  ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Email:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->email))?$data->email:''?>" type="email" name="email" class="form-control" id="email" placeholder="Enter Your  email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="pwd1">Password:</label>
                           <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" id="pwd1" placeholder="Enter Your password">
                           </div>
                        </div >
                        <?php } ?>
                        <div id="validation_error">
                        </div>
                        <div class="form-group mb-0">
                           <button type="submit" class="btn btn-primary mr-2">Submit</button>
                           <a class="btn bg-danger" id="close-modal">Close</a>
                        </div>
                     </form>
                  </div>
               </div>                  

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

                           var fileInput = document.getElementById('Photo');
                           formData.append('file', fileInput.files[0]);

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