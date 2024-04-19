<?php include __DIR__ . "/../templates/adminHeader.php"; ?>
<section class="dash-hero">
    <div>
        <table>
            <tr>
                <th>عدد الشركات <span class="green-company">الخضراء</span></th>
                <th>عدد الشركات <span class="red-company">الحمراء</span></th>
            </tr>
            <tr>
                <td><?php echo $context["countGreen"] ?></td>
                <td><?php echo $context["countRed"] ?></td>
            </tr>
        </table>
    </div>
</section>
<?php include __DIR__ . "/../templates/adminFooter.php"; ?>