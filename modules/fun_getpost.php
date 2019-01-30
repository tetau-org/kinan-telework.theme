<?php

//   ---------------------------------------
//    pre_get_posts
//  ----------------------------------------

    function custom_query( $query ) {
        if ( is_admin() || ! $query->is_main_query() )
        return;
        if ( $query->is_home() ) { // ホーム
            $query->set( 'post_type', 'article' );
            $query->set( 'post_status', 'publish' );
            $query->set( 'ignore_sticky_posts', 1 );
            $query->set( 'posts_per_page', 9 );
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'desc' );
            $query->set( 'tax_query',
                array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'articlecat',
                        'field' => 'slug',
                        'terms' => array( 'telework' ),
                        'operator' => 'IN'
                    ),
                )
            );
        return;
        }
        if ( $query->is_tax( 'articlecat','telework' ) ) {
            $query->set( 'posts_per_page', 9 );
            $query->set( 'ignore_sticky_posts', 0 );
            $query->set( 'orderby', 'date' );
            $query->set( 'order', 'desc' );
            $query->set( 'tax_query',
                array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'articlecat',
                        'field' => 'slug',
                        'terms' => array( 'telework' ),
                        'operator' => 'IN'
                    ),
                )
            );
            return;
        }
    }
    add_action( 'pre_get_posts', 'custom_query' );

?>
