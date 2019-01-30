(function($) {
	$(function(){
		$( '#gallerySlider' ).sliderPro({
			width: '100%',
			height: '700',
			aspectRatio: -1,
			mageScaleMode:'cover',
			arrows: false,
			buttons: false,
			autoplay:true,
			autoplayDelay: 7000,
			loop: true,
			fade: true,
			touchSwipe:true,
			//orientation: 'vertical',
			autoHeight: true,
			updateHash: false,
			visibleSize: 'auto',
			//forceSize: 'fullWidth',
			slideDistance:0,
			fadeDuration: 3000,
			breakpoints: {
			}
		});
	});
})(jQuery);

