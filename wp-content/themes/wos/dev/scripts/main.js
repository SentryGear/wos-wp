// Footer's subscribe focus styling
var clicking = false;

$( ".container-footer-subscribe-form-button" ).mousedown(function() {
  clicking = true;

  $( ".container-footer-subscribe-form" ).css('background-color', '#ef636e');
  $( ".container-footer-subscribe-form-button" ).css('color', '#ffffff');
  $( ".container-footer-subscribe-form-input" ).css('color', '#ffffff');
  $( ".container-footer-subscribe-form-input" ).addClass('white-placeholder');
});

$( ".container-footer-subscribe-form-button" ).mouseup(function() {
  clicking = false;

  $( ".container-footer-subscribe-form" ).css('background-color', '#ffffff');
  $( ".container-footer-subscribe-form-button" ).css('color', '#ef636e');
  $( ".container-footer-subscribe-form-input" ).css('color', '#000000');
  $( ".container-footer-subscribe-form-input" ).removeClass('white-placeholder');
});

$( ".container-footer-subscribe-form-button" ).mouseout(function() {
  if (!clicking) {
    return;
  } else {
    $( ".container-footer-subscribe-form" ).css('background-color', '#ffffff');
    $( ".container-footer-subscribe-form-button" ).css('color', '#ef636e');
    $( ".container-footer-subscribe-form-input" ).css('color', '#000000');
    $( ".container-footer-subscribe-form-input" ).removeClass('white-placeholder');
  }
});

// Doubletap
(function($){

  $.event.special.doubletap = {
    bindType: 'touchend',
    delegateType: 'touchend',

    handle: function(event) {
      var handleObj   = event.handleObj,
          targetData  = jQuery.data(event.target),
          now         = new Date().getTime(),
          delta       = targetData.lastTouch ? now - targetData.lastTouch : 0,
          delay       = delay == null ? 300 : delay;

      if (delta < delay && delta > 30) {
        targetData.lastTouch = null;
        event.type = handleObj.origType;
        ['clientX', 'clientY', 'pageX', 'pageY'].forEach(function(property) {
          event[property] = event.originalEvent.changedTouches[0][property];
        })

        // let jQuery handle the triggering of "doubletap" event handlers
        handleObj.handler.apply(this, arguments);
      } else {
        targetData.lastTouch = now;
      }
    }
  };

})(jQuery);

// Collection image viewer
var viewerEvent = window.innerWidth >= 1100 ? 'click' : 'doubletap';
$( '.container-collection-images-image' ).on(viewerEvent, function () {
  $('.d-viewer').css('display', 'initial');

  var img, imgPrev, imgNext;

  function setImages(mainImg) {
    img = mainImg;
    imgPrev = $('.container-collection-images-image').eq( img.index() - 1 );
    imgNext = $('.container-collection-images-image').eq( img.is(':last-child') ? 0 : img.index() + 1 );

    $('.viewer-images-image.center').attr('src', img.attr('src').replace('-230x310', ''));
    $('.viewer-images-image.left').attr('src', imgPrev.attr('src').replace('-230x310', ''));
    $('.viewer-images-image.right').attr('src', imgNext.attr('src').replace('-230x310', ''));
  }

  setImages($(this));

  $( '.viewer-arrow.left' ).on('click', function () {
    setImages(imgPrev);
  });

  $( '.viewer-arrow.right' ).on('click', function () {
    setImages(imgNext);
  });

  $('.viewer').css('display', 'block').animate({opacity: 1}, 200);
});

$( '.viewer-close' ).on('click', function () {
  $('.d-viewer').css('display', 'none');

  $('.viewer').animate({opacity: 0}, 200, function() {
    $(this).css('display', 'none');
  })
});

$(document).ready(function(){
  $('#slider').slick({
    arrows: false,
    centerMode: true,
    infinite: true,
    initialSlide: 6,
    variableWidth: true
  });

  $('.slider-slide-image').mousewheel(function(e) {
    e.preventDefault();

    if (e.deltaY < 0 || e.deltaX < 0) {
      $('#slider').slick('slickNext');
    }
    else {
      $('#slider').slick('slickPrev');
    }
  });

  $('.slider-slide-caption').mousewheel(function(e) {
    e.preventDefault();

    if (e.deltaY < 0 || e.deltaX < 0) {
      $('#slider').slick('slickNext');
    }
    else {
      $('#slider').slick('slickPrev');
    }
  });
});

