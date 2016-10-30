<?php

/**
* styles and scripts loading
*/
function load_style_script() {
    wp_enqueue_script('jquery-google',  'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script('mobilemenu',  get_template_directory_uri().'/js/mobilemenu.js');
    wp_enqueue_script('jquery-lislidik',  get_template_directory_uri().'/js/jquery.liSlidik.js');
    wp_enqueue_script('slideradjust',  get_template_directory_uri().'/js/slideradjust.js');
    wp_enqueue_script('myscripts',  get_template_directory_uri().'/js/myscripts.js');
    wp_enqueue_script('windowadjust',  get_template_directory_uri().'/js/windowadjust.js');
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    if (strpos($user_agent, "MSIE") == false) {
        wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    }
    wp_enqueue_style('liSlidik', get_template_directory_uri().'/css/liSlidik.css');
    wp_enqueue_style('liSlidik-blackClasic', get_template_directory_uri().'/css/liSlidik.blackClasic.css');
    wp_enqueue_style('liSlidik-blackClasic-thumbs2', get_template_directory_uri().'/css/liSlidik.blackClasicThumbs2.css');
}

add_action('wp_enqueue_scripts', 'load_style_script');

/**
* menu
**/

register_nav_menus(array(
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu'
));

/**
*   post-thumbnails support
**/

add_theme_support('post-thumbnails');

/**
* delete width/height attribute
**/

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
return $html;
}

/**
* new post type for creating main page slider
**/

add_action('init', 'slider_index');

function slider_index() {
    register_post_type('slider', array(
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 100,
        'menu_icon' => admin_url().'images/main-slider.png',
        'labels' => array(
            'name' => 'Main Page Slider',
            'all_items' => 'All Slides',
            'add_new' => 'New Slide',
            'add_new_item' => 'Add New Slide',
        ),
    ));
}

/**
* creating phone number, address, facebook link, bottom footer sing setting in admin panel
**/

function my_more_options() {
    add_settings_field(
        'phone', // $id - название опции (идентификатора)
        'Phone Number', // $title - заголовок поля
        'display_phone',  // $callback - callback function
        'general'  // $page - страница, на которую будет добавлено поле
    );

    register_setting(
        'general',   // $option_group - название группы, к которой будет принадлежать опция. Совпадает с $page
        'my_phone'   // $option_name - название опции, которая будет сохраняться в БД
    );

    add_settings_field(
        'address', // $id - название опции (идентификатора)
        'Address', // $title - заголовок поля
        'display_address',  // $callback - callback function
        'general'  // $page - страница, на которую будет добавлено поле
    );

    register_setting(
        'general',   // $option_group - название группы, к которой будет принадлежать опция. Совпадает с $page
        'my_address'   // $option_name - название опции, которая будет сохраняться в БД
    );

    add_settings_field(
        'facebook', // $id - название опции (идентификатора)
        'Facebook Page', // $title - заголовок поля
        'display_facebook',  // $callback - callback function
        'general'  // $page - страница, на которую будет добавлено поле
    );

    register_setting(
        'general',   // $option_group - название группы, к которой будет принадлежать опция. Совпадает с $page
        'my_facebook'   // $option_name - название опции, которая будет сохраняться в БД
    );

    add_settings_field(
        'footsing', // $id - название опции (идентификатора)
        'Bottom Footer Sing', // $title - заголовок поля
        'display_bottom',  // $callback - callback function
        'general'  // $page - страница, на которую будет добавлено поле
    );

    register_setting(
        'general',   // $option_group - название группы, к которой будет принадлежать опция. Совпадает с $page
        'my_bottom'   // $option_name - название опции, которая будет сохраняться в БД
    );
}

add_action('admin_init', 'my_more_options');

function display_phone() {
    echo "<input type='text' name='my_phone' value='".esc_attr(get_option('my_phone'))."' class='regular-text'>";
}

function display_address() {
    echo "<input type='text' name='my_address' value='".esc_attr(get_option('my_address'))."' class='regular-text'>";
}

function display_facebook() {
    echo "<input type='text' name='my_facebook' value='".esc_attr(get_option('my_facebook'))."' class='regular-text'>";
}

function display_bottom() {
    echo "<input type='text' name='my_bottom' value='".esc_attr(get_option('my_bottom'))."' class='regular-text'>";
}

/**
* main page our mission widget
**/

register_sidebar(array(
    'name' => 'Our Mission Main Page',
    'id' => 'our_mission_mp',
    'description' => 'Use Text Widget',
    'before_widget' => '',
    'after_widget' => ''
));

/**
* single & page find us widget
**/

register_sidebar(array(
    'name' => 'Find Us Page and Single',
    'id' => 'findus_sp',
    'description' => 'Use Text Widget',
    'before_widget' => '',
    'after_widget' => ''
));


/**
* main page Find Us information
**/

register_sidebar(array(
    'name' => 'Find Us Information',
    'id' => 'find_us_mp',
    'description' => 'Use Text Widget',
    'before_widget' => '',
    'after_widget' => ''
));

/**
* pagination
**/

function wp_corenavi(){
    global $wp_query, $wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - show text "Page N from N, 0 - do not show
    $a['mid_size'] = 2; //how many links to show to the right and to the left from the current link
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '&laquo;'; // "Previous page" link text
    $a['next_text'] = '&raquo;'; //"Next page" link text

    if ($max > 1) echo '<div class="pager">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' from ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

/**
* gallery shortcode
**/

function stmths_gallery($attr, $text='') {
    $img_src = explode(",", $attr['ids']);
    // шаблон удаления атрибутов ширины и высоты
    $pattern = '#(width|height)="\d+"#';
    $return = '<div class="inner-slider"><ul id="slide_6" class="slidik">';
    $i = 1;
    foreach ($img_src as $item) {
        $image_url = wp_get_attachment_image($item, 'full');
        // вырезаем атрибуты ширины и высоты
        $image_url = preg_replace($pattern, '', $image_url);
        //формируем вывод картинок
        if ($i == 1) $return .= '<li class="show">'.$image_url.'</li>';
        else $return .= '<li>'.$image_url.'</li>';
        $i++;
    }
    $return .= '<a data-slidik="slide_6" class="next" href="#"></a>
                <a data-slidik="slide_6" class="prev" href="#"></a>
                <div class="thumbWrap"><div data-slidik="slide_6" class="thumbs"></div></div>
            </ul></div>';
    echo $return;
}

add_shortcode('gallery', 'stmths_gallery');

/*add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
return $html;
}  */





 ?>