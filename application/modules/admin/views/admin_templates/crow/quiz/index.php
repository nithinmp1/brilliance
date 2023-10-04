      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title"><?=$title?></h4>
                     </div>
                  </div>

                  <div class="card-body">
                     <div id="table" class="table-editable">
                        <span class="table-add float-right mb-3 mr-2" addDataUrl="<?=$addDataUrl?>">
                        <button class="btn btn-sm bg-primary"><i
                           class="ri-add-fill"><span class="pl-1">Add New</span></i>
                        </button>
                        </span>
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                           <thead>
                              <tr>
                                 <!-- <th>No</th> -->
                                 <th>Title</th>
                                 <th>Question Count</th>
                                 <!-- <th>Total Time</th> -->
                                 <th>Result Heading</th>
                                 <th>Remove</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($data as $key => $value) { ?>
                              <tr <?php if ($key == 0) {
                                 echo 'class="hide"';
                              } ?> id=<?=$value->quiz_setup_id?> >
                                 <?php
        // die('here');

                                  /*
                                 <td columnName="SI"><?=$key+1?></td>
                                 */ ?>
                                 <td columnName="title" contenteditable="true"><?=$value->title?></td>
                                 <td columnName="questionCount" contenteditable="true"><?=$value->questionCount?></td>
                                 <td columnName="resultHead" contenteditable="true"><?=$value->resultHead?></td>
                                 <td>
                                    <span class="table-remove" deleteDataUrl="<?=$deleteDataUrl?>" id="<?=$value->quiz_setup_id?>"><button type="button"
                                       class="btn bg-danger-light btn-rounded btn-sm my-0">Remove</button></span>
                                 </td>
                              </tr>
                              <?php   } ?>
                           </tbody>
                        </table>
                     </div>
               </div>
            </div>
         </div>
      </div>