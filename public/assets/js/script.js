$(document).ready(function () {
	$(document).scroll(function () {
		const $nav = $(".navbar");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});

	$('#admin-listMenuTable').DataTable();

	$('#myOrdersTable').DataTable({
		footerCallback: function () {
			const api = this.api();
			$(api.column(6).footer()).html(
				api.column(6).data().reduce(function (a, b) {
					return parseInt(a) + parseInt(b);
				}, 0)
			);
		}
	});

	bsCustomFileInput.init();

	$('#menu_img').on('change', function () {
		const file = $(this).get(0).files;
		const reader = new FileReader();
		reader.readAsDataURL(file[0]);
		reader.addEventListener('load', function (e) {
			const image = e.target.result;
			$('.img-preview').attr('src', image);
		});
	});

});