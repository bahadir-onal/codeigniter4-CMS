<?php

function bo_language($used = false, $status = STATUS_ACTIVE)
{
    $model = new \App\Models\LanguageModel();
    $locale = service('request')->getLocale();

    if (is_null($status)){
        return $model->findAll();
    }

    if ($used){
        return $model->where('status',$status)->where('code', $locale)->first();
    }
    return $model->where('status',$status)->findAll();

}

function bo_lang_data($data, $lang = null)
{
    if(is_array($data)){
        $data = json_decode($data);
    }

    $locale = !is_null($lang) ? $lang : service('request')->getLocale();

    return $data->$locale;
}

function bo_permit_control($permit)
{
    if (session('userData.group' == DEFAULT_ADMIN_GROUP)){
        return true;
    }

    if (in_array($permit, session('permissions'))){
        return true;
    }
    return false;
}

function bo_cache($key, $callback)
{
    $cache = config('cache');
    $request = service('request');
    if ($cache->raw){
        if($key == 'generate'){
            $segment = implode('_', $request->uri->getSegments());
            $query = $request->uri->getQuery();
            $query = str_replace('&', '_', $query);
            $query = str_replace('=', '_', $query);
            $key = $query ? $segment . '_' . $query : $segment;
        }

        if($key == 'segment'){
            $key = implode('_', $request->uri->getSegments());
        }

        if (is_array($key)){
            $key = implode('_', $key);
            if ($page = $request->getGet('page')){
                $key .= '_' . $page;
            }
        }

        if(!$result = cache(slugify($key))){
            $result = call_user_func($callback);
            cache()->save(slugify($key), $result, $cache->raw_time);
        }

        session()->set('cache_conf', $cache);
        session()->markAsTempdata('cache_conf', 300);

        return $result;
    }

    return call_user_func($callback);
}

function bo_single_image_picker(string $src, string $inputName, string $inputID, array $option = [])
{
    $required = isset($option['required']) ? 'required' : '' ;
    $width    = isset($option['width']) ? $option['width'] : 180 ;
    $image    = isset($option['image']) ? $option['image'] : base_url(DEFAULT_IMAGE_SELECT_ICON) ;
    $value    = isset($option['value']) ? $option['value'] : '' ;

    return '<input type="hidden" value="'.$value.'" name="'.$inputName.'" id="'.$inputID.'" '.$required.'>
    <button class="btn single-image-picker" 
    data-url="'.base_url(route_to("admin_image_single_modal")).'"
    data-src="'.$src.'"
    data-input="'.$inputID.'">
    <img style="width: '.$width.'px"
    src="'.$image.'"
    alt=""
    id="'.$src.'">
    </button>';
}

function bo_multi_image_picker(string $title, string $inputName, string $areaID, string $btnClass = 'btn-primary')
{
    return '<button style="border-radius: 5px !important;" class="btn '.$btnClass.' multi-image-picker"
    data-url="'.base_url(route_to("admin_image_multi_modal")).'"
    data-input="'.$inputName.'"
    data-area="'.$areaID.'">'.$title.'</button>';
}

function bo_multi_image_area(string $areaID = null,string $inputName = null, $images = null) //$images null idi create tarafında hat aldığım için array olarak getirdim
{
    $image_list = "";
    if (!is_null($images)){
        foreach ($images as $image){
            $image_list .= '<div class="col-6 col-sm-3"> 
         <label class="mb-4">
         <input type="hidden" name="'.$inputName.'[]" value="'.$image->id.'">
         <img src="'.$image->getUrl().'" class="imagecheck-image">
         </label>
    </div>';
        }
    }

    return '<div id="'.$areaID.'" class="row gutters-sm">'.$image_list.'</div>';
}

function bo_tree_menu($data, $item)
{
    if (isset($item->children)){
        echo view('admin/pages/menu/partials/item', [
            'partial' => 'child-start',
            'menu' => $data,
            'item' => $item
        ]);
        foreach ($item->children as $child) {
            bo_tree_menu($data, $child);
        }
        echo view('admin/pages/menu/partials/item', [
            'partial' => 'child-end',
        ]);
    }else{
        echo view('admin/pages/menu/partials/item', [
            'partial' => 'item',
            'menu' => $data,
            'item' => $item
        ]);
    }
}

function slugify($text)
{
    // Strip html tags
    $text=strip_tags($text);
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) { return 'n-a'; }
    // Return result
    return $text;
}

function bo_admin_translate($file, $text = null){
    if (!is_null($text)){
        return lang('Admin/' . $file . '.text.' . $text);
    }
    return lang('Admin/' . $file . '.text.');
}

function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}
