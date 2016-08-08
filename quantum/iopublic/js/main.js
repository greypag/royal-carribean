var preloadQueue;
var preloadHandler;
var preloadProgress;
var preloadTimer = 50;

$(document).ready(function() {
	preloadQueue = new createjs.LoadQueue();
	preloadQueue.loadManifest([
		'iopublic/img/home_bg.jpg',
		'iopublic/img/about_bg.jpg',
		'iopublic/img/entertainment_1.jpg',
		'iopublic/img/entertainment_2.jpg',
		'iopublic/img/entertainment_3.jpg',
		'iopublic/img/entertainment_4.jpg',
		'iopublic/img/entertainment_5.jpg',
		'iopublic/img/food_1.jpg',
		'iopublic/img/food_2.jpg',
		'iopublic/img/food_3.jpg',
		'iopublic/img/food_4.jpg',
		'iopublic/img/food_5.jpg',
		'iopublic/img/food_6.jpg',
		'iopublic/img/food_7.jpg',
		'iopublic/img/food_8.jpg',
		'iopublic/img/food_detail/1.jpg',
		'iopublic/img/food_detail/2.jpg',
		'iopublic/img/food_detail/3.jpg',
		'iopublic/img/food_detail/4.jpg',
		'iopublic/img/food_detail/5.jpg',
		'iopublic/img/food_detail/6.jpg',
		'iopublic/img/food_detail/7.jpg',
		'iopublic/img/food_detail/8.jpg',
		'iopublic/img/cabin_1.jpg',
		'iopublic/img/cabin_2.jpg',
		'iopublic/img/cabin_3.jpg',
		'iopublic/img/cabin_4.jpg'
	]);
	
	preloadProgress = 0;
	clearInterval(preloadHandler);
	preloadHandler = setInterval(handleOverallProgress, 250);
});

function handleOverallProgress() {
	var _total = 5;
	var _radio = Math.floor(preloadProgress / _total * 10) / 10;
	
	if (preloadQueue.progress >= _radio) {
		
		$('#progress_line').stop(true, true).animate({'width': (Math.floor(_radio * 100) + '%')}, 200, 'swing');
		$('.percent').html(Math.floor(_radio * 100) + '%');
		
		if (preloadProgress >= _total) {
			$('#preloader').stop(true, true);
			$('#preloader').fadeOut('fast', 'linear', function(){$('#preloader').hide();});
			clearInterval(preloadHandler);
			initWebsite();
		}
		
		preloadProgress ++;
	}
}

function initWebsite() {
	var _width = $(window).width();
	var _height = $(window).height();
	
	initScale();
	
	$(window).resize(function(e) {
		initScale();
	});
	
	$('ul.entertainment-list>li').each(function(index, element) {
		var _length = $('ul.entertainment-list>li').length;
		var _5p = Math.round(_width * .05);
		var _80p = Math.round(_width * .8);
		
		$(this).css('left', index * _5p);
		$(this).css('z-index', 9 - index);
		
		$(this).bind('click', function(e) {
			var _i = $(this).index();
			var _li = $('ul.entertainment-list>li.active').index();
			
			if (_i == _li) return;
			
			$('ul.entertainment-list>li.active').removeClass('active');
			$(this).addClass('active');
			$(this).stop(true, true);
						
			$(this).css({'z-index': '9', 'width': _5p});
			if (_i > _li) {
				$(this).css('left', _width - (_length - _i) * _5p);
				//$('.entertainment-body', this).css('margin-left', -_width * .8).stop(true, true).animate({'margin-left': '0'}, 'fast', 'linear');
			}
			$(this).animate({'width': _80p, 'left': index * _5p}, 'fast', 'linear');
			
			for (var i = 0; i < _i; i ++) {
				$('ul.entertainment-list>li').eq(i).css('z-index',  9 - _i + i);
			}
			
			for (var i = _i + 1; i < _length; i ++) {
				$('ul.entertainment-list>li').eq(i).css('z-index',  9 - _i - i);
			}
		});
	});
	
	$('ul.food-list>li').each(function(index, element) {
		$(this).click(function(e) {
			$('#food_detail').stop(true, true).show();
			$('#food_detail').css({'top': '50%', 'height': '0%'});
			$('#food_detail').animate({'top': '0%', 'height': '100%'});
			$('ul.food-detail-list>li').removeClass('active');
			$('ul.food-detail-list>li').eq(index).addClass('active');
		});
	});
	
	$('.entertainment-body').width(Math.round(.8 * _width));
	
	$('#close_food_detail').click(function(e) {
		$('#food_detail').stop(true, true);
		$('#food_detail').animate({'top': '50%', 'height': '0%'}, 500, 'linear', function(){$(this).hide();});
	});
	
	$('#about_play_video').click(function(e) {
		$('#about_video').append('<div id="about_video_container"><iframe width="800" height="450" frameborder=0 src="http://v.qq.com/iframe/player.html?vid=y012777xxk1&tiny=0" allowfullscreen></iframe></div>');
		$('#about_video').stop(true, true).fadeIn();
	});
	
	$('#close_about_video').click(function(e) {
		$('#about_video_container').remove();
		$('#about_video').stop(true, true).fadeOut();
	});

	var s = skrollr.init();
	s.animateTo(3000, {duration: 2000});
	skrollr.menu.init(s);
}

function initScale() {
	var _width = $(window).width();
	var _height = $(window).height();
	var _slide_height = _height;
	
	$('.slide').height(_height);
	$('.kv-slide').height(_slide_height);
	
	var _food_height = _slide_height - 898;
	console.log(_food_height);
	$('ul.food-list').attr('data-10000', 'top: ' + (_food_height > 0 ? 0 : _food_height) + 'px');
	
	$('.bg-img').each(function(index, element) {
		var _radio = 16 / 10;
		var _new_width = _width;
		var _new_height = _height;
		
		if (_width / _height >= _radio) {
			_new_height = Math.round(_width / _radio);
		} else {
			_new_width = Math.round(_height * _radio);
			$(this).css('left', -Math.round((_new_width - _width) / 2));
		}
		
		$(this).width(_new_width);
		$(this).height(_new_height);
	});
	
	$('ul.cabin-list').width($('ul.cabin-list>li').length * _width);
	$('ul.cabin-list>li').width(_width);
}

