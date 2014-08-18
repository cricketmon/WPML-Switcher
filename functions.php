<?php 
/**
 * Custom Digital Performing Language Switcher
 * @param  [type] $items contiene la lista de menus ya declarados (i.e. home | abou us | contact).
 * @param  [type] $args  [description]
 * @return [type]        [description]
 */
function new_nav_menu_items($items,$args) {
    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=0');
        if(1 < count($languages)){
            foreach($languages as $l){
                if(!$l['active']){
                    $items .= '<li class="menu-item"><a href="'.$l['url'].'">'.$l['native_name'].'</a></li>';
                }
            }
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );
?>