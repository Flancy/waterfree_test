jQuery(document).ready(function($) {
	let user_city = localStorage.getItem('user_city')
	let check_user_change_city = localStorage.getItem('user_change_city')

	if(check_user_change_city === null || check_user_change_city === undefined) {
		$('#modal-user-city').modal('show')

		axios.get(window.location.origin + '/getip')
			.then((res) => {
				axios.get(window.location.origin + '/getCityName/' + res.data.cityName)
					.then((res) => {
						user_city = res.data.name

						localStorage.setItem('user_city', user_city)

						if(user_city === undefined || user_city === null || user_city === '') {
							$('#modal-user-city .modal-title').html('')
						} else {
							$('#modal-user-city .modal-title').html('Ваш город - <span class="user-city">' + user_city + '</span> ? <a href="#" class="btn btn-primary">Да это мой город</a>')
							
							$('#modal-user-city .modal-title .btn').attr('href', window.location.origin + '/set_citie/' + user_city)
						}
					})
					.catch((err) => {
						console.log(err)
					})
			})
			.catch((err) => {
				console.log(err)
			})
	} else {
		if(user_city === undefined || user_city === null || user_city === '') {
			$('#modal-user-city .modal-title').html('')
		} else {
			$('#modal-user-city .modal-title').html('Ваш город - <span class="user-city">' + user_city + '</span>')
			
			$('#smallDropdown').text(user_city)

			$('#modal-user-city .modal-title .btn').attr('href', window.location.origin + '/set_citie/' + user_city)
		}
	}

	$('.dropdown-menu .dropdown-item .dropdown-item-content .dropdown-item-title, #modal-user-city .modal-body .btn').click(function () {
		localStorage.setItem('user_city', $(this).text())
	})

	$(document).on('click', '.modal-title .btn, .dropdown-menu .dropdown-item .dropdown-item-content .dropdown-item-title, #modal-user-city .modal-body .btn', function () {
		localStorage.setItem('user_change_city', true)
	})
});