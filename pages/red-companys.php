<?php include __DIR__ . "/../templates/adminHeader.php"; ?>
<section class="red">
    <div class="add-red">
        <a href="/add-item">
            <button>اضافة شركة <span>حمراء</span></button>
        </a>
        <span><?php echo $context["countRed"] ?></span>
    </div>
</section>

<table dir="rtl" style="width: 80%;">
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
        if ($context["redResult"]->num_rows > 0) {
            while ($row = $context["redResult"]->fetch_assoc()) {
                echo "<tr>
          <td>" . $row["Name"] . "</td>
          <td>" . $row["English_Name"] . "</td>
          <td>" . $row["Category"] . "</td>
          <td><i class='fa-solid fa-caret-down' style='color: #bd0000; font-size: 1.5rem'></i></td>
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