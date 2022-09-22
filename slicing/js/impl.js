jQuery(document).ready(function ($) {


	//===ajax loading search job for talent===
	$(document).on('keyup', '#searchjob', function () {
		var $this = $(this);
		if ($this.val() != '') {
			$.ajax({
				url: ajaxURL,
				method: "POST",
				data: { searchjob: $this.val() },
				success: function (data) {
					$('#arrow_box').html(data);
					if(!$('#arrow_box').find('*').length){
						$('#searchjobBox').slideUp()
					} else {
						$('#searchjobBox').slideDown()	
					}				
				}
			});
		} else {
			$('#arrow_box').html('');
			$('#searchjobBox').slideUp();
		}
	});

	/*=== Remove search for anything block ===*/
	$(document).mouseup(function (e) {
		if (!$('#searchjobBox').is(e.target)
			&& $('#searchjobBox').has(e.target).length === 0) {
			$('#searchjobBox').slideUp();
		}
	});

	//===ajax loading search job for employer===
	$(document).on('keyup', '#searchtalent', function () {
		var $this = $(this);
		if ($this.val() != '') {
			$.ajax({
				url: ajaxURL,
				method: "POST",
				data: { searchtalent: $this.val() },
				success: function (data) {
					$('#searchjobBox').html(data);
				}
			});
		} else {
			$('#searchjobBox').html('');
		}
	});


	//===ajax loading degree education===
	$(document).ready(function () {
		$(document).on('keyup', '.edu_degree', function () {
			var $this = $(this);
			if ($this.val() != '') {
				$.ajax({
					url: ajaxURL,
					method: "POST",
					data: { list_degree: $this.val() },
					success: function (data) {
						$this.siblings('.degreeList').slideDown();
						$this.siblings('.degreeList').html(data);
					}
				});
			} else {
				$this.siblings('.degreeList').slideUp();
				$this.siblings('.degreeList').html('');
			}
		});
		$(document).on('click', 'ul.edu_degree_ul li', function () {
			$(this).parent().parent().prev().prev().val($(this).val());
			$(this).parent().parent().prev().val($(this).text());
			$(this).parent().parent().slideUp();
		});
	});

	//===select univercity===
	$(document).on('keyup', '.edu_univer', function () {
		var query = $(this).val();
		var $this = $(this);
		if (query != '') {
			$.ajax({
				url: ajaxURL,
				method: 'POST',
				data: {
					list_uncity: query
				},
				success: function (data) {
					$this.siblings('.eduList').fadeIn();
					$this.siblings('.eduList').html(data);
				}
			});
		} else {
			$this.siblings('.eduList').fadeOut();
			$this.siblings('.eduList').html('');
		}
	});
	$(document).on('click', 'ul.edu_univer_ul li', function () {
		$(this).parent().parent().prev().val($(this).text());
		$(this).parent().parent().fadeOut();
		$(this).parent().parent().prev().prev().val($(this).val());
	});

	$(document).mouseup(function (e) {
        if (!$('.resume-university').is(e.target)
          && $('.resume-university').has(e.target).length === 0) {
          $('.eduList').slideUp();
        }
	  });
	  
	$(document).mouseup(function (e) {
        if (!$('.resume-degree').is(e.target)
          && $('.resume-degree').has(e.target).length === 0) {
          $('.degreeList').slideUp();
        }
      });

	//add rank to skill
	function rank() {
		$('.skills__user-item').each(function () {
			var rank = $(this).index() + 1;
			$(this).find('.skills__rank').text(rank)
		})
	};
	rank();

	//remove skill from offer-list
	$('.talent_jda_add').on('click', function () {
		var text = $(this).attr('data-jda_name');
		var $item = $('.skills__user-item.input');
		$(this).css('display', 'none');
		$item.removeClass('input').addClass('filled').find('.skills__value').text(text);
		$item.next().removeClass('empty').addClass('input').find('.skills-src').focus();

	})

	$(document).on('keyup', '.skills-src', function () {
		var finds = $(this).val();
		var $searchBox = $(this).closest('.skills__user-item').find('.skills-res');

		//add search dropdown
		if (finds != '') {
			$searchBox.html('');
			$searchBox.slideDown();
			words.forEach(function (item, i, arr) {
				if (!item.toLowerCase().indexOf(finds.toLowerCase())) {
					$searchBox.append('<li class="skills-select__item"><a href="#" class="skills-select__link">' + item + '</a></li>');
				}
			});
			$searchBox.append('<li class="skills-select__item"><a href="#" class="skills-select__link--new"> + Add "<span class="new-skill">' + finds + '</span>" as new skill</a></li>');
			$('.skills-select__item:first-child  skills-select__link').focus();
		} else {
			$searchBox.slideUp();
		}

		//add skill from dropdown
		$('.skills-select__link').on('click', function () {
			var linkText = $(this).text();
			var $skillItem = $(this).closest('.skills__user-item');
			$skillItem.find('.skills__value').text(linkText)
			$searchBox.slideUp();
			$skillItem.removeClass('input').addClass('filled').next().removeClass('empty').addClass('input').find('.skills-src').focus();
			rank();
			return false;
		})

		//add new skill
		$('.skills-select__link--new').on('click', function () {
			var linkText = $(this).find('.new-skill').text();
			var $skillItem = $(this).closest('.skills__user-item');
			$skillItem.find('.skills__value').text(linkText)
			$searchBox.slideUp();
			$skillItem.removeClass('input').addClass('filled').next().removeClass('empty').addClass('input').find('.skills-src').focus();
			rank();
			return false;
		})
	});

	$('.skills__remove').on('click', function () {
		var $item = $(this).closest('.skills__user-item');
		var text = $item.find('.skills__value').text();

		//return skiill to offer list
		$('.skills__offer-item').each(function () {
			if ($(this).attr('data-jda_name') === text) {
				$(this).css('display', 'block')
			}
		});

		// check if it's last skill and remove 
		if ($('.skills__user-item').length === $('.skills__user-item.filled').length) {
			$item.removeClass('filled').addClass('input').appendTo('.skills__user-list');
			$item.find('.skills__value').text('');
			$item.find('.skills-src').val('').focus();
		} else {
			$item.removeClass('filled').addClass('empty').appendTo('.skills__user-list');
			$item.find('.skills__value').text('');
			$item.find('.skills-src').val('');
		}
		rank();
	})
});



