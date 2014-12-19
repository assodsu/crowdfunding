$(function () {
	function resetSearch() {
		var $form = $('.navbar-collapse form[role="search"].active')
		$form.find('input').val('');
	}

	// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
	$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$form.addClass('active');
		$input.focus();

	});

    // there's the gallery and the trash
    var $gallery = $( "#vignettes" ),
      $trash = $( "#search" );
 
    // let the gallery items be draggable
    $( "li", $gallery ).draggable({
      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
      revert: "invalid", // when not dropped, the item will revert back to its initial position
      containment: "document",
      helper: "clone"
    });
 
    // let the trash be droppable, accepting the gallery items
    $trash.droppable({
      accept: "#vignettes > li",
      activeClass: "ui-state-highlight",
      drop: function( event, ui ) {
        deleteImage( ui.draggable );
        recycleImage( ui.draggable );
      }
    });
 
    // let the gallery be droppable as well, accepting items from the trash
    $gallery.droppable({
      accept: "#search li",
      activeClass: "custom-state-active",
      drop: function( event, ui ) {
        recycleImage( ui.draggable );
      }
    });
 
    // image deletion function
    var recycle_icon = "<span class='glyphicon glyphicon-remove'></span>";
    function deleteImage( $item ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $trash ).length ?
          $( "ul", $trash ) :
          $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
        $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
          $item.find( "img" );
        });
		document.getElementById("search").value = document.getElementById("search").value + $item.attr("value") + " ";
      });
    }
 
    // image recycle function
    function recycleImage( $item ) {
      $item.fadeOut(function() {
        $item
          .find( "span.glyphicon-remove" )
            .remove()
          .end()
          .appendTo( $gallery )
          .fadeIn()
		  .css('margin', '2.5px');
      });
    }
  });