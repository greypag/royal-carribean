/*

Better(?) Image cross fader (C)2004 Patrick H. Lauke aka redux

Inspired by Steve at Slayeroffice http://slayeroffice.com/code/imageCrossFade/ 

preInit "Scheduler" idea by Cameron Adams aka The Man in Blue
http://www.themaninblue.com/writing/perspective/2004/09/29/ 

Tweaked to deal with empty nodes 19 Feb 2006

*/

/* general variables */

var galleryId = 'gallery'; /* change this to the ID of the gallery list */
var	gallery; /* this will be the object reference to the list later on */
var galleryImages; /* array that will hold all child elements of the list */
var currentImage; /* keeps track of which image should currently be showing */
var previousImage;
var preInitTimer;
var mainTimer;
var mainTimerDuration = 5000;
var secondTimer;
var galleryDots;
var dots;
var galleryDotsId = 'gallery-dots';
var galleryThumbnails;
var thumbnails;
var galleryThumbnailId = 'gallery-thumbnails';
preInit();

/* functions */

function preInit() {
	/* an inspired kludge that - in most cases - manages to initially hide the image gallery list
	   before even onload is triggered (at which point it's normally too late, and the whole list already
	   appeared to the user before being remolded) */
	if ((document.getElementById)&&(gallery=document.getElementById(galleryId))) {
		gallery.style.visibility = "hidden";
		if (typeof preInitTimer != 'undefined') clearTimeout(preInitTimer); /* thanks to Steve Clay http://mrclay.org/ for this small Opera fix */
	} else {
		preInitTimer = setTimeout("preInit()",2);
	}

	if ((document.getElementById)&&(galleryDots=document.getElementById(galleryDotsId))) {
		galleryDots.style.visibility = "hidden";
	}

	if ((document.getElementById)&&(galleryThumbnails=document.getElementById(galleryThumbnailId))) {
		galleryThumbnails.style.visibility = "hidden";
	}
}

function fader(imageNumber,opacity) {
	/* helper function to deal specifically with images and the cross-browser differences in opacity handling */
	var obj=galleryImages[imageNumber];
	if (obj.style) {
		if (obj.style.MozOpacity!=null) {  
			/* Mozilla's pre-CSS3 proprietary rule */
			obj.style.MozOpacity = (opacity/100) - .001;
		} else if (obj.style.opacity!=null) {
			/* CSS3 compatible */
			obj.style.opacity = (opacity/100) - .001;
		} else if (obj.style.filter!=null) {
			/* IE's proprietary filter */
			obj.style.filter = "alpha(opacity="+opacity+")";
		}
	}
}

function fadeInit() {
	if (document.getElementById) {
		preInit(); /* shouldn't be necessary, but IE can sometimes get ahead of itself and trigger fadeInit first */
		galleryImages = new Array;
		var node = gallery.firstChild;
		/* instead of using childNodes (which also gets empty nodes and messes up the script later)
		we do it the old-fashioned way and loop through the first child and its siblings */
		while (node) {
			if (node.nodeType==1) {
				galleryImages.push(node);
			}
			node = node.nextSibling;
		}
		for(i=0;i<galleryImages.length;i++) {
			/* loop through all these child nodes and set up their styles */
			galleryImages[i].style.position='absolute';
			galleryImages[i].style.top=0;
			galleryImages[i].style.zIndex=0;
			/* set their opacity to transparent */
			fader(i,0);
		}
		initDots();
		initThumbnails();
		/* make the list visible again */
		gallery.style.visibility = 'visible';
		/* initialise a few parameters to get the cycle going */
		currentImage= currentImage?currentImage:0;
		previousImage= currentImage==0?galleryImages.length-1:currentImage-1;
		opacity=100;
		fader(currentImage,100);
		setActiveDot();
		setActiveThumbnail();
		/* start the whole crossfade process after a second's pause */
		mainTimer = window.setTimeout("crossfade(100)", mainTimerDuration);
	}
}

function crossfade(opacity) {
		if (opacity < 100) {
			/* current image not faded up fully yet...so increase its opacity */
			fader(currentImage,opacity);
			/* fader(previousImage,100-opacity); */
			opacity += 10;
			secondTimer = window.setTimeout("crossfade("+opacity+")", 50);
		} else {
			setActiveDot();
			setActiveThumbnail();
			/* make the previous image - which is now covered by the current one fully - transparent */
			fader(previousImage,0);
			/* current image is now previous image, as we advance in the list of images */
			previousImage=currentImage;
			currentImage+=1;
			if (currentImage>=galleryImages.length) {
				/* start over from first image if we cycled through all images in the list */
				currentImage=0;
			}
			/* make sure the current image is on top of the previous one */
			galleryImages[previousImage].style.zIndex = 0;
			galleryImages[currentImage].style.zIndex = 100;
			/* and start the crossfade after a second's pause */
			opacity=0;
			mainTimer = window.setTimeout("crossfade("+opacity+")", mainTimerDuration);
		}
		
}

function setActiveDot(){
	if (dots){
		for(i=0;i<dots.length;i++) {
			dots[i].className = "";
		}
		dots[currentImage].className = "active";
	}
}

function initDots(){
	if (document.getElementById && galleryDots) {
		galleryDots.style.visibility = "visible";
		galleryDots.style.zIndex = 3001;
		galleryDots.innerHTML = '';
		for (var i =0; i < galleryImages.length; i++){
			galleryDots.innerHTML += '<span class="slide-dot" onclick="setCurrentImage('+i+');">•</span>';
		}
		dots = galleryDots.getElementsByTagName("span");
	}
}
function setActiveThumbnail(){
	if (thumbnails){
		for(i=0;i<thumbnails.length;i++) {
			thumbnails[i].className = "";
		}
		thumbnails[currentImage].className = "active";
	}
}

function initThumbnails(){
	if (document.getElementById && galleryThumbnails) {
		galleryThumbnails.style.visibility = "visible";
		galleryThumbnails.style.zIndex = 3001;
		thumbnails = galleryThumbnails.getElementsByTagName("li");
		for (var i =0; i < galleryImages.length; i++){
			thumbnails[i].setAttribute("onclick", "setCurrentImage("+i+");");
		}
	}
}

function setCurrentImage(index){
	currentImage = index;
	clearTimeout(mainTimer);
	clearTimeout(secondTimer);
	fadeInit();
}

/* initialise fader by hiding image object first */
addEvent(window,'load',fadeInit)



/* 3rd party helper functions */

/* addEvent handler for IE and other browsers */
function addEvent(elm, evType, fn, useCapture) 
// addEvent and removeEvent
// cross-browser event handling for IE5+,  NS6 and Mozilla
// By Scott Andrew
{
 if (elm.addEventListener){
   elm.addEventListener(evType, fn, useCapture);
   return true;
 } else if (elm.attachEvent){
   var r = elm.attachEvent("on"+evType, fn);
   return r;
 }
} 
