<?php
include './db.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 1);

$sql = "SELECT q, a FROM qna";
$result = query($sql)->fetchAll();
$i = 1;

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <?php include "./front_header.php";?>
    <link rel="stylesheet" href="./css/qna.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <div id="wrap" class="content_<?=$categorycode?>">
        <?php include 'header.php'?>
        <main>
            <div class="content">
                <h1>자주 묻는 질문</h1>
            <?php
                foreach ($result as $qna) {
                    $question = $qna['q'];
                    $answer = $qna['a'];
                    echo '<div class="qna">';
                    echo '<pre class="q">'.$question.'</pre>';
                    echo '<pre class="a">'.$answer.'</pre>'; 
                    echo '</div>';
                    if($i == 2 || $i == 4) {
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
                }
            ?>
            <div class="ads_wrap ads_main_big">
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
