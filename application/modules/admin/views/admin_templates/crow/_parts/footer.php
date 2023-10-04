</div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        Copyright
                        <script>document.write(new Date().getFullYear())</script>© <a href="#" class="">Brilliance</a>
                        All Rights Reserved.
                    </span>
                </div>
            </div>
        </div>
    </footer>    <!-- Backend Bundle JavaScript -->
    <div class="overlay"></div>
    <div class="modal">
        <div class="modal-content">
            <!-- Content of the modal goes here -->
            <h2>Modal Title</h2>
            <p>This is the modal content.</p>
        </div>
    </div>
    <!-- Include jQuery and Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!-- Include Bootstrap-datepicker JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

    <script src="<?=site_url('assets/js/backend-bundle.min.js')?>"></script>
    <!-- Chart Custom JavaScript -->
    <script src="<?=site_url('assets/js/customizer.js')?>"></script>
    
    <script src="<?=site_url('assets/js/sidebar.js')?>"></script>
    
    <!-- Flextree Javascript-->
    <script src="<?=site_url('assets/js/flex-tree.min.js')?>"></script>
    <script src="<?=site_url('assets/js/tree.js')?>"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="<?=site_url('assets/js/table-treeview.js')?>"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="<?=site_url('assets/js/sweetalert.js')?>"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="<?=site_url('assets/js/vector-map-custom.js')?>"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="<?=site_url('assets/js/chart-custom.js')?>"></script>
    <script src="<?=site_url('assets/js/charts/01.js')?>"></script>
    <script src="<?=site_url('assets/js/charts/02.js')?>"></script>
    
    <!-- slider JavaScript -->
    <script src="<?=site_url('assets/js/slider.js')?>"></script>
    <script src="<?=site_url('assets/js/table-action.js')?>"></script>
    <script src="<?=site_url('assets/js/multiselect.js')?>"></script>
    
    <!-- Emoji picker -->
    <script src="<?=site_url('assets/vendor/emoji-picker-element/index.js')?>" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="<?=site_url('assets/js/app.js')?>"></script>
    <script>
        $(document).ready(function () {
            $('#table td[contenteditable="true"]').blur(function () {
                const cell = $(this);
                const column = cell.index();
                const row = cell.closest('tr');
                const id = row.find('td:eq(0)').text();
                const field = row.find('td:eq(' + column + ')').text();
                var varId = row.attr("id");
                var columnName = cell.attr("columnName");
                URL = "<?=$updateUrl?>";

                $.ajax({
                    url: URL, // Replace with your server-side script
                    method: 'POST',
                    data: {
                        id: varId,
                        columnName: columnName,
                        field: field
                    },
                    success: function (response) {
                        // Handle the server response (e.g., show a success message)
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        // script.js
        $(document).ready(function() {
            // Open modal
            $("#open-modal").click(function() {
                $(".modal, .overlay").fadeIn();
            });

            // Close modal
            $("#close-modal").click(function() {
                $(".modal, .overlay").fadeOut();
            });
            $(".close-modal").click(function() {
                console.log('hit');
                $(".modal").css("display", "none");
            });
        });
        // Load dynamic content into modal
        $("#open-modal").click(function() {
            $.ajax({
                url: "<?=$this->action['addUrl']?>", // Replace with your PHP script
                dataType: 'json',
                data: 'type=model',
                type: 'get',
                success: function(data) {
                    $(".modal-content").html(data.result);
                    $(".modal, .overlay").fadeIn();
                }
            });
        });

        $('#formBulk').submit(function(e) {
            e.preventDefault(); 
            var formData = new FormData();
            var serializedData  = $(this).serializeArray();
            $.each(serializedData, function(index, item) {
                formData.append(item.name, item.value);
            });

            var fileInput = document.getElementById('file');
            formData.append('file', fileInput.files[0]);

            $.ajax({
                type: 'POST',
                url: '',
                processData: false, 
                contentType: false, 
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $("#validation_error").html(response.message);
                    setTimeout(function() {
                        $('#validation_error').fadeOut();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                },

            });
        });

        $(function() {
        });

        $(document).click(function(event) {
            var modal = $('.modal');
            // Check if the click event occurred outside the modal
            if (!modal.is(event.target) && modal.has(event.target).length === 0) {
                var overlay = $('.overlay');
                modal.hide();
                overlay.remove();
            }
        });

        // $(document).ready(function() {
        //   $('#datepicker').datepicker();
        // });
    </script>

    </body>


</html>