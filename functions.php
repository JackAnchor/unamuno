<?php
/**
 *  I. Theme Styles/Scripts
 *  Add Stylesheets
 *  Add Custom Admin Styles/Font
 *  Add JavaScript
 *
 *  II. Theme Menus
 *  Menus (4), Sidebars (4)
 *
 *  III. Custom Post Types (Petition, Factsheet, Profile)
 *  Add Petition Post
 *  Add/Register Factsheet Meta Box Fields
 *  Show Factsheet Fields: Text (3), Select (4), Checkbox (2)
 *  Add/Register Profile Meta Box Fields
 *  Show Profile Fields: Text (3), Number (1)
 *
 *  IV. Admin Display
 *  Estimated Read Time
 *  Dashboard Icons (Admin)
 *  Dashboard Icons (Non-Admin)
 *  Remove WordPress Dashboard Widgets (ALL)
 *  Hide WordPress Update Nag (Non-Admin)
 *  Remove Policy/Petition Admin Submenu 'Tags'
 *  Modify Default "Activity" Dashboard Widget
 *  Add Dashboard Widget 1 (Factsheets/Profiles)
 *  Add Dashboard Widget 2 (Press)
 *  Add Dashboard Widget 3 (Petitions)
 *  Rename Default Dashboard Title
 *  Remove Post Dashboard Boxes ($id, $screen, $context)
 *  Remove Petition Dashboard Boxes
 *  Remove Page Dashboard Boxes
 *  Remove Public Admin Bar
 *  Remove Admin Menu Topbar Icons/Menu Options
 *  Modify Admin Footer Text
 *  Remove G Form Button on Posts/Pages
 *  Reposition G Form Admin Menu Icon
 *
 *  V. Wordpress Enable
 *  Enable WordPress Thumbnails (Pages/Posts)
 *  Enable WordPress Page Excerpts
 *  Enable Search Form, Comment Form, Comment Lists, Gallery, Caption
 *  Add About Page CSS
 *  Add Contact Page CSS

 *  VI. Wordpress Modify
 *  Custom Excerpt Length (Post, Factsheet, Profile)
 *  Modify Excerpts Label (Posts/Pages)
 *  Remove Emojis
 *  WPEngine Bloat
 *  Rename Post Default Labels to 'Press'
 *  Manage Factsheet Admin Columns
 *  Manage Profile Admin Columns
 *  Manage Petition Admin Columns
 *  Modify Enter Title
 *  Disable Gutenberg Pages
 *  Disable Gutenberg Posts (REST API disables custom posts)
 *  Modify/Build Comments Data
 *  Disable Wordpress Attachement Page (Excluding Media Uploads)
 *  Redirect APP Immigration Page
 *
 *  VII. SEO Metadata
 *  Post Meta, Factsheet Meta, Petition Meta, Profile Meta, Attachment Meta
 *  Home Meta, Page Meta, Plugins Meta, Landing Meta
 *  Index Meta (News, Archive, Search Results)
 *
 *  VIII. Author Profile
 *  Disable Author Page
 *  Theme Avatar (Twitter/LinkedIn)
 *  Save Custom Avatar
 *
 *  IX. Login Page Logo
 *
 *  X. ThreeAnchor Settings Page (Global Settings)
 *  Twitter, Facebook, FacebookID, EmailSub, GoogleAx, PhoneAx, Phone, Street,
 *  City, State, Zip, PetitionImg, PostImg, PolicyImg, LogoAMP
 *
 *  XI. Admin Utilities
 *  Wordpress Google Analytics (Non-AMP)
 *  Wordpress RSS Featured Image
 *  AMP Image Sanitize
 *  Animation Page Script
 *
 * XII. MU SQL Plugin (optional)
 *  WP Admin User Styles
 *  WP 'Powered by' Bloat
 *  WP Menu Page
 *  WP Menu Bar 'Quick Links'
 *
 */


