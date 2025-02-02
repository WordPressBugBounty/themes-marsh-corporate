<?php
/**
 * Marsh Corporate main admin class
 *
 * @package Marsh Corporate
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class marsh_corporate_Admin_Main
 */
class marsh_corporate_Notice {
    public $theme_name;

    /**
     * Marsh Corporate Notice constructor.
     */
    public function __construct() {

        global $admin_main_class;

        add_action( 'admin_enqueue_scripts', array( $this, 'marsh_corporate_enqueue_scripts' ) );

        add_action( 'wp_loaded', array( $this, 'marsh_corporate_hide_welcome_notices' ) );
        add_action( 'wp_loaded', array( $this, 'marsh_corporate_welcome_notice' ) );


        add_action( 'wp_ajax_marsh_corporate_activate_plugin', array( $admin_main_class, 'marsh_corporate_activate_demo_importer_plugin' ) );
        add_action( 'wp_ajax_marsh_corporate_install_plugin', array( $admin_main_class, 'marsh_corporate_install_demo_importer_plugin' ) );

        add_action( 'wp_ajax_marsh_corporate_install_free_plugin', array( $admin_main_class, 'marsh_corporate_install_free_plugin' ) );
        add_action( 'wp_ajax_marsh_corporate_activate_free_plugin', array( $admin_main_class, 'marsh_corporate_activate_free_plugin' ) );

        //theme details
        $theme = wp_get_theme();
        $this->theme_name = $theme->get( 'Name' );
    }

    /**
     * Localize array for import button AJAX request.
     */
    public function marsh_corporate_enqueue_scripts() {
        wp_enqueue_style( 'marsh-corporate-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/admin.css', array(), 20151215 );

        wp_enqueue_script( 'marsh-corporate-plugin-install-helper', get_template_directory_uri() . '/inc/admin/assets/js/plugin-handle.js', array( 'jquery' ), 20151215 );

        $demo_importer_plugin = WP_PLUGIN_DIR . '/creativ-demo-importer/creativ-demo-importer.php';
        if ( ! file_exists( $demo_importer_plugin ) ) {
            $action = 'install';
        } elseif ( file_exists( $demo_importer_plugin ) && !is_plugin_active( 'creativ-demo-importer/creativ-demo-importer.php' ) ) {
            $action = 'activate';
        } else {
            $action = 'redirect';
        }

        wp_localize_script( 'marsh-corporate-plugin-install-helper', 'ogAdminObject',
            array(
                'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
                '_wpnonce'      => wp_create_nonce( 'marsh_corporate_plugin_install_nonce' ),
                'buttonStatus'  => esc_html( $action )
            )
        );
    }

    /**
     * Add admin welcome notice.
     */
    public function marsh_corporate_welcome_notice() {

        if ( isset( $_GET['activated'] ) ) {
            update_option( 'marsh_corporate_admin_notice_welcome', true );
        }

        $welcome_notice_option = get_option( 'marsh_corporate_admin_notice_welcome' );

        // Let's bail on theme activation.
        if ( $welcome_notice_option ) {
            add_action( 'admin_notices', array( $this, 'marsh_corporate_welcome_notice_html' ) );
        }
    }

    /**
     * Hide a notice if the GET variable is set.
     */
    public static function marsh_corporate_hide_welcome_notices() {
        if ( isset( $_GET['marsh-corporate-hide-welcome-notice'] ) && isset( $_GET['_marsh_corporate_welcome_notice_nonce'] ) ) {
            if ( ! wp_verify_nonce( $_GET['_marsh_corporate_welcome_notice_nonce'], 'marsh_corporate_hide_welcome_notices_nonce' ) ) {
                wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'marsh-corporate' ) );
            }

            if ( ! current_user_can( 'manage_options' ) ) {
                wp_die( esc_html__( 'Cheat in &#8217; huh?', 'marsh-corporate' ) );
            }

            $hide_notice = sanitize_text_field( $_GET['marsh-corporate-hide-welcome-notice'] );
            update_option( 'marsh_corporate_admin_notice_' . $hide_notice, false );
        }
    }

    /**
     * function to display welcome notice section
     */
    public function marsh_corporate_welcome_notice_html() {
        $current_screen = get_current_screen();

        if ( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
            return;
        }
        ?>
        <div id="marsh-corporate-welcome-notice" class="marsh-corporate-welcome-notice-wrapper updated notice">
            <a class="marsh-corporate-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'marsh-corporate-hide-welcome-notice', 'welcome' ) ), 'marsh_corporate_hide_welcome_notices_nonce', '_marsh_corporate_welcome_notice_nonce' ) ); ?>">
                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'marsh-corporate' ); ?>
            </a>
            <div class="marsh-corporate-welcome-title-wrapper">
                <h2 class="notice-title"><?php esc_html_e( 'Congratulations!', 'marsh-corporate' ); ?></h2>
                <p class="notice-description">
                    <?php
                        printf( esc_html__( '%1$s is now installed and ready to use. Clicking on Get started with Marsh Corporate will install and activate Creativ Demo Importer Plugin.', 'marsh-corporate' ), $this->theme_name );
                    ?>
                </p>
            </div><!-- .marsh-corporate-welcome-title-wrapper -->
            <div class="welcome-notice-details-wrapper">

                <div class="notice-detail-wrap general">
                    
                    <div class="general-info-links">
                        <div class="buttons-wrap">
                            <button class="marsh-corporate-get-started button button-primary button-hero" data-done="<?php esc_attr_e( 'Done!', 'marsh-corporate' ); ?>" data-process="<?php esc_attr_e( 'Processing', 'marsh-corporate' ); ?>" data-redirect="<?php echo esc_url( wp_nonce_url( add_query_arg( 'marsh-corporate-hide-welcome-notice', 'welcome', admin_url( 'admin.php' ).'?page=ct-options' ) , 'marsh_corporate_hide_welcome_notices_nonce', '_marsh_corporate_welcome_notice_nonce' ) ); ?>">
                                <?php printf( esc_html__( 'Get started with %1$s', 'marsh-corporate' ), esc_html( $this->theme_name ) ); ?>
                            </button>
                        </div><!-- .buttons-wrap -->
                    </div><!-- .general-info-links -->
                </div><!-- .notice-detail-wrap.general -->

            </div><!-- .welcome-notice-details-wrapper -->
        </div><!-- .marsh-corporate-welcome-notice-wrapper -->
<?php
    }
}
new marsh_corporate_Notice();