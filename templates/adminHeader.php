<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- css style file -->
        <link rel="stylesheet" href="/../static/style/home.css"/>
        <link rel="stylesheet" href="/../static/style/admin.css"/>
        <link rel="stylesheet" href="/../static/style/add.css"/>
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
            rel="stylesheet" />
        <title>المثلث الاحمر</title>
    </head>
    <body>
        <!-- background Palestine vector -->
        <!-- <div class="Palestine">
            <a href="">
                <img src="/../static/img/Vector (1).svg" alt="Palestine"/>
            </a>
        </div> -->

        <!-- header section -->
        <header>
            <!-- search bar -->
            <div>
                <button type="button" title="search button">بحث</button>
                <input
                    type="search"
                    title="search bar"
                    placeholder="إبحث عن منتج، شركة أو مستخدم..."
                    dir="rtl" />
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </header>

        <!-- side bar -->
        <nav>
            <!-- logo -->
            <div><img src="/../static/img/Logo.svg" alt /></div>
            <!-- side bar links -->
            <ul dir="rtl">
                <li>
                    <i class="fa-solid fa-house" style="color: #5c5c5c"></i>
                    <a href="dashboard"> لوحة البيانات </a>
                </li>
                <li>
                    <i class="fa-solid fa-leaf" style="color: #039900"></i>
                    <a href="green-companys"> شركات <span class="green-class">خضراء</span></a>
                </li>
                <li>
                    <i
                        class="fa-solid fa-caret-down"
                        style="color: #a80000; font-size: 2rem"></i>

                    <a href="red-companys"> شركات <span class="red-class">حمراء</span></a>
                </li>
                <li>
                    <i class="fa-solid fa-layer-group"></i>
                    <a href="categories">التصنيفات</a>
                </li>
            </ul>
            <hr />
            <ul dir="rtl">
                <li>
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <a href="logout">خروج</a>
                </li>
            </ul>
        </nav>

