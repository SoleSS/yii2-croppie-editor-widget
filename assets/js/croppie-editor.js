document.addEventListener("DOMContentLoaded", function(event) { 

    $('a.edit-btn').click(function() {
	$(this).toggleClass('hide');
	$(this).parent().find('.save-btn').toggleClass('hide');
	$(this).parent().find('.cancel-btn').toggleClass('hide');
	$(this).parent().parent().find('.edit-controls').toggleClass('hide');

	var width = $(this).parent().parent().attr('data-photoWidth');
	var height = $(this).parent().parent().attr('data-photoHeight');
	initCroppie($(this).parent().parent().find('.image'), width, height);

	return false;
    });

    $('input.croppie-file').change(function(click) {
        var file = $(this).get(0).files[0];
        var $target = $(this).parent().find('.image');

	var width = $(this).parent().attr('data-photoWidth');
	var height = $(this).parent().attr('data-photoHeight');

	photoUpload(file, $target, width, height);
        return false;
    });

    $('a.save-btn').click(function() {
        $(this).toggleClass('hide');
	$(this).parent().find('.cancel-btn').toggleClass('hide');
        $(this).parent().find('.edit-btn').toggleClass('hide');
        $(this).parent().parent().find('.edit-controls').toggleClass('hide');

	saveCroppie($(this).parent().parent().find('.image'), 'jpeg');

        return false;
    });

    $('a.cancel-btn').click(function() {
        $(this).toggleClass('hide');
        $(this).parent().find('.save-btn').toggleClass('hide');
        $(this).parent().find('.edit-btn').toggleClass('hide');
        $(this).parent().parent().find('.edit-controls').toggleClass('hide');

	destroyCroppie($(this).parent().parent().find('.image'));

        return false;
    });

    $('a.rotate-left').click(function() {
	$(this).parent().parent().find('.image').croppie('rotate', '-90');

	return false;
    });
    $('a.rotate-right').click(function() {
	$(this).parent().parent().find('.image').croppie('rotate', '90');

	return false;
    });

    $('a.open-btn').click(function() {
	$(this).parent().parent().find('input[type="file"].croppie-file').click();

	return false;
    });


    function updateCroppie($target, src) {
	$target.attr('src', src);
    }

    function saveCroppie($target, format) {
	$target.croppie('result', {type: 'base64', format: format}).then(function(result) {
	    $target.parent().parent().parent().parent().find('input.blob').val( result );

	    destroyCroppie($target);
	    updateCroppie($target, result);
	});
    }

    function destroyCroppie($target) {
	$target.croppie('destroy');
    }

    function initCroppie($target, width, height) {
        var $Croppie;
	$Croppie = $target.croppie({
	    enableExif: true,
	    enableOrientation: true,
	    viewport: {
    		width: width,
    		height: height,
    		type: 'square'
	    },
		boundary: {
    		    width: width,
    		    height: height
	    },
	    update: function(data) {
		// on change event
	    }
	});
    }


        function photoUpload(file, $target, width, height) {
            var imageType = /image.*/;
            if (file.type.match(imageType)) {
                var reader = new FileReader();
                image_filename = file.name;

                reader.readAsDataURL(file);
                reader.onload = function (e) {

                    var blob_image = reader.result;
                    if (file.type == "image/jpeg") {
                        var zeroth = {};
                        var exif = {};
                        var gps = {};
                        var exifObj = {"0th":zeroth, "Exif":exif, "GPS":gps};
                        var exifStr = piexif.dump(exifObj);

                        blob_image = piexif.insert(exifStr, reader.result);
                    }

                    current_image = new Image();
                    current_image.src = blob_image;
                    current_image.className = "image";
                    current_image.onload = function () {
			destroyCroppie($target);
			$target.attr('src', blob_image);
			initCroppie($target, width, height);
                    }
                }
            } else {
                alert("Файл не поддерживается!");
            }
        }


});