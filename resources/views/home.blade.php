<!DOCTYPE html>
<html>
<head>
	<title>Portal de Noticias Esamc</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />

</head>
<body>

<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
      <div class="top_menu floatleft">
      	<a href="#"><img src="assets/images/logo.png" alt=""  /></a>
        <ul>
          <li><a href="/noticias">Noticias</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Subscribe</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </div>
      <div class="social_plus_search floatright">
        <div class="search">
          <form action="#" method="post" id="search_form">
            <input type="text" value="Search news" id="s" />
            <input type="submit" id="searchform" value="search" />
            <input type="hidden" value="post" name="post_type" />
          </form>
        </div>
      </div>
    </div>
		
	@yield('text')

	<div class="footer_top_area">
      <div class="inner_footer_top"> <img src="images/add3.png" alt="" /> </div>
    </div>
    <div class="footer_bottom_area">
      <div class="footer_menu">
        <ul id="f_menu">
          <li><a href="#">world news</a></li>
          <li><a href="#">sports</a></li>
          <li><a href="#">tech</a></li>
          <li><a href="#">business</a></li>
          <li><a href="#">Movies</a></li>
          <li><a href="#">entertainment</a></li>
          <li><a href="#">culture</a></li>
          <li><a href="#">Books</a></li>
          <li><a href="#">classifieds</a></li>
          <li><a href="#">blogs</a></li>
        </ul>
      </div>
      <div class="copyright_text">
        <p> TCC </p>
        <p> 2018 </p>
      </div>
    </div>
  </div>

<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
<script type="text/javascript">
selectnav('nav', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
selectnav('f_menu', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});
</script>
</body>
</html>