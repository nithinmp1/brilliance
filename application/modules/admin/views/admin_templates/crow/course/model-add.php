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
                           $data = $this->db->get_where('course',['course_id' => $id])->row();
                           echo form_hidden('id', $id);
                        }
                        ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="name">Name:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->name))?$data->name:''?>" type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="price">Price:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->price))?$data->price:''?>" type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="duration">Duration:</label>
                           <div class="col-sm-9">
                              <input value="<?=(isset($data->duration))?$data->duration:''?>" type="text" name="duration" class="form-control" id="duration" placeholder="Enter Duration">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="age_limit">Age Limit:</label>
                           <div class="col-sm-4">
                                <!-- <label class="control-label col-sm-3 align-self-center" for="from">From:</label> -->
                               <div class="form-group">
                                 <label>From</label>
                                 <select class="form-control form-control-sm mb-3" name="ageFrom">
                                    <option selected="">Select age From</option>
                                         <?php 
                                         for ($i=16; $i < 45; $i++) {
                                         ?> 
                                          <option value="<?=$i?>"
                                             <?=(isset($data->age_from) && $i == $data->age_from)?'selected':''?>
                                             ><?=$i?></option>
                                          <?php
                                            }
                                          ?>

                                 </select>
                              </div>
                           </div>
                           <div class="col-sm-1">
                           </div>
                           <div class="col-sm-4">
                                <!-- <label class="control-label col-sm-3 align-self-center" for="from">From:</label> -->
                               <div class="form-group">
                                 <label>To</label>
                                 <select class="form-control form-control-sm mb-3" name="ageTo">
                                    <option selected="">Select age To</option>
                                         <?php 
                                         for ($i=16; $i < 45; $i++) {
                                         ?> 
                                          <option value="<?=$i?>"
                                             <?=(isset($data->age_to) && $i == $data->age_to)?'selected':''?>
                                             ><?=$i?></option>
                                          <?php
                                            }
                                          ?>

                                 </select>
                              </div>
                           </div>
                        </div>
                        <?php if (isset($id)) { ?>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="duration">Duration:</label>
                           <div class="col-sm-9">
                              <select class="form-control form-control-sm mb-3" name="status">
                                 <option value="1" <?=($data->status == 1)?'selected':''?>>Active</option>
                                 <option value="0" <?=($data->status == 0)?'selected':''?>>In-Active</option>
                              </select>
                           </div>
                        </div>
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