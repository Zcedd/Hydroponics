<!--==================== FOOTER ====================-->
<footer class="footer">
        <div class="footer__bg">
            <div class="footer__container">
                <div>
                    <h1 class="footer__title">Hydroponics</h1>
                    <span class="footer__subtitle">Computer Engineering</span>
                </div>
            </div>
            <p class="footer__copy">&#169 All right reserved</p>
        </div>
    </footer>

    <!--==================== SCROLL TOP ====================-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup__icon"></i>
    </a>

<script src="assets/js/main.js"></script>

<script>
    $(document).ready(function () {
        notificationBadge();
        setInterval(notificationBadge, 2000);
    });

    function notificationBadge(){
        $.ajax({
            url: "includes/notification.badge.inc.php",
            method: "POST",
            data:{action:'fetch'},

            success: function (data) {

                var newdata = JSON.parse(data);
                if(newdata > 0){
                    document.getElementById("notificationBadge").innerHTML = newdata;
                    document.getElementById("notificationBadge").classList.add("badgeNotification");
                }
            }
        });
    };
</script>

</body>