// Add Stylesheets   --->
 function unamuno_styles() {
   wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/src/css/wordpress/normalize.css' );
   wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/src/css/wordpress/theme.css' );
   wp_enqueue_style( 'unamuno_fonts', 'https://fonts.googleapis.com/css?family=Inconsolata|Montserrat:200,300,400,500,600,700,800,900', false );
   wp_enqueue_style( 'unamuno_fonts2', 'https://fonts.googleapis.com/css?family=Inconsolata|Montserrat:200,300,400,500,700', false );
   wp_enqueue_style( 'unamuno_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );
   wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
    }
  add_action( 'wp_enqueue_scripts', 'unamuno_styles' );


  // Add Custom Admin Styles/Font   --->
  function una_custom_admin_styles() {
        wp_register_style( 'unacustom_admin_css', get_template_directory_uri() . '/src/css/wordpress/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'unacustom_admin_css' );
        wp_enqueue_style( 'unacustom_admin_fonts', 'https://fonts.googleapis.com/css?family=Inconsolata|Montserrat:200,300,400,500,700', false );
      }
  add_action( 'admin_enqueue_scripts', 'una_custom_admin_styles' );


// Add Scripts  --->
  function unamuno_scripts() {
    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/src/js/theme.js', array('jquery'), '', true );
    }
  add_action( 'wp_enqueue_scripts', 'unamuno_scripts' );


// Theme Menus  --->
   function unamuno_register_theme_menus() {
       register_nav_menus(
         array(
           'header-menu' => __( 'Header' ),
           'left-menu' => __( 'Left' ),
           'right-menu' => __( 'Right' ),
           'base-menu' => __( 'Base' ),
           )
       	);
       }

   add_action( 'init', 'unamuno_register_theme_menus' );


// Theme Sidebars  --->
   function unamuno_widgets_init() {
   	register_sidebar(
       array(
   		'name'          => __( 'Action CTA', 'unamuno' ),
   		'id'            => 'sidebar-1',
   		'description'   => __( 'Add content here for your primary CTA.', 'unamuno' ),
      'before_widget' => '<section id="%1$s" class="cta %2$s">',
   		'after_widget'  => '</section>',
   		'before_title'  => '<h2 class="title">',
   		'after_title'   => '</h2>',
   	) );

   	register_sidebar( array(
   		'name'          => __( 'About CTA', 'unamuno' ),
   		'id'            => 'sidebar-2',
   		'description'   => __( 'Add content for your second CTA.', 'unamuno' ),
   		'before_widget' => '<section id="%1$s" class="cta %2$s">',
   		'after_widget'  => '</section>',
   		'before_title'  => '<h2 class="title">',
   		'after_title'   => '</h2>',
   	) );

   	register_sidebar( array(
   		'name'          => __( 'Donate CTA', 'unamuno' ),
   		'id'            => 'sidebar-3',
   		'description'   => __( 'Add content for your third CTA.', 'unamuno' ),
   		'before_widget' => '<section id="%1$s" class="cta %2$s">',
   		'after_widget'  => '</section>',
   		'before_title'  => '<h2 class="title">',
   		'after_title'   => '</h2>',
   	) );

    register_sidebar(
      array(
      'name'          => __( 'Petition CTA', 'unamuno' ),
      'id'            => 'sidebar-4',
      'description'   => __( 'Add petition contact form.', 'unamuno' ),
      'before_widget' => '<section id="%1$s" class="cta %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="title">',
      'after_title'   => '</h2>',
    ) );
   }
   add_action( 'widgets_init', 'unamuno_widgets_init' );


// Add Unamuno Petition Post  --->
 function una_custom_post_petition() {
   register_post_type( 'unapetition',
    array(
       'labels'        => array(
        'name'         => __( 'Petitions', 'Petition Posts' ),
        'singular_name' => __( 'Petition' ),
        'add_new'      => __( 'Add New', 'Petition' ),
        'add_new_item' => __( 'Add Petition' ),
        'edit_item'    => __( 'Edit Petition' ),
        'new_item'     => __( 'New Petition' ),
        'view_item'    => __( 'View Petition' ),
        'all_items'    => __( 'All Petitions' ),
        'search_items' => __('Search Petitions'),
        'not_found' => __('No petitions found.'),
        'featured_image'        => __( 'Petition Image' ),
        'set_featured_image'    => __( 'Set featured image' ),
        'remove_featured_image' => __( 'Remove image'),
      ),
      'public'       => true,
      'hierarchical' => true,
      'has_archive'  => true,
      'exclude_from_search'  => true,
      'rewrite'        => array('slug' => 'petitions','with_front' => false),
      'supports'       => array(
        'title',
        'editor',
        'excerpt',
        'comments',
        'thumbnail',
      ),
      'menu_position' => 7,
      'show_in_rest' => false, // set to false to disable GB
      'menu_icon' => get_stylesheet_directory_uri() . '/img/logos/icon-unapetition.svg',
      'query_var' => true,
      'taxonomies'   => array(
        'post_tag',
       )
      )
     );
    register_taxonomy_for_object_type( 'post_tag', 'unapetition' );
   }
add_action( 'init', 'una_custom_post_petition' );


// Add Unamuno Factsheet Post  --->
  function una_custom_post_factsheet() {
    register_post_type( 'unafactsheet',
     array(
        'labels'        => array(
         'name'         => __( 'Policy', 'Policies' ),
         'singular_name' => __( 'Policy' ),
         'add_new'      => __( 'Add New', 'Policy' ),
         'add_new_item' => __( 'Add Policy' ),
         'edit_item'    => __( 'Edit Policy' ),
         'new_item'     => __( 'New Policy' ),
         'view_item'    => __( 'View Policy' ),
         'all_items'    => __( 'All Policies' ),
         'search_items' => __('Search Policies'),
         'not_found' => __('No Policy found.'),
         'featured_image'        => __( 'Policy Image' ),
         'set_featured_image'    => __( 'Set image' ),
         'remove_featured_image' => __( 'Remove image'),
       ),
       'description'  => __('Description to describe'),
       'public'       => true,
       'show_ui'       => true,
       'hierarchical' => true,
       'has_archive'  => true,
       'exclude_from_search'  => false,
       'rewrite'        => array('slug' => 'policy','with_front' => false),
       'supports'       => array(
         'title',
         'editor',
         'excerpt',
         'thumbnail',
         'revisions',
       ),
       'menu_position' => 4,
       'show_in_rest' => false, // set to false to disable GB
       'menu_icon' => get_stylesheet_directory_uri() . '/img/logos/icon-unafactsheet.svg',
       'query_var' => true,
       'taxonomies'   => array(
         'post_tag',
        )
       )
      );
     register_taxonomy_for_object_type( 'post_tag', 'unafactsheet' );
    }
 add_action( 'init', 'una_custom_post_factsheet' );

  // Register Factsheet Meta Box Fields --->
  function add_unafactsheet_fields_meta_box() {
  	add_meta_box(
  		'unafactsheet_meta_box',              // $id
  		'Policy Details',                     // $title
  		'show_unafactsheet_fields_meta_box',  // $callback
  		'unafactsheet',                       // $screen
  		'normal',                             // $context
  		'high'                                // $priority
  	);
  }
  add_action( 'add_meta_boxes', 'add_unafactsheet_fields_meta_box' );

 // Show Factsheet Fields: Text (3), Select (4), Checkbox (2)  --->
  function show_unafactsheet_fields_meta_box() { global $post;
  		$meta = get_post_meta( $post->ID, 'unafactsheet_fields', true ); ?>
     <input type="hidden" name="unafactsheet_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

<dl class="admin-dl">
 <div class="dl-li">
     <dt><label for="unafactsheet_fields[text]">Title:</label></dt>
     <dd><input type="text" name="unafactsheet_fields[text]" placeholder="" id="unafactsheet_fields[text]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text'])){ echo $meta['text']; } ?>"></dd> <!--   label/input end  -->
 </div>


  <div class="dl-li">
    <dt><label for="unafactsheet_fields[text2]">Number:</label></dt>
    <dd><input type="text" name="unafactsheet_fields[text2]" placeholder="HB 3..." id="unafactsheet_fields[text2]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text2'])){ echo $meta['text2']; } ?>"></dd> <!--   label/input end  -->
  </div>

    <div class="dl-li">
     <dt><label for="unafactsheet_fields[text3]">Sponsors:</label></dt>
     <dd><input type="text" name="unafactsheet_fields[text3]" id="unafactsheet_fields[text3]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text3'])){ echo $meta['text3']; } ?>"></dd> <!--   label/input end  -->
    </div>
  <div class="dl-li even border-t">
   <dt><label for="unafactsheet_fields[selectyear]">Year:</label></dt>
   <dd><select name="unafactsheet_fields[selectyear]" id="unafactsheet_fields[selectyear]">
     <option value="2020" <?php if ( isset($meta['selectyear']) && $meta['selectyear'] == 2020 ) echo 'selected="selected"'; ?>>2020</option>
     <option value="2019" <?php if ( isset($meta['selectyear']) && $meta['selectyear'] == 2019 ) echo 'selected="selected"'; ?>>2019</option>
     <option value="2018" <?php if ( isset($meta['selectyear']) && $meta['selectyear'] == 2018 ) echo 'selected="selected"'; ?>>2018</option>
   </select></dd>  <!--   .year  -->
    </div>

  <div class="dl-li even">
   <dt><label for="unafactsheet_fields[selectgovt]">Category:</label></dt>
   <dd><select name="unafactsheet_fields[selectgovt]" id="unafactsheet_fields[selectgovt]">
     <option value="default" <?php if ( isset($meta['selectgovt']) && $meta['selectgovt'] == 'default' ) echo 'selected="selected"'; ?>>--</option>
     <option value="Federal" <?php if ( isset($meta['selectgovt']) && $meta['selectgovt'] == 'Federal' ) echo 'selected="selected"'; ?>>Federal</option>
     <option value="State" <?php if ( isset($meta['selectgovt']) && $meta['selectgovt'] == 'State' ) echo 'selected="selected"'; ?>>State</option>
     <option value="Local" <?php if ( isset($meta['selectgovt']) && $meta['selectgovt'] == 'Local' ) echo 'selected="selected"'; ?>>Local</option>
   </select></dd>  <!--   .govt category  -->
    </div>

    <div class="dl-li even">
       <dt><label for="unafactsheet_fields[selectposition]">Position:</label></dt>
       <dd><select name="unafactsheet_fields[selectposition]" id="unafactsheet_fields[selectposition]">
         <option value="default" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'default' ) echo 'selected="selected"'; ?>>--</option>
         <option value="Support" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'Support' ) echo 'selected="selected"'; ?>>Support</option>
         <option value="Oppose" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'Oppose' ) echo 'selected="selected"'; ?>>Oppose</option>
         <option value="Under Review" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'Under Review' ) echo 'selected="selected"'; ?>>Under Review</option>
         <option value="Endorsed" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'Endorsed' ) echo 'selected="selected"'; ?>>Endorsed</option>
         <option value="Other" <?php if ( isset($meta['selectposition']) && $meta['selectposition'] == 'Other' ) echo 'selected="selected"'; ?>>Other</option>
       </select></dd>  <!--   .position  -->
        </div>

  <div class="dl-li even">
       <dt><label for="unafactsheet_fields[selectstate]">State:</label></dt>
       <dd><select name="unafactsheet_fields[selectstate]" id="unafactsheet_fields[selectstate]">
           <option value="default" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'default' ) echo 'selected="selected"'; ?>>--</option>
           <option value="Alabama" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Alabama' ) echo 'selected="selected"'; ?>>Alabama</option>
           <option value="Alaska" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Alaska' ) echo 'selected="selected"'; ?>>Alaska</option>
           <option value="Arizona" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Arizona' ) echo 'selected="selected"'; ?>>Arizona</option>
           <option value="Arkansas" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Arkansas' ) echo 'selected="selected"'; ?>>Arkansas</option>
           <option value="California" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'California' ) echo 'selected="selected"'; ?>>California</option>
           <option value="Colorado" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Colorado' ) echo 'selected="selected"'; ?>>Colorado</option>
           <option value="Connecticut" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Connecticut' ) echo 'selected="selected"'; ?>>Connecticut</option>
           <option value="Delaware" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Delaware' ) echo 'selected="selected"'; ?>>Delaware</option>
           <option value="Florida" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Florida' ) echo 'selected="selected"'; ?>>Florida</option>
           <option value="Georgia" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Georgia' ) echo 'selected="selected"'; ?>>Georgia</option>
           <option value="Hawaii" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Hawaii' ) echo 'selected="selected"'; ?>>Hawaii</option>
           <option value="Idaho" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Idaho' ) echo 'selected="selected"'; ?>>Idaho</option>
           <option value="Illinois" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Illinois' ) echo 'selected="selected"'; ?>>Illinois</option>
           <option value="Indiana" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Indiana' ) echo 'selected="selected"'; ?>>Indiana</option>
           <option value="Iowa" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Iowa' ) echo 'selected="selected"'; ?>>Iowa</option>
           <option value="Kansas" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Kansas' ) echo 'selected="selected"'; ?>>Kansas</option>
           <option value="Kentucky" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Kentucky' ) echo 'selected="selected"'; ?>>Kentucky</option>
           <option value="Louisiana" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Louisiana' ) echo 'selected="selected"'; ?>>Louisiana</option>
           <option value="Maine" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Maine' ) echo 'selected="selected"'; ?>>Maine</option>
           <option value="Maryland" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Maryland' ) echo 'selected="selected"'; ?>>Maryland</option>
           <option value="Massachusetts" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Massachusetts' ) echo 'selected="selected"'; ?>>Massachusetts</option>
           <option value="Michigan" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Michigan' ) echo 'selected="selected"'; ?>>Michigan</option>
           <option value="Minnesota" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Minnesota' ) echo 'selected="selected"'; ?>>Minnesota</option>
           <option value="Mississippi" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Mississippi' ) echo 'selected="selected"'; ?>>Mississippi</option>
           <option value="Missouri" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Missouri' ) echo 'selected="selected"'; ?>>Missouri</option>
           <option value="Montana" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Montana' ) echo 'selected="selected"'; ?>>Montana</option>
           <option value="Nebraska" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Nebraska' ) echo 'selected="selected"'; ?>>Nebraska</option>
           <option value="Nevada" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Nevada' ) echo 'selected="selected"'; ?>>Nebraska</option>
           <option value="New Hampshire" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'New Hampshire' ) echo 'selected="selected"'; ?>>New Hampshire</option>
           <option value="New Jersey" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'New Jersey' ) echo 'selected="selected"'; ?>>New Jersey</option>
           <option value="New Mexico" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'New Mexico' ) echo 'selected="selected"'; ?>>New Mexico</option>
           <option value="New York" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'New York' ) echo 'selected="selected"'; ?>>New York</option>
           <option value="North Carolina" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'North Carolina' ) echo 'selected="selected"'; ?>>North Carolina</option>
           <option value="North Dakota" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'North Dakota' ) echo 'selected="selected"'; ?>>North Dakota</option>
           <option value="Ohio" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Ohio' ) echo 'selected="selected"'; ?>>Ohio</option>
           <option value="Oklahoma" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Oklahoma' ) echo 'selected="selected"'; ?>>Oklahoma</option>
           <option value="Oregon" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Oregon' ) echo 'selected="selected"'; ?>>Oregon</option>
           <option value="Pennsylvania" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Pennsylvania' ) echo 'selected="selected"'; ?>>Pennsylvania</option>
           <option value="Rhode Island" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Rhode Island' ) echo 'selected="selected"'; ?>>Rhode Island</option>
           <option value="South Carolina" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'South Carolina' ) echo 'selected="selected"'; ?>>South Carolina</option>
           <option value="South Dakota" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'South Dakota' ) echo 'selected="selected"'; ?>>South Dakota</option>
           <option value="Tennessee" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Tennessee' ) echo 'selected="selected"'; ?>>Tennessee</option>
           <option value="Texas" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Texas' ) echo 'selected="selected"'; ?>>Texas</option>
           <option value="Utah" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Utah' ) echo 'selected="selected"'; ?>>Utah</option>
           <option value="Vermont" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Vermont' ) echo 'selected="selected"'; ?>>Vermont</option>
           <option value="Virginia" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Virginia' ) echo 'selected="selected"'; ?>>Virginia</option>
           <option value="Washington" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Washington' ) echo 'selected="selected"'; ?>>Washington</option>
           <option value="West Virginia" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'West Virginia' ) echo 'selected="selected"'; ?>>West Virginia</option>
           <option value="Wisconsin" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Wisconsin' ) echo 'selected="selected"'; ?>>Wisconsin</option>
           <option value="Wyoming" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Wyoming' ) echo 'selected="selected"'; ?>>Wyoming</option>
           <option value="Washington DC" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Washington DC' ) echo 'selected="selected"'; ?>>Washington DC</option>
           <option value="Puerto Rico" <?php if ( isset($meta['selectstate']) && $meta['selectstate'] == 'Puerto Rico' ) echo 'selected="selected"'; ?>>Puerto Rico</option>
       </select></dd>  <!--   .state  -->
        </div>

        <div class="dl-li border-t">
         <dt class="pt-1 pb-05"><label for="unafactsheet_fields[checkboxvoterec]">Vote Rec:</label></dt>
         <dd class="pt-1 pb-05"><input type="checkbox" name="unafactsheet_fields[checkboxvoterec]" value="checkbox" <?php if ( isset($meta['checkboxvoterec']) && $meta['checkboxvoterec'] === 'checkbox' ) echo 'checked'; ?>>
        </dd>   <!--   .voterec  -->
        </div>

         <div class="dl-li">
          <dt class="pb-1"><label for="unafactsheet_fields[checkboxscore]">Scorecard:</label></dt>
          <dd class="pb-1"><input type="checkbox" name="unafactsheet_fields[checkboxscore]" value="checkbox" <?php if ( isset($meta['checkboxscore']) && $meta['checkboxscore'] === 'checkbox' ) echo 'checked'; ?>>
         </label></dd>   <!--   .checkboxscore  -->
       </div>


      </dl>

  <!-- Saves custom meta input -->
 <?php }
 function save_unafactsheet_fields_meta( $post_id ) {
 	// verify nonce
 	if ( isset($_POST['unafactsheet_meta_box_nonce'])
 			&& !wp_verify_nonce( $_POST['unafactsheet_meta_box_nonce'], basename(__FILE__) ) ) {
 			return $post_id;
 		}
 	// check autosave
 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 		return $post_id;
 	}
 	// check permissions
 	if (isset($_POST['post_type'])) { //Fix 2
         if ( 'page' === $_POST['post_type'] ) {
             if ( !current_user_can( 'edit_page', $post_id ) ) {
                 return $post_id;
             } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                 return $post_id;
             }
         }
     }

 	$old = get_post_meta( $post_id, 'unafactsheet_fields', true );
 		if (isset($_POST['unafactsheet_fields'])) {
 			$new = $_POST['unafactsheet_fields'];
 			if ( $new && $new !== $old ) {
 				update_post_meta( $post_id, 'unafactsheet_fields', $new );
 			} elseif ( '' === $new && $old ) {
 				delete_post_meta( $post_id, 'unafactsheet_fields', $old );
 			}
 		}
 }
 add_action( 'save_post', 'save_unafactsheet_fields_meta' );


