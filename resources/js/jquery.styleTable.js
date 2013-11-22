(function ($) {
    $.fn.styleTable = function (options) {
        var defaults = {
            css: 'ui-styled-table',
            cursor: 'default',
            selectable: false
        };
        options = $.extend(defaults, options);

        return this.each(function () {
            $this = $(this);
            $this.find('tbody tr td').css('padding', '4px');
            $this.addClass(options.css);

            $this.on('mouseover mouseout', 'tbody tr', function (event) {
                $(this).children().toggleClass("ui-state-hover", event.type == 'mouseover');
            });
            
            if(options.selectable) {
                $this.on('click', 'tbody tr', function (event) {
                    $this.find('tbody tr td').removeClass("ui-state-active");
                    $(this).children().toggleClass("ui-state-active", event.type == 'click');
                });
            }
            $this.find('tbody tr').css('cursor', options.cursor);
                    
            $this.find("th").addClass("ui-widget-header");
            $this.find("td").addClass("ui-widget-content");
            $this.find("tr:last-child").addClass("last-child");
        });
    };
})(jQuery);