//===ADD new JOB===
jQuery(document).ready(function ($) {

	//===set draft && add vacancy===
	$('#job_reg_submit_draft').click(function (e) {
		$('#job_reg_draft').val(1);
		$('#job_reg_submit').click();
	});

	//===add vacancy===
	$('#job_reg_submit').click(function (e) {
		e.preventDefault();

		var job_reg_job_detail = [];
		$("select[name='job_reg_job_detail'] :selected").each(function () {
			job_reg_job_detail.push($(this).val());
		});
		//console.log(job_reg_job_detail);

		var job_reg_country = [];
		$("input[name='job_reg_country[]']").map(function (key) {
			job_reg_country.push($(this).val());
		})
		//console.log(job_reg_country);

		var job_reg_state = [];
		$("input[name='job_reg_state[]']").each(function () {
			job_reg_state.push($(this).val());
		});
		//console.log(job_reg_state);

		var job_reg_city = [];
		$("input[name='job_reg_city[]']").each(function () {
			job_reg_city.push($(this).val());
		});
		//console.log(job_reg_city);

		var job_reg_zip = [];
		$("input[name='job_reg_zip[]']").each(function () {
			job_reg_zip.push($(this).val());
		});
		//console.log(job_reg_zip);


		$.post(ajaxURL, {
			job_reg_action: '',
			job_reg_id: $('#job_reg_id').val(),
			job_reg_title: $('#job_reg_title').val(),
			job_reg_occupancy: $('#job_reg_occupancy').val(),
			job_reg_country: job_reg_country, //$('#job_reg_country').val(),
			job_reg_state: job_reg_state, //$('#job_reg_state').val(),
			job_reg_city: job_reg_city, //$('#job_reg_city').val(),
			job_reg_zip: job_reg_zip, //$('#job_reg_zip').val(),
			job_reg_salary_from: $('#job_reg_salary_from').val(),
			job_reg_salary_to: $('#job_reg_salary_to').val(),
			job_reg_description: $('#job_reg_description').val(),
			job_reg_job: $('#job_reg_job').val(),
			job_reg_job_detail: job_reg_job_detail, //$('#job_reg_job_detail').val(),
			job_reg_reloc_assistant: $('#job_reg_reloc_assistant').val(),
			job_reg_permit_assistant: $('#job_reg_permit_assistant').val(),
			job_reg_remoote: $('#job_reg_remoote').val(),
			job_reg_draft: $('#job_reg_draft').val(),
		},
			function (data, status) {
				if (data == 1) {
					top.location.reload();
					//alert(data)
				} else {
					alert(data)
				}
			}
		);
	});
});

