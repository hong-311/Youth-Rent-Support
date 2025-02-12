<?php include './db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<?php include "./front_header.php";?>
	<link rel="stylesheet" href="./css/home.css">
</head>
<body>
	<div id="wrap">
		<?php include './header.php'; ?>
		<div class="section1">
				<h2><img src="./img/main-icon.png">청년월세특별지원사업이란?</h2>
				<p>경제적 어려움을 겪는 청년층의 주거비 부담을 덜어드리기 위해, 매월 <span>최대 20만원</span>까지 <span>12개월간 월세를 지원</span>하는 프로그램입니다.</p>
			</div>
		<main>
			<a class="btn" href="./sub1.php?categorycode=A">
				<div class="section1_1">
					<div class="left">
					<p>청년월세특별지원</p><img src="./img/btn-arrow-1.png">
					</div>
					<div class="right"><img src="./img/btn-icon-1.png"></div>
				</div>
			</a>
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
			<div class="section2">

				<h3>자취하는 청년들을 위한 월세 지원금</h3>
				<div class="section2_1">
					<a class="a1" href="./sub1.php?categorycode=B">청년주거급여<img src="./img/btn-arrow-2.png"></a>
					<a class="a2" href="./sub1.php?categorycode=C">월세 세액공제<img src="./img/btn-arrow-2.png"></a>
				</div>
			</div>
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
			<div class="section2">
				<h3>청년월세지원</h3>
				<div class="section2_2">
					<a class="a1" href="https://www.bokjiro.go.kr/ssis-tbu/twatbz/mkclAsis/SelfDiagnosisYouthHousView.do">청년월세지원 모의계산<img src="./img/btn-arrow-2.png"></a>
					<a class="a2" href="https://www.bokjiro.go.kr/ssis-tbu/index.do">청년월세지원 신청하기<img src="./img/btn-arrow-2.png"></a>
				</div>
			</div>
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
			<div class="section3">
				<h3>자주 묻는 질문</h3>
				<a href="./qna.php"><p>더보기 +</p></a>
			</div>
			<div class="qna">
				<p class="q">월세가 70만 원을 초과하는 경우에는 신청할 수 없나요?</p>
				<p class="a">아닙니다. 월세가 70만 원을 초과하더라도, 보증금을 월세환산한 금액과 월세의 합이 90만 원 이하인 경우에는 지원이 가능합니다. <br>보증금(원)x5.5÷12(개)</p>
			</div>
			<div class="qna">
				<p class="q">이미 지원을 받은 경우에도 다시 지원할 수 있나요?</p>
				<p class="a">네. 이미 기존 1차 사업이나 지자체의 사업에서 월세 지원을 받은 청년이라도, 이번 2차 사업에 신청할 수 있습니다.</p>
			</div>
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
			<div class="section3">
				<h3>최신뉴스</h3>
					<a href="./news.php"><p>더보기 +</p></a>
			</div>
				<div class="contents">
					<?
						// 뉴스코드 지원
						// require_once '/home/users/aws500_app/www/common.php';
						// require_once '/home/users/aws501_app/www/common.php';
						// require_once '/home/users/aws502_app/www/common.php';
						// require_once '/home/users/aws503_app/www/common.php';
						// require_once '/home/users/aws504_app/www/common.php';
						// require_once '/home/users/aws899_app/www/common.php';
						require_once '/home/users/aws506/www/common.php';
						$http_url = $_SERVER[ "HTTP_HOST" ];
						$app_name = '';
						$APP_CODE = '';
						$category_code = 'D003'; // 뉴스 카테고리
						
						$i = 1;
						$sql = "SELECT distinct nl.news_code as news_code, news.title, news.content,news_image, news.news_date, news.link, news.news_image FROM news_link as nl left join news on nl.news_code = news.news_code WHERE category_code = '$category_code' order by REPLACE(news_date,'.','') *1 desc, news_code desc LIMIT 2";
						// limit 뒤에서 불러올 뉴스 수 수정 가능

						$r1 = querySelect($sql);
						foreach($r1 as $key => $val) {
							$newsImg = $val['news_image'];
							$code = $val['news_code'];
							$title = $val['title'];
							$title_edited = mb_strimwidth($title,0,50,'...','utf-8');
							$content = $val['content'];
							$link = $val['link'];
							$link = str_replace("http://", "https://", $link);
							$str = mb_strimwidth($content,0,50,'...','utf-8');
							$news_date = $val['news_date'];
							

							$givenDate = DateTime::createFromFormat('Y.m.d', $news_date);
							$today = new DateTime();
							$interval = $today->diff($givenDate);
							$yearsAgo = $interval->y;
							$monthsAgo = $interval->m;
							$weeksAgo = floor($interval->d / 7);
							$daysAgo = $interval->d;
							if ($yearsAgo > 0) {
								$resultAgo = $yearsAgo . "년 전";
							} elseif ($monthsAgo > 0) {
								$resultAgo = $monthsAgo . "달 전";
							} elseif ($weeksAgo > 0) {
								$resultAgo = $weeksAgo . "주 전";
							} elseif ($daysAgo > 0) {
								$resultAgo = $daysAgo . "일 전";
							} else {
								$resultAgo = "오늘";
							}

							// echo '<a href="./news_sub.php?code='.$code .'" class="swiper-slide">';
							echo '<a href="'.$link .'" class="box">';
								echo '<h3>' . $title_edited . '<span>' . $news_date . '</span></h3>';
								echo '<div><p>'.$content.'</p></div>'; // n일전
							echo '</a>';

							if($i % 3 == 0) { // n개마다
								// 광고
							}
							$i++;
						}
					?>
				
        </div>
		</main>
	</div>
</body>
<script>
    // QNA :: OPEN-CLOSE TOGGLE EVENTS
    const allLists = document.querySelectorAll('.qna');
    const allQuestions = document.querySelectorAll('.qna .q');
    allQuestions.forEach(el => {
        el.addEventListener('click', (e) => {
            if (e.target.parentNode.classList.contains('on')) {
                return e.target.parentNode.classList.remove('on');
            }
            allLists.forEach(v => v.classList.remove('on'));
            e.target.parentNode.classList.add('on');
        })
    })
</script>
<?php include 'footer.php'; ?>
</html>