<?php include __DIR__ . "/../templates/mainHeader.php"; ?>

<div class="main">
    <form action="/login" method="POST">
        <?php
            if (!empty($context)){
                echo '<div class="errormessage" style="text-align: center; display: flex; align-items: center;">';
                echo '<p style="font-size: small; color: red;">' . $context["error_message"] .'</p>';
                echo '</div>';
            }
        ?>
        <div>
            <input type="text" name="username" placeholder="اسم المستخدم" dir="rtl" />
            <img src="./../static/img/Group.svg" alt="" />
        </div>
        <div>
            <input type="password" name="password" placeholder="كلمة المرور" dir="rtl" />
            <img src="./../static/img/streamline_interface-id-thumb-mark-identification-password-touch-id-secure-fingerprint-finger-security.svg" alt="" id="pass" />
        </div>
        <input type="submit" name="submit" value="تسجيل الدخول" />
    </form>
</div>
<script src="https://kit.fontawesome.com/d1304e3c39.js" crossorigin="anonymous"></script>

<?php include __DIR__ . "/../templates/mainFooter.php"; ?>