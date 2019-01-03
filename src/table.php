<style>
.table-btn {
    position: relative;
    height: 33px;
    max-width: 105px;
    width: 100%;
    line-height: 33px;
    border-radius: 5px;
    display: inline-block;
    color: #ffffff !important;
    font-size: 14px;
    padding: 0 10px;
    font-weight: 700;
    text-transform: initial;
    text-align: center;
    text-decoration: none;
    transition: all .5s ease;
    z-index: 2;
}
.table-btn-default {
    background: linear-gradient(45deg, #3abfff 0%, #90dfaa 100%);
}

.table-btn-default:before {
  border-radius: inherit;
  content: '';
  display: block;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  z-index: -100;
  transition: opacity 0.45s ease-in-out;
  background: linear-gradient(45deg, #90dfaa 0%, #3abfff 100%);
}
.table-btn-default:hover:before {
  opacity: 1;
}
.table-btn-default:active:before {
  opacity: 0;
}
.table-btn-primary {
    background-image: linear-gradient(45deg, #ca327e 0%, #f73455 100%);
}
.table-btn-primary:before {
  border-radius: inherit;
  content: '';
  display: block;
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  z-index: -100;
  transition: opacity 0.45s ease-in-out;
  background-image: linear-gradient(45deg, #f73455 0%, #ca327e 100%);
}
.table-btn-primary:hover:before {
  opacity: 1;
}
.table-btn-primary:active:before {
  opacity: 0;
}
</style>
<section class="table-wr">
  <div class="table">
    <div class="t-name">
      <div class="t-name-item">
        <i class="svg-icon-1 svg-icon-1-dims "></i>
        Logiciel
      </div>
      <div class="t-name-item">
        <i class="svg-icon-2 svg-icon-2-dims "></i>
        But
      </div>
      <div class="t-name-item">
        <i class="svg-icon-3 svg-icon-3-dims "></i>
        revue
      </div>
      <div class="t-name-item">
        <i class="svg-icon-4 svg-icon-4-dims "></i>
        OS Support
      </div>
      <div class="t-name-item">
        <i class="svg-icon-5 svg-icon-5-dims "></i>
        remboursement
      </div>
      <div class="t-name-item">
        <i class="svg-icon-6 svg-icon-6-dims "></i>
        assistance
      </div>
      <div class="t-name-item">
        <i class="svg-icon-7 svg-icon-7-dims "></i>
        Prix
      </div>
      <div class="t-name-item">
      </div>
    </div>
    <div class="t-mspy">
      <div class="t-product-item">
        <img src="<?php echo get_template_directory_uri(); ?>/img/mspy-ic.svg">
        mSpy
      </div>
      <div class="t-product-item">
        5.0
      </div>
      <div class="t-product-item">
        <a href="#">Lire</a>
      </div>
      <div class="t-product-item">
        <i class="svg-android-icon svg-android-icon-dims"></i>
        <i class="svg-ios-icon svg-ios-icon-dims"></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-10 svg-icon-10-dims "></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-10 svg-icon-10-dims "></i>
      </div>
      <div class="t-product-item">
        € 29.99
      </div>
      <div class="t-product-item">
        <a rel="nofollow" class="table-btn table-btn-primary" href="<?php echo esc_attr($a['url1']) ;?>">TÉLÉCHARGEZ</a>
      </div>
    </div>
    <div class="t-mobilespy">
      <div class="t-product-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/mobilespy-ic.svg">
        MobileSpy
      </div>
      <div class="t-product-item">
        4.7
      </div>
      <div class="t-product-item">
        <a href="#">Lire</a>
      </div>
      <div class="t-product-item">
        <i class="svg-android-icon svg-android-icon-dims"></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-11 svg-icon-11-dims "></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-11 svg-icon-11-dims "></i>
      </div>
      <div class="t-product-item">
        € 49.97
      </div>
      <div class="t-product-item">
        <a rel="nofollow" class="table-btn table-btn-default" href="<?php echo esc_attr($a['url2']) ;?>">Le site</a>
      </div>
    </div>
    <div class="t-spybubble">
      <div class="t-product-item">
      <img src="<?php echo get_template_directory_uri(); ?>/img/spybubble-ic.svg">
        SpyBubble
      </div>
      <div class="t-product-item">
        4.3
      </div>
      <div class="t-product-item">
        <a href="#">Lire</a>
      </div>
      <div class="t-product-item">
        <i class="svg-android-icon svg-android-icon-dims"></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-11 svg-icon-11-dims "></i>
      </div>
      <div class="t-product-item">
        <i class="svg-icon-11 svg-icon-11-dims "></i>
      </div>
      <div class="t-product-item">
        € 49.95
      </div>
      <div class="t-product-item">
      <a rel="nofollow" class="table-btn table-btn-default" href="<?php echo esc_attr($a['url3']) ;?>">Le site</a>
      </div>
    </div>
  </div>
</section>