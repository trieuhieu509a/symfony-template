<?php
namespace App\Utils;

use App\Utils\AbstractClasses\CategoryTreeAbstract;

class CategoryTreeFrontPage extends CategoryTreeAbstract {

    public function getCategoryList(array $categories_array)
    {
        $this->categorylist .= '<ul>';
        foreach ($categories_array as $value)
        {
            $catName = $value['name'];
            $url = $this->urlgenerator->generate('video_list', ['categoryname'=>$catName, 'id'=>$value['id']]);
            $this->categorylist .= '<li>' . '<a href="' . $url . '">' . $catName . '</a>';
            if(!empty($value['children']))
            {
                $this->getCategoryList($value['children']);
            }
        }
        $this->categorylist .= '</ul>';
        return $this->categorylist;
    }

}