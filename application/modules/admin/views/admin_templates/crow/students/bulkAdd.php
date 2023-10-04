    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"> file input</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  enctype="multipart/form-data" id="formBulk">
                            <p>Custom file:</p>
                            <div class="custom-file mb-3">
                                <input type="file" name="file" class="custom-file-input" id="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                                
                            </div>
                            <div class="custom-file mb-3" id="bar" style="margin-left: 20%; display: none" >
                                <div class="progress">
                                    <div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        <span id="current-progress"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="validation_error">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>