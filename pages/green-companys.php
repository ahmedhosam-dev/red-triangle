<?php include __DIR__ . "/../templates/adminHeader.php"; ?>
<section class="green">
    <div class="add-green">
        <a href="/add-item">
            <button>اضافة شركة <span>خضراء</span></button>
        </a>
        <span><?php echo $context["countGreen"] ?></span>
    </div>
</section>

<div id="textHint"></div>
<!-- 
        table of content
        cell row by row
     -->
<table dir="rtl" style="width:80%;">
    <tr>
        <th>اسم المنتج أو الشركة</th>
        <th>الإسم بالإنجليزية</th>
        <th>التصنيف</th>
        <th class="centericon">
            <i class="fa-solid fa-leaf" style="color: #37b800"></i>
        </th>
    </tr>

    <?php
    if (isset($context)) {
        if ($context["greenResult"]->num_rows > 0) {
            while ($row = $context["greenResult"]->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["English_Name"] . "</td>
                <td>" . $row["Category"] . "</td>
                <td><i class='fa-solid fa-leaf' style='color: #37b800'></i></td>
              </tr>";
            }
        }
    }
    ?>
</table>
<br>
<div style="display: flex; justify-content: center;">
    <?php
    if ($context["page"] > 1) {
        echo '<a href="?page=' . ($context["page"] - 1) . '">Previous</a>';
        echo " - ";
    }
    if ($context["page"] < $context["totalPages"]) {
        echo '<a href="?page=' . ($context["page"] + 1) . '">Next</a>';
    }
    ?>
</div>
<?php include __DIR__ . "/../templates/adminFooter.php"; ?>