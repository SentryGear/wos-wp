function overviewResTypo(){$(".container-overview-text").css("font-size",18+18*(window.innerWidth-320)/1360+"px")}function musesResTypo(){$(".slider-slide-caption").css("font-size",50+30*(window.innerWidth-1100)/580+"px"),$(".slider-slide-caption").css("letter-spacing",3+3*(window.innerWidth-1100)/580+"px")}function renderContent(){function e(e){C.runAnimationsAt(e.clientX)}$(".slider-slide-image").each(function(){var e=$(this);e.width(window.innerWidth/4)});var t=$(".slider-slide-image").map(function(){return $(this).height()}).get(),o=Math.max.apply(null,t),n=!0;$(".container").append('<audio autoplay loop class="container-audioplayer"><source src="'+backgroundAudio+'" type="audio/mpeg"></audio>'),$(".container-audio-icon").attr("src",templateUrl+"/public/images/audio-on.svg"),$(".container-audio-icon").on("click",function(){n?(n=!1,$(this).attr("src",templateUrl+"/public/images/audio-off.svg"),$(".container-audioplayer").trigger("pause")):(n=!0,$(this).attr("src",templateUrl+"/public/images/audio-on.svg"),$(".container-audioplayer").trigger("play"))});var i=document.body,r=document.documentElement,s=Math.max(i.scrollHeight,i.offsetHeight,r.clientHeight,r.scrollHeight,r.offsetHeight),a=document.getElementById("container-overview"),c=parseInt(window.getComputedStyle(a).getPropertyValue("height")),l=(parseInt(window.getComputedStyle(a).getPropertyValue("padding-top")),document.getElementById("container-collection")),d=parseInt(window.getComputedStyle(l).getPropertyValue("height")),f=parseInt(window.getComputedStyle(l).getPropertyValue("padding-top")),w=document.getElementById("container-collection-title"),p=parseInt(window.getComputedStyle(w).getPropertyValue("height")),g=$(".container-muses-title").height()+parseInt($(".container-muses-title").css("margin-bottom"))+parseInt($(".container-muses").css("padding-bottom"))+parseInt($(".container-muses").css("padding-top"))+o,h=document.getElementById("container-follow"),u=parseInt(window.getComputedStyle(h).getPropertyValue("height")),m=parseInt(window.getComputedStyle(h).getPropertyValue("padding-top")),y=(parseInt(window.getComputedStyle(h).getPropertyValue("padding-bottom")),1.5*window.innerHeight+c-p/2),b=y+f+p,v=window.innerHeight+c+d,x=v+.75*window.innerHeight,H=1.5*window.innerHeight+c+d+g-u/2,S=H+m+u,k=function(e){var t=(e.to-e.from)*e.progress+e.from,o="inset 0 0 0 "+t+"px #fff";e.node.style[e.style]=o},T=new Choreographer({customFunctions:{boxShadowScale:k},animations:[{range:[window.innerHeight,window.innerHeight+60],selector:".container-audio",type:"scale",style:"top",from:14,to:-46,unit:"px"},{range:[window.innerHeight,1.75*window.innerHeight],selector:".container-header-title",type:"scale",style:"opacity",from:1,to:.75},{range:[window.innerHeight,1.75*window.innerHeight],selector:".container-header-title",type:"scale",style:"background-size",from:50,to:40,unit:"vw"},{range:[window.innerHeight,1.75*window.innerHeight],selector:".container-header-title",type:"scale",style:"left",from:25,to:30,unit:"vw"},{range:[1.75*window.innerHeight,s],selector:".container-header-title",type:"change",style:"visibility",to:"hidden"},{range:[window.innerHeight,2*window.innerHeight],selector:".container-overview-portrait",type:"scale",style:"opacity",from:0,to:1},{range:[y,b],selector:".container-collection",type:"scale",style:"opacity",from:0,to:1},{range:[y,b],selector:".container-collection",type:"scale",style:"transform:scale",from:.9,to:1},{range:[y,b],selector:".container-collection",type:"scale",style:"transform:translateY",from:1.25*-(f+p),to:0,unit:"px"},{range:[v,x],selector:".container-muses",type:"scale",style:"opacity",from:0,to:1},{range:[H,S],selector:".container-follow",type:"scale",style:"top",from:-(m+u),to:0,unit:"px"},{range:[H,S],selector:".container-follow",type:"scale",style:"opacity",from:0,to:1},{range:[H,S],selector:".container-follow",type:"scale",style:"transform:scale",from:.9,to:1},{range:[S,s],selector:".container-follow",type:"change",style:"z-index",to:1},{range:[1.5*window.innerHeight,s],selector:".container-video",type:"change",style:"filter",to:"brightness(0.5)"},{range:[-1,window.innerHeight+1],selector:"#dot-header",type:"change",style:"box-shadow",to:"inset 0 0 0 8px #fff"},{range:[window.innerHeight,2*window.innerHeight],selector:"#dot-header",type:"boxShadowScale",style:"box-shadow",from:8,to:1},{range:[2*window.innerHeight,s],selector:"#dot-header",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[-1,window.innerHeight],selector:"#dot-overview",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[window.innerHeight,2*window.innerHeight],selector:"#dot-overview",type:"boxShadowScale",style:"box-shadow",from:1,to:8},{range:[2*window.innerHeight-1,y-.5*window.innerHeight+1],selector:"#dot-overview",type:"change",style:"box-shadow",to:"inset 0 0 0 8px #fff"},{range:[y-.5*window.innerHeight,y+.5*window.innerHeight],selector:"#dot-overview",type:"boxShadowScale",style:"box-shadow",from:8,to:1},{range:[y+.5*window.innerHeight,s],selector:"#dot-overview",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[-1,y-.5*window.innerHeight],selector:"#dot-collection",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[y-.5*window.innerHeight,y+.5*window.innerHeight],selector:"#dot-collection",type:"boxShadowScale",style:"box-shadow",from:1,to:8},{range:[y+.5*window.innerHeight-1,v+1],selector:"#dot-collection",type:"change",style:"box-shadow",to:"inset 0 0 0 8px #fff"},{range:[v,v+window.innerHeight],selector:"#dot-collection",type:"boxShadowScale",style:"box-shadow",from:8,to:1},{range:[v+window.innerHeight,s],selector:"#dot-collection",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[-1,v],selector:"#dot-muses",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[v,v+window.innerHeight],selector:"#dot-muses",type:"boxShadowScale",style:"box-shadow",from:1,to:8},{range:[v+window.innerHeight-1,v+g+1],selector:"#dot-muses",type:"change",style:"box-shadow",to:"inset 0 0 0 8px #fff"},{range:[v+g,v+g+window.innerHeight],selector:"#dot-muses",type:"boxShadowScale",style:"box-shadow",from:8,to:1},{range:[v+g+window.innerHeight,s],selector:"#dot-muses",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[-1,v+g],selector:"#dot-follow",type:"change",style:"box-shadow",to:"inset 0 0 0 1px #fff"},{range:[v+g,v+g+window.innerHeight],selector:"#dot-follow",type:"boxShadowScale",style:"box-shadow",from:1,to:8}]});window.addEventListener("scroll",function(){T.runAnimationsAt(window.pageYOffset)}),$(window).mousewheel(function(e){0===pageYOffset&&e.deltaY>0?($(".container-header-title").css("transform","translateY(237px)"),$(".container-video").css("filter","brightness(0.5)"),$("#top-footer").css("transform","translateY(0px)")):0===pageYOffset&&e.deltaY<0&&($(".container-header-title").css("transform","translateY(0px)"),$(".container-video").css("filter","brightness(0.5)"),$("#top-footer").css("transform","translateY(-237px)"))});var C=new Choreographer({animations:[{range:[-1,window.innerWidth],selector:"#slider",type:"scale",style:"transform:translateX",from:100,to:-100,unit:"px"}]});$("#slider").hover(function(){window.addEventListener("mousemove",e,!0)},function(){window.removeEventListener("mousemove",e,!0),$(this).css("transform","translateX(0px)")}),$(function(){$('a[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html, body").animate({scrollTop:e.offset().top},1e3),!1}})})}var clicking=!1;$(".container-footer-subscribe-form-button").mousedown(function(){clicking=!0,$(".container-footer-subscribe-form").css("background-color","#ef636e"),$(".container-footer-subscribe-form-button").css("color","#ffffff"),$(".container-footer-subscribe-form-input").css("color","#ffffff"),$(".container-footer-subscribe-form-input").addClass("white-placeholder")}),$(".container-footer-subscribe-form-button").mouseup(function(){clicking=!1,$(".container-footer-subscribe-form").css("background-color","#ffffff"),$(".container-footer-subscribe-form-button").css("color","#ef636e"),$(".container-footer-subscribe-form-input").css("color","#000000"),$(".container-footer-subscribe-form-input").removeClass("white-placeholder")}),$(".container-footer-subscribe-form-button").mouseout(function(){clicking&&($(".container-footer-subscribe-form").css("background-color","#ffffff"),$(".container-footer-subscribe-form-button").css("color","#ef636e"),$(".container-footer-subscribe-form-input").css("color","#000000"),$(".container-footer-subscribe-form-input").removeClass("white-placeholder"))}),function(e){e.event.special.doubletap={bindType:"touchend",delegateType:"touchend",handle:function(e){var t=e.handleObj,o=jQuery.data(e.target),n=(new Date).getTime(),i=o.lastTouch?n-o.lastTouch:0,r=null==r?300:r;i<r&&i>30?(o.lastTouch=null,e.type=t.origType,["clientX","clientY","pageX","pageY"].forEach(function(t){e[t]=e.originalEvent.changedTouches[0][t]}),t.handler.apply(this,arguments)):o.lastTouch=n}}}(jQuery);var viewerEvent=window.innerWidth>=1100?"click":"doubletap";$(".container-collection-images-image").on(viewerEvent,function(){function e(e){t=e,o=$(".container-collection-images-image").eq(t.index()-1),n=$(".container-collection-images-image").eq(t.is(":last-child")?0:t.index()+1),$(".viewer-images-image.center").attr("src",t.attr("src").replace("-230x310","")),$(".viewer-images-image.left").attr("src",o.attr("src").replace("-230x310","")),$(".viewer-images-image.right").attr("src",n.attr("src").replace("-230x310",""))}$(".d-viewer").css("display","initial");var t,o,n;e($(this)),$(".viewer-arrow.left").on("click",function(){e(o)}),$(".viewer-arrow.right").on("click",function(){e(n)}),$(".viewer").css("display","block").animate({opacity:1},200)}),$(".viewer-close").on("click",function(){$(".d-viewer").css("display","none"),$(".viewer").animate({opacity:0},200,function(){$(this).css("display","none")})}),$(document).ready(function(){$("#slider").slick({arrows:!1,centerMode:!0,infinite:!0,initialSlide:6,variableWidth:!0}),$(".slider-slide-image").mousewheel(function(e){e.preventDefault(),e.deltaY<0||e.deltaX<0?$("#slider").slick("slickNext"):$("#slider").slick("slickPrev")}),$(".slider-slide-caption").mousewheel(function(e){e.preventDefault(),e.deltaY<0||e.deltaX<0?$("#slider").slick("slickNext"):$("#slider").slick("slickPrev")})}),overviewResTypo(),$(window).on("resize",function(){overviewResTypo()}),innerWidth>=1100&&(musesResTypo(),$(window).on("resize",function(){musesResTypo()})),("OS X"===platform.os.family&&"Chrome"===platform.name||"iOS"===platform.os.family&&"Safari"===platform.name&&("iPad"===platform.product||"iPhone"===platform.product))&&$("#container-follow-link-text").css("top","45%");