// Overview responsive typo
function overviewResTypo() {
  $( ".container-overview-text" ).css('font-size', 18 + (36 - 18) * (window.innerWidth - 320) / (1680 - 320) + 'px');
}

overviewResTypo();

$( window ).on('resize', function () {
  overviewResTypo();
});

if (innerWidth >= 1100) {

  // Overview fix for retina
  function overviewTextWidth() {
    $( '.container-overview-text' ).width($( '.container-overview' ).width() - ($( '.container-overview-portrait' ).width() + parseInt($( '.container-overview-portrait' ).css( 'margin-left' ))));
  }

  overviewTextWidth();

  // Muses responsive typo
  function musesResTypo() {
    $( ".slider-slide-caption" ).css('font-size', 50 + (80 - 50) * (window.innerWidth - 1100) / (1680 - 1100) + 'px');
    $( ".slider-slide-caption" ).css('letter-spacing', 3 + (6 - 3) * (window.innerWidth - 1100) / (1680 - 1100) + 'px');
  }

  musesResTypo();

  $( window ).on('resize', function () {
    overviewTextWidth();
    musesResTypo();
  });
}

// Follow link vertical centring for Safari
if ((platform.os.family === 'OS X' && platform.name === 'Chrome') || (platform.os.family === 'iOS' && platform.name === 'Safari' && (platform.product === 'iPad' || platform.product === 'iPhone'))) {
  $('#container-follow-link-text').css('top', '45%');
}

