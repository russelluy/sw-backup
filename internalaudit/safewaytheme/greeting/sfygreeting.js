jQuery(document).ready(function($){
// do stuff when DOM is ready
// You can safely use $ in this code block to reference jQuery
	//var userId = $("#userid-value").attr("value");
	//var userName = UserInfo.username;
	$("#greetingContainer1").text('Welcome to Internal Audit');
	var loc = getAbsolutePath();
	//alert(loc);
	$("a#logo-url").attr("href", loc);
	$("img#logo-url-img").attr("alt", "Safeway Internal Audit Website");
	$("img#logo-url-img").attr("src", "/internalaudit/wp-content/themes/safewaytheme/images/safeway-logo250.jpg");

	/*
	$.ajax({
		type: "GET",
		url: "http://scvgdv38.safeway.com/employeegateway/wp-content/plugins/sfyuserinfo-widget/sfyuserinfo.php",
		dataType: 'jsonp',
		data: {userid : userId},
		error: function(request, status) {
			// Do some error stuff
		},
		success: function(data, textStatus, jqXHR) {
			// Do some successful stuff
			//var property = data.user_name; 
			var userName = data.user_name;//UserInfo.username;
			$("#greetingContainer1").text('Welcome ' + userName);
		}
	});*/
});

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
