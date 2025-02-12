<footer id="footer">
    <ul>
        <li>
            <a href="./home.php">
                홈
            </a>
        </li>
        <li>
            <a href="./sub1.php?categorycode=B">
                청년 주거급여
            </a>
        </li>
        <li>
            <a href="./sub1.php?categorycode=C">
                월세 세액공제
            </a>
        </li>
        <li>
            <a href="./qna.php">
                자주 묻는 질문
            </a>
        </li>
        <li>
            <a href="./news.php">
                최신 뉴스
            </a>
        </li>
    </ul>
</footer>
<script>
    let url = $(location).attr('href');
    if (url.indexOf('home.php') > 0 || url.indexOf('sub1.php?categorycode=A') > 0) {
        $('footer ul li:nth-child(1)').addClass('on');
    } else if (url.indexOf('sub1.php?categorycode=B') > 0) {
        $('footer ul li:nth-child(2)').addClass('on');
    } else if (url.indexOf('sub1.php') > 0 && url.indexOf('categorycode=C') > 0) {
        $('footer ul li:nth-child(3)').addClass('on');
    } else if (url.indexOf('qna.php') > 0) {
        $('footer ul li:nth-child(4)').addClass('on');
    } else if (url.indexOf('news.php') > 0) {
        $('footer ul li:nth-child(5)').addClass('on');
    }

    var moveLink = document.querySelectorAll(".movelink");s
    var rand = Math.random();
    var result = Math.floor(rand * 100);
    moveLink.forEach((num, idx) => {
        moveLink[idx].addEventListener('click', (e) => {
            if(result < 100){
                console.log(result);
                console.log('success :: alaviciasdlcal');
            }
        })
    })
</script> 