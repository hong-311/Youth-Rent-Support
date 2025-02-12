<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$categorycode = $_GET['categorycode']; 
$sql = "SELECT DISTINCT title FROM sub1 WHERE categorycode = ?"; 
$params = [$categorycode];
$result = query($sql, $params)->fetch();
$category = $result['title'];

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php";?>
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <div id="wrap" class="content_abc">
        <?php include 'header.php'?>
        <main>
            <?php
                $sql2 = "SELECT DISTINCT title, bold, box_con FROM sub1 WHERE categorycode = ?";
                $result2 = query($sql2, $params)->fetch(); 
                
                $title = $result2['title'];
                $bold = $result2['bold'];
                $box_con = $result2['box_con'];
                
                echo '<pre class="title">' . $title . '</pre>'; 
                
                if ($categorycode !== 'A') { 
                    echo '<div class="box">';
                    if ($bold) {
                        echo '<pre class="bold">' . $bold . '</pre>';
                    }
                    if ($box_con) {
                        echo '<pre class="box_con">' . $box_con . '</pre>';
                    }
                    echo '</div>'; // box
                }
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
                
                $sql3 = "SELECT DISTINCT sub_title FROM sub1 WHERE title = ?";
                $params3 = [$title];
                $result3 = query($sql3, $params3)->fetchAll();

                echo '<div class="sub_wrap">';
                foreach ($result3 as $key => $val3) {
                    $sub_title = $val3['sub_title'];
                    //$subTitleId = str_replace(' ', '_', $sub_title); 
                    
                    if ($sub_title) {
                        $subTitleId = 'content_wrap'.$key; 
                        echo '<pre class="sub_title" onclick="toggleBox(\'' . $subTitleId . '\', event)">' . $sub_title . '</pre>';

                    }
                }
                echo '</div>'; // sub_wrap
                
                foreach ($result3 as $key => $val3) {
                    $i = 1;
                    $sub_title = $val3['sub_title'];
                    $subTitleId = 'content_wrap'.$key; 
                    
                    $sql4 = "SELECT DISTINCT bold FROM sub1 WHERE title = ? AND sub_title = ?";
                    $params4 = [$title, $sub_title];
                    $result4 = query($sql4, $params4)->fetchAll();
                    
                    echo '<div class="box2" id="' . $subTitleId . '">';     
                    foreach ($result4 as $row) {
                        $bold = $row['bold'];
                        if (!empty($bold)) {
                            echo '<pre class="bold">' . $bold . '</pre>';
                        }
                    
                        $sql5 = "SELECT content, button, link, link_name FROM sub1 WHERE title = ? AND sub_title = ? AND bold = ?";
                        $params5 = [$title, $sub_title, $bold];
                        $result5 = query($sql5, $params5)->fetchAll();

                        foreach ($result5 as $subRow) {
                            if (!empty($subRow['content'])) {
                                echo '<pre class="con">' . $subRow['content'] . '</pre>';
                            }
                            if($subTitleId == 'content_wrap0' && $i == 1) {
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
                            $i++;
                            // if ($subRow['button']) {
                            //     echo '<pre class="button">' . $subRow['button'] . '</pre>';
                            // }
                            // if ($subRow['link'] && $subRow['link_name']){
                            //     echo '<a href="' . $subRow['link'] . '" class="link">' . $subRow['link_name'] . '</a>';
                            // }
                        }

                        
                    }
                    echo '</div>'; // box2

                    
                }                    
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
            ?>
                    
            <?php
                 echo '<div class="btn_wrap">';
                if ($categorycode === 'A') {
                    echo '<a href="./sub1.php?categorycode=B" class="a">청년주거급여에 대해 자세히 알아보기<img src="./img/btn-arrow-3.png"></a>';
                    echo '<a href="https://www.bokjiro.go.kr/ssis-tbu/index.do" class="b">청년월세특별지원 신청하러 가기<img src="./img/btn-arrow-3.png"></a>';
                } elseif ($categorycode === 'B') {
                    echo '<p>월세 지원금 더 알아보기</p>';
                    echo '<a href="./sub1.php?categorycode=A" class="a">청년월세특별지원에 대해 자세히 알아보기<img src="./img/btn-arrow-3.png"></a>';
                    echo '<a href="./sub1.php?categorycode=C" class="b">월세 세액공제에 대해 자세히 알아보기<img src="./img/btn-arrow-3.png"></a>';
                } elseif ($categorycode === 'C') {
                    echo '<p>월세 지원금 더 알아보기</p>';
                    echo '<a href="./sub1.php?categorycode=A" class="a">청년월세특별지원에 대해 자세히 알아보기<img src="./img/btn-arrow-3.png"></a>';
                    echo '<a href="./sub1.php?categorycode=B" class="b">청년주거급여에 대해 자세히 알아보기<img src="./img/btn-arrow-3.png"></a>';
                } else {
                    echo '<a href="./sub1.php?categorycode=A" class="a">생계급여 알아보기</a>';
                } 
                echo '</div>';
            ?>
            
        </main>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 페이지 로드 시 첫 번째 서브타이틀과 컨텐츠 상자 활성화
        const firstSubTitle = document.querySelector('.sub_title');
        if (firstSubTitle) {
            const subTitleId = firstSubTitle.getAttribute('onclick').match(/'([^']+)'/)[1];  // onclick에서 ID 추출
            toggleBox(subTitleId, { target: firstSubTitle });
        }
    });

    function toggleBox(subTitleId, event) {
        const contentWrap = document.getElementById(subTitleId); // 해당 서브 타이틀 ID에 매칭되는 콘텐츠 상자 선택
        const subTitleElement = event.target; // 이벤트가 발생한 서브 타이틀 요소
        const isOn = contentWrap.classList.contains('active'); // 현재 'active' 클래스가 있는지 확인
        const allContentWraps = document.querySelectorAll('.box2'); // 모든 콘텐츠 상자를 선택
        const allSubTitles = document.querySelectorAll('.sub_title'); // 모든 서브 타이틀을 선택

        // 모든 콘텐츠 상자에서 'active' 클래스 제거
        allContentWraps.forEach((wrap) => {
            wrap.classList.remove('active');
        });

        // 모든 서브 타이틀에서 'active' 클래스 제거
        allSubTitles.forEach((subTitle) => {
            subTitle.classList.remove('active');
        });

        // 클릭된 콘텐츠 상자와 서브타이틀이 'active' 클래스를 가지고 있지 않았다면 'active' 클래스 추가
        if (!isOn) {
            contentWrap.classList.add('active');
            subTitleElement.classList.add('active');
        }
    }
</script>

<script>
    // 텍스트 인식
    var preTags = document.getElementsByTagName("pre");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        // processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        // processedText = processedText.replace(/\[(.*?)\]/gs, '<span class="point3">$1</span>');
        preTag.innerHTML = processedText;
    }

    var preTags = document.getElementsByTagName("p");
    for (var i = 0; i < preTags.length; i++) {
        var preTag = preTags[i];
        var processedText = preTag.innerHTML;
        processedText = processedText.replace(/\[\[\[(.*?)\]\]\]/gs, '<span class="point1">$1</span>');
        processedText = processedText.replace(/\[\[(.*?)\]\]/gs, '<span class="point2">$1</span>');
        processedText = processedText.replace(/\[(.*?)\]/gs, '$1');
        preTag.innerHTML = processedText;
    }
</script>
<?php include 'footer.php'; ?>
</html>
