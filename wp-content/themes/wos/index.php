<?php
  if (isset($_POST['submit'])) {
    if(!file_exists("subscribers.txt")) {
      die("File not found");
    } else {
      $today = date("Y-m-d H:i:s");
      $email = $_POST['email'];
      $file = 'subscribers.txt';
      $current = file_get_contents($file);
      $current .= $today." ".$email."\n";
      file_put_contents($file, $current);
    }
  }
?>

<?php

  require 'requires/render_functions.php';

  $background_audio = wos_get_media('Background audio');

  $background_video = wos_get_media('Background video');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php wp_head(); ?>

  <script type="text/javascript">

    var templateUrl = '<?php bloginfo('template_url'); ?>';

    var backgroundAudio = "<?php echo $background_audio ?>";

    var backgroundVideo = "<?php echo $background_video ?>";

  </script>

  <title>WALK OF SHAME</title>

  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/public/images/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/public/images/favicon-32x32.png" sizes="32x32" />

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta property="og:image" content="http://walkofshame.moscow/public/images/share.jpg" />
  <meta property="og:og:description" content="Walk of Shame is a brand founded in 2011 by designer Andrey Artyomov. Collections capture the spirit of easy-going Moscow rooftops summer nights, raves and grunge of 90-s, freedom and abundance of 2000-s - dedication to the raucous youth of Andrey and his friends. Inspiration comes from his school years in Ufa, endless Moscow revelries, and the DJ sets of famous friends. Each season collections feature variations signature pieces: slip dresses, bathrobe fur coats, oversized bomber jackets and high quality denim. WOS loyal clientele and muses include Natasha Goldenberg, Leandra Medine (Man Repeller), Elle Fanning and Rihanna." />
  <meta property="og:title" content="WALK OF SHAME" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://walkofshame.moscow/" />

  <script type="text/javascript">
    if (window.innerWidth >= 1100) {
      var loadStatus = false;

      $( window ).mousewheel(function(e) {
        if (!loadStatus) {
          e.preventDefault();
          e.stopPropagation();
        }
      });

      function incrementLoader() {
        var progressStatus = parseInt($( '.loader-layer2' ).css('width')) + window.innerWidth / 25;
        if (progressStatus >= window.innerWidth / 2) {
          clearInterval(progress);
        } else {
          $( '.loader-layer2' ).css('width', progressStatus + 'px');
        }
      }

      var progress = setInterval(incrementLoader, 1000);

      window.onload = function(){
        clearInterval(progress);

        function renderVideo() {
          var elVideo = document.createElement('video');
          var attrClass = document.createAttribute('class');
          var attrAutoplay = document.createAttribute('autoplay');
          var attrLoop = document.createAttribute('loop');
          var attrMuted = document.createAttribute('muted');

          attrClass.value = 'container-video';

          elVideo.setAttributeNode(attrClass);
          elVideo.setAttributeNode(attrAutoplay);
          elVideo.setAttributeNode(attrLoop);
          elVideo.setAttributeNode(attrMuted);

          var elSource = document.createElement('source');
          var attrSrc = document.createAttribute('src');

          attrSrc.value = backgroundVideo;
          elSource.setAttributeNode(attrSrc);

          elVideo.appendChild(elSource)

          document.getElementById('container').appendChild(elVideo);
        }

        renderVideo();

        $( '.loader-layer2' ).animate({
          width: (window.innerWidth / 2) + 'px'
        }, 500, function() {
          renderContent();

          $( '.loader' ).animate({
            opacity: 0
          }, 500, function() {
            $( this ).css('display', 'none');
            loadStatus = true;
          });
        });
      };
    };
  </script>
