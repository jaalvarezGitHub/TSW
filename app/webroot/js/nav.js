

function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.dropdown > li > a');
    this.val = '';
    this.index = -1;
    this.initEvents();
}
DropDown.prototype = {
    initEvents : function() {
        var obj = this;
 
        obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
        });
 				
        obj.opts.on('click',function(event){
					event.stopPropagation();
            
        });
    },
    getValue : function() {
        return this.val;
    },
    getIndex : function() {
        return this.index;
    }
}
$(window).on("load", function(){

$(function() {
    var dd = new DropDown( $('.nav_item_list') );
    $(document).click(function() {
        $('.nav_item').removeClass('active');
    });
 
});
});

