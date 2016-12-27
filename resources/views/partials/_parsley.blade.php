	<script type="text/javascript">
	    $('button#delete').on('click', function(e){
	        e.preventDefault();
	        var self = $(this);
	        swal({
	            title             : "Estás seguro?",
	            //text              : "You will not be able to recover this Album!",
	            type              : "warning",
	            showCancelButton  : true,
	            confirmButtonColor: "#DD6B55",
	            confirmButtonText : "Si, quiero eliminar!",
	            cancelButtonText  : "No",
	            closeOnConfirm    : false,
	            closeOnCancel     : false
	        },
	        function(isConfirm){
	            if(isConfirm){
	                swal("Eliminado correctamente!", "", "success");
	                setTimeout(function() {
	                    self.parents("#formPrevent").submit();
	                }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
	            }
	            else{
	                  swal("Nada se ha eliminado!","", "error");
	            }
	        });
	    });
		 $('button#deleteArticle').on('click', function(e){
	        e.preventDefault();
	        var self = $(this);
	        swal({
	            title             : "Estás seguro?",
	            //text              : "You will not be able to recover this Album!",
	            type              : "warning",
	            showCancelButton  : true,
	            confirmButtonColor: "#DD6B55",
	            confirmButtonText : "Si, quiero eliminar!",
	            cancelButtonText  : "No",
	            closeOnConfirm    : false,
	            closeOnCancel     : false
	        },
	        function(isConfirm){
	            if(isConfirm){
	                swal("Eliminado correctamente!", "", "success");
	                setTimeout(function() {
	                    self.parents("#formPreventArticle").submit();
	                }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
	            }
	            else{
	                  swal("Nada se ha eliminado!","", "error");
	            }
	        });
	    });

	     $('#formVideos').parsley();
</script>