// Add Unamuno Profile  --->
function una_custom_post_profiles() {
  register_post_type( 'unaprofile',
  array(
    'labels'         => array(
      'name'         => __( 'Profiles', 'Profile Posts' ),
      'singular_name' => __( 'Profile' ),
      'add_new'      => __( 'Add New', 'Profile' ),
      'add_new_item' => __( 'Add New Person' ),
      'edit_item'    => __( 'Edit Details' ),
      'new_item'     => __( 'New Profile' ),
      'view_item'    => __( 'View Profile' ),
      'all_items'    => __( 'All Profiles' ),
      'search_items' => __( 'Search Profiles' ),
      'featured_image'        => __( 'Headshot' ),
      'set_featured_image'    => __( 'Set profile image' ),
      'remove_featured_image' => __( 'Remove image'),
    ),
    'public'       => true,
		 'hierarchical' => true,
		 'has_archive'  => true,
    'exclude_from_search'  => true,
    'rewrite'        => array('slug' => 'profile','with_front' => false),
    'supports'       => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
    ),
    'query_var' => true,
    'menu_position' => 5,
    'show_in_rest' => false, // set to false to disable GB
     'menu_icon' => get_stylesheet_directory_uri() . '/img/media/icon-unaprofile.svg',
    'taxonomies'   => array(
      'post_tag',
     )
    )
   );
  register_taxonomy_for_object_type( 'post_tag', 'unaprofile' );
 }
add_action( 'init', 'una_custom_post_profiles' );


// Register Profile Meta Box Fields --->
function add_unaprofile_fields_meta_box() {
	add_meta_box(
		'unaprofile_meta_box',             // $id
		'Details',                        // $title
		'show_unaprofile_fields_meta_box', // $callback
		'unaprofile',                      // $screen
		'normal',                          // $context
		'high'                             // $priority
	);
}
add_action( 'add_meta_boxes', 'add_unaprofile_fields_meta_box' );

// Show Profile Fields: Text (3), Number (1)  --->
function show_unaprofile_fields_meta_box() { global $post;
		$meta = get_post_meta( $post->ID, 'unaprofile_fields', true ); ?>
   <input type="hidden" name="unaprofile_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">


   <dl class="admin-dl">
     <div class="dl-li">
     <dt><label for="unaprofile_fields[text]">Position</label></dt>
       <dd><input type="text" name="unaprofile_fields[text]" id="unaprofile_fields[text]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text'])){ echo $meta['text']; } ?>"></p>
     </div>
     <div class="dl-li">
       <dt><label for="unaprofile_fields[text2]">Twitter</label></dt>
         <dd><input type="text" name="unaprofile_fields[text2]" id="unaprofile_fields[text2]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text2'])){ echo $meta['text2']; } ?>"></p>
         </div>

       <div class="dl-li">
       <dt><label for="unaprofile_fields[text3]">LinkedIn</label></dt>
       <dd><input type="text" name="unaprofile_fields[text3]" id="unaprofile_fields[text3]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text3'])){ echo $meta['text3']; } ?>"></p>
       </div>

       <div class="dl-li">
       <dt class=""><label for="unaprofile_fields[numberorder]">Order</label></dt>
       <dd class=""><input type="number" name="unaprofile_fields[numberorder]" placeholder="3" min="1" max="100" id="unaprofile_fields[numberorder]" value="<?php if (is_array($meta) && isset($meta['numberorder'])){ echo $meta['numberorder']; } ?>"> </dd>
     </div>
   </dl>



 <?php }
 function save_unaprofile_fields_meta( $post_id ) {
 	// verify nonce
 	if ( isset($_POST['unaprofile_meta_box_nonce'])
 			&& !wp_verify_nonce( $_POST['unaprofile_meta_box_nonce'], basename(__FILE__) ) ) {
 			return $post_id;
 		}
 	// check autosave
 	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 		return $post_id;
 	}
 	// check permissions
 	if (isset($_POST['post_type'])) { //Fix 2
         if ( 'page' === $_POST['post_type'] ) {
             if ( !current_user_can( 'edit_page', $post_id ) ) {
                 return $post_id;
             } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                 return $post_id;
             }
         }
     }

 	$old = get_post_meta( $post_id, 'unaprofile_fields', true );
 		if (isset($_POST['unaprofile_fields'])) {
 			$new = $_POST['unaprofile_fields'];
 			if ( $new && $new !== $old ) {
 				update_post_meta( $post_id, 'unaprofile_fields', $new );
 			} elseif ( '' === $new && $old ) {
 				delete_post_meta( $post_id, 'unaprofile_fields', $old );
 			}
 		}
 }
 add_action( 'save_post', 'save_unaprofile_fields_meta' );


// Display Estimated Read Time   --->
 function unamuno_read_time() {
     $content = get_post_field( 'post_content', $post->ID );
     $word_count = str_word_count( strip_tags( $content ) );
     $readingtime = ceil($word_count / 200);
     $totalreadingtime = $readingtime . $timer;
     return $totalreadingtime;
 }

 // Remove WordPress Dashboard Icons (Admin)  --->
   function una_dashboard_remove_admin() {
    // remove_menu_page( 'index.php' );                  //Dashboard Clock
      remove_menu_page( 'gravity' );                    //Gravity
      //remove_menu_page( 'edit.php' );                   //Posts
      //remove_menu_page( 'upload.php' );                 //Media
      // remove_menu_page( 'edit.php?post_type=page' );    //Pages
      remove_menu_page( 'edit-comments.php' );            //Comments
    //  remove_menu_page( 'themes.php' );                 //Appearance
      remove_menu_page( 'plugins.php' );                //Plugins
      //remove_menu_page( 'users.php' );                  //Users
  //  remove_menu_page( 'tools.php' );                   //Tools
  //  remove_menu_page( 'options-general.php' );        //Options
  //    remove_menu_page( 'custom-settings.php' );        //custom
    }
    add_action( 'admin_menu', 'una_dashboard_remove_admin' );


 // Remove WordPress Dashboard Icons (Non-Admin)  --->
 function una_dashboard_remove_non_admin() {
   	if ( !current_user_can( 'update_core' ) ) {
      // remove_menu_page( 'index.php' );                  //Dashboard Clock
       remove_menu_page( 'gravity' );                    //Gravity
       // remove_menu_page( 'edit.php' );                   // Posts
      // remove_menu_page( 'upload.php' );                 //Media
       remove_menu_page( 'edit.php?post_type=page' );    //Pages
       remove_menu_page( 'edit-comments.php' );          //Comments
       remove_menu_page( 'themes.php' );                 //Appearance
       remove_menu_page( 'plugins.php' );                //Plugins
    //   remove_menu_page( 'users.php' );                  //Users
    //   remove_menu_page( 'profile.php' );                // profile
       remove_menu_page( 'tools.php' );                   //Tools
       remove_menu_page( 'options-general.php' );        //Options
   	}
   }
    add_action( 'admin_menu', 'una_dashboard_remove_non_admin' );


// Remove WordPress Dashboard Widgets (ALL)  --->
function unamuno_remove_dashboard_meta() {
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // quick press
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // links
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );  // right now
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // plugins
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );   // recent drafts
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );   // recent comments
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );    // wordpress blog
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );  // other news since 3.8
  remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );  // Site Health
  remove_meta_box( 'gf_forms_dashboard', 'dashboard', 'normal');
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
 }
 add_action( 'wp_dashboard_setup', 'unamuno_remove_dashboard_meta' );


 // Hide WordPress Update Nag (Non-Admin)   --->
 function una_hide_update_notice_all_but_admin() {
  	if ( !current_user_can( 'update_core' ) ) {
  		remove_action( 'admin_notices', 'update_nag', 3 );
  	}
  }
  add_action( 'admin_head', 'una_hide_update_notice_all_but_admin', 1 );


//  Remove Policy/Petition/Profile Admin Submenu 'Tags'  --->
 function unatags_remove_submenu() {
   remove_submenu_page( 'edit.php?post_type=unafactsheet', 'edit-tags.php?taxonomy=post_tag&amp;post_type=unafactsheet' );
   remove_submenu_page( 'edit.php?post_type=unapetition', 'edit-tags.php?taxonomy=post_tag&amp;post_type=unapetition' );
   remove_submenu_page( 'edit.php?post_type=unaprofile', 'edit-tags.php?taxonomy=post_tag&amp;post_type=unaprofile' );
 }
 add_action( 'admin_menu', 'unatags_remove_submenu', 999 );


 // Modify Default 'Activity' Dashboard Widget  --->
 if ( is_admin() ) {
 	add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
     function add_page_to_dashboard_activity( $query ) {

   //  $post_types = get_post_types();
   // Return post types of your choice
    $post_types = ['post', 'page'];
    if ( is_array( $query['post_type'] ) ) {
     $query['post_type'] = $post_types;
   } else {
     $temp = $post_types;
     $query['post_type'] = $temp;
   }
   return $query;
 }
 }

// Add Dashboard Widget 1 (Factsheets, Profiles) --->
function una_add_dash_widget1() {     // Function
  wp_add_dashboard_widget (          // Register
    'unamuno_dash_widget1',         // Slug
    'Policy &amp; Profiles',       // Title
    'una_dash_widget_display1'    // Display
  );
}
 add_action( 'wp_dashboard_setup', 'una_add_dash_widget1' );

// Display Dashboard Widget (Factsheets, Profiles)
  function una_dash_widget_display1() {
    global $post;
    // The arguments
    $args = array(
      'numberposts' => 5,
      'post_type' => 'unafactsheet',
      'orderby' => 'post_date'
    );
    $myposts = get_posts( $args );
    unamuno_display_post($myposts);
}
function unamuno_display_post( $posts ) {
    ?>

      <table>
        <thead>
          <tr>
            <th class="dash-col1"> </th>
            <th class="dash-col2"></th>
              </tr>
          </thead>

      <?php
      foreach( $posts as $post ) {
        $meta = get_post_meta( $post->ID, 'unafactsheet_fields', true );
          ?>
             <tr>
              <td class="dash-col1"><a href="<?php echo the_permalink( $post->ID ); ?>"><?php echo get_the_title( $post->ID ); ?></a>
               <div class="details"><?php if (!empty($meta['text2'])): ?><?php echo esc_attr($meta['text2']); ?><?php endif; ?> - <?php echo get_the_date( 'M j' ); ?></div></td>
             </td>
              <td class="dash-col2"><span></span></td>

              <td class="dash-col3 verdict">
                <?php if ( isset($meta['selectposition'])) { ?>
                  <?php switch ( $meta['selectposition'] ) {

                    case 'Support'  : ?>
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-y.svg" title="policy support" height="30" width="30"></img>

                  <?php break;
                   case 'Oppose'   : ?>

                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-n.svg" title="policy oppose" height="30" width="30"></img>

                  <?php break;
                  default          : ?>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-m.svg" title="policy review" height="31" width="31"></img>
                <?php break; } ?>

                <?php } ?> <!-- .position-->

              </td>
            </tr>

          <?php }

        echo "</table>";

        wp_reset_postdata();

          // The Arguments
          $args2 = array(
            'post_type'      => 'unaprofile',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
          );

          // The Query
          $parent = new WP_Query( $args2 ); ?>

            <?php
             // Test
            if ( $parent->have_posts() ) : ?>

                <table class="tbl-split">

                <?php
                // Start loop
                while ( $parent->have_posts() ) : $parent->the_post(); ?>

            <?php
              $meta = get_post_meta( $post->ID, 'unaprofile_fields', true );
                ?>

                <tr>

                  <td class="dash-col1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <div class="details">STAFF</div></td>
                   <td class="dash-col2"></td>
                  <td class="dash-col3 thumb">
                    <img src="<?php the_post_thumbnail_url(); ?>" title="profile pic" height="39" width="39"></img>
                  </td>
                </tr>

              <?php endwhile; endif; wp_reset_postdata();
                echo "</table>";
              }


