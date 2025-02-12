<?php
// NEWS -> IDB
// IDB 가져오기
require_once '/home/users/aws506/www/common.php';
$http_url = $_SERVER[ "HTTP_HOST" ];

$SET_NO = '';
$app_name = '';
$APP_CODE = '';
$category_code = 'D003';
$query = " SELECT set_number, app_code, app_name FROM app WHERE app_code LIKE '%$category_code%' ";

$queryResult = querySelect($query);
foreach($queryResult as $key => $val) {
	$SET_NO   = $val['set_number'];
	$APP_CODE = $val['app_code'];
	$app_name = $val['app_name'];
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
	<link rel="stylesheet" href="./css/news.css">
	<link rel="stylesheet" href="./css/news_header.css">
</head>
<body>
	<div id="wrap" class="news_page">
	<?php include './header.php'; ?>
		<main>
			<div class="contents_wrap">
				<h2 class="title">최신 뉴스<?=$title?></h2>
				<div class="ads_wrap ads_main_sm">
					<ins class="adsbygoogle"
						style="display: block;"
						data-language="ko"
						data-ad-client="ca-pub-1139252621617676"
						data-ad-slot="5195970488"
						></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<ul>
					<?
						$query = " SELECT category_code FROM common WHERE app_code='$APP_CODE' and set_number = '$SET_NO' ";
						$queryResult = querySelect($query);
						foreach($queryResult as $key => $val) {
							if( $debug ) echo('category_code : '.$category_code.'<br>');

							//$q1 = "SELECT news_code FROM news_link WHERE set_number = '$SET_NO' and category_code = '$category_code' order by news_code ";
							$q1 = "SELECT distinct nl.news_code as news_code, news.title, news.content, news.news_date, news.link FROM news_link as nl left join news on nl.news_code = news.news_code WHERE set_number = '$SET_NO' and category_code = '$category_code' order by REPLACE(news_date,'.','') *1 desc, news_code desc limit 10";
							
							$r1 = querySelect($q1);
							//if( $debug ) echo('q1 : '.$q1 .'<br>');

							$i = 1;
							foreach($r1 as $key => $val) {
								$code = $val['news_code'];
								$title = $val['title'];
								$content = $val['content'];
								$str = mb_strimwidth($content,0,150,'...','utf-8');
								$news_date = $val['news_date'];
								$link = $val['link'];
								$link = str_replace("http://", "https://", $link); 
								
						?>
					<li>
				
						<div class="content_box">
							<a href="<?=$link?>" class="newslink">
								<h3><?=$title?><p class="date"><?=$news_date?></p>	</h3>
								<p class="content"><?=$str?></p>
									
							</a>
						</div>
					</li>
					<?php
							if($i % 3 == 0) {
								echo '
								<div class="ads_wrap ads_main_sm">
									<ins class="adsbygoogle"
										style="display: block;"
										data-language="ko"
										data-ad-client="ca-pub-1139252621617676"
										data-ad-slot="5195970488"
										></ins>
									<script>
										(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>                               
								';
							}
						?>
					<?php 
						$i++;
						}
					}
					?>
				</ul>
			</div>
		</main>
	</div>
</body>
<?php include 'footer.php'; ?>

</html>