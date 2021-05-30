!function(t,e){"function"==typeof define&&define.amd?define(["jquery"],function(t){return e(t)}):"object"==typeof exports?module.exports=e(require("jquery")):jQuery&&!jQuery.fn.colorpicker&&e(jQuery)}(0,function(h){"use strict";var s=function(t,e,o,i,r){this.fallbackValue=o?o&&void 0!==o.h?o:this.value={h:0,s:0,b:0,a:1}:null,this.fallbackFormat=i||"rgba",this.hexNumberSignPrefix=!0===r,this.value=this.fallbackValue,this.origFormat=null,this.predefinedColors=e||{},this.colors=h.extend({},s.webColors,this.predefinedColors),t&&(void 0!==t.h?this.value=t:this.setColor(String(t))),this.value||(this.value={h:0,s:0,b:0,a:1})};s.webColors={aliceblue:"f0f8ff",antiquewhite:"faebd7",aqua:"00ffff",aquamarine:"7fffd4",azure:"f0ffff",beige:"f5f5dc",bisque:"ffe4c4",black:"000000",blanchedalmond:"ffebcd",blue:"0000ff",blueviolet:"8a2be2",brown:"a52a2a",burlywood:"deb887",cadetblue:"5f9ea0",chartreuse:"7fff00",chocolate:"d2691e",coral:"ff7f50",cornflowerblue:"6495ed",cornsilk:"fff8dc",crimson:"dc143c",cyan:"00ffff",darkblue:"00008b",darkcyan:"008b8b",darkgoldenrod:"b8860b",darkgray:"a9a9a9",darkgreen:"006400",darkkhaki:"bdb76b",darkmagenta:"8b008b",darkolivegreen:"556b2f",darkorange:"ff8c00",darkorchid:"9932cc",darkred:"8b0000",darksalmon:"e9967a",darkseagreen:"8fbc8f",darkslateblue:"483d8b",darkslategray:"2f4f4f",darkturquoise:"00ced1",darkviolet:"9400d3",deeppink:"ff1493",deepskyblue:"00bfff",dimgray:"696969",dodgerblue:"1e90ff",firebrick:"b22222",floralwhite:"fffaf0",forestgreen:"228b22",fuchsia:"ff00ff",gainsboro:"dcdcdc",ghostwhite:"f8f8ff",gold:"ffd700",goldenrod:"daa520",gray:"808080",green:"008000",greenyellow:"adff2f",honeydew:"f0fff0",hotpink:"ff69b4",indianred:"cd5c5c",indigo:"4b0082",ivory:"fffff0",khaki:"f0e68c",lavender:"e6e6fa",lavenderblush:"fff0f5",lawngreen:"7cfc00",lemonchiffon:"fffacd",lightblue:"add8e6",lightcoral:"f08080",lightcyan:"e0ffff",lightgoldenrodyellow:"fafad2",lightgrey:"d3d3d3",lightgreen:"90ee90",lightpink:"ffb6c1",lightsalmon:"ffa07a",lightseagreen:"20b2aa",lightskyblue:"87cefa",lightslategray:"778899",lightsteelblue:"b0c4de",lightyellow:"ffffe0",lime:"00ff00",limegreen:"32cd32",linen:"faf0e6",magenta:"ff00ff",maroon:"800000",mediumaquamarine:"66cdaa",mediumblue:"0000cd",mediumorchid:"ba55d3",mediumpurple:"9370d8",mediumseagreen:"3cb371",mediumslateblue:"7b68ee",mediumspringgreen:"00fa9a",mediumturquoise:"48d1cc",mediumvioletred:"c71585",midnightblue:"191970",mintcream:"f5fffa",mistyrose:"ffe4e1",moccasin:"ffe4b5",navajowhite:"ffdead",navy:"000080",oldlace:"fdf5e6",olive:"808000",olivedrab:"6b8e23",orange:"ffa500",orangered:"ff4500",orchid:"da70d6",palegoldenrod:"eee8aa",palegreen:"98fb98",paleturquoise:"afeeee",palevioletred:"d87093",papayawhip:"ffefd5",peachpuff:"ffdab9",peru:"cd853f",pink:"ffc0cb",plum:"dda0dd",powderblue:"b0e0e6",purple:"800080",red:"ff0000",rosybrown:"bc8f8f",royalblue:"4169e1",saddlebrown:"8b4513",salmon:"fa8072",sandybrown:"f4a460",seagreen:"2e8b57",seashell:"fff5ee",sienna:"a0522d",silver:"c0c0c0",skyblue:"87ceeb",slateblue:"6a5acd",slategray:"708090",snow:"fffafa",springgreen:"00ff7f",steelblue:"4682b4",tan:"d2b48c",teal:"008080",thistle:"d8bfd8",tomato:"ff6347",turquoise:"40e0d0",violet:"ee82ee",wheat:"f5deb3",white:"ffffff",whitesmoke:"f5f5f5",yellow:"ffff00",yellowgreen:"9acd32",transparent:"transparent"};var a={horizontal:!(s.prototype={constructor:s,colors:{},predefinedColors:{},getValue:function(){return this.value},setValue:function(t){this.value=t},_sanitizeNumber:function(t){return"number"==typeof t?t:isNaN(t)||null===t||""===t||void 0===t?1:""===t?0:void 0!==t.toLowerCase?(t.match(/^\./)&&(t="0"+t),Math.ceil(100*parseFloat(t))/100):1},isTransparent:function(t){return!(!t||!("string"==typeof t||t instanceof String))&&("transparent"===(t=t.toLowerCase().trim())||t.match(/#?00000000/)||t.match(/(rgba|hsla)\(0,0,0,0?\.?0\)/))},rgbaIsTransparent:function(t){return 0===t.r&&0===t.g&&0===t.b&&0===t.a},setColor:function(t){if(t=t.toLowerCase().trim()){if(this.isTransparent(t))return this.value={h:0,s:0,b:0,a:0},!0;var e=this.parse(t);e?(this.value=this.value={h:e.h,s:e.s,b:e.b,a:e.a},this.origFormat||(this.origFormat=e.format)):this.fallbackValue&&(this.value=this.fallbackValue)}return!1},setHue:function(t){this.value.h=1-t},setSaturation:function(t){this.value.s=t},setBrightness:function(t){this.value.b=1-t},setAlpha:function(t){this.value.a=Math.round(parseInt(100*(1-t),10)/100*100)/100},toRGB:function(t,e,o,i){var r,s,a,n,l;return 0===arguments.length&&(t=this.value.h,e=this.value.s,o=this.value.b,i=this.value.a),t=(t*=360)%360/60,r=s=a=o-(l=o*e),r+=[l,n=l*(1-Math.abs(t%2-1)),0,0,n,l][t=~~t],s+=[n,l,l,n,0,0][t],a+=[0,0,n,l,l,n][t],{r:Math.round(255*r),g:Math.round(255*s),b:Math.round(255*a),a:i}},toHex:function(t,e,o,i,r){arguments.length<=1&&(e=this.value.h,o=this.value.s,i=this.value.b,r=this.value.a);var s="#",a=this.toRGB(e,o,i,r);return this.rgbaIsTransparent(a)?"transparent":(t||(s=this.hexNumberSignPrefix?"#":""),s+((1<<24)+(parseInt(a.r)<<16)+(parseInt(a.g)<<8)+parseInt(a.b)).toString(16).slice(1))},toHSL:function(t,e,o,i){0===arguments.length&&(t=this.value.h,e=this.value.s,o=this.value.b,i=this.value.a);var r=t,s=(2-e)*o,a=e*o;return a/=0<s&&s<=1?s:2-s,s/=2,1<a&&(a=1),{h:isNaN(r)?0:r,s:isNaN(a)?0:a,l:isNaN(s)?0:s,a:isNaN(i)?0:i}},toAlias:function(t,e,o,i){var r,s=0===arguments.length?this.toHex(!0):this.toHex(!0,t,e,o,i),a="alias"===this.origFormat?s:this.toString(!1,this.origFormat);for(var n in this.colors)if((r=this.colors[n].toLowerCase().trim())===s||r===a)return n;return!1},RGBtoHSB:function(t,e,o,i){var r,s,a,n;return t/=255,e/=255,o/=255,r=((r=0===(n=(a=Math.max(t,e,o))-Math.min(t,e,o))?null:a===t?(e-o)/n:a===e?(o-t)/n+2:(t-e)/n+4)+360)%6*60/360,s=0===n?0:n/a,{h:this._sanitizeNumber(r),s:s,b:a,a:this._sanitizeNumber(i)}},HueToRGB:function(t,e,o){return o<0?o+=1:1<o&&(o-=1),6*o<1?t+(e-t)*o*6:2*o<1?e:3*o<2?t+(e-t)*(2/3-o)*6:t},HSLtoRGB:function(t,e,o,i){var r;e<0&&(e=0);var s=2*o-(r=o<=.5?o*(1+e):o+e-o*e),a=t+1/3,n=t,l=t-1/3;return[Math.round(255*this.HueToRGB(s,r,a)),Math.round(255*this.HueToRGB(s,r,n)),Math.round(255*this.HueToRGB(s,r,l)),this._sanitizeNumber(i)]},parse:function(i){if(0===arguments.length)return!1;var r,s,a=this,n=!1,l=void 0!==this.colors[i];return l&&(i=this.colors[i].toLowerCase().trim()),h.each(this.stringParsers,function(t,e){var o=e.re.exec(i);return!(r=o&&e.parse.apply(a,[o]))||(n={},s=l?"alias":e.format?e.format:a.getValidFallbackFormat(),(n=s.match(/hsla?/)?a.RGBtoHSB.apply(a,a.HSLtoRGB.apply(a,r)):a.RGBtoHSB.apply(a,r))instanceof Object&&(n.format=s),!1)}),n},getValidFallbackFormat:function(){var t=["rgba","rgb","hex","hsla","hsl"];return this.origFormat&&-1!==t.indexOf(this.origFormat)?this.origFormat:this.fallbackFormat&&-1!==t.indexOf(this.fallbackFormat)?this.fallbackFormat:"rgba"},toString:function(t,e,o){o=o||!1;var i=!1;switch(e=e||this.origFormat||this.fallbackFormat){case"rgb":return i=this.toRGB(),this.rgbaIsTransparent(i)?"transparent":"rgb("+i.r+","+i.g+","+i.b+")";case"rgba":return"rgba("+(i=this.toRGB()).r+","+i.g+","+i.b+","+i.a+")";case"hsl":return i=this.toHSL(),"hsl("+Math.round(360*i.h)+","+Math.round(100*i.s)+"%,"+Math.round(100*i.l)+"%)";case"hsla":return i=this.toHSL(),"hsla("+Math.round(360*i.h)+","+Math.round(100*i.s)+"%,"+Math.round(100*i.l)+"%,"+i.a+")";case"hex":return this.toHex(t);case"alias":return!1===(i=this.toAlias())?this.toString(t,this.getValidFallbackFormat()):o&&!(i in s.webColors)&&i in this.predefinedColors?this.predefinedColors[i]:i;default:return i}},stringParsers:[{re:/rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*?\)/,format:"rgb",parse:function(t){return[t[1],t[2],t[3],1]}},{re:/rgb\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,format:"rgb",parse:function(t){return[2.55*t[1],2.55*t[2],2.55*t[3],1]}},{re:/rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"rgba",parse:function(t){return[t[1],t[2],t[3],t[4]]}},{re:/rgba\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"rgba",parse:function(t){return[2.55*t[1],2.55*t[2],2.55*t[3],t[4]]}},{re:/hsl\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,format:"hsl",parse:function(t){return[t[1]/360,t[2]/100,t[3]/100,t[4]]}},{re:/hsla\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"hsla",parse:function(t){return[t[1]/360,t[2]/100,t[3]/100,t[4]]}},{re:/#?([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/,format:"hex",parse:function(t){return[parseInt(t[1],16),parseInt(t[2],16),parseInt(t[3],16),1]}},{re:/#?([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/,format:"hex",parse:function(t){return[parseInt(t[1]+t[1],16),parseInt(t[2]+t[2],16),parseInt(t[3]+t[3],16),1]}}],colorNameToHex:function(t){return void 0!==this.colors[t.toLowerCase()]&&this.colors[t.toLowerCase()]}}),inline:!1,color:!1,format:!1,input:"input",container:!1,component:".add-on, .input-group-addon",fallbackColor:!1,fallbackFormat:"hex",hexNumberSignPrefix:!0,sliders:{saturation:{maxLeft:100,maxTop:100,callLeft:"setSaturation",callTop:"setBrightness"},hue:{maxLeft:0,maxTop:100,callLeft:!1,callTop:"setHue"},alpha:{maxLeft:0,maxTop:100,callLeft:!1,callTop:"setAlpha"}},slidersHorz:{saturation:{maxLeft:100,maxTop:100,callLeft:"setSaturation",callTop:"setBrightness"},hue:{maxLeft:100,maxTop:0,callLeft:"setHue",callTop:!1},alpha:{maxLeft:100,maxTop:0,callLeft:"setAlpha",callTop:!1}},template:'<div class="colorpicker dropdown-menu"><div class="colorpicker-saturation"><i><b></b></i></div><div class="colorpicker-hue"><i></i></div><div class="colorpicker-alpha"><i></i></div><div class="colorpicker-color"><div /></div><div class="colorpicker-selectors"></div></div>',align:"right",customClass:null,colorSelectors:null},n=function(t,e){this.element=h(t).addClass("colorpicker-element"),this.options=h.extend(!0,{},a,this.element.data(),e),this.component=this.options.component,this.component=!1!==this.component&&this.element.find(this.component),this.component&&0===this.component.length&&(this.component=!1),this.container=!0===this.options.container?this.element:this.options.container,this.container=!1!==this.container&&h(this.container),this.input=this.element.is("input")?this.element:!!this.options.input&&this.element.find(this.options.input),this.input&&0===this.input.length&&(this.input=!1),this.color=this.createColor(!1!==this.options.color?this.options.color:this.getValue()),this.format=!1!==this.options.format?this.options.format:this.color.origFormat,!1!==this.options.color&&(this.updateInput(this.color),this.updateData(this.color)),this.disabled=!1;var o=this.picker=h(this.options.template);if(this.options.customClass&&o.addClass(this.options.customClass),this.options.inline?o.addClass("colorpicker-inline colorpicker-visible"):o.addClass("colorpicker-hidden"),this.options.horizontal&&o.addClass("colorpicker-horizontal"),-1===["rgba","hsla","alias"].indexOf(this.format)&&!1!==this.options.format&&"transparent"!==this.getValue()||o.addClass("colorpicker-with-alpha"),"right"===this.options.align&&o.addClass("colorpicker-right"),!0===this.options.inline&&o.addClass("colorpicker-no-arrow"),this.options.colorSelectors){var i=this,r=i.picker.find(".colorpicker-selectors");0<r.length&&(h.each(this.options.colorSelectors,function(t,e){var o=h("<i />").addClass("colorpicker-selectors-color").css("background-color",e).data("class",t).data("alias",t);o.on("mousedown.colorpicker touchstart.colorpicker",function(t){t.preventDefault(),i.setValue("alias"===i.format?h(this).data("alias"):h(this).css("background-color"))}),r.append(o)}),r.show().addClass("colorpicker-visible"))}o.on("mousedown.colorpicker touchstart.colorpicker",h.proxy(function(t){t.target===t.currentTarget&&t.preventDefault()},this)),o.find(".colorpicker-saturation, .colorpicker-hue, .colorpicker-alpha").on("mousedown.colorpicker touchstart.colorpicker",h.proxy(this.mousedown,this)),o.appendTo(this.container?this.container:h("body")),!1!==this.input&&(this.input.on({"keyup.colorpicker":h.proxy(this.keyup,this)}),this.input.on({"change.colorpicker":h.proxy(this.change,this)}),!1===this.component&&this.element.on({"focus.colorpicker":h.proxy(this.show,this)}),!1===this.options.inline&&this.element.on({"focusout.colorpicker":h.proxy(this.hide,this)})),!1!==this.component&&this.component.on({"click.colorpicker":h.proxy(this.show,this)}),!1===this.input&&!1===this.component&&this.element.on({"click.colorpicker":h.proxy(this.show,this)}),!1!==this.input&&!1!==this.component&&"color"===this.input.attr("type")&&this.input.on({"click.colorpicker":h.proxy(this.show,this),"focus.colorpicker":h.proxy(this.show,this)}),this.update(),h(h.proxy(function(){this.element.trigger("create")},this))};n.Color=s,n.prototype={constructor:n,destroy:function(){this.picker.remove(),this.element.removeData("colorpicker","color").off(".colorpicker"),!1!==this.input&&this.input.off(".colorpicker"),!1!==this.component&&this.component.off(".colorpicker"),this.element.removeClass("colorpicker-element"),this.element.trigger({type:"destroy"})},reposition:function(){if(!1!==this.options.inline||this.options.container)return!1;var t=this.container&&this.container[0]!==window.document.body?"position":"offset",e=this.component||this.element,o=e[t]();"right"===this.options.align&&(o.left-=this.picker.outerWidth()-e.outerWidth()),this.picker.css({top:o.top+e.outerHeight(),left:o.left})},show:function(t){this.isDisabled()||(this.picker.addClass("colorpicker-visible").removeClass("colorpicker-hidden"),this.reposition(),h(window).on("resize.colorpicker",h.proxy(this.reposition,this)),!t||this.hasInput()&&"color"!==this.input.attr("type")||t.stopPropagation&&t.preventDefault&&(t.stopPropagation(),t.preventDefault()),!this.component&&this.input||!1!==this.options.inline||h(window.document).on({"mousedown.colorpicker":h.proxy(this.hide,this)}),this.element.trigger({type:"showPicker",color:this.color}))},hide:function(t){if(void 0!==t&&t.target&&(0<h(t.currentTarget).parents(".colorpicker").length||0<h(t.target).parents(".colorpicker").length))return!1;this.picker.addClass("colorpicker-hidden").removeClass("colorpicker-visible"),h(window).off("resize.colorpicker",this.reposition),h(window.document).off({"mousedown.colorpicker":this.hide}),this.update(),this.element.trigger({type:"hidePicker",color:this.color})},updateData:function(t){return t=t||this.color.toString(!1,this.format),this.element.data("color",t),t},updateInput:function(t){return t=t||this.color.toString(!1,this.format),!1!==this.input&&(this.input.prop("value",t),this.input.trigger("change")),t},updatePicker:function(t){void 0!==t&&(this.color=this.createColor(t));var e=!1===this.options.horizontal?this.options.sliders:this.options.slidersHorz,o=this.picker.find("i");if(0!==o.length)return!1===this.options.horizontal?(e=this.options.sliders,o.eq(1).css("top",e.hue.maxTop*(1-this.color.value.h)).end().eq(2).css("top",e.alpha.maxTop*(1-this.color.value.a))):(e=this.options.slidersHorz,o.eq(1).css("left",e.hue.maxLeft*(1-this.color.value.h)).end().eq(2).css("left",e.alpha.maxLeft*(1-this.color.value.a))),o.eq(0).css({top:e.saturation.maxTop-this.color.value.b*e.saturation.maxTop,left:this.color.value.s*e.saturation.maxLeft}),this.picker.find(".colorpicker-saturation").css("backgroundColor",this.color.toHex(!0,this.color.value.h,1,1,1)),this.picker.find(".colorpicker-alpha").css("backgroundColor",this.color.toHex(!0)),this.picker.find(".colorpicker-color, .colorpicker-color div").css("backgroundColor",this.color.toString(!0,this.format)),t},updateComponent:function(t){var e;if(e=void 0!==t?this.createColor(t):this.color,!1!==this.component){var o=this.component.find("i").eq(0);0<o.length?o.css({backgroundColor:e.toString(!0,this.format)}):this.component.css({backgroundColor:e.toString(!0,this.format)})}return e.toString(!1,this.format)},update:function(t){var e;return!1===this.getValue(!1)&&!0!==t||(e=this.updateComponent(),this.updateInput(e),this.updateData(e),this.updatePicker()),e},setValue:function(t){this.color=this.createColor(t),this.update(!0),this.element.trigger({type:"changeColor",color:this.color,value:t})},createColor:function(t){return new s(t||null,this.options.colorSelectors,this.options.fallbackColor?this.options.fallbackColor:this.color,this.options.fallbackFormat,this.options.hexNumberSignPrefix)},getValue:function(t){var e;return t=void 0===t?this.options.fallbackColor:t,void 0!==(e=this.hasInput()?this.input.val():this.element.data("color"))&&""!==e&&null!==e||(e=t),e},hasInput:function(){return!1!==this.input},isDisabled:function(){return this.disabled},disable:function(){return this.hasInput()&&this.input.prop("disabled",!0),this.disabled=!0,this.element.trigger({type:"disable",color:this.color,value:this.getValue()}),!0},enable:function(){return this.hasInput()&&this.input.prop("disabled",!1),this.disabled=!1,this.element.trigger({type:"enable",color:this.color,value:this.getValue()}),!0},currentSlider:null,mousePointer:{left:0,top:0},mousedown:function(t){!t.pageX&&!t.pageY&&t.originalEvent&&t.originalEvent.touches&&(t.pageX=t.originalEvent.touches[0].pageX,t.pageY=t.originalEvent.touches[0].pageY),t.stopPropagation(),t.preventDefault();var e=h(t.target).closest("div"),o=this.options.horizontal?this.options.slidersHorz:this.options.sliders;if(!e.is(".colorpicker")){if(e.is(".colorpicker-saturation"))this.currentSlider=h.extend({},o.saturation);else if(e.is(".colorpicker-hue"))this.currentSlider=h.extend({},o.hue);else{if(!e.is(".colorpicker-alpha"))return!1;this.currentSlider=h.extend({},o.alpha)}var i=e.offset();this.currentSlider.guide=e.find("i")[0].style,this.currentSlider.left=t.pageX-i.left,this.currentSlider.top=t.pageY-i.top,this.mousePointer={left:t.pageX,top:t.pageY},h(window.document).on({"mousemove.colorpicker":h.proxy(this.mousemove,this),"touchmove.colorpicker":h.proxy(this.mousemove,this),"mouseup.colorpicker":h.proxy(this.mouseup,this),"touchend.colorpicker":h.proxy(this.mouseup,this)}).trigger("mousemove")}return!1},mousemove:function(t){!t.pageX&&!t.pageY&&t.originalEvent&&t.originalEvent.touches&&(t.pageX=t.originalEvent.touches[0].pageX,t.pageY=t.originalEvent.touches[0].pageY),t.stopPropagation(),t.preventDefault();var e=Math.max(0,Math.min(this.currentSlider.maxLeft,this.currentSlider.left+((t.pageX||this.mousePointer.left)-this.mousePointer.left))),o=Math.max(0,Math.min(this.currentSlider.maxTop,this.currentSlider.top+((t.pageY||this.mousePointer.top)-this.mousePointer.top)));return this.currentSlider.guide.left=e+"px",this.currentSlider.guide.top=o+"px",this.currentSlider.callLeft&&this.color[this.currentSlider.callLeft].call(this.color,e/this.currentSlider.maxLeft),this.currentSlider.callTop&&this.color[this.currentSlider.callTop].call(this.color,o/this.currentSlider.maxTop),!1!==this.options.format||"setAlpha"!==this.currentSlider.callTop&&"setAlpha"!==this.currentSlider.callLeft||(1!==this.color.value.a?(this.format="rgba",this.color.origFormat="rgba"):(this.format="hex",this.color.origFormat="hex")),this.update(!0),this.element.trigger({type:"changeColor",color:this.color}),!1},mouseup:function(t){return t.stopPropagation(),t.preventDefault(),h(window.document).off({"mousemove.colorpicker":this.mousemove,"touchmove.colorpicker":this.mousemove,"mouseup.colorpicker":this.mouseup,"touchend.colorpicker":this.mouseup}),!1},change:function(t){this.keyup(t)},keyup:function(t){38===t.keyCode?(this.color.value.a<1&&(this.color.value.a=Math.round(100*(this.color.value.a+.01))/100),this.update(!0)):40===t.keyCode?(0<this.color.value.a&&(this.color.value.a=Math.round(100*(this.color.value.a-.01))/100),this.update(!0)):(this.color=this.createColor(this.input.val()),this.color.origFormat&&!1===this.options.format&&(this.format=this.color.origFormat),!1!==this.getValue(!1)&&(this.updateData(),this.updateComponent(),this.updatePicker())),this.element.trigger({type:"changeColor",color:this.color,value:this.input.val()})}},h.colorpicker=n,h.fn.colorpicker=function(o){var i=Array.prototype.slice.call(arguments,1),t=1===this.length,r=null,e=this.each(function(){var t=h(this),e=t.data("colorpicker");e||(e=new n(this,"object"==typeof o?o:{}),t.data("colorpicker",e)),"string"==typeof o?h.isFunction(e[o])?r=e[o].apply(e,i):(i.length&&(e[o]=i[0]),r=e[o]):r=t});return t?r:e},h.fn.colorpicker.constructor=n});