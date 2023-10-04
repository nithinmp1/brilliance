                <div class="card">
                  <div class="card-header d-flex justify-content-between text-center">
                     <div class="header-title ">
                        <h4 class="card-title"><?=strtoupper( str_replace('_', ' ', $title))?></h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form class="form-horizontal" method="post" id="form">
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">First Name:</label>
                           <div class="col-sm-9">
                              <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter Your  First Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Last Name:</label>
                           <div class="col-sm-9">
                              <input type="text" name="last_name" class="form-control" id="first_name" placeholder="Enter Your  Last Name">
                           </div>
                        </div>
                        <?php $this->load->view('admin_templates/crow/branch-select') ?>
                        <?php $this->load->view('admin_templates/crow/access-select') ?>
                        

                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Address:</label>
                           <div class="col-sm-9">
                              <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your  Last Name">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Mobile:</label>
                           <div class="col-sm-9">
                              <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your  email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">WhatsApp:</label>
                           <div class="col-sm-9">
                              <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Enter Your  WhatsApp">
                              
                           </div>
                           <div class="form-check" style="padding-left: 29%;">
                              <input class="form-check-input" type="checkbox" id="exampleCheckbox">
                              <label class="form-check-label" for="exampleCheckbox">
                                  Check this custom checkbox
                              </label>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Photo:</label>
                           <div class="col-sm-9">
                              <div class="custom-file">
                                 <input type="file" name="photo" class="custom-file-input" id="Photo">
                                 <label class="custom-file-label" for="Photo">Choose file</label>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="email">Email:</label>
                           <div class="col-sm-9">
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your  email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="control-label col-sm-3 align-self-center" for="pwd1">Password:</label>
                           <div class="col-sm-9">
                              <input type="password" name="password" class="form-control" id="pwd1" placeholder="Enter Your password">
                           </div>
                        </div >
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

                          // Serialize the form data into a JSON object
                          var formData = $(this).serializeArray();

                          // Send an AJAX POST request to your CodeIgniter controller
                          $.ajax({
                              type: 'POST',
                              url: '<?=$actionUrl?>',
                              data: formData,
                              dataType: 'json',
                              success: function(response) {
                                 if(response.status){
                                    console.log('hitr');
                                    $("#ajax-table").html(response.result);
                                    $("#close-modal").trigger('click');
                                    $('#datatable-1').DataTable();
                                 }else{
                                    $("#validation_error").html(response.result);
                                 }
                              },
                              error: function(xhr, status, error) {
                                  console.error(xhr.responseText);
                              }
                          });
                      });
                  });

               </script>