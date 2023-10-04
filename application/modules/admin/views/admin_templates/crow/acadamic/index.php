      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title"><?=$title?></h4>
                     </div>
                  </div>

                  <div class="card-body" >
                     <div id="table" class="table-editable">
                        <span class="float-right mb-3 mr-2">
                        <button class="btn btn-sm bg-primary" id="open-modal"><i
                           class="ri-add-fill"><span class="pl-1">Add New</span></i>
                        </button>
                        </span>
                        <div class="table-responsive" id="ajax-table">
                           <?php  $this->load->view($this->template.'students/table'); ?>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      