//===LIKE my job===
jQuery(document).ready(function ($) {
	$('.myacc_list_jobs_like_job').click(function () {
		$.post(ajaxURL, {
			like_unlike_job_id: $(this).attr('data-job_id'),
		},
			function (data, status) {
				if (data != 1 && data != 0) {
					alert(data);
				}
			}
		);
	});
});

//===insert user post===
jQuery(document).ready(function ($) {
	$("#uploadTrigger").click(function () {
		$("#uploadFile").click();
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#body-bottom').show();
				$('#preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	//===submit form insert post===
	$('#insert_post').click(function () {
		$('#insert_post_form').submit();
	});
	$('#insert_post_reset').click(function () {
		$('#insert_post_form')[0].reset();
	});
});

//===GOOGLE autocomplitter===
function initAutocomplete() {
	//===TALANT REGISTER WHERE WANT colate===
	var input_2 = document.getElementById('reg_form_talant_wantloc_google');
	var options_2 = { types: ['(cities)'] };
	if (input_2) {
		autocomplete_2 = new google.maps.places.Autocomplete(input_2, options_2);
		autocomplete_2.addListener('place_changed', fillInAddress_2);
	}

	//===EMPLOYER REGISTER CITY===
	var input_1 = document.getElementById('reg_form_employer_city_google');
	var options_1 = { types: ['(cities)'] };
	if (input_1) {
		autocomplete_1 = new google.maps.places.Autocomplete(input_1, options_1);
		autocomplete_1.addListener('place_changed', fillInAddress_1);
	}

	//===RECRUTER REGISTER agency located===
	var input_3 = document.getElementById('reg_form_recruter_city_google');
	var options_3 = { types: ['(cities)'] };
	if (input_3) {
		autocomplete_3 = new google.maps.places.Autocomplete(input_3, options_3);
		autocomplete_3.addListener('place_changed', fillInAddress_3);
	}

	//===TALENT REGISTER my located===
	var input_4 = document.getElementById('reg_form_talent_city_google');
	var options_4 = { types: ['(cities)'] };
	if (input_4) {
		autocomplete_4 = new google.maps.places.Autocomplete(input_4, options_4);
		autocomplete_4.addListener('place_changed', fillInAddress_4);
	}

	//===create vacancy located if need===
	var input_5 = document.getElementById('job_reg_location_google');
	var options_5 = { types: ['(cities)'] };
	if (input_5) {
		autocomplete_5 = new google.maps.places.Autocomplete(input_5, options_5);
		autocomplete_5.addListener('place_changed', fillInAddress_5);
	}
	$(document).on('click', '.location-result__remove', function () {
		$(this).closest('.location-results__item').remove();
		$('#job_reg_location_google').val('');
		$('#job_reg_country').val('');
		$('#job_reg_state').val('');
		$('#job_reg_city').val('');
		$('#job_reg_zip').val('');
	});
}

function fillInAddress_5() {
	var place = autocomplete_5.getPlace();
	var job_reg_country_v = '';
	var job_reg_state_v = '';
	var job_reg_city_v = '';
	var job_reg_zip_v = '';

	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		switch (addressType) {
			case 'locality':
				document.getElementById('job_reg_city').value = place.address_components[i]['long_name'];
				job_reg_city_v = place.address_components[i]['long_name'];
				break;
			case 'administrative_area_level_1':
				document.getElementById('job_reg_state').value = place.address_components[i]['short_name'];
				job_reg_state_v = place.address_components[i]['short_name'];
				break;
			case 'country':
				document.getElementById('job_reg_country').value = place.address_components[i]['long_name'];
				job_reg_country_v = place.address_components[i]['long_name'];
				break;
			case 'postal_code':
				document.getElementById('job_reg_zip').value = place.address_components[i]['short_name'];
				job_reg_zip_v = place.address_components[i]['short_name'];
				break;
		}
	}
	$('.location-results__list').append('<li class="location-results__item"><p>' + place.formatted_address + '</p><span class="location-result__remove">&times;</span></li><input type="hidden" name="job_reg_country[]" value="' + job_reg_country_v + '"><input type="hidden" name="job_reg_state[]" value="' + job_reg_state_v + '"><input type="hidden" name="job_reg_city[]" value="' + job_reg_city_v + '"><input type="hidden" name="job_reg_zip[]" value="' + job_reg_zip_v + '">');
	$('#job_reg_location_google').val('');
}

function fillInAddress_2() {
	var place = autocomplete_2.getPlace();
	document.getElementById('reg_form_talant_wantloc_country').value = '';
	document.getElementById('reg_form_talant_wantloc_city').value = '';
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		var val = place.address_components[i];
		if (addressType == 'country') {
			document.getElementById('reg_form_talant_wantloc_country').value = val.long_name;
			console.log('country:' + val.long_name);
		}
		if (addressType == 'locality') {
			document.getElementById('reg_form_talant_wantloc_city').value = val.long_name;
			console.log('city:' + val.long_name);
		}
		//console.log('Type:'+addressType+' name:'+val.long_name);
	}
	$('#reg_form_employer_want_location_box').append(
		'<div class="work-location"><span class="drag-icon my-handle"><img src="' + homeURL + 'slicing/img/drag_handle.svg"></span>' +
		'<label class="work-location__city">' +
		'<span>' + place.formatted_address + '</span>' +
		'<input type="hidden" name="talent_want_area_country[]" value="' + document.getElementById('reg_form_talant_wantloc_country').value + '">' +
		'<input type="hidden" name="talent_want_area_city[]"    value="' + document.getElementById('reg_form_talant_wantloc_city').value + '">' +
		'</label>' +
		'<span class="remove">x</span></div>');
	$('#reg_form_talant_wantloc_google').val('')
}

function fillInAddress_1() {
	var place = autocomplete_1.getPlace();
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		var val = place.address_components[i];
		if (addressType == 'country') {
			document.getElementById('reg_form_employer_country').value = val.long_name;
		}
		if (addressType == 'administrative_area_level_1') {
			document.getElementById('reg_form_employer_city').value = val.long_name;
		}
	}
}

