!function(t,i){"function"==typeof define&&define.amd?define(["jquery"],i):i(t.jQuery)}(this,function(e){"use strict";var s="scrolly",o={bgParallax:!1};function i(t,i){this.element=t,this.$element=e(this.element),this.options=e.extend({},o,i),this._defaults=o,this._name=s,this.init()}i.prototype.init=function(){var t=this;this.startPosition=this.$element.position().top,this.offsetTop=this.$element.offset().top,this.height=this.$element.outerHeight(!0),this.velocity=this.$element.attr("data-velocity"),this.bgStart=parseInt(this.$element.attr("data-fit"),10),e(document).scroll(function(){t.didScroll=!0}),setInterval(function(){t.didScroll&&(t.didScroll=!1,t.scrolly())},10)},i.prototype.scrolly=function(){var t=e(window).scrollTop(),i=e(window).height(),s=this.startPosition;this.offsetTop>=t+i?this.$element.addClass("scrolly-invisible"):s=this.$element.hasClass("scrolly-invisible")?this.startPosition+(t+(i-this.offsetTop))*this.velocity:this.startPosition+t*this.velocity,this.bgStart&&(s+=this.bgStart),!0===this.options.bgParallax?this.$element.css({backgroundPosition:"50% "+s+"px"}):this.$element.css({top:s})},e.fn[s]=function(t){return this.each(function(){e.data(this,"plugin_"+s)||e.data(this,"plugin_"+s,new i(this,t))})}});
