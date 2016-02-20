$(document).ready(function() {
	
	var ph = $(window).height() - 80;
	$(".page-content").css("height",ph);

	$(".nav-list-item a").click(function() {

		$(this).parent(".nav-list-item").toggleClass("active");
		$(this).next(".sub-list").toggle(251);

		if($(this).parent(".nav-list-item").hasClass('active')) {
			$(this).parent(".nav-list-item").siblings(".nav-list-item").removeClass("active").children(".sub-list").slideUp(251);
		}
	});

	$(".tab-nav li").click(function() {
		$(".nav-list li").removeClass('active');
	});

	$(".sub-list").on('click','li',function() {
		$(this).addClass('active');
		$(this).siblings().removeClass('active');
	});

	$(window).resize(function() {
		var ph = $(window).height() - 80;
		$(".page-content").css("height",ph);
	});
});

function openapp($url,$appid,$appname) {

	var flag = 0;
	$(".tab-nav li").removeClass("active");
	var $tabList = $(".tab-nav li");
	for(var i = 0;i < $tabList.length;i++) {
		if($($tabList[i]).attr("data-id") == $appid) {
			$($tabList[i]).addClass("active");
			flag = 1;
			break;
		}
	}

	if(flag === 0) {
		var parameter = "'"+$url+"',"+$appid+",'"+$appname+"'";
		var $tabA = $("<a></a>").attr('data-id',$appid).text($appname).prop('href',"javascript:openapp("+parameter+")");

		var $closeS = $("<span class='close-tab'>×</span>");

		var $tabL = $("<li class='active'></li>");

		$tabL.click(function(){
			$(".nav-list li").removeClass('active');
		});
		$tabL.attr("data-id",$appid).append($tabA).append($closeS).appendTo($(".tab-nav"));

		$closeS.click(function() {
			closeApp($appid);
		});
	}

	flag = 0;

	$(".page-content iframe").addClass("none").removeClass("current");


	$iframList = $(".page-content iframe");

	
	for(var i = 0;i < $iframList.length;i++) {
		if($($iframList[i]).attr("data-id") ==  $appid) {
			flag = 1;
			$($iframList[i]).addClass("current").removeClass("none");
			break;
		}
	}

	if(flag === 0) {
		$("<iframe class='current'></iframe>").attr("data-id",$appid).prop("src",$url).appendTo($(".page-content"));
	}

	
}

function closeApp($id) {
	
	var $tab = $(".tab-nav li a");
	var $iframe = $(".page-content iframe");

	for(var i = 0;i < $tab.length;i++) {
		if($($tab[i]).attr("data-id") == $id) {
			if($($tab[i]).parent('li').hasClass('active')) {
				var nextTab = $($tab[i]).parent('li').next('li');

				if(nextTab.length !== 0) {
					nextTab.addClass('active');
				}
				else {
					$($tab[i]).parent('li').prev('li').addClass('active');
				}

				$($tab[i]).parent('li').remove();
				break;
			}
			else {
				$($tab[i]).parent('li').remove();
			}
		}
	}

	for(var i = 0;i < $iframe.length;i++) {
		if($($iframe[i]).attr("data-id") == $id) {
			if($($iframe[i]).hasClass('current')) {
				var nextFrame = $($iframe[i]).next('iframe');

				if(nextFrame.length !== 0) {
					nextFrame.removeClass('none').addClass('current');
				}
				else {
					$($iframe[i]).prev('iframe').removeClass('none').addClass('current');
				}

				$($iframe[i]).remove();
				break;
			}
			else {
				$($iframe[i]).remove();
			}
		}
	}
}