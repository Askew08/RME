<?php if($crud->hasAccess('delete', $entry)): ?>
    <a href="javascript:void(0)" onclick="deleteEntry(this)" bp-button="delete" data-route="<?php echo e(url($crud->route.'/'.$entry->getKey())); ?>" class="btn btn-sm btn-link" data-button-type="delete">
        <i class="la la-trash"></i> <span><?php echo e(trans('backpack::crud.delete')); ?></span>
    </a>
<?php endif; ?>




<?php $__env->startPush('after_scripts'); ?> <?php if(request()->ajax()): ?> <?php $__env->stopPush(); ?> <?php endif; ?>
<?php $bassetBlock = 'backpack/crud/buttons/delete-button-'.app()->getLocale().'.js'; ob_start(); ?>
<script>

	if (typeof deleteEntry != 'function') {
	  $("[data-button-type=delete]").unbind('click');

	  function deleteEntry(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var route = $(button).attr('data-route');

		swal({
		  title: "<?php echo trans('backpack::base.warning'); ?>",
		  text: "<?php echo trans('backpack::crud.delete_confirm'); ?>",
		  icon: "warning",
		  buttons: {
		  	cancel: {
				text: "<?php echo trans('backpack::crud.cancel'); ?>",
				value: null,
				visible: true,
				className: "bg-secondary",
				closeModal: true,
			},
			delete: {
				text: "<?php echo trans('backpack::crud.delete'); ?>",
				value: true,
				visible: true,
				className: "bg-danger",
				},
			},
		  dangerMode: true,
		}).then((value) => {
			if (value) {
				$.ajax({
			      url: route,
			      type: 'DELETE',
			      success: function(result) {
			          if (result == 1) {
						  // Redraw the table
						  if (typeof crud != 'undefined' && typeof crud.table != 'undefined') {
							  // Move to previous page in case of deleting the only item in table
							  if(crud.table.rows().count() === 1) {
							    crud.table.page("previous");
							  }

							  crud.table.draw(false);
						  }

			          	  // Show a success notification bubble
			              new Noty({
		                    type: "success",
		                    text: "<?php echo '<strong>'.trans('backpack::crud.delete_confirmation_title').'</strong><br>'.trans('backpack::crud.delete_confirmation_message'); ?>"
		                  }).show();

			              // Hide the modal, if any
			              $('.modal').modal('hide');
			          } else {
			              // if the result is an array, it means 
			              // we have notification bubbles to show
			          	  if (result instanceof Object) {
			          	  	// trigger one or more bubble notifications 
			          	  	Object.entries(result).forEach(function(entry, index) {
			          	  	  var type = entry[0];
			          	  	  entry[1].forEach(function(message, i) {
					          	  new Noty({
				                    type: type,
				                    text: message
				                  }).show();
			          	  	  });
			          	  	});
			          	  } else {// Show an error alert
				              swal({
				              	title: "<?php echo trans('backpack::crud.delete_confirmation_not_title'); ?>",
	                            text: "<?php echo trans('backpack::crud.delete_confirmation_not_message'); ?>",
				              	icon: "error",
				              	timer: 4000,
				              	buttons: false,
				              });
			          	  }			          	  
			          }
			      },
			      error: function(result) {
			          // Show an alert with the result
			          swal({
		              	title: "<?php echo trans('backpack::crud.delete_confirmation_not_title'); ?>",
                        text: "<?php echo trans('backpack::crud.delete_confirmation_not_message'); ?>",
		              	icon: "error",
		              	timer: 4000,
		              	buttons: false,
		              });
			      }
			  });
			}
		});

      }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
<?php Basset::bassetBlock($bassetBlock, ob_get_clean()); ?>
<?php if(!request()->ajax()): ?> <?php $__env->stopPush(); ?> <?php endif; ?>
<?php /**PATH D:\Dzaky\Kuliah\Semester6\SIRS\SIMRS\vendor\backpack\crud\src\resources\views\crud/buttons/delete.blade.php ENDPATH**/ ?>