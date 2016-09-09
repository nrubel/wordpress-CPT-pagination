
if ( ! function_exists( 'custom_pagination' ) ){
	function custom_pagination($query_args) {
//		global $wp_query;
		$big = 999999999; // need an unlikely integer
		$pages = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $query_args->max_num_pages,
				'prev_next' => false,
				'type'  => 'array',
				'prev_next'   => TRUE,
				'prev_text'    => __('«'),
				'next_text'    => __('»'),
			) );
			if( is_array( $pages ) ) {
				$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
				echo '<ul class="pagination">';
				foreach ( $pages as $page ) {
						echo "<li>$page</li>";
				}
			   echo '</ul>';
			}
	}
}
