var menuObject = {
	getDayMenu : function() {
		var year = $('#year').val();
		var month = $('#month').val();
		if (year !== '' && month !== '') {
			$.getJSON('day.php', { year : year, month : month }, function(data) {
				if (!data.error) {
					$('#day').replaceWith(data.menu);
				}
			});
		} else {
			$('#day').attr('disabled', false);
		}
	}
}
$(function() {

	menuObject.getDayMenu();
	
	$('#year').bind('change', menuObject.getDayMenu);
	$('#month').bind('change', menuObject.getDayMenu);
	
});