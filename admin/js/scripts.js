/* everything in here will load after the document has loaded */
$(document).ready(function(){

	var user_href;
	var user_href_splitted;
	var user_id;

	var image_src;
	var image_href_splitted;
	var image_name;

	var photo_id;

	$(".modal_thumbnails").click(function(){

		//Apply Selection-button kivalasztása ID alapjan, es enabled lesz (disabled=false) (ez jQuery)
		$("#set_user_image").prop('disabled', false);

		user_href = $("#user-id").prop('href');

		user_href_splitted = user_href.split("=");

		user_id = user_href_splitted[user_href_splitted.length - 1];

		// alert(user_id);

		image_src = $(this).prop("src");

		image_href_splitted = image_src.split("/");

		// image filename
		image_name = image_href_splitted[image_href_splitted.length - 1];

		// alert(image_name);
		

		// ***** SIDEBAR ****** //

		photo_id = $(this).attr("data");

		$.ajax({

			url: "includes/ajax_code.php",
			data: {photo_id: photo_id},
			type: "POST",
			success: function(data) {

				// checking if we have any type of error
				if(!data.error) {

					$("#modal_sidebar").html(data);

				}

			}

		});

	});

	$("#set_user_image").click(function(){

		// alert(image_name);

		$.ajax({

			url: "includes/ajax_code.php",
			data: {image_name: image_name, user_id: user_id},
			type: "POST",
			success: function(data) {

				// checking if we have any type of error
				if(!data.error) {

					// alert(data);

					// location.reload(true); // page refresh to see new pic instantly

					// updating user image src with new path (so we dont nee to refresh the page)
					$(".user_image_box a img").prop('src', data);

				}

			}

		});

	});

	/*******************Edit Photo Sidebar *************/

	$(".info-box-header").click(function(){

		//alert("hello");

		$(".inside").slideToggle("fast");

		$("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon "); // changing CSS class

	});


	/*********************** Delete Function ********************/

	$(".delete_link").click(function(){

		return confirm('Are you sure you want to delete?'); // confirm photo delete

	});

	tinymce.init({selector:'textarea'});

});