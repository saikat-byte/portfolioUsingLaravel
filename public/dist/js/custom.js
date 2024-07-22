(function($){

    "use strict";

    $(".inputtags").tagsinput('items');

    $(document).ready(function() {
        $('#example1').DataTable();
    });

    $('.icp_demo').iconpicker();

    $('.datepicker').datepicker({ format: "yyyy/mm/dd" });
    $('.timepicker').timepicker({
        icons:
        {
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        }
    });

    ClassicEditor
		.create( document.querySelector( '.editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );

})(jQuery);
