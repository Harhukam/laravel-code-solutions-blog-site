<?php


use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

function trimStr5($string)
{
    return $result = substr($string, 0, -5);
}

function randomName($length=null)
{
    
   $str = Str::random($length);
   return Str::lower($str);
    
}

/**
 * @return array
 */
function getMenuCategories()
{
    $result = [];
    $categories = Category::where('active', 'Y')->get([
        'id',
        'category_name',
        'parent_id',
        'slug'
    ]);

    if($categories->count() > 0) {
        $result = buildTree($categories->toArray());
    }
    return $result;
}

/**
 * @param array $elements
 * @param int $parentId
 * @return array
 */
function buildTree(array $elements, $parentId = 0) {
    $branch = [];
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}



function translateEnglishSlug($var)
{
    $tr = new GoogleTranslate();
    $text = $tr->translate($var);

    if($tr->getLastDetectedSource()!='en'){
        $tr= $tr->setTarget('en')->translate($text);
        return Str::slug($tr);
    }else{
        return Str::slug($text);
    }
}


function generateRandomName($length = 16)
{
   return bin2hex(openssl_random_pseudo_bytes($length));
}

function fileRandomName($length = 30)
{
   return Str::random($length);
}

function statusOptions()
{
    return [
        'N'  => 'Disable',
        'Y'  => 'Active',
    ];
}

function unSlug($var = null)
{
    return str_replace('-', ' ', $var);
}

function makeSlug($var)
{
    //return Str::slug($var);
    $var = Str::lower($var);
    return Str::slug($var, '-');
}


function strLimit($string = null, $length = null)
{
    return Str::limit($string, $length, ' ...');
}


function postCount($id)
{
    return Post::where('category_id',$id)->get()->count();
}
