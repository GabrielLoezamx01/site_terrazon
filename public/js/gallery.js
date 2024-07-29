(()=>{function e(l){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e(l)}function l(l,r,a){var t;return t=function(l,r){if("object"!=e(l)||!l)return l;var a=l[Symbol.toPrimitive];if(void 0!==a){var t=a.call(l,r||"default");if("object"!=e(t))return t;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===r?String:Number)(l)}(r,"string"),(r="symbol"==e(t)?t:t+"")in l?Object.defineProperty(l,r,{value:a,enumerable:!0,configurable:!0,writable:!0}):l[r]=a,l}function r(e,l){return function(e){if(Array.isArray(e))return e}(e)||function(e,l){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var a,t,o,n,i=[],y=!0,c=!1;try{if(o=(r=r.call(e)).next,0===l){if(Object(r)!==r)return;y=!1}else for(;!(y=(a=o.call(r)).done)&&(i.push(a.value),i.length!==l);y=!0);}catch(e){c=!0,t=e}finally{try{if(!y&&null!=r.return&&(n=r.return(),Object(n)!==n))return}finally{if(c)throw t}}return i}}(e,l)||function(e,l){if(!e)return;if("string"==typeof e)return a(e,l);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return a(e,l)}(e,l)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function a(e,l){(null==l||l>e.length)&&(l=e.length);for(var r=0,a=new Array(l);r<l;r++)a[r]=e[r];return a}!function(){function e(){return document.body.webkitRequestFullScreen||document.body.requestFullScreen||document.body.mozRequestFullScreen}function a(e,l,r){var a=document.createElement(e);return r.appendChild(a),l&&(a.className=l),a}function t(e,l){return(e%l+l)%l}Gallery=l(l({dom:{},width:0,height:0,config:{minWidth:300,minHeight:300,horizontalPadding:20,verticalPadding:20,leftArea:.3,prefetch:3},initDom:function(){Gallery.dom.overlay=a("div","gallery-overlay",document.body),Gallery.dom.overlay.addEventListener("click",Gallery.close),Gallery.dom.outer=a("div","gallery-outer",document.body),Gallery.dom.inner=a("div","gallery-inner",Gallery.dom.outer),Gallery.dom.screen=a("div","gallery-screen",Gallery.dom.inner),Gallery.dom.screen.addEventListener("mousemove",Gallery.mousemove),Gallery.dom.screen.addEventListener("click",Gallery.click),Gallery.dom.left=a("div","gallery-left",Gallery.dom.screen),Gallery.dom.right=a("div","gallery-right",Gallery.dom.screen),Gallery.dom.image=a("img","gallery-image",Gallery.dom.screen),Gallery.dom.fullscreen=a("div","gallery-fullscreen",Gallery.dom.screen),Gallery.dom.fullscreen.addEventListener("click",Gallery.fullscreen),e()||(Gallery.dom.fullscreen.style.display="none"),Gallery.dom.bottombar=a("div","gallery-bottombar",Gallery.dom.screen),Gallery.dom.count=a("span","gallery-count",Gallery.dom.bottombar),Gallery.dom.close=a("a","gallery-close",Gallery.dom.bottombar),Gallery.dom.close.innerHTML="Cerrar",Gallery.dom.close.href="javascript:;",Gallery.dom.close.addEventListener("click",Gallery.close),Gallery.dom.original=a("a","gallery-original",Gallery.dom.bottombar),Gallery.dom.original.target="_blank",Gallery.dom.original.innerHTML="Original",Gallery.dom.zoomControls=a("div","gallery-zoom-controls",Gallery.dom.screen),Gallery.dom.zoomIn=a("button","gallery-zoom-in",Gallery.dom.bottombar),Gallery.dom.zoomIn.innerHTML="+",Gallery.dom.zoomIn.addEventListener("click",(function(e){e.stopPropagation(),Gallery.zoom(1.5)})),Gallery.dom.zoomOut=a("button","gallery-zoom-out",Gallery.dom.bottombar),Gallery.dom.zoomOut.innerHTML="-",Gallery.dom.zoomOut.addEventListener("click",(function(e){e.stopPropagation(),Gallery.zoom(1/1.5)})),Gallery.dom.img=document.createElement("img"),Gallery.dom.img.onload=function(){Gallery.dom.image.src=Gallery.images[Gallery.current].href,Gallery.dom.image.style.display="block",Gallery.resize()},Gallery.dom.screen.addEventListener("touchstart",Gallery.touchstart,{passive:!1}),Gallery.dom.screen.addEventListener("touchmove",Gallery.touchmove,{passive:!1}),Gallery.dom.screen.addEventListener("touchend",Gallery.touchend),window.addEventListener("orientationchange",Gallery.resize),window.addEventListener("resize",Gallery.resize),window.addEventListener("keydown",(function(e){"block"===Gallery.dom.overlay.style.display&&(39===e.keyCode&&Gallery.change(1),37===e.keyCode&&Gallery.change(-1),27===e.keyCode&&Gallery.close())})),Gallery.initDom=function(){}},init:function(){var e=document.querySelectorAll(".gallery[id] a");Array.prototype.forEach.call(e,(function(e){e.removeEventListener("click",Gallery.showEvent),e.addEventListener("click",Gallery.showEvent)}));var l=document.location.hash.indexOf("image=");if(-1!==l){var r=document.location.hash.substr(l+6).split(":"),a=document.getElementById("gallery-"+r[0]);if(a){var t=a.querySelectorAll("a")[r[1]-1];t&&Gallery.show(t)}}},getOffsetX:function(e){var l=e.offsetX;void 0===e.offsetX&&(l=e.layerX);for(var r=e.target;r!==Gallery.dom.screen;)l+=r.offsetLeft,r=r.parentElement;return l},isBottomBar:function(e){for(var l=e.target;l!==Gallery.dom.screen;){if(l===Gallery.dom.bottombar)return!0;l=l.parentElement}return!1},zoom:function(e){var l=Gallery.currentScale*e;l=Math.max(1,Math.min(l,10)),Gallery.setImageScale(l)},mousemove:function(e){Gallery.isBottomBar(e)||e.target===Gallery.dom.fullscreen?(Gallery.dom.left.className="gallery-left",Gallery.dom.right.className="gallery-right"):Gallery.getOffsetX(e)<Gallery.width*Gallery.config.leftArea?(Gallery.dom.left.className="gallery-left gallery-active",Gallery.dom.right.className="gallery-right"):(Gallery.dom.left.className="gallery-left",Gallery.dom.right.className="gallery-right gallery-active")},click:function(e){Gallery.isBottomBar(e)||(Gallery.getOffsetX(e)<Gallery.width*Gallery.config.leftArea?Gallery.change(-1):Gallery.change(1))},change:function(e){Gallery.current=t(Gallery.current+e,Gallery.images.length),Gallery.update()},update:function(){Gallery.dom.count.innerHTML=Gallery.current+1+" of "+Gallery.images.length,Gallery.dom.img.src=Gallery.images[Gallery.current].href,Gallery.dom.original.href=Gallery.images[Gallery.current].href,document.location.hash="image="+Gallery.id+":"+(Gallery.current+1),Gallery.dom.image.style.display="none",Gallery.resize(),Gallery.dom.image.style.transform="translate(0px, 0px) scale(1)",Gallery.currentScale=1;for(var e=0;e<Gallery.config.prefecth;++e){var l=t(Gallery.current+e+1,Gallery.images.length);(new Image).src=Gallery.images[l]}},fullscreen:function(e){var l;(l=Gallery.dom.inner).requestFullScreen?l.requestFullScreen():l.mozRequestFullScreen?l.mozRequestFullScreen():l.webkitRequestFullScreen&&l.webkitRequestFullScreen(),e.stopPropagation()},resize:function(){document.fullScreenElement||document.mozFullScreen||document.webkitIsFullScreen?(Gallery.dom.inner.style.left="0",Gallery.dom.inner.style.top="0",Gallery.width=window.innerWidth,Gallery.height=window.innerHeight,Gallery.dom.fullscreen.style.display="none"):(Gallery.width=Math.max(Gallery.config.minWidth,Math.min(Math.max(Gallery.width,Gallery.dom.img.width),window.innerWidth-Gallery.config.horizontalPadding)),Gallery.height=Math.max(Gallery.config.minHeight,Math.min(Math.max(Gallery.height,Gallery.dom.img.height),window.innerHeight-Gallery.config.verticalPadding)),Gallery.dom.inner.style.left=-Gallery.width/2+"px",Gallery.dom.inner.style.top=-Gallery.height/2+"px",e()&&(Gallery.dom.fullscreen.style.display="block")),Gallery.dom.inner.style.width=Gallery.width+"px",Gallery.dom.inner.style.height=Gallery.height+"px";var l,r,a=Gallery.dom.img.width/Gallery.dom.img.height;Gallery.width<Gallery.dom.img.width||Gallery.height<Gallery.dom.img.height?(l=Gallery.width,(r=Gallery.width/a)>Gallery.height&&(l=Gallery.height*a,r=Gallery.height)):(l=Gallery.dom.img.width,r=Gallery.dom.img.height),Gallery.dom.image.width=l,Gallery.dom.image.height=r,Gallery.dom.image.style.left=Gallery.width/2-l/2+"px",Gallery.dom.image.style.top=Gallery.height/2-r/2+"px",Gallery.dom.overlay.style.height="100vh"},close:function(){Gallery.dom.overlay.style.display="none",Gallery.dom.outer.style.display="none",Gallery.width=0,Gallery.height=0,document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen(),document.location.hash="_",Gallery.dom.img.src=""},show:function(e){for(var l=e;"A"!==l.nodeName;)l=l.parentElement;for(var r=e.parentElement;-1===r.className.indexOf("gallery");)r=r.parentElement;Gallery.id=r.id.replace(/^gallery-/,""),Gallery.images=r.querySelectorAll("a"),Gallery.current=Array.prototype.indexOf.call(Gallery.images,l),Gallery.initDom(),Gallery.update(),Gallery.dom.overlay.style.display="block",Gallery.dom.outer.style.display="block"},showEvent:function(e){0!==e.button||e.ctrlKey||e.metaKey||(Gallery.show(e.target),e.preventDefault())},touchstart:function(e){Gallery.touchStartTime=(new Date).getTime(),Gallery.touchStartX=e.touches[0].clientX,Gallery.touchStartY=e.touches[0].clientY,Gallery.lastTouchX=Gallery.touchStartX,Gallery.lastTouchY=Gallery.touchStartY,Gallery.isTouching=!0,Gallery.hasMoved=!1,2===e.touches.length?(e.preventDefault(),Gallery.zooming=!0,Gallery.startDistance=Gallery.getDistance(e.touches[0],e.touches[1]),Gallery.startScale=Gallery.currentScale||1):(Gallery.zooming=!1,Gallery.startDrag())},touchmove:function(e){if(Gallery.zooming&&2===e.touches.length){e.preventDefault();var l=Gallery.getDistance(e.touches[0],e.touches[1])/Gallery.startDistance*Gallery.startScale;Gallery.setImageScale(l)}else if(1===e.touches.length){var r=e.touches[0].clientX,a=e.touches[0].clientY;Gallery.lastTouchX=r,Gallery.lastTouchY=a,(Math.abs(r-Gallery.touchStartX)>10||Math.abs(a-Gallery.touchStartY)>10)&&(Gallery.hasMoved=!0)}},touchend:function(e){(new Date).getTime(),Gallery.touchStartTime;Gallery.zooming?(Gallery.zooming=!1,Gallery.currentScale=Gallery.getImageScale()):Gallery.hasMoved,Gallery.isTouching=!1,Gallery.hasMoved=!1,Gallery.stopDrag()},startDrag:function(){Gallery.dragInterval||(Gallery.dragInterval=setInterval((function(){if(Gallery.isTouching&&Gallery.currentScale>1){var e=Gallery.lastTouchX-Gallery.touchStartX,l=Gallery.lastTouchY-Gallery.touchStartY;Gallery.panImage(e,l),Gallery.touchStartX=Gallery.lastTouchX,Gallery.touchStartY=Gallery.lastTouchY}}),16))},stopDrag:function(){Gallery.dragInterval&&(clearInterval(Gallery.dragInterval),Gallery.dragInterval=null)},panImage:function(e,l){var a=Gallery.dom.image,t=a.getBoundingClientRect(),o=Gallery.dom.screen.getBoundingClientRect(),n=r(((a.style.transform||"").match(/translate\((.*?)\)/)||["","0px, 0px"])[1].split(",").map((function(e){return parseFloat(e)||0})),2),i=n[0]+e,y=n[1]+l,c=Math.max(0,(t.width-o.width)/2),m=Math.max(0,(t.height-o.height)/2);i=Math.max(-c,Math.min(i,c)),y=Math.max(-m,Math.min(y,m)),a.style.transform="translate(".concat(i,"px, ").concat(y,"px) scale(").concat(Gallery.currentScale,")")},setImageScale:function(e){Gallery.currentScale=e;var l=Gallery.dom.image,r=(l.style.transform||"").match(/translate\((.*?)\)/)||["translate(0px, 0px)"];l.style.transform="".concat(r[0]," scale(").concat(e,")"),Gallery.updateZoomButtons()},updateZoomButtons:function(){Gallery.currentScale<=1?(Gallery.dom.zoomOut.style.opacity="0.5",Gallery.dom.zoomOut.disabled=!0):(Gallery.dom.zoomOut.style.opacity="1",Gallery.dom.zoomOut.disabled=!1),Gallery.currentScale>=10?(Gallery.dom.zoomIn.style.opacity="0.5",Gallery.dom.zoomIn.disabled=!0):(Gallery.dom.zoomIn.style.opacity="1",Gallery.dom.zoomIn.disabled=!1)}},"change",(function(e){var l=t(Gallery.current+e,Gallery.images.length),r=new Image;r.onload=function(){Gallery.current=l,Gallery.dom.image.src=r.src,Gallery.update()},r.src=Gallery.images[l].href})),"getDistance",(function(e,l){var r=e.clientX-l.clientX,a=e.clientY-l.clientY;return Math.sqrt(r*r+a*a)})),document.addEventListener("DOMContentLoaded",Gallery.init)}()})();
//# sourceMappingURL=gallery.js.map