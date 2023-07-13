<?php

function get_category($id)
{
    $CI = &get_instance();
    $category_name = '';
    if ($id != null) {
        $data = $CI->CategoryModel->getOne($id);
        $category_name = isset($data->title) ? $data->title : '';
    }
    return $category_name;
}





if (!function_exists('get_categories_h')) {
    function get_categories_h($category_id)
    {
        $CI = get_instance();

        $category_name = '';
        //$category_data = $category_id;
        $categories = explode(',', $category_id);
        $category_names = $CI->CategoryModel->get_categories($categories);
        // $category_name = implode(',', $category_names);
        return $category_name;
    }


    // function get_categories($Product_id)
    // {
    //     $ci = get_instance();
    //     $category_name = '';

    //     if ($Product_id != null) {
    //         $data = $ci->NewProduct->getcategories($Product_id);
    //         $category_name = isset($data->title) ? $data->title : '';
    //     }
    //     return $category_name;
    // }
}
