$(".action").click(function() {
   if ($(this).attr('do') === 'edit') {
      $(".modal, .overlay").fadeIn();
      URL = $(this).attr('actionUrl');
      ID = $(this).attr('pid');
      $.ajax({
         url: URL, 
         dataType: 'json',
         data: 'type=model&id='+ID,
         type: 'get',
         success: function(data) {
            $(".modal-content").html(data.result);
            $(".modal, .overlay").fadeIn();
         }
      });
   }

   if ($(this).attr('do') === 'view') {
      $(".modal, .overlay").fadeIn();
      URL = $(this).attr('actionUrl');
      ID = $(this).attr('pid');
      $.ajax({
         url: URL, 
         dataType: 'json',
         data: 'type=model&id='+ID,
         type: 'get',
         success: function(data) {
            $(".modal-content").html(data.result);
            $(".modal, .overlay").fadeIn();
            fetch('http://localhost/brilliance/assets/js/table-action.js')
            .then(response => response.text())
            .then(scriptContent => {
               var script = document.createElement('script');
               script.type = 'text/javascript';
               script.text = scriptContent; 
               document.body.appendChild(script);
            })
            .catch(error => {
               console.error('Error loading script:', error);
            });
         }
      });
   }

   if ($(this).attr('do') === 'delete') {
      URL = $(this).attr('actionUrl');
      ID = $(this).attr('pid');
      $.ajax({
         url: URL, 
         dataType: 'json',
         data: 'id='+ID,
         type: 'get',
         success: function(response) {
            $("#ajax-table").html(response.result);
            $('#datatable-1').DataTable();
            fetch('http://localhost/brilliance/assets/js/table-action.js')
            .then(response => response.text())
            .then(scriptContent => {
               var script = document.createElement('script');
               script.type = 'text/javascript';
               script.text = scriptContent; 
               document.body.appendChild(script);
            })
            .catch(error => {
               console.error('Error loading script:', error);
            });
         }
      });
   }
});