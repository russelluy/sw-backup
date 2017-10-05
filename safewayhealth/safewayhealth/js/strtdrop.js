$(window).load(function(){

var $jr=jQuery;

$jr(function(){

	//Hide SubLevel Menus
	$jr('#header ul li ul').hide();

	//OnHover Show SubLevel Menus
	$jr('#header ul li').hover(
		//OnHover
		function(){
			//Hide Other Menus
			$jr('#header ul li').not($('ul', this)).stop();

			//Add the Arrow
			$jr('ul li:first-child', this).before(
				'<li class="arrow">arrow</li>'
			);

			//Remove the Border
			$jr('ul li.arrow', this).css('border-bottom', '0');

			// Show Hoved Menu
			$jr('ul', this).show();
		},
		//OnOut
		function(){
			// Hide Other Menus
			$jr('ul', this).hide();

			//Remove the Arrow
			$jr('ul li.arrow', this).remove();
		}
	);

});
});