</head>
<body>
  <div class="loader">
    <div class="loader-layer1"></div>
    <div class="loader-layer2"></div>
  </div>
  <div class="container" id="container">
    <div class="container-audio">
      <img class="container-audio-icon" src="<?php bloginfo('template_url'); ?>/public/images/audio-off.svg" />
    </div>

    <nav class="container-nav">
      <a class="container-nav-dot" id="dot-header" href="#anchor-header"
        style="box-shadow: rgb(255, 255, 255) 0px 0px 0px 8px inset;"></a>
      <a class="container-nav-dot" id="dot-overview" href="#anchor-overview"></a>
      <a class="container-nav-dot" id="dot-collection" href="#anchor-collection"></a>
      <a class="container-nav-dot" id="dot-muses" href="#anchor-muses"></a>
      <a class="container-nav-dot" id="dot-follow" href="#anchor-follow"></a>
    </nav>

    <div class="container-footer" id="top-footer">
      <div class="container-footer-contacts">
        <div class="container-footer-contacts-title">CONTACTS</div>

        <?php render_contacts(); ?>

      </div>
      <div class="container-footer-subscribe">
        <div class="container-footer-subscribe-title">SUBSCRIBE TO THE NEWS AND UPDATES</div>
        <form class="container-footer-subscribe-form" id="subscribe-top" action="index.php" method="post">
          <input required class="container-footer-subscribe-form-input" type="email" name="email" placeholder="Email">
          <button class="container-footer-subscribe-form-button" type="submit" name="submit">SUBSCRIBE</button>
        </form>
      </div>
      <div class="container-footer-follow">
        <div class="container-footer-follow-title">FOLLOW US</div>
        <div class="container-footer-follow-blocks">
          <a href="https://www.instagram.com/walkofshamemoscow/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/insta.svg" />
            <span class="container-footer-follow-blocks-block-text">INSTAGRAM</span>
          </a>
          <a href="https://www.facebook.com/walkofshamemoscow/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/fb.svg" />
            <span class="container-footer-follow-blocks-block-text">FACEBOOK</span>
          </a>
          <a href="http://walkofshamemoscow.tumblr.com/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/tumblr.svg" />
            <span class="container-footer-follow-blocks-block-text">TUMBLR</span>
          </a>
        </div>
      </div>
    </div>

    <div id="anchor-header"></div>
    <div class="container-header">
      <div class="container-header-title"></div>
    </div>

    <div id="anchor-overview"></div>
    <div class="container-overview" id="container-overview">

      <?php render_intro(); ?>

    </div>

    <div id="anchor-collection"></div>
    <div class="container-collection" id="container-collection">
      <div class="container-collection-title" id="container-collection-title">COLLECTION RESORT 2017</div>
      <div class="container-collection-images">
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/1.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/2.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/3.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/4.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/5.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/6.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/7.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/8.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/9.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/10.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/11.jpg" />
        <img class="container-collection-images-image" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/12.jpg" />

        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/13.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/14.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/15.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/16.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/17.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/18.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/19.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/20.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/21.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/22.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/23.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/24.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/25.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/26.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/27.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/28.jpg" />
        <img class="container-collection-images-image d-viewer" src="<?php bloginfo('template_url'); ?>/public/images/collection/thumbnails/29.jpg" />
      </div>
    </div>

    <div id="anchor-muses"></div>
    <div class="container-muses" id="container-muses">
      <div class="container-muses-title">WHO WEARS</div>
      <div id="slider">
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/kacy hill.jpg" />
          <a href="https://www.instagram.com/kacyhill/" target="_blank" class="slider-slide-caption">kacy hill</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/cleo wade.jpg" />
          <a href="https://www.instagram.com/cleowade/" target="_blank" class="slider-slide-caption">cleo wade</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/lilit rashoyan.jpg" />
          <a href="https://www.instagram.com/ah_lilit/" target="_blank" class="slider-slide-caption">lilit rashoyan</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/mia moretti.jpg" />
          <a href="https://www.instagram.com/miamoretti/" target="_blank" class="slider-slide-caption">mia moretti</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/rihanna.jpg" />
          <a href="https://www.instagram.com/badgalriri/" target="_blank" class="slider-slide-caption">rihanna</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/olga karput.jpg" />
          <a href="https://www.instagram.com/okarput/" target="_blank" class="slider-slide-caption">olga karput</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/natasha goldenberg.jpg" />
          <a href="https://www.instagram.com/ngoldenberg/" target="_blank" class="slider-slide-caption">natasha goldenberg</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/avdotja alexandrova.jpg" />
          <a href="https://www.instagram.com/vidunja/" target="_blank" class="slider-slide-caption">avdotja alexandrova</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/raveena aurora.jpg" />
          <a href="https://www.instagram.com/raveenaaurora/" target="_blank" class="slider-slide-caption">raveena aurora</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/leandra medine.jpg" />
          <a href="https://www.instagram.com/leandramedine/" target="_blank" class="slider-slide-caption">leandra medine</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/elle faning.jpg" />
          <a href="https://www.instagram.com/ellefanning/" target="_blank" class="slider-slide-caption">elle fanning</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/lena perminova.jpg" />
          <a href="https://www.instagram.com/lenaperminova/" target="_blank" class="slider-slide-caption">lena perminova</a>
        </div>
        <div class="slider-slide">
          <img class="slider-slide-image" src="<?php bloginfo('template_url'); ?>/public/images/muses/matilda shnurova.jpg" />
          <a href="https://www.instagram.com/mshnurova/" target="_blank" class="slider-slide-caption">matilda shnurova</a>
        </div>
      </div>
    </div>

    <div id="anchor-follow"></div>
    <div class="container-follow" id="container-follow">
      <div class="container-follow-title">FOLLOW US ON</div>
      <a href="https://www.instagram.com/walkofshamemoscow/" target="_blank" class="container-follow-link"><span id="container-follow-link-text">INSTAGRAM</span></a>
    </div>

    <div class="container-stores">
      <div class="container-stores-title">WHERE TO BUY</div>
      <div class="container-stores-zones">

        <?php render_stores(); ?>

        <div class="container-stores-zones-fake"></div>
        <div class="container-stores-zones-fake"></div>
      </div>
    </div>

    <div class="container-footer">
      <div class="container-footer-contacts">
        <div class="container-footer-contacts-title">CONTACTS</div>

        <?php render_contacts(); ?>

      </div>
      <div class="container-footer-subscribe">
        <div class="container-footer-subscribe-title">SUBSCRIBE TO THE NEWS AND UPDATES</div>
        <form class="container-footer-subscribe-form" id="subscribe-bottom" action="index.php" method="post">
          <input required class="container-footer-subscribe-form-input" type="email" name="email" placeholder="Email">
          <button class="container-footer-subscribe-form-button" type="submit" name="submit">SUBSCRIBE</button>
        </form>
      </div>
      <div class="container-footer-tcopy">designed by <a href="http://wednesdaystudio.co/" target="_blank">wednesday</a></div>
      <div class="container-footer-follow">
        <div class="container-footer-follow-title">FOLLOW US</div>
        <div class="container-footer-follow-blocks">
          <a href="https://www.instagram.com/walkofshamemoscow/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/insta.svg" />
            <span class="container-footer-follow-blocks-block-text">INSTAGRAM</span>
          </a>
          <a href="https://www.facebook.com/walkofshamemoscow/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/fb.svg" />
            <span class="container-footer-follow-blocks-block-text">FACEBOOK</span>
          </a>
          <a href="http://walkofshamemoscow.tumblr.com/" target="_blank" class="container-footer-follow-blocks-block">
            <img class="container-footer-follow-blocks-block-icon" src="<?php bloginfo('template_url'); ?>/public/images/tumblr.svg" />
            <span class="container-footer-follow-blocks-block-text">TUMBLR</span>
          </a>
        </div>
      </div>
      <div class="container-footer-copy">designed by <a href="http://wednesdaystudio.co/" target="_blank">wednesday</a></div>
    </div>
  </div>

  <div class="viewer">
    <img class="viewer-close" src="<?php bloginfo('template_url'); ?>/public/images/close.svg" />
    <img class="viewer-arrow left" src="<?php bloginfo('template_url'); ?>/public/images/arrow.svg" />
    <img class="viewer-arrow right" src="<?php bloginfo('template_url'); ?>/public/images/arrow.svg" />
    <div class="viewer-images">
      <img class="viewer-images-image left">
      <img class="viewer-images-image center">
      <img class="viewer-images-image right">
    </div>
  </div>

  <?php wp_footer(); ?>
</body>
</html>
