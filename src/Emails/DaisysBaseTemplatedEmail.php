<?php

namespace Daisys\Emails;

use SuperCMS\Email\SBaseEmail;

class DaisysBaseTemplatedEmail extends SBaseEmail
{
    public static function getDefaultHtml()
    {
        return <<<HTML
<html>
    <head>
        <style>
@import 'https://fonts.googleapis.com/css?family=Quicksand';

body, h1, h2, h3, h4, h5, span, b, p, a {
    font-family: 'Quicksand', sans-serif!important;
}

body {
  background-color:#fbf2f8;
}

.c-main-content {
    text-align: start;
    max-width: 1300px;
    display: block;
    margin-left: 12%;
    margin-right: 12%;
    background-color:white;
    box-shadow: 0 0 2px white;
    padding: 12px;
}

.c-title {
  text-align: center;
}

.c-title h1 {
  font-size:44px;
  padding:0;
  margin:0;
}        
        </style>
    </head>
    <body>
        <div class="c-main-content">
            <div class="c-title">
                <h1>
                  {Subject}
                </h1>
            </div>
            <div class="c-email-content">
                {ChildContent}
            </div>
        </div>
    </body>
</html>
HTML;
    }
}
