<?php include __DIR__ . "/../templates/mainHeader.php"; ?>
<main>
  <div id="textHint"></div>
  <!-- 
        table of content
        cell row by row
     -->
  <table dir="rtl">
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
      echo '<a href="?page=' . ($context["page"] - 1) . '&search=' . $context["search"] . '">Previous</a>';
      echo " - ";
    }
    if ($context["page"] < $context["totalPages"]) {
      echo '<a href="?page=' . ($context["page"] + 1) . '&search=' . $context["search"] . '">Next</a>';
    }
    ?>
  </div>
</main>

<footer>
  <form action="/" method="GET" id="search">
    <div>
      <input class="button" type="submit" title="search button" value="بحث">
      <input type="search" title="search bar" name="search" placeholder="إبحث عن منتج، شركة أو مستخدم..." dir="rtl" />
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
  </form>
  <span></span>
  <i class="fa-solid fa-sliders" style="color: #b80000; font-size: 1.5rem;"></i>
</footer>
<?php include __DIR__ . "/../templates/mainFooter.php"; ?>