// Add Dashboard Widget 2 (Press)
    function una_add_dash_widget2() {     // Function
      wp_add_dashboard_widget (          // Register
        'unamuno_dash_widget2',         // Slug
        'Press',                    // Title
        'una_dash_widget_display2'    // Display/ Callback
      );
    }
     add_action( 'wp_dashboard_setup', 'una_add_dash_widget2' );

   // Display Widget 2 (Press)
      function una_dash_widget_display2() {
        $content = '<table><thead><tr><th class="dash-col1"></th><th class="dash-col2"></th></thead></tr>';
        $postid = get_the_ID();
        $meta = get_post_meta( $postid, 'unaprofile_fields', true );


      // The Arguments
      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
      );

      // The Query
      $parent = new WP_Query( $args ); ?>

        <?php
         // Test

        if ( $parent->have_posts() ) : ?>

        <table>
          <thead>
            <tr>
              <th class="dash-col1"></th>
              <th class="dash-col2"></th>
             </tr>
           </thead>

        <?php
            // Start the loop
          while ( $parent->have_posts() ) : $parent->the_post(); ?>

             <td class="dash-col1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
             <div class="details"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div></td>
              <td class="dash-col2">
              <?php echo get_the_date( 'M j' ); ?>
            </td>
           </tr>

         <?php endwhile; endif; wp_reset_postdata();
           echo "</table>";
       }


// Add Dashboard Widget 3 (Petitions) --->
 function una_add_dash_widget3() {     // Function
   wp_add_dashboard_widget (          // Register
     'unamuno_dash_widget3',         // Slug
     'Petitions',                   // Title
     'una_dash_widget_display3'    // Callback
   );
 }
  add_action( 'wp_dashboard_setup', 'una_add_dash_widget3' );

  // Display Dash Widget 3 (Petitions)
   function una_dash_widget_display3() {
     $content = '<table><thead><tr><th class="dash-col1"></th><th class="dash-col2"></th></thead></tr>';
     $postid = get_the_ID();

   // The Arguments
   $args = array(
     'post_type'      => 'unapetition',
     'posts_per_page' => 5,
     'orderby' => 'date',
     'order' => 'DESC'
   );

   // The Query
   $parent = new WP_Query( $args ); ?>

     <?php
      // Test
     if ( $parent->have_posts() ) : ?>

     <table>

         <?php
         // Start loop
         while ( $parent->have_posts() ) : $parent->the_post(); ?>

     <?php
     //  $meta = get_post_meta( $post->ID, 'unapetition_fields', true );
     ?>
         <tr>
          <td class="dash-col1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
          </td>
          <td class="dash-col2"><?php echo get_the_date( 'M j' ); ?>
          </td>
          <td class="dash-col3">
          </td>
        </tr>

      <?php endwhile; endif; wp_reset_postdata();

      echo "</table>";

    }


// Replace Default Dashboard Title
function una_admin_dash_title( $menu ) {
     $menu = str_ireplace( 'Dashboard', 'Home', $menu );
     return $menu;
}
add_filter('gettext', 'una_admin_dash_title');

// Replace Individual User's Profile with Author (Non-Admin)
function una_userpro_dash_title( $menu ) {
     $menu = str_ireplace( 'Profile', 'Author', $menu );
     return $menu;
}
add_filter('gettext', 'una_userpro_dash_title');

// Replace Authors with Profiles
function una_authorpro_dash_title( $menu ) {
     $menu = str_ireplace( 'Authors', 'Profiles', $menu );
     return $menu;
}
add_filter('gettext', 'una_authorpro_dash_title');


// Replace Individual Author Profile with User
function una_userproauth_dash_title( $menu ) {
     $menu = str_ireplace( 'Author', 'Author', $menu );
     return $menu;
}
add_filter('gettext', 'una_userproauth_dash_title');


// Replace Users with Authors
function una_userauthor_dash_title( $menu ) {
     $menu = str_ireplace( 'Users', 'Authors', $menu );
     return $menu;
}
add_filter('gettext', 'una_userauthor_dash_title');


// Replace Activity with Press
function una_activity_dash_title( $menu ) {
     $menu = str_ireplace( 'Activity', 'Press', $menu );
     return $menu;
}
add_filter('gettext', 'una_activity_dash_title');


// Remove Post Dashboard Boxes ($id, $screen, $context)
 function una_remove_post_dash_boxes() {
    remove_meta_box( 'postcustom' , 'post' , 'normal');
    remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
    remove_meta_box( 'commentsdiv', 'post', 'normal' );
    remove_meta_box( 'authordiv' , 'post' , 'normal' );
    remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
     }
  add_action( 'admin_menu' , 'una_remove_post_dash_boxes' );

 // Remove Petition Dashboard Boxes   --->
 function una_remove_petition_dash_boxes() {
   remove_meta_box( 'commentstatusdiv', 'unapetition', 'normal' ); // discussion
   remove_meta_box( 'commentsdiv', 'unapetition', 'normal' );
   remove_meta_box( 'trackbacksdiv' , 'unapetition' , 'normal' );
    }
 add_action( 'admin_menu' , 'una_remove_petition_dash_boxes' );

 // Remove Page Dashboard Boxes   --->
 function una_remove_page_dash_boxes() {
 	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' );
  remove_meta_box( 'postcustom' , 'page' , 'normal');
 	remove_meta_box( 'commentsdiv' , 'page' , 'normal' );
 	remove_meta_box( 'authordiv' , 'page' , 'normal' );
 }
 add_action( 'admin_menu' , 'una_remove_page_dash_boxes' );

 // Remove Public Admin Bar   --->
    add_filter( 'show_admin_bar', '__return_false' );

 // Remove Admin Menu Topbar Icons/Menu Options  --->
 function una_remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'site-name' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'updates' );
  // $wp_admin_bar->remove_node( 'my-account' );
    $wp_admin_bar->remove_node( 'archive' );
    $wp_admin_bar->remove_node( 'new-content' );
 }
 add_action( 'admin_bar_menu', 'una_remove_wp_logo', 999 );


// Modify 'Howdy' text  --->
 function unamuno_wordpress_howdy( $wp_admin_bar ) {
  $my_account = $wp_admin_bar->get_node('my-account');
  $newtext = str_replace( 'Howdy,', '', $my_account->title );
  $wp_admin_bar->add_node( array(
   'id' => 'my-account',
   'title' => $newtext,
 ) );
  }
 add_filter( 'admin_bar_menu', 'unamuno_wordpress_howdy',999 );


 // Modify Admin Footer Text   --->
 function una_modify_footer() {
  echo get_bloginfo('name');
   }
   add_filter( 'admin_footer_text', 'una_modify_footer' );


 // Remove G Form Button on Posts/Pages
  add_filter( 'gform_display_add_form_button', '__return_false' );


 // Reposition G Form Admin Menu Icon to Bottom   --->
 function una_gform_menu_position( $position ) {
     return 100;
 }
 add_filter( 'gform_menu_position', 'una_gform_menu_position' );




 // Enable WordPress Thumbnails (Posts/Pages)   --->
add_theme_support( 'post-thumbnails' );

// Enable WordPress Page Excerpts   --->
 function unamuno_page_excerpts() {
    add_post_type_support( 'page', array( 'excerpt' ) );
 }
 add_action( 'init', 'unamuno_page_excerpts' );

// Enable Wordpress Comment Lists, Comment Form, Search Form, Gallery, Caption  --->
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// Custom Excerpt Length   --->
// Text editor excerpts override rule below
function unamuno_excerpt_length( $length ) {
	global $post;
	if ($post->post_type == 'post') {
    return 26;
  }
	elseif ($post->post_type == 'unafactsheet') {
    return 26;
  }
  elseif ($post->post_type == 'unaprofile') {
    return 26;
  }
  elseif ($post->post_type == 'unapetition') {
    return 30;
  }
	else {
    return 45;
  }
}
add_filter('excerpt_length', 'unamuno_excerpt_length', 999 );


// Add About Page CSS Class
function unamuno_about_css( $classes ) {
    if ( is_page( array( 'About', 'Contact'  ) ) ) {
        $classes[] = 'page-about';
    }
    return $classes;
}
add_filter( 'body_class', 'unamuno_about_css' );

// Add Contact Page CSS
function unamuno_contact_css( $classes ) {
    if ( is_page( 'Contact' ) ) {
        $classes[] = 'page-contact';
    }
    return $classes;
}
add_filter( 'body_class', 'unamuno_contact_css' );


// Modify Excerpts Label for all Posts/Pages
  function una_admin_excerpt_modify( $translation, $original ) {
    if ( 'Excerpt' == $original ) {
    return 'Description';
  }
    else {
      $pos = strpos($original, 'Excerpts are optional hand-crafted summaries of your');
      if ($pos !== false) {
    return  '<p class="howto">Brief description</p>';
  }
}
return $translation;
}
add_filter( 'gettext', 'una_admin_excerpt_modify', 10, 2 );

// Remove Emojis   --->
 function una_disable_wp_emojicons() {
   // Remove all emoji-related actions
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'wp_print_styles', 'print_emoji_styles' );
   remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
   remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   remove_action('wp_head', 'wp_resource_hints', 2 ); // WP 4.9+ dns-prefetch/ gogfont
   remove_action('wp_head', 'feed_links', 2 ); // feed links
   remove_action('wp_head', 'feed_links_extra', 3 );  // comments feed
   add_filter( 'tiny_mce_plugins', 'una_disable_tinymce_emojicons' ); // TinyMCE emojis
   remove_action('wp_head', 'rsd_link'); // URI/RSD link
   remove_action('wp_head', 'wlwmanifest_link'); // wlwmanifest link
   remove_action('wp_head', 'wp_generator'); // meta name generator
   remove_action('wp_head', 'wp_shortlink_wp_head'); // shortlink
   remove_action('wp_head', 'wp_oembed_add_discovery_links');
   remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
 }
 add_action( 'init', 'una_disable_wp_emojicons' );

// Disable TinyMCE emojis
  function una_disable_tinymce_emojicons( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }



 // Rename Default Post Type to 'Press'
 function una_rename_default_post( $labels ) {
 // Labels
   $labels->name = 'Press';
   $labels->singular_name = 'Press';
   $labels->add_new = 'Add New';
   $labels->add_new_item = 'Add Press';
   $labels->edit_item = 'Edit Press';
   $labels->new_item = 'New Press';
   $labels->view_item = 'View Press';
   $labels->view_items = 'View Press';
   $labels->search_items = 'Search Press';
   $labels->not_found = 'No press found.';
   $labels->not_found_in_trash = 'No press found in Trash.';
   $labels->parent_item_colon = 'Parent press'; // Not for "post"
   $labels->archives = 'Press Archives';
   $labels->attributes = 'Press Attributes';
   $labels->insert_into_item = 'Insert into press post';
   $labels->uploaded_to_this_item = 'Uploaded to this press post';
   $labels->featured_image = 'Featured Image';
   $labels->set_featured_image = 'Set featured image';
   $labels->remove_featured_image = 'Remove featured image';
   $labels->use_featured_image = 'Use as featured image';
   $labels->filter_items_list = 'Filter press items';
   $labels->items_list_navigation = 'Press navigation';
   $labels->items_list = 'Press items';
 // Menu
   $labels->menu_name = 'Press';
   $labels->all_items = 'All Press';
   $labels->name_admin_bar = 'Press';
   return $labels;
 }
 add_filter( 'post_type_labels_post', 'una_rename_default_post' );


 // Manage Factsheet Admin Columns  --->

 // 1. Add/display columns
 function add_unafactsheet_columns($columns) {
    $columns['image'] = __( 'Image' );
//    $columns['number'] = __( 'Number' );
//    $columns['type'] = __( 'Type' );
    $columns['position'] = __( 'Position' );
    $columns['level'] = __( 'Category' );
    $columns['details'] = __( 'Details' );
    return $columns;
 }
 add_filter('manage_unafactsheet_posts_columns' , 'add_unafactsheet_columns');


 // 2. Remove, reorder columns