function fillInAddress_3() {
	var place = autocomplete_3.getPlace();
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		switch (addressType) {
			case 'locality':
				document.getElementById('reg_form_recruter_city').value = place.address_components[i]['long_name'];
				document.querySelector('[data-val="reg_form_recruter_city"]').textContent = place.address_components[i]['long_name'];
				break;
			case 'administrative_area_level_1':
				document.getElementById('reg_form_recruter_state').value = place.address_components[i]['short_name'];
				document.querySelector('[data-val="reg_form_recruter_state"]').textContent = place.address_components[i]['short_name'];
				break;
			case 'country':
				document.getElementById('reg_form_recruter_country').value = place.address_components[i]['long_name'];
				document.querySelector('[data-val="reg_form_recruter_country"]').textContent = place.address_components[i]['long_name'];
				break;
			case 'postal_code':
				document.getElementById('reg_form_recruter_zip').value = place.address_components[i]['short_name'];
				document.querySelector('[data-val="reg_form_recruter_zip"]').textContent = place.address_components[i]['short_name'];
				break;
		}
	}
}

function fillInAddress_4() {

	var place = autocomplete_4.getPlace();
	for (var i = 0; i < place.address_components.length; i++) {
		var addressType = place.address_components[i].types[0];
		switch (addressType) {
			case 'locality':
				document.getElementById('reg_form_talent_city').value = place.address_components[i]['long_name'];
				break;
			case 'country':
				document.getElementById('reg_form_talent_country').value = place.address_components[i]['long_name'];
				break;
		}
	}
}


