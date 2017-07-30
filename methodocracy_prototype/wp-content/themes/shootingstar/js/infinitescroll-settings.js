/* InfiniteScroll-settings.js v1.0 */
(function($) {
$('.post-loop').infinitescroll({
		navSelector : "#nav-below",
		nextSelector : "#nav-below a",
		itemSelector : ".post-entry", 
    loading: {
    img : SiteParameters.theme_directory+"/images/ajax-loader.gif",
    msgText : SiteParameters.message_load,
    finishedMsg : SiteParameters.message_end,
},
});
})(jQuery);