function reorder_factsheet_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Title' ),
      'position' => __( 'Position' ),
  //  'number' => __( 'Number' ),
  //  'type' => __( 'Type' ),
      'details' => __( 'Details' ),
      'level' => __( 'Category' ),
//     'date' => __( 'Published' ),
    );
  return $columns;
}
  add_filter( 'manage_unafactsheet_posts_columns', 'reorder_factsheet_columns' );


 // 3. Populate columns
 function unafactsheet_display_column( $column, $post_id ) {
   // Image column
   //  if ( 'image' === $column ) {
  //      echo get_the_post_thumbnail( $post_id, array(80, 80) );
 //    }
   if ( 'title' === $column )  {
   echo get_the_title( $post_id, array(75, 75) );
   }

   // Details column
   if ( 'details' === $column ) {
     $meta = get_post_meta( $post_id, 'unafactsheet_fields' , true );

     if ( isset($meta['checkboxvoterec']) && $meta['checkboxvoterec'] === 'checkbox') {
        echo "Vote Recommendation";
      }
     else {
        echo "Policy";
      }
       echo "<br><small>";
      if (!empty($meta['text2'])) {
       echo esc_attr($meta['text2']);
      } else {
       echo " ";
      }
       echo "</small>";
    }



   // Number column
   if ( 'number' === $column ) {
     $meta = get_post_meta( $post_id, 'unafactsheet_fields' , true );
      if (!empty($meta['text2'])) {
       echo esc_attr($meta['text2']);
      } else {
       echo " ";
      }
    }

   // Type
   if ( 'type' === $column ) {
    $meta = get_post_meta( $post_id, 'unafactsheet_fields' , true );
     if ( isset($meta['checkboxvoterec']) && $meta['checkboxvoterec'] === 'checkbox') {
        echo "VoteRec";
      }
     else {
        echo "Policy";
      }
    }


      // Level  -->
    if ( 'level' === $column ) {
     $meta = get_post_meta( $post_id, 'unafactsheet_fields' , true );

     if ( isset($meta['selectgovt']) && $meta['selectgovt'] != 'default' && $meta['selectgovt'] != 'State' && $meta['selectgovt'] != 'Local') {
       echo $meta['selectgovt'];
         // State, no level specified   -->
        if ( isset($meta['selectstate']) && $meta['selectstate'] != 'default') {
          echo $meta['selectstate'];
        }
         echo "<br>";
      }
      elseif ( isset($meta['selectstate']) && $meta['selectstate'] != 'default') {
        if ( isset($meta['selectgovt']) && $meta['selectgovt'] != 'default' && $meta['selectgovt'] != 'Federal') {

          echo $meta['selectgovt']; ?> <br><small><?php echo $meta['selectstate']; ?>, </small><?php
        }
      }
      else {
       echo " ";
      }
      if (!empty($meta['selectyear'])) {

        /* load default year */
           echo "<small>";
        echo $meta['selectyear'];
           echo "</small>";
    }
  }

   // Position
   if ( 'position' === $column ) {
     $meta = get_post_meta( $post_id, 'unafactsheet_fields' , true );
     switch ( $meta['selectposition'] ) {
       case 'Support'               : ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-y.svg" width="29" height="29" alt="policy icon support">
       <?php break; case 'Oppose'   : ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-n.svg" width="29" height="29" alt="policy icon oppose">

       <?php break; default         : ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/poli-m.svg" width="29" height="29" alt="policy icon default">

        <?php break;
      }
    }
  }
    add_action( 'manage_unafactsheet_posts_custom_column', 'unafactsheet_display_column', 10, 2);



 // Manage Profile Admin Columns  --->
 // 1. Add/display profile columns
 function add_unaprofile_columns($columns) {
    $columns['image'] = __( 'Image' );
    $columns['tags'] = __( 'Affiliation' );
    $columns['position'] = __( 'Details' );
    return $columns;
 }
 add_filter('manage_unaprofile_posts_columns' , 'add_unaprofile_columns');


 // 2. Remove, reorder profile columns
function reorder_unaprofile_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Name' ),
      'image' => __( 'Image' ),
      'details' => __( 'Details' ),
      'tags' => __( 'Affiliation' ),
    );
  return $columns;
}
  add_filter( 'manage_unaprofile_posts_columns', 'reorder_unaprofile_columns' );


 // 3. Populate profile columns
   function unaprofile_display_column( $column, $post_id ) {
     // Image column
     if ( 'image' === $column ) {
       echo get_the_post_thumbnail( $post_id, array(80, 80) );
     }
     else {
        echo " ";
      }

     // Title / Details
     if ( 'details' === $column ) {
       $meta = get_post_meta( $post_id, 'unaprofile_fields' , true );
        if (!empty($meta['text'])) {
         echo esc_attr($meta['text']);
        } else {
         echo " ";
        }
        echo "<br><small>";
         if (!empty($meta['text2'])) {
            echo '@';

        echo esc_attr($meta['text2']);
        } else {
        echo " ";
        }
        echo "</small>";
      }
  }
 add_action( 'manage_unaprofile_posts_custom_column', 'unaprofile_display_column', 10, 2);



 // Manage Petition Admin Columns  --->
 // 1. Add/display columns
 function add_unapetition_columns($columns) {
    $columns['action'] = __( 'Action' );
    return $columns;
 }
 add_filter('manage_unapetition_posts_columns' , 'add_unapetition_columns');


 // 2. Remove, reorder columns
function reorder_unapetition_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Title' ),
      'image' => __( 'Image' ),
      'action' => __( 'Action' ),
    );
  return $columns;
}
  add_filter( 'manage_unapetition_posts_columns', 'reorder_unapetition_columns' );


  // 3. Populate petition columns
  function unapetition_display_column( $column, $post_id ) {
   // Image column
   if ( 'image' === $column ) {
     echo get_the_post_thumbnail( $post_id, array(150, 78) );
   }
   else {
      echo " ";
    }

    // Excerpt column
    if ( 'action' === $column ) {
      echo wp_strip_all_tags( get_the_excerpt(), true );
    }
    else {
       echo " ";
     }
  }
  add_action( 'manage_unapetition_posts_custom_column', 'unapetition_display_column', 10, 2);


// Modify Placeholder Text Field Title  --->
   function unamuno_modify_enter_title($title) {
       $current = get_current_screen();
       if ('unafactsheet' == $current->post_type) {
       	$title = 'Policy title';
      }
      elseif ('unaprofile' == $current->post_type) {
           $title = 'Enter name';
       }
       elseif ('unapetition' == $current->post_type) {
            $title = 'Petition headline';
        }
       return $title;
   }
   add_filter('enter_title_here', 'unamuno_modify_enter_title');


// Disable Gutenberg for Pages  --->
function una_disable_gutenberg_pages( $is_enabled, $post_type ) {
    if ( 'page' == $post_type ) {  // disable for pages
        return false;
  }
     return $is_enabled;
 }
    add_filter( 'use_block_editor_for_post_type', 'una_disable_gutenberg_pages', 10, 2 );


// Disable Gutenberg for Posts (REST API disables custom posts)  --->
  function una_disable_gutenberg_newsposts( $is_enabled, $post_type ) {
        if ( 'post' == $post_type ) {  // disable for standard posts
            return false;
      }
         return $is_enabled;
     }
        add_filter( 'use_block_editor_for_post_type', 'una_disable_gutenberg_newsposts', 10, 2 );


// Modify/Build Post Comments Data
function unamuno_post_commments_data() {
	if ( ! post_type_supports( $this->post->post_type, 'comments' ) ) {
		return;
	}

	$comments_open = comments_open( $this->ID );

	// Don't show link if close and no comments.
	if ( ! $comments_open
		&& ! $this->post->comment_count ) {
		return;
	}

	$comments_link_url  = get_comments_link( $this->ID );
	$comments_link_text = $comments_open
		? __( 'Leave a Comment', 'amp' )
		: __( 'View Comments', 'amp' );

	$this->add_data(
		array(
			'comments_link_url'  => $comments_link_url,
			'comments_link_text' => $comments_link_text,
		)
	);
}

//  Disable Wordpress Attachment URLS (Excluding Media Uploads)
function cleanup_default_rewrite_rules( $rules ) {
    foreach ( $rules as $regex => $query ) {
        if ( strpos( $regex, 'attachment' ) || strpos( $query, 'attachment' ) ) {
            unset( $rules[ $regex ] );
        }
    }

    return $rules;
}
add_filter( 'rewrite_rules_array', 'cleanup_default_rewrite_rules' );


//  Redirect Immigration Page  --->
function unamuno_redirect_immigration_page() {
    if ( is_page( 'Immigration R' ) ) {
        // Redirect to new APP url, set status to 301 permenant redirect
        wp_redirect( 'https://americanprinciplesproject.org/research/immigration/', 301 );
        exit;
    }
}
add_action('template_redirect', 'unamuno_redirect_immigration_page');



// Post Meta -->
  function unamuno_add_post_meta() {
    if ( is_singular( 'post' ) && !is_attachment() && !is_singular( 'unaprofile' ) && !is_singular( 'unafactsheet' ) && !is_singular( 'unapetition' )) {
        global $post;
        if(get_the_post_thumbnail($post->ID, 'large')) {
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumbnail_object = get_post($thumbnail_id);
          $image = $thumbnail_object->guid;
        } else {
          // set default image
          $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
        }
          // strip all tags except <br>
        $excerpt = strip_tags( get_the_excerpt(), '<br>');
          // covert quotes to apostrophes
        $excerpt = str_replace( '"', '\'', $excerpt );
          // covert apostrophes to apostrophes
        $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
          // remove autogenerated html symbol on auto excerpts
        $excerpt = str_replace( "'", '\'', $excerpt );
          // strip style/script certain html tags
        $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
        ?>
      <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
      <link rel="canonical" href="<?php echo the_permalink(); ?>">
      <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
      <meta name="description" content="<?=$excerpt?>" />
      <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
    <!-- ThreeAnchor SEO -->
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:image" content="<?=$image?>" />
      <meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" />
      <meta property="og:url" content="<?php echo the_permalink(); ?>" />
      <meta property="og:title" content="<?php the_title(); ?>" />
      <meta property="og:description" content="<?=$excerpt?>" />
      <meta property="og:image" content="<?=$image?>" />
      <meta property="og:image:width" content="2400" />
      <meta property="og:image:height" content="1256" />
      <meta property="article:published_time" content="<?php echo get_the_date('Y-m-d');?><?php echo the_time('G:i'); ?>" />
      <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" />
      <meta property="og:site_name" content="<?=get_bloginfo('name')?>" />
      <meta property="og:locale" content="en_US" />
      <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Article",
        "mainEntityOfPage": "<?php echo the_permalink(); ?>",
        "headline": "<?php echo the_title(); ?>",
        "datePublished": "<?php echo get_the_date('Y-m-d');?>",
        "dateModified": "<?php echo get_the_date('Y-m-d');?>",
        "description": "<?=$excerpt?>",
        "author": {
          "@type": "Person",
          "name": "<?php echo get_bloginfo('name'); ?>"
        },
        "publisher": {
          "@type": "Organization",
          "name": "<?php echo get_bloginfo('name'); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo get_option('unamunologoamp'); ?>",
            "width": 600,
            "height": 60
          },
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
            "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
            "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
            "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
          }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
            "contactPoint" : {
              "@type" : "ContactPoint",
              "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
              "contactType" : "customer service"
            }<?php } ?>,
            "sameAs": [
              "<?php echo get_option( 'unamunofacebook' ); ?>",
              "<?php echo get_option( 'unamunotwitter' ); ?>"
            ]},
            "image": {
              "@type": "ImageObject",
              "url": "<?=$image?>",
              "height": 1256,
              "width": 2400
            }
      }
      </script>



      <?php
    }
  }
  add_action('wp_head', 'unamuno_add_post_meta');

