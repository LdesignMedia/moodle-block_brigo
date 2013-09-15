function resize()
{
    var wHeight = $(document).height();
    $('#brigoContent').height(wHeight - 50);
}
//SMART resizing
(function($, sr) {
    var debounce = function(func, threshold, execAsap) {
        var timeout;
        return function debounced() {
            var obj = this,
                    args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }
            ;
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 150);
        };
    }
    jQuery.fn[sr] = function(fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };
})(jQuery, 'smartresize');

!function($) {

    $(function() {
        resize();
    });

    $(window).focus(function() {
        var input = $('#addBrigoMessage').get(0);
        if (typeof input !== 'undefined')
        {
            //input.setFocus(true, this.name);
        }
    });

    $(window).smartresize(function() {
        resize();
    });

}(window.jQuery);