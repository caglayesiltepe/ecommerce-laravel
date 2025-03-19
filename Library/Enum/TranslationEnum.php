<?php

namespace App\Library\Enum;

enum TranslationType: string
{
    case PRODUCT = 'product';
    case BRAND = 'brand';
    case CATEGORY = 'category';
    case PAGES = 'pages';
    case ATTRIBUTES = 'attributes';
}