// Factsheet Meta -->
  function unamuno_add_factsheet_meta() {
    if ( is_singular( 'unafactsheet' ) ) {
      global $post;
      if(get_the_post_thumbnail($post->ID, 'large')) {
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_object = get_post($thumbnail_id);
        $image = $thumbnail_object->guid;
      } else {
        // set default image
        $image = get_stylesheet_directory_uri() . '/img/logos/og-default-factsheet.png';
      }
      $excerpt = strip_tags( get_the_excerpt(), '<br>');
      $excerpt = str_replace( '"', '\'', $excerpt );
      $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
      $excerpt = str_replace( "'", '\'', $excerpt );
      $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
    ?>

    <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
    <link rel="canonical" href="<?php echo the_permalink(); ?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="description" content="<?=$excerpt?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
  <!-- ThreeAnchor SEO -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?=$image?>" />
    <meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" />
    <meta property="og:url" content="<?php echo the_permalink(); ?>" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?=$excerpt?>" />
    <meta property="og:image" content="<?=$image?>" />
    <meta property="og:image:width" content="2400" />
    <meta property="og:image:height" content="1256" />
    <meta property="article:published_time" content="<?php echo get_the_date('Y-m-d');?><?php echo the_time('G:i'); ?>" />
    <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" />
    <meta property="og:site_name" content="<?=get_bloginfo('name')?>" />
    <meta property="og:locale" content="en_US" />
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "mainEntityOfPage": "<?php echo the_permalink(); ?>",
      "headline": "<?php echo the_title(); ?>",
      "datePublished": "<?php echo get_the_date('Y-m-d');?>",
      "dateModified": "<?php echo get_the_date('Y-m-d');?>",
      "description": "<?=$excerpt?>",
      "author": {
        "@type": "Organization",
        "name": "<?php echo get_bloginfo('name'); ?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "<?php echo get_bloginfo('name'); ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo get_option('unamunologoamp'); ?>",
          "width": 600,
          "height": 60
        },
      "sameAs": [
        "<?php echo get_option( 'unamunofacebook' ); ?>",
        "<?php echo get_option( 'unamunotwitter' ); ?>"
      ]},
      "image": {
        "@type": "ImageObject",
        "url": "<?=$image?>",
        "height": 1256,
        "width": 2400
      }
    }
    </script>

      <?php
    }
  }
  add_action('wp_head', 'unamuno_add_factsheet_meta');

// Petition Meta -->

// Plugins/Petition (link rel and viewport declared in header) --->
//  $excerpt = preg_replace( '/&/', '&amp;', $excerpt );
  function unamuno_add_petition_meta() {
    if ( is_singular( 'unapetition' ) ) {
        global $post;
        if(get_the_post_thumbnail($post->ID, 'large')) {
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumbnail_object = get_post($thumbnail_id);
          $image = $thumbnail_object->guid;
        } else {
          // set default image
          $image = get_option('unamunopetitionimg');
        }
        $excerpt = strip_tags( get_the_excerpt(), '<br>');
        $excerpt = str_replace( '"', '\'', $excerpt );
        $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
        $excerpt = str_replace( "'", '\'', $excerpt );
        $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
      ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
  <link rel="canonical" href="<?php echo the_permalink(); ?>">
  <meta name="description" content="<?=$excerpt?>" />
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" /><meta name="twitter:card" content="summary_large_image" /><meta name="twitter:image" content="<?=$image?>" />
  <meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" />
  <meta property="og:url" content="<?php echo the_permalink(); ?>" />
  <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" />
  <meta property="og:title" content="<?php echo the_title(); ?>" />
  <meta property="og:description" content="<?=$excerpt?>" />
  <meta property="og:image" content="<?=$image?>" />
  <meta property="og:image:width" content="2400" />
  <meta property="og:image:height" content="1256" />
  <meta property="og:site_name" content="<?=get_bloginfo('name')?>" />
  <meta property="og:type" content="article" />
  <meta property="og:locale" content="en_US" />
  <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "mainEntityOfPage": "<?php echo the_permalink(); ?>",
        "headline": "<?php echo the_title(); ?>",
        "datePublished": "<?php echo get_the_date('Y-m-d');?>",
        "dateModified": "<?php echo get_the_date('Y-m-d');?>",
        "description": "<?=$excerpt?>",
        "publisher": {
          "@type": "Organization",
          "name": "<?php echo get_bloginfo('name'); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo get_option('unamunologoamp'); ?>",
            "width": 600,
            "height": 60
          },
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
            "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
            "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
            "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
          }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
            "contactPoint" : {
            "@type" : "ContactPoint",
            "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
            "contactType" : "customer service"
          }<?php } ?>,
          "sameAs": [
            "<?php echo get_option( 'unamunofacebook' ); ?>",
            "<?php echo get_option( 'unamunotwitter' ); ?>"
          ]},
        "image": {
          "@type": "ImageObject",
          "url": "<?=$image?>",
          "height": 1256,
          "width": 2400
        }
      }
    </script>

      <?php
    }
  }
  add_action('wp_head', 'unamuno_add_petition_meta', 5);


  // Profile Meta -->
    function unamuno_add_profile_meta() {
      if ( is_singular( 'unaprofile' ) ) {
        global $post;
        if(get_the_post_thumbnail($post->ID, 'large')) {
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumbnail_object = get_post($thumbnail_id);
          $image = $thumbnail_object->guid;
        } else {
          // set default image
          $image = get_stylesheet_directory_uri() . '/img/logos/og-default-profile.png';
        }
        $excerpt = strip_tags( get_the_excerpt(), '<br>');
        $excerpt = str_replace( '"', '\'', $excerpt );
        $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
        $excerpt = str_replace( "'", '\'', $excerpt );
        $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
        ?>
      <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
      <link rel="canonical" href="<?php echo the_permalink(); ?>">
      <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
      <meta name="description" content="<?=$excerpt?>" />
      <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
      <!-- ThreeAnchor SEO -->
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:image" content="<?=$image?>" />
      <meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" />
      <meta property="og:url" content="<?php echo the_permalink(); ?>" />
      <meta property="og:title" content="<?php the_title(); ?>" />
      <meta property="og:description" content="<?=$excerpt?>" />
      <meta property="og:image" content="<?=$image?>" />
      <meta property="og:image:width" content="400" />
      <meta property="og:image:height" content="400" />
      <meta property="og:site_name" content="<?=get_bloginfo('name')?>" />
      <meta property="og:locale" content="en_US" />

      <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "Person",
        "name": "<?php the_title(); ?>",
        "url": "<?php echo the_permalink(); ?>",
        <?php $meta = get_post_meta( $post->ID, 'unaprofile_fields', true ); ?><?php if (!empty($meta['text'])) { ?>"jobTitle": "<?php echo esc_attr($meta['text']); ?>",
        <?php } ?><?php if (!empty($meta['text2'])) { ?>"sameAs": "https://twitter.com/<?php echo esc_attr($meta['text2']); ?>",
        <?php } ?><?php if (!empty($meta['text3'])) { ?>"sameAs": "https://www.linkedin.com/in/<?php echo esc_attr($meta['text3']); ?>",
        <?php } ?>"disambiguatingDescription": "<?=$excerpt?>",
        "image": {
          "@type": "ImageObject",
          "url": "<?=$image?>",
          "height": 400,
          "width": 400
        },
        "affiliation": {
          "@type": "Organization",
          "name": "<?php echo get_bloginfo('name'); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo get_option('unamunologoamp'); ?>",
            "width": 600,
            "height": 60
          }
        }
      }
      </script>

        <?php
      }
    }
    add_action('wp_head', 'unamuno_add_profile_meta');


    // Attachment Meta   --->
    function unamuno_add_attachment_meta() {
      if ( is_singular( 'attachment' ) ) {
          global $post;
          if(get_the_post_thumbnail($post->ID, 'large')) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_object = get_post($thumbnail_id);
            $image = $thumbnail_object->guid;
          } else {
          // set default image
          $image = get_option('unamunopostimg');
        }
        // $excerpt
         $excerpt = get_bloginfo('description');
        ?>
        <title>Attachment Resource <?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
        <?php
      }
    }
    add_action('wp_head', 'unamuno_add_attachment_meta', 5);


  // Home Meta -->
    function unamuno_add_home_meta() {
      if ( is_front_page()) {
        global $post;
          if(get_the_post_thumbnail($post->ID, 'large')) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_object = get_post($thumbnail_id);
            $image = $thumbnail_object->guid;
          } else {
            // set default image
            $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
          }
          $excerpt = strip_tags( get_the_excerpt() );
          $excerpt = str_replace( '"', '\'', $excerpt );
          $excerpt = str_replace( "'", '', $excerpt );
          $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
          $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
    ?>
      <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
      <link rel="canonical" href="<?php echo the_permalink(); ?>"> <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
      <meta name="description" content="<?=$excerpt?>" /> <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />

  <!-- ThreeAnchor SEO -->
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" />
      <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="<?php echo get_bloginfo('url'); ?>" />
      <meta property="og:title" content="<?php echo the_title(); ?>" />
      <meta property="og:description" content="<?=$excerpt?>" />
      <meta property="og:image" content="<?=$image?>" />
      <meta property="og:image:width" content="2400" />
      <meta property="og:image:height" content="1256" />
      <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
      <meta property="og:locale" content="en_US" />
      <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "url": "<?php echo get_bloginfo('url'); ?>",
        "name": "<?php echo the_title(); ?>",
        "description": "<?=$excerpt?>",
        "publisher": {
          "@type": "Organization",
          "name": "<?php echo get_bloginfo('name'); ?>",
          "logo": {
            "@type": "ImageObject",
            "url": "<?php echo get_option('unamunologoamp'); ?>",
            "width": 600,
            "height": 60
          },
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
            "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
            "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
            "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
          }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
            "contactPoint" : {
            "@type" : "ContactPoint",
            "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
            "contactType" : "customer service"
          }<?php } ?>,
          "sameAs": [
            "<?php echo get_option( 'unamunofacebook' ); ?>",
            "<?php echo get_option( 'unamunotwitter' ); ?>"
          ]},
        "primaryImageOfPage": {
          "@type": "ImageObject",
          "url": "<?=$image?>",
          "height": 1256,
          "width": 2400
        }
      }
      </script>

      <?php
    }
  }
  add_action('wp_head', 'unamuno_add_home_meta');


