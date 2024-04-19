<?php include __DIR__ . "/../templates/mainHeader.php"; ?>

<div class="main">
    <form action="/add-item" dir="rtl" method="POST">
        <div>
            <input type="text" name="proNameAr" placeholder="اسم المنتج با العربي" dir="rtl" required />
            <input type="text" name="proNameEn" placeholder="اسم بالانجليزية" dir="rtl" required/>
        </div>
        <div>
            <input type="text" name="comName" placeholder="اسم الشركة المصنعة" dir="rtl" required/>
            <select name="redgreen" dir="rtl">
                <option value="green">اخضر</option>
                <option value="red">احمر</option>
            </select>
        </div>
        <select name="cate" dir="rtl">
            <?php
            if (isset($context)) {
                while ($row = $context["cateList"]->fetch_assoc()) {
                    echo '<option value="' . $row["english"] . '">' . $row["arabic"] . '</option>';
                }
            }
            ?>
        </select>
        <input type="url" name="url" placeholder="رابط موقع الشركة" dir="rtl" />

        <input type="submit" value="تسجيل الدخول" />
        <?php
            if (isset($context) && array_key_exists("message", $context)){
                echo $context["message"];
            }
        ?>
    </form>
</div>

<?php include __DIR__ . "/../templates/mainFooter.php"; ?>