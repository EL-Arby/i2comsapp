<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>I2COMSAPP Footer</title>

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f5f5f5;
}

/* =========================================
   FOOTER
========================================= */

.i2-footer{
    width:100%;
    background:#4a4a4c;
    color:#ffffff;
}

.i2-footer-main{
    max-width:1200px;
    margin:0 auto;

    padding:28px 20px;

    display:grid;
    grid-template-columns:1fr 1fr 1fr;

    align-items:center;
    gap:30px;
}

.i2-footer-col{
    min-height:120px;
}

/* LEFT */

.i2-footer-conf{
    color:#00BFFF;
    font-size:15px;
    line-height:21px;
    margin:0 0 6px;
}

.i2-footer-title{
    color:#FFFFFF;
    font-size:15px;
    line-height:21px;
    margin:0 0 16px;
}

.i2-footer-date{
    color:#ADFF2F;
    font-size:16px;
    margin:0;
}

/* CENTER */

.i2-footer-center{
    text-align:center;
}

.i2-footer-logo{
    width:60px;
    height:60px;

    object-fit:contain;

    display:block;
    margin:0 auto 10px;
}

.i2-footer-organized{
    color:#FFFFFF;
    font-size:13px;
    margin:0 0 5px;
}

.i2-footer-location{
    color:#00BFFF;
    font-size:13px;
    line-height:18px;
    margin:0;
}

/* RIGHT */

.i2-footer-contact-title{
    color:#FFFFFF;
    font-size:15px;
    line-height:16px;
    margin:0 0 12px;
}

.i2-footer-email{
    font-size:15px;
    line-height:21px;
    margin:0 0 10px;
}

.i2-footer-email span{
    color:#ede6e6;
}

.i2-footer-email a{
    color:#FFFFFF;
    text-decoration:none;
}

.i2-footer-email a:hover{
    color:#00BFFF;
}

.i2-footer-phone{
    color:#FFFF00;
    font-size:15px;
    margin:0;
}

/* BOTTOM */

.i2-footer-bottom{
    background:#3a3a3e;

    text-align:center;

    color:#FFFFFF;
    font-size:15px;

    padding:14px 20px;
}

/* SCROLL BUTTON */

.i2-scroll-top{
    position:fixed;

    right:20px;
    bottom:20px;

    width:35px;
    height:35px;

    display:flex;
    align-items:center;
    justify-content:center;

    z-index:999;
}

.i2-scroll-top img{
    width:25px;
    height:25px;
}

/* MOBILE */

@media (max-width:768px){

    .i2-footer-main{
        grid-template-columns:1fr;
        text-align:center;
        gap:25px;
    }

    .i2-footer-col{
        min-height:auto;
    }

    .i2-footer-bottom{
        font-size:13px;
        line-height:1.8;
    }
}

</style>
</head>

<body>

<footer class="i2-footer" id="footer">

    <div class="i2-footer-main">

        <!-- LEFT -->
        <div class="i2-footer-col">

            <p class="i2-footer-conf">
                <strong>I2COMSAPP International Conference</strong>
            </p>

            <p class="i2-footer-title">
                <strong>
                    Artificial Intelligence<br>
                    and its Applications<br>
                    in the Age of Digital Transformation
                </strong>
            </p>

            <p class="i2-footer-date">
                <strong>14-16 December 2026</strong>
            </p>

        </div>

        <!-- CENTER -->
        <div class="i2-footer-col i2-footer-center">

            <img src="images/Logo FST-UNA.jpg"
                 alt="FST UNA"
                 class="i2-footer-logo">

            <p class="i2-footer-organized">
                <strong>Organized by the</strong>
            </p>

            <p class="i2-footer-location">
                <strong>
                    Faculty of Sciences and Techniques,<br>
                    Nouakchott University,<br>
                    Nouakchott, Mauritania
                </strong>
            </p>

        </div>

        <!-- RIGHT -->
        <div class="i2-footer-col">

            <p class="i2-footer-contact-title">
                <strong>
                    For more information, please contact :
                </strong>
            </p>

            <p class="i2-footer-email">
                <span>Email:</span>

                <a href="mailto:support@i2comsapp.org">
                    support@i2comsapp.org
                </a>
            </p>

            <p class="i2-footer-phone">
                <strong>Tel: + 222 44 80 84 16</strong>
            </p>

        </div>

    </div>

    <!-- BOTTOM -->
    <div class="i2-footer-bottom">

        FST, Nouakchott University, Nouakchott, Mauritania

        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;

        All rights reserved

        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;

        Copyright © 2026 I2COMSAPP International Conference

    </div>

    <!-- SCROLL TOP -->
    <a href="#top" class="i2-scroll-top">

        <img src="images/img0001.png" alt="Top">

    </a>

</footer>

</body>
</html>