// Page Meta   --->
  function unamuno_add_page_meta() {
    if( !is_front_page() && !is_home() && !is_page_template( 'page-plugins.php' ) && !is_page_template( 'page-landing.php' ) && is_page()) {
      global $post;
        if(get_the_post_thumbnail($post->ID, 'large')) {
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $thumbnail_object = get_post($thumbnail_id);
          $image = $thumbnail_object->guid;
        } else {
          // set default image
          $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
        }
      $excerpt = strip_tags( get_the_excerpt() );
      $excerpt = str_replace( '"', '\'', $excerpt );
      $excerpt = str_replace( "'", '', $excerpt );
      $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
      $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
        ?>

        <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
        <link rel="canonical" href="<?php echo the_permalink(); ?>"> <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
        <meta name="description" content="<?=$excerpt?>" /> <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />

    <!-- ThreeAnchor SEO -->
        <meta name="twitter:card" content="summary_large_image" /><meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" /> <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" /> <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo the_permalink(); ?>" />
        <meta property="og:title" content="<?php echo the_title(); ?>" />
        <meta property="og:description" content="<?=$excerpt?>" />
        <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
        <meta property="og:image:width" content="2400" />
        <meta property="og:image:height" content="1256" />
        <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
        <meta property="og:locale" content="en_US" />
         <script type="application/ld+json">
        {
         "@context": "http://schema.org",
         "@type": "WebPage",
         "url": "<?php echo the_permalink(); ?>",
         "name": "<?php echo get_bloginfo('name'); ?>",
         "headline": "<?php echo the_title(); ?>",
         "description": "<?=$excerpt?>",
             "mainEntityOfPage": {
               "@type": "WebPage",
               "@id": "<?php echo the_permalink(); ?>"
             },
          "publisher": {
            "@type": "Organization",
            "name": "<?php echo get_bloginfo('name'); ?>",
            "logo": {
              "@type": "ImageObject",
              "url": "<?php echo get_option('unamunologoamp'); ?>",
              "width": 600,
              "height": 60
            },
            "address": {
              "@type": "PostalAddress",
              "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
              "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
              "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
              "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
            }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
              "contactPoint" : {
              "@type" : "ContactPoint",
              "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
              "contactType" : "customer service"
            }<?php } ?>,
            "sameAs": [
              "<?php echo get_option( 'unamunofacebook' ); ?>",
              "<?php echo get_option( 'unamunotwitter' ); ?>"
            ]},
          "image": {
            "@type": "ImageObject",
            "url": "<?=$image?>",
            "height": 1256,
            "width": 2400
          }
        }
      </script>
        <?php
      }
    }
    add_action('wp_head', 'unamuno_add_page_meta');

// Plugins Page Meta (link rel and viewport declared in header) --->
function unamuno_add_plugins_meta() {
  if( is_page_template( 'page-plugins.php' ) && is_page()) {
    global $post;
      if(get_the_post_thumbnail($post->ID, 'large')) {
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_object = get_post($thumbnail_id);
        $image = $thumbnail_object->guid;
      } else {
        // set default image
        $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
      }
      $excerpt = strip_tags( get_the_excerpt() );
      $excerpt = str_replace( '"', '\'', $excerpt );
      $excerpt = str_replace( "'", '', $excerpt );
      $excerpt = str_replace( ' [&hellip;]', '...', $excerpt );
      $excerpt = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $excerpt );
    ?>
    <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
    <meta name="description" content="<?=$excerpt?>" /><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
<!-- ThreeAnchor SEO -->
    <meta name="twitter:card" content="summary_large_image" /><meta name="twitter:site" content="<?php echo get_option( 'unamunotwitter' ); ?>" /> <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" /> <meta property="og:type" content="website" />

    <meta property="og:url" content="<?php echo the_permalink(); ?>" />
    <meta property="og:title" content="<?php echo the_title(); ?>" />
    <meta property="og:description" content="<?=$excerpt?>" />
    <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
    <meta property="og:image:width" content="2400" />
    <meta property="og:image:height" content="1256" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
    <meta property="og:locale" content="en_US" />
     <script type="application/ld+json">
    {
     "@context": "http://schema.org",
     "@type": "Webpage",
     "url": "<?php echo the_permalink(); ?>",
     "name": "<?php echo get_bloginfo('name'); ?>",
     "headline": "<?php echo the_title(); ?>",
     "description": "<?=$excerpt?>",
         "mainEntityOfPage": {
           "@type": "WebPage",
           "@id": "<?php echo the_permalink(); ?>"
         },
      "publisher": {
        "@type": "Organization",
        "name": "<?php echo get_bloginfo('name'); ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo get_option('unamunologoamp'); ?>",
          "width": 600,
          "height": 60
        },
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
          "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
          "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
          "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
        }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
          "contactPoint" : {
          "@type" : "ContactPoint",
          "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
          "contactType" : "customer service"
        }<?php } ?>,
        "sameAs": [
          "<?php echo get_option( 'unamunofacebook' ); ?>",
          "<?php echo get_option( 'unamunotwitter' ); ?>"
        ]},
      "image": {
        "@type": "ImageObject",
        "url": "<?=$image?>",
        "height": 1256,
        "width": 2400
      }
    }
  </script>
    <?php
  }
}
add_action('wp_head', 'unamuno_add_plugins_meta');


// Landing Page Meta  --->
function unamuno_add_landing_meta() {
  if( is_page_template( 'page-landing.php' ) && is_page()) {
    global $post;
      if(get_the_post_thumbnail($post->ID, 'large')) {
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_object = get_post($thumbnail_id);
        $image = $thumbnail_object->guid;
      } else {
        // set default image
        $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
      }
      // $description
       $description = get_bloginfo('description');
      ?>

    <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
    <link rel="canonical" href="<?php echo the_permalink(); ?>"><meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
    <meta name="robots" content="noindex">
    <meta property="og:locale" content="en_US" />
    <?php
  }
}
add_action('wp_head', 'unamuno_add_landing_meta');


// Index Page Meta (News, Archive, Search Results)  --->
function unamuno_add_index_meta() {
  if( !is_front_page() && is_archive() || is_search() || is_404() || is_home()) {
    global $post;
    // $image
    $image = get_stylesheet_directory_uri() . '/img/logos/og-default-image.png';
    // $description
    $description = get_bloginfo('description');
    ?>
    <title><?php wp_title('|', true, 'right'); ?><?php echo get_bloginfo('name'); ?></title>
    <link rel="canonical" href="<?php echo get_bloginfo('url'); ?>/news/">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/img/logos/favicon.png'; ?>" />
    <meta name="description" content="<?=$description?>" />
    <!-- ThreeAnchor SEO -->
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="<?php echo get_option( 'unamunofacebookid' ); ?>" />
    <meta property="og:image" content="<?=$image?>" />
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "publisher": {
        "@type": "Organization",
        "name": "<?php echo get_bloginfo('name'); ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo get_option('unamunologoamp'); ?>",
          "width": 600,
          "height": 60
        },
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "<?php echo get_option( 'unamunocitymeta' ); ?>",
          "addressRegion": "<?php echo get_option( 'unamunostatemeta' ); ?>",
          "postalCode": "<?php echo get_option( 'unamunozipmeta' ); ?>",
          "streetAddress": "<?php echo get_option( 'unamunostreetmeta' ); ?>"
        }<?php $phonevariable = get_option( 'unamunophonemeta' ); ?><?php if (!empty("$phonevariable")) { ?>,
          "contactPoint" : {
          "@type" : "ContactPoint",
          "telephone" : "+1-<?php echo get_option( 'unamunophonemeta' ); ?>",
          "contactType" : "customer service"
        }<?php } ?>,
        "sameAs": [
          "<?php echo get_option( 'unamunofacebook' ); ?>",
          "<?php echo get_option( 'unamunotwitter' ); ?>"
        ]},
      "image": {
        "@type": "ImageObject",
        "url": "<?=$image?>",
        "height": 1256,
        "width": 2400
      }
    }
    </script>
    <?php
  }
}
add_action('wp_head', 'unamuno_add_index_meta');


// Disable Author Page  --->
function unamuno_disable_author_page() {
    global $wp_query;

    if ( is_author() ) {
        // Redirect to homepage, set status to 301 permenant redirect.
        // Function defaults to 302 temporary redirect.
        wp_redirect(get_option('home'), 301);
        exit;
    }
}
add_action('template_redirect', 'unamuno_disable_author_page');


// Modify Author Profile  --->
function add_to_author_profile( $contactmethods ) {
	$contactmethods['twitter_profile'] = 'Twitter Handle';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 5, 1);


// Custom Avatar  --->
function unamuno_custom_avatar_field( $user ) { ?>
  <hr>
   <h3 class="pt-1">Custom Headshot</h3>
   <table class="form-table">
     <tr class="user-first-name-wrap">
       <th><label for="unamuno_custom_avatar">Headshot URL</label></th>
       <td>
         <input type="text" style="width: 100%;" name="unamuno_custom_avatar" id="unamuno_custom_avatar" value="<?php echo esc_attr( get_the_author_meta( 'unamuno_custom_avatar', $user->ID ) ); ?>" />
         <span> <i>Type the <b>URL</b> for your profile image. It will override your <b>default avatar. </b> </i><br /></span>
        </td>
      </tr>
      <tr class="user-last-name-wrap">
        <th><label for="thumbnail_url">Headshot</label></th>
        <td><img src="<?php echo esc_attr( get_the_author_meta( 'unamuno_custom_avatar', $user->ID ) ); ?>" title="<?php the_title_attribute(); ?>" height="85" width="85"></td>
      </tr>
    </table>

<?php
}
add_action( 'show_user_profile', 'unamuno_custom_avatar_field' );
add_action( 'edit_user_profile', 'unamuno_custom_avatar_field' );


// Save Custom Avatar  --->
  function unamuno_save_custom_avatar_field( $user_id ) {
   if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
   update_user_meta( $user_id, 'unamuno_custom_avatar', $_POST['unamuno_custom_avatar'] );
  }
  add_action( 'personal_options_update', 'unamuno_save_custom_avatar_field' );
  add_action( 'edit_user_profile_update', 'unamuno_save_custom_avatar_field' );

// Display Custom Avatar Single Posts  --->
 function unamuno_gravatar_filter($avatar, $id_or_email, $size, $default, $alt) {
   // display unamuno_custom_avatar
  $custom_avatar = get_the_author_meta('unamuno_custom_avatar');
  if ( is_singular( 'post' ) && ($custom_avatar)) {
    $return = '<amp-img src="'.$custom_avatar.'" width="'.$size.'" height="'.$size.'" alt="author avatar" class="avatar"></amp-img>';
  }
  elseif ($avatar) {
    $return = $avatar;
  }
  else {
    $return = '<amp-img src="'.$default.'" width="'.$size.'" height="'.$size.'" alt="'.$alt.'"></amp-img>';
  }
  return $return;
}
 add_filter('get_avatar', 'unamuno_gravatar_filter', 10, 5);



 // Display Custom Avatar ALL  --->
  function unamuno_gravatar_filter_all($avatar, $id_or_email, $size, $default, $alt) {
    // display unamuno_custom_avatar
   $custom_avatar = get_the_author_meta('unamuno_custom_avatar');
   if ( !is_singular( 'post' ) && ($custom_avatar)) {
     $return = '<img src="'.$custom_avatar.'" width="'.$size.'" height="'.$size.'" alt="author avatar" class="avatar">';
   }
   elseif ($avatar) {
     $return = $avatar;
   }
   else {
     $return = '<img src="'.$default.'" width="'.$size.'" height="'.$size.'" alt="'.$alt.'">';
   }
   return $return;
 }
  add_filter('get_avatar', 'unamuno_gravatar_filter_all', 10, 5);

// Add Login Page Logo
function unamuno_login_logo() { ?>
        <style type="text/css">
            .login h1 a {font-size: 90px;}
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logos/logo-threeanchor-login-2.svg);
                padding-bottom: 20px;
                    background-size: 130px;
                    height: 130px;
                    width: 130px;
                    margin-bottom: 1px;
                  }
                    .login {background-color: #f1f1f1;color: #999;}
                    #loginform {padding: 35px 20px;margin-right:-10px;margin-left: -10px;background: #f5f5f5;
                      color: #6c757d;box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.1);}
                    #loginform label {font-size: .88rem;}
                    .login input[type="text"], .login input[type="password"] {
                      border: 1px solid #d1d1d1;
                      border-radius: 2px;
                      background-color: #fff;
                      color: #444;
                    } .login input[type="checkbox"] {
                      border: 1px solid #d1d1d1;
                      border-radius: 2px;
                    }
                    .login input[type="text"]:focus, .login input[type="password"]:focus{
                      border-color: #42a5f5;
                      outline: 1.2px solid transparent;
                    } .login input[type="checkbox"]:focus {
                      border-color: #42a5f5;
                      outline: 1.2px solid transparent;
                    }
                    #login p a:link, #login p a:visited {
                      color: #adb5bd;text-decoration: none;
                    }
                    #login .button-primary {
                      background: #1e88e5; border-color: #1976d2; border-radius: 1px; margin-top: 1.5rem;
              } #login .button-primary:focus, #login .button-primary:hover {
                background: #1976d2;
              }
          </style>
      <?php }
    add_action( 'login_enqueue_scripts', 'unamuno_login_logo' );