jQuery(document).ready(function ($) {

	//===open popap for recoмery password===
	$(document).on('click', '.thanks-popup-ajax', function (e) {
		e.preventDefault();
		$('#forgot_password_message').html('Loading...');
		$.post(ajaxURL, {
			user_forgot_form: $('#forgot_password_email').val(),
		},
			function (data, status) {
				$('#forgot_password_message').html('');
				if (data == 1) {
					$.magnificPopup.open({
						items: { src: '#thanks-message' },
						type: 'inline'
					});
				} else {
					$('#cm_custom-message-title').html('Errorr');
					$('#cm_custom-message-content').html(data);
					$.magnificPopup.open({
						items: { src: '#custom-message' },
						type: 'inline'
					});
				}
				// $('#forgot-password').html(data);
			}
		);
	});

	//===reg form EMPLOYER===
	$(document).on('click', '#reg_employer_form_submit', function (e) {
		e.preventDefault();
		$.magnificPopup.open({
			items: { src: '#signup-submit_e' },
			type: 'inline'
		});
		// $.post(ajaxURL, {
		// 	check_reg_useremail: $('#e-email').val(),
		// },
		// 	function (data, status) {
		// 		if (data == 1) {
		// 			$.magnificPopup.open({
		// 				items: { src: '#email-exists_e' },
		// 				type: 'inline'
		// 			});
		// 		} else {
		// 			$.magnificPopup.open({
		// 				items: { src: '#signup-submit_e' },
		// 				type: 'inline'
		// 			});
		// 		}
		// 	}
		// );
	});
	$(document).on('click', '#reg_employer_form_submit_modal_window', function (e) {
		$('#reg_employer_form').submit();
	});

	//===reg form TALENT===
	$(document).on('click', '#reg_talent_form_submit', function (e) {
		e.preventDefault();
		$.magnificPopup.open({
			items: { src: '#signup-submit_t' },
			type: 'inline'
		});
	});

	$(document).on('click', '#reg_talent_form_submit_modal_window', function (e) {
		$('#reg_talent_form').submit();
	});

	//===reg form RECRUITER===
	$(document).on('click', '#reg_recruter_form_submit', function (e) {
		e.preventDefault();
		if ($(this).closest('.tab').hasClass('filled')) {
			$.magnificPopup.open({
				items: { src: '#signup-submit_r' },
				type: 'inline'
			});
		}
		// $.post(ajaxURL, {
		// 	check_reg_useremail: $('#r-email').val(),
		// },
		// 	function (data, status) {
		// 		if (data == 1) {
		// 			$.magnificPopup.open({
		// 				items: { src: '#email-exists_r' },
		// 				type: 'inline'
		// 			});
		// 		} else {
		// 			$.magnificPopup.open({
		// 				items: { src: '#signup-submit_r' },
		// 				type: 'inline'
		// 			});
		// 		}
		// 	}
		// );
	});
	$(document).on('click', '#reg_recruiter_form_submit_modal_window', function (e) {
		$('#reg_recruter_form').submit();
	});



});
















