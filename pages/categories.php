<?php include __DIR__ . "/../templates/adminHeader.php"; ?>
<section class="green">
    <div class="add-green">
        <a href="/add-item">
            <button hidden>اضافة تصنيف</button>
        </a>
        <span><?php echo $context["countCate"] ?></span>
    </div>
</section>

<table dir="rtl" style="width:80%">
    <tr>
        <th>الإسم بالانجليزية</th>
        <th>الإسم بالعربية</th>
        <th>النوع</th>
    </tr>

    <?php
    if (isset($context)) {
        if ($context["cateResult"]->num_rows > 0) {
            while ($row = $context["cateResult"]->fetch_assoc()) {
                echo "<tr>
          <td>" . $row["english"] . "</td>
          <td>" . $row["arabic"] . "</td>
          <td>" . $row["major"] . "</td>
          </tr>";
            }
        }
    }
    ?>
</table>
<br>
<div style="display: flex; justify-content: center;">
    <?php
    if (isset($context)){
        if ($context["page"] > 1) {
            echo '<a href="?page=' . ($context["page"] - 1) . '">Previous</a>';
            echo " - ";
        }
        if ($context["page"] < $context["totalPages"]) {
            echo '<a href="?page=' . ($context["page"] + 1) . '">Next</a>';
        }
    }
    ?>
</div>
<?php include __DIR__ . "/../templates/adminFooter.php"; ?>