// Create Custom Settings Page  --->
function unamuno_custom_settings_add_menu() {
  add_menu_page(
    'Custom Settings',                  // $page_title
    'SEO',                              // $menu_title
    'edit_others_posts',                // capability to display
    'custom-settings',                  // $menu_slug
    'unamuno_settings_page',            // $callback_function
    null,                               // icon url
    99                                  // position
  );
}
add_action( 'admin_menu', 'unamuno_custom_settings_add_menu' );


// Create Custom Settings Page Global Settings  --->
function unamuno_settings_page() { ?>

  <div class="wrap">
    <h1>SEO &amp; AMP</h1>
    <hr>
    <h3>Organization Settings for SEO &amp; AMP</h3>
    <p>Configure political SEO information, default images, icons, and related information below.</p>
    <div class="card-seoadmin max-w-lg px-1 py-1">
      <h3 class="pb-1">Twitter, Facebook &amp; Google</h3>
      <form method="post" action="options.php">
        <?php
        settings_fields( 'section' );  // register section with ID "section"
        do_settings_sections( 'theme-options' );  // register group ID for all fields in section
        submit_button();
        ?>
      </form>
    </div>
  </div>
<?php }


// Configure Settings Page Inputs --->

// Twitter
function setting_unamunotwitter() { ?>

  <input type="text" name="unamunotwitter" id="unamunotwitter" value="<?php echo get_option( 'unamunotwitter' ); ?>" />
<?php }

// Facebook Page
function setting_unamunofacebook() { ?>
  <input type="text" name="unamunofacebook" id="unamunofacebook" value="<?php echo get_option( 'unamunofacebook' ); ?>" />
<?php }

// Facebook ID
function setting_unamunofacebookid() { ?>
  <input type="text" name="unamunofacebookid" id="unamunofacebookid" value="<?php echo get_option( 'unamunofacebookid' ); ?>" />
<?php }

// GoogleAx
function setting_unamunogoogleax() { ?>
  <input type="text" name="unamunogoogleax" id="unamunogoogleax" value="<?php echo get_option('unamunogoogleax'); ?>" />
<?php }


// Phone AX
function setting_unamunophoneax() { ?>
  <input type="text" name="unamunophoneax" class="regular-text" id="unamunophoneax" value="<?php echo get_option('unamunophoneax'); ?>" />
<?php }


// Email Subject
function setting_unamunoemailsub() { ?>
  <input type="text" name="unamunoemailsub" id="unamunoemailsub" class="regular-text" value="<?php echo get_option('unamunoemailsub'); ?>" />
<?php }


// Phone Meta
function setting_unamunophonemeta() { ?>
  <input type="text" name="unamunophonemeta" class="regular-text" id="unamunophonemeta" value="<?php echo get_option('unamunophonemeta'); ?>" />
<?php }

// Street Meta
function setting_unamunostreetmeta() { ?>
  <input type="text" name="unamunostreetmeta" placeholder="202 Pennsylvania …" style="width: 100%;" id="unamunostreetmeta" value="<?php echo get_option('unamunostreetmeta'); ?>" />
<?php }

// City Meta
function setting_unamunocitymeta() { ?>
  <input type="text" name="unamunocitymeta" id="unamunocitymeta" value="<?php echo get_option('unamunocitymeta'); ?>" />
<?php }

// State Meta
function setting_unamunostatemeta() { ?>
  <input type="text" name="unamunostatemeta" id="unamunostatemeta" value="<?php echo get_option('unamunostatemeta'); ?>" />
<?php }

// Zip Meta
function setting_unamunozipmeta() { ?>
  <input type="text" name="unamunozipmeta" id="unamunozipmeta" value="<?php echo get_option('unamunozipmeta'); ?>" />
<?php }

// Petition Image Default
function setting_unamunopetitionimg() { ?>
    <div class="image-preview-wrap">
      <img src="<?php echo get_option( 'unamunopetitionimg' ); ?>" height="147" width="280">
    </div>
  <input type="text" style="width: 100%;" name="unamunopetitionimg" id="unamunopetitionimg" class="meta-image regular-text" value="<?php echo get_option( 'unamunopetitionimg' ); ?>" />
  <div class="admin-label"><em><b>Petition</b> default image</em><br /></div>

<?php }


// Post/News Image Default
function setting_unamunopostimg() { ?>
    <div class="image-preview-wrap">
        <img src="<?php echo get_option( 'unamunopostimg' ); ?>" title="news image" height="147" width="280">
          </div>
          <input type="text" style="width: 100%;" name="unamunopostimg" id="unamunopostimg" class="meta-image regular-text" value="<?php echo get_option( 'unamunopostimg' ); ?>" />
        <span class="admin-label"><em><b>Press Release</b> default image</em><br /></span>
       </td>
     </tr>

<?php }


// Logo AMP
function setting_unamunologoamp() { ?>
  <div class="image-preview-wrap">
    <img src="<?php echo get_option( 'unamunologoamp' ); ?>" title="logo amp" height="40" width="400">
  </div>
  <input type="text" style="width: 100%;" name="unamunologoamp" id="unamunologoamp" value="<?php echo get_option('unamunologoamp'); ?>" />
  <span class="admin-label"><em>Recommended <b>AMP logo</b></em><br /></span>


<?php }

// Policy Image Default
function setting_unamunopolicyimg() { ?>
    <div class="image-preview-wrap">
      <img src="<?php echo get_option( 'unamunopolicyimg' ); ?>" style="max-width: 250px;">
    </div>
  <input type="text" style="width: 100%;" name="unamunopolicyimg" id="unamunopolicyimg" class="meta-image regular-text" value="<?php echo get_option( 'unamunopolicyimg' ); ?>" />
  <div class="admin-label"><em><b>Policy One-Pager</b> default image</em><br /></div>

<?php }


function handle_logo_upload()
{
  if(!empty($_FILES["demo-file"]["tmp_name"]))
  {
    $urls = wp_handle_upload($_FILES["unamunopolicyimg"], array('test_form' => FALSE));
    $temp = $urls["url"];
    return $temp;
  }
  return $option;
}

// Add Settings Section (1)
function unamuno_settings_page_setup() {
  add_settings_section( 'section', ' ', null, 'theme-options' );

// Add Settings Fields (2)

  // Twitter
  add_settings_field( 'unamunotwitter', 'Twitter URL<p class="description">https://twitter.com/org-name/</p>', 'setting_unamunotwitter', 'theme-options', 'section' );

  // Facebook Page
  add_settings_field( 'unamunofacebook', 'Facebook URL<p class="description">https://facebook.com/org-name/</p>', 'setting_unamunofacebook', 'theme-options', 'section' );

  // Facebook ID
  add_settings_field( 'unamunofacebookid', 'Facebook ID<p class="description">123456789012345</p>', 'setting_unamunofacebookid', 'theme-options', 'section' );

  // Google Analytics Input
  add_settings_field( 'unamunogoogleax', 'Google Analytics<p class="description">123456789-12</p>', 'setting_unamunogoogleax', 'theme-options', 'section' );

  // Email Subject
  add_settings_field( 'unamunoemailsub', 'Email Subject', 'setting_unamunoemailsub', 'theme-options', 'section' );

  // Phone Meta Input
  add_settings_field( 'unamunophonemeta', 'Phone<p class="description">555-555-5555</p>', 'setting_unamunophonemeta', 'theme-options', 'section' );

  // Phone Analytics Input
  add_settings_field( 'unamunophoneax', 'Phone Tracking', 'setting_unamunophoneax', 'theme-options', 'section' );

  // Street Address Meta Input
  add_settings_field( 'unamunostreetmeta', 'Street Address Meta', 'setting_unamunostreetmeta', 'theme-options', 'section' );

  // City Meta Input
  add_settings_field( 'unamunocitymeta', 'City Meta', 'setting_unamunocitymeta', 'theme-options', 'section' );

  // State Meta Input
  add_settings_field( 'unamunostatemeta', 'State Meta', 'setting_unamunostatemeta', 'theme-options', 'section' );

  // Zip Meta Input
  add_settings_field( 'unamunozipmeta', 'Zip Meta', 'setting_unamunozipmeta', 'theme-options', 'section' );

  // Petition Image Default
  add_settings_field( 'unamunopetitionimg', 'Petition Image', 'setting_unamunopetitionimg', 'theme-options', 'section' );

  // Post Image Default
  add_settings_field( 'unamunopostimg', 'News Image', 'setting_unamunopostimg', 'theme-options', 'section' );

  // Policy Image Default
  add_settings_field( 'unamunopolicyimg', 'Policy Image', 'setting_unamunopolicyimg', 'theme-options', 'section' );

  //  Logo AMP
  add_settings_field( 'unamunologoamp', 'AMP Logo', 'setting_unamunologoamp', 'theme-options', 'section' );

  // Register Setting (3)
  register_setting( 'section', 'unamunotwitter' );
  register_setting( 'section', 'unamunofacebook' );
  register_setting( 'section', 'unamunofacebookid' );
  register_setting( 'section', 'unamunoemailsub' );
  register_setting( 'section', 'unamunogoogleax' );
  register_setting( 'section', 'unamunophoneax' );
  register_setting( 'section', 'unamunophonemeta' );
  register_setting( 'section', 'unamunostreetmeta' );
  register_setting( 'section', 'unamunocitymeta' );
  register_setting( 'section', 'unamunostatemeta' );
  register_setting( 'section', 'unamunozipmeta' );
  register_setting( 'section', 'unamunopetitionimg' );
  register_setting( 'section', 'unamunopostimg' );
  register_setting( 'section', 'unamunologoamp' );
  register_setting( 'section', 'unamunopolicyimg' );
}
add_action( 'admin_init', 'unamuno_settings_page_setup' );


// Wordpress Google Analytics (Non-AMP)  --->
function unamuno_wordpress_googleax() { ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-<?php echo get_option( 'unamunogoogleax' ); ?>', 'auto');
  ga('send', 'pageview');
  </script>

  <?php }
  add_action('wp_head', 'unamuno_wordpress_googleax');


// Wordpress RSS Featured Image  --->
function unamunofeaturedRSS($content) {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
    $content = '<div>' . get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'unamunofeaturedRSS');


// Image Sanitize  --->
function unamuno_img_sanitizer($html, $id, $alt, $title, $align, $url, $size) {
     $url = wp_get_attachment_url($id); // Grab the current image URL
     $alt = get_post_meta($id, '_wp_attachment_image_alt', true); // Grab the current image alt
     $size = wp_get_attachment_image_src($id, 'full'); // Get media full size url
     // Sanitize alt description
     // Apply alt tag as caption
     $html = "<figure><amp-img src='$url' title='$title' alt='" . esc_attr($alt) . "' width='$size[1]' height='$size[2]' layout='responsive'></amp-img><figcaption>$alt</figcaption></figure>";
     return $html;
     }
add_filter( 'image_send_to_editor', 'unamuno_img_sanitizer', 10, 7);

// Animation Script -->
  function unamuno_add_animation_script() {
   if ( is_page( array( 'animations', 'animation' ) ))  {
     ?>
     <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
    <?php
  }
}
add_action('wp_head', 'unamuno_add_animation_script');