// Special for desktop
function renderContent() {
  // Muses slider configuration
  $('.slider-slide-image').each( function() {
    var $img = $( this );
    $img.width( window.innerWidth / 4 );
  });

  var elementHeights = $('.slider-slide-image').map(function() {
    return $(this).height();
  }).get();

  var maxHightSlide = Math.max.apply(null, elementHeights);

  // Fancy stuff
  var isAudioPlaing = true;

  $( '.container' ).append('<audio autoplay loop class="container-audioplayer"><source src="'+ backgroundAudio +'" type="audio/mpeg"></audio>');
  $( '.container-audio-icon' ).attr('src', templateUrl +'/public/images/audio-on.svg');

  $( '.container-audio-icon' ).on('click', function () {
    if (isAudioPlaing) {
      isAudioPlaing = false;
      $(this).attr('src', templateUrl +'/public/images/audio-off.svg');
      $( '.container-audioplayer' ).trigger('pause');
    } else {
      isAudioPlaing = true;
      $(this).attr('src', templateUrl +'/public/images/audio-on.svg');
      $( '.container-audioplayer' ).trigger('play');
    }
  });

  var body = document.body,
      html = document.documentElement;

  var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

  var overview = document.getElementById('container-overview'),
      overviewHeight = parseInt(window.getComputedStyle(overview).getPropertyValue('height')),
      overviewPaddingTop = parseInt(window.getComputedStyle(overview).getPropertyValue('padding-top'));

  var collection = document.getElementById('container-collection'),
      collectionHeight = parseInt(window.getComputedStyle(collection).getPropertyValue('height')),
      collectionPaddingTop = parseInt(window.getComputedStyle(collection).getPropertyValue('padding-top'));

      var collectionTitle = document.getElementById('container-collection-title'),
          collectionTitleHeight = parseInt(window.getComputedStyle(collectionTitle).getPropertyValue('height'));

  var musesHeight =
    $('.container-muses-title').height() +
    parseInt($('.container-muses-title').css('margin-bottom')) +
    parseInt($('.container-muses').css('padding-bottom')) +
    parseInt($('.container-muses').css('padding-top')) +
    maxHightSlide;

  var follow = document.getElementById('container-follow'),
      followHeight = parseInt(window.getComputedStyle(follow).getPropertyValue('height')),
      followPaddingTop = parseInt(window.getComputedStyle(follow).getPropertyValue('padding-top')),
      followPaddingBottom = parseInt(window.getComputedStyle(follow).getPropertyValue('padding-bottom'));

  var pointStartCollection = window.innerHeight * 1.5 + overviewHeight - collectionTitleHeight / 2,
      pointEndCollection = pointStartCollection + collectionPaddingTop + collectionTitleHeight;

  var pointStartMuses = window.innerHeight + overviewHeight + collectionHeight,
      pointEndMuses = pointStartMuses + window.innerHeight * .75;

  var pointStartFollow =
      window.innerHeight * 1.5 + overviewHeight + collectionHeight + musesHeight - followHeight / 2,
      pointEndFollow = pointStartFollow + followPaddingTop + followHeight;

  var boxShadowScale = function boxShadowScale(data) {
    var scaledValue = ((data.to - data.from) * data.progress) + data.from;
    var scaledValueString = 'inset 0 0 0 ' + scaledValue + 'px #fff';
    data.node.style[data.style] = scaledValueString;
  };

  var choreographerS = new Choreographer({
    customFunctions: {
      boxShadowScale: boxShadowScale
    },
    animations: [
      // Audio controller
      {
        range: [window.innerHeight, window.innerHeight + 60],
        selector: '.container-audio',
        type: 'scale',
        style: 'top',
        from: 14,
        to: -46,
        unit: 'px'
      },

      // Header
      {
        range: [window.innerHeight, window.innerHeight * 1.75],
        selector: '.container-header-title',
        type: 'scale',
        style: 'opacity',
        from: 1,
        to: .75
      },
      {
        range: [window.innerHeight, window.innerHeight * 1.75],
        selector: '.container-header-title',
        type: 'scale',
        style: 'background-size',
        from: 50,
        to: 40,
        unit: 'vw'
      },
      {
        range: [window.innerHeight, window.innerHeight * 1.75],
        selector: '.container-header-title',
        type: 'scale',
        style: 'left',
        from: 25,
        to: 30,
        unit: 'vw'
      },
      {
        range: [window.innerHeight * 1.75, height],
        selector: '.container-header-title',
        type: 'change',
        style: 'visibility',
        to: 'hidden'
      },

      // Overview portrait
      {
        range: [window.innerHeight, window.innerHeight * 2],
        selector: '.container-overview-portrait',
        type: 'scale',
        style: 'opacity',
        from: 0,
        to: 1
      },

      // Collection
      {
        range: [pointStartCollection, pointEndCollection],
        selector: '.container-collection',
        type: 'scale',
        style: 'opacity',
        from: 0,
        to: 1
      },
      {
        range: [pointStartCollection, pointEndCollection],
        selector: '.container-collection',
        type: 'scale',
        style: 'transform:scale',
        from: .9,
        to: 1
      },
      {
        range: [pointStartCollection, pointEndCollection],
        selector: '.container-collection',
        type: 'scale',
        style: 'transform:translateY',
        from: -(collectionPaddingTop + collectionTitleHeight) * 1.25,
        to: 0,
        unit: 'px'
      },

      // Muses
      {
        range: [pointStartMuses, pointEndMuses],
        selector: '.container-muses',
        type: 'scale',
        style: 'opacity',
        from: 0,
        to: 1
      },

      // Follow
      {
        range: [pointStartFollow, pointEndFollow],
        selector: '.container-follow',
        type: 'scale',
        style: 'top',
        from: -(followPaddingTop + followHeight),
        to: 0,
        unit: 'px'
      },
      {
        range: [pointStartFollow, pointEndFollow],
        selector: '.container-follow',
        type: 'scale',
        style: 'opacity',
        from: 0,
        to: 1
      },
      {
        range: [pointStartFollow, pointEndFollow],
        selector: '.container-follow',
        type: 'scale',
        style: 'transform:scale',
        from: .9,
        to: 1
      },
      {
        range: [pointEndFollow, height],
        selector: '.container-follow',
        type: 'change',
        style: 'z-index',
        to: 1
      },

      // Fade video
      {
        range: [window.innerHeight * 1.5, height],
        selector: '.container-video',
        type: 'change',
        style: 'filter',
        to: 'brightness(0.5)'
      },

      // Animaitons for navigation dots
      // dot-header
      {
        range: [-1, window.innerHeight + 1],
        selector: '#dot-header',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 8px #fff'
      },
      {
        range: [window.innerHeight, window.innerHeight * 2],
        selector: '#dot-header',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 8,
        to: 1
      },
      {
        range: [window.innerHeight * 2, height],
        selector: '#dot-header',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      // dot-overview
      {
        range: [-1, window.innerHeight],
        selector: '#dot-overview',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      {
        range: [window.innerHeight, window.innerHeight * 2],
        selector: '#dot-overview',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 1,
        to: 8
      },
      {
        range: [window.innerHeight * 2 - 1, pointStartCollection - window.innerHeight * .5 + 1],
        selector: '#dot-overview',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 8px #fff'
      },
      {
        range: [pointStartCollection - window.innerHeight * .5, pointStartCollection + window.innerHeight * .5],
        selector: '#dot-overview',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 8,
        to: 1
      },
      {
        range: [pointStartCollection + window.innerHeight * .5, height],
        selector: '#dot-overview',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      // dot-collection
      {
        range: [-1, pointStartCollection - window.innerHeight * .5],
        selector: '#dot-collection',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      {
        range: [pointStartCollection - window.innerHeight * .5, pointStartCollection + window.innerHeight * .5],
        selector: '#dot-collection',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 1,
        to: 8
      },
      {
        range: [pointStartCollection + window.innerHeight * .5 - 1, pointStartMuses + 1],
        selector: '#dot-collection',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 8px #fff'
      },
      {
        range: [pointStartMuses, pointStartMuses + window.innerHeight],
        selector: '#dot-collection',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 8,
        to: 1
      },
      {
        range: [pointStartMuses + window.innerHeight, height],
        selector: '#dot-collection',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      // dot-muses
      {
        range: [-1, pointStartMuses],
        selector: '#dot-muses',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      {
        range: [pointStartMuses, pointStartMuses + window.innerHeight],
        selector: '#dot-muses',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 1,
        to: 8
      },
      {
        range: [pointStartMuses + window.innerHeight - 1, pointStartMuses + musesHeight + 1],
        selector: '#dot-muses',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 8px #fff'
      },
      {
        range: [pointStartMuses + musesHeight, pointStartMuses + musesHeight + window.innerHeight],
        selector: '#dot-muses',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 8,
        to: 1
      },
      {
        range: [pointStartMuses + musesHeight + window.innerHeight, height],
        selector: '#dot-muses',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      // dot-follow
      {
        range: [-1, pointStartMuses + musesHeight],
        selector: '#dot-follow',
        type: 'change',
        style: 'box-shadow',
        to: 'inset 0 0 0 1px #fff'
      },
      {
        range: [pointStartMuses + musesHeight, pointStartMuses + musesHeight + window.innerHeight],
        selector: '#dot-follow',
        type: 'boxShadowScale',
        style: 'box-shadow',
        from: 1,
        to: 8
      }
    ]
  });

  window.addEventListener('scroll', function() {
    choreographerS.runAnimationsAt(window.pageYOffset);
  });

  $( window ).mousewheel(function(e) {
    if ((pageYOffset === 0) && (e.deltaY > 0)) {
      $( '.container-header-title' ).css('transform', 'translateY(237px)');
      $( '.container-video' ).css('filter', 'brightness(0.5)');
      $( '#top-footer' ).css('transform', 'translateY(0px)');
    } else if ((pageYOffset === 0) && (e.deltaY < 0)) {
      $( '.container-header-title' ).css('transform', 'translateY(0px)');
      $( '.container-video' ).css('filter', 'brightness(0.5)');
      $( '#top-footer' ).css('transform', 'translateY(-237px)');
    }
  });

  var choreographerM = new Choreographer({
    animations: [
      {
        range: [-1, window.innerWidth],
        selector: '#slider',
        type: 'scale',
        style: 'transform:translateX',
        from: 100,
        to: -100,
        unit: 'px'
      }
    ]
  })

  function mousemoveAnimations(e) {
    choreographerM.runAnimationsAt(e.clientX);
  }

  $( '#slider' ).hover(
    function() {
      window.addEventListener('mousemove', mousemoveAnimations, true);
    }, function() {
      window.removeEventListener('mousemove', mousemoveAnimations, true);
      $(this).css('transform', 'translateX(0px)');
    }
  );

  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });
}
