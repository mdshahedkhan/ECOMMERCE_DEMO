<?php


function slug($title)
{
    $text = str_replace(' ', '-', $title);
    $text = strtolower($text);
    return $text;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


function RandomStatus()
{
    $Status = array('active' => 'active', 'inactive' => 'inactive');
    return array_rand($Status);
}


function SetMessage($type, $message)
{
    Session::flash('type', $type);
    Session::flash('message', $message);
}

function ShowMessage()
{
    if (session('message')) {
        $output = "";
        $output .= '<div class="alert alert-' . session("type") . ' alert-dismissible fade show" role="alert">' . session("message") . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span></button></div>';
        return $output;
    }
}


function ErrorMessage($errors)
{
    if ($errors->any()) {
        $output = "";
        $output .= '<div class="alert alert-danger pb-1">';
        $output .= '<ul>';
        foreach ($errors->all() as $error) {
            $output .= '<li>' . $error . '</li>';
        }
        $output .= '</ul>';
        $output .= '</div>';
        return $output;
    }
}


function ShowRootCategory($categories, $label)
{
    $output = "";
    foreach ($categories as $category) {
        $output .= '<option value="' . $category->id . '"  >' . $category->name . '</option>';
        if (count($category->sub_category)) {
            foreach ($category->sub_category as $sub_category1) {
                $output .= '<option value="' . $sub_category1->id . '">' . $category->name . ' > ' . $sub_category1->name . '</option>';
                if (count($sub_category1->sub_category)) {
                    foreach ($sub_category1->sub_category as $sub_category2) {
                        $output .= '<option value="' . $sub_category2->id . '">' . $category->name . ' > ' . $sub_category1->name . ' > ' . $sub_category2->name . '</option>';
                        if (count($sub_category2->sub_category)) {
                            foreach ($sub_category2->sub_category as $sub_category3)
                                $output .= '<option value="' . $sub_category3->id . '">' . $category->name . ' > ' . $sub_category1->name . ' > ' . $sub_category2->name . ' > ' . $sub_category3->name . '</option>';
                        }
                    }
                }
            }
        }
    }
    return $output;
}

/**
 * @return string[]
 */
function Color()
{
    return [
        1 => 'Red',
        2 => 'Green',
        3 => 'Blue',
        4 => 'Pink',
        5 => 'White'
    ];
}


/**
 * @return string[]
 */
function Size()
{
    return [
        1 => 'S',
        2 => 'M',
        3 => 'L',
        4 => 'XL',
        5 => 'XXL'
    ];
}


function Site_Category($categories)
{
    $output = "";
    $output .= '<ul class="menu menu-vertical sf-arrows">';
    foreach ($categories as $category) {
        $output .= '<li>';
        $output .= '<a href="javascript:avoid()" class="sf-with-ul">' . $category->name . '</a>';
        if (count($category->sub_category) > 0) {
            $output .= '<ul>';
            foreach ($category->sub_category as $sub_items) {
                $output .= '<li>';
                $output .= '<a href="' . route('products.products', [$category->slug, $sub_items->slug]) . '">' . $sub_items->name . '</a>';
                if (count($sub_items->sub_category) > 0) {
                    $output .= '<ul>';
                    foreach ($sub_items->sub_category as $sub_items2) {
                        $output .= '<li>';
                        $output .= '<a href="' . route('products.products', [$category->slug, $sub_items->slug, $sub_items2->slug]) . '">' . $sub_items2->name . '</a>';
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                }
            }
            $output .= '</ul>';
        }
        $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
}



