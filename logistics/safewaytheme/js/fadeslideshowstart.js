var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [85, 85], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["wp-content/themes/safewaytheme/images/chair_thumbpics/1.jpg"],
		["wp-content/themes/safewaytheme/images/chair_thumbpics/2.jpg"],
		["wp-content/themes/safewaytheme/images/chair_thumbpics/3.jpg"],
		["wp-content/themes/safewaytheme/images/chair_thumbpics/4.jpg"],
		["wp-content/themes/safewaytheme/images/chair_thumbpics/5.jpg"] //<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow2", //ID of blank DIV on page to house Slideshow
	dimensions: [578, 440], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["wp-content/themes/safewaytheme/images/slide_mini/1.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/2.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/3.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/4.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/5.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/6.jpg"],
		["wp-content/themes/safewaytheme/images/slide_mini/7.jpg"]		//<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})


