</main>
<footer id="footer">
  <nav class="nav-footer-sub">
    <div class="wrapper">
      <div class="rows">
        <div class="cols col-12">
          <ul class="list-footer-nav-sub">
            <?php wp_nav_menu(array('theme_location' => 'footernav1', 'container' => false, 'items_wrap' => '%3$s')); ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="footer-main">
    <div class="wrapper">
      <div class="rows">
        <div class="cols col-6 col-12-md col-12-sm">
          <div class="footer-block footer-about">
            <div class="footer-about-logo"><span class="logo-footer"><a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/common/logo_white.svg" alt="私とマチのネットワーク I＋[イット]" width="89"></a></span><span class="logo-footer-caption">I＋[イット]とは</span></div>
            <div class="footer-about-content">
              <p>I+[イット]はWebデザイナー養成スクール、デジタルハリウッドSTUDIO米子の受講生＆卒業生達で創っているフリーペーパーです。</p>
              <p>デジハリで学んだスキルを活用し、「デジタル×アナログの新しいカタチ」をコンセプトに学びながら情報発信するフリーマガジン＆Webサイトです。</p>
              <div class="footer-about-bottom">
                <p><a class="link link-primary" href="/about/">詳しく見る</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="cols col-6 col-12-md col-12-sm pdx-0-sm">
          <nav class="nav-footer-main">
            <ul class="list-footer-main">
              <li><a href="/">トップページ</a></li>
            </ul>
            <ul class="list-footer-main">
              <?php wp_nav_menu(array('theme_location' => 'footernav2', 'container' => false, 'items_wrap' => '%3$s')); ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom copyright">
    <p><small>Copyright © 2018 Yonago Contents Factory All Rights Reserved.</small></p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
