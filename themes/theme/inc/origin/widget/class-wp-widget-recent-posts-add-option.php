<?php
class WP_Widget_Recent_Posts_Add_Option extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_posts_add_option',
			'description' => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent-posts-add-option', __( '最近の投稿（オプション付き）' ), $widget_ops );
		$this->alt_option_name = 'WP_Widget_Recent_Posts_Add_Option';
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/* 投稿とタクソノミー */
		$post_type_taxonomys = isset( $instance['post_type_taxonomys'] ) ? $instance['post_type_taxonomys'] : array( array( 'post_type' => 'post' ) );

		/* アイキャッチ表示 */
		$show_thumb = isset( $instance['show_thumb'] ) ? $instance['show_thumb'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'post_type'           => ( count( $post_type = get_array_in_keydata( $post_type_taxonomys, 'post_type' ) ) > 0 ) ? $post_type : array('post') ,
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
		), $instance ) );

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title = get_the_title( $recent_post->ID );
				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );

				/* 現在の投稿に対応する投稿タイプのデータを取得 */
				$target_post_type_taxonomy = in_associative_array( get_post_type( $recent_post->ID ), $post_type_taxonomys, 'post_type' );
				?>
				<li class="post_type_<?php echo get_post_type( $recent_post->ID ); ?>">
					<?php if ( has_post_thumbnail($recent_post->ID) && $show_thumb) : ?>
						<a class="post-thumb" href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo get_the_post_thumbnail( $recent_post->ID, 'thumbnail' ); ?></a>
					<?php endif; ?>
					<?php if ( $show_date ) : ?>
						<span class="post-date"><?php echo get_the_date( 'Y.m.d', $recent_post->ID ); ?></span>
					<?php endif; ?>
					<a class="post-title" href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title ; ?></a>
					<?php if(isset($target_post_type_taxonomy['post_taxonomy'])): ?>
						<?php foreach($target_post_type_taxonomy['post_taxonomy'] as $target_taxonomy): ?>
							<?php if($target_post_taxonomy = get_the_terms( $recent_post->ID, $target_taxonomy )): ?>
								<ul class="post-taxonomys <?php echo $target_taxonomy; ?>">
								<?php foreach($target_post_taxonomy as $taxonomy): ?>
									<li class="post-taxonomy <?php echo $taxonomy->slug ?>">
										<?php echo is_wp_error($term_link = get_term_link( $taxonomy ))? $taxonomy->name : '<a href="' . $term_link . '">' . $taxonomy->name . '</a>'; ?>
									</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

		/* 投稿とタクソノミー */
		$instance['post_type_taxonomys'] = isset( $new_instance['post_type_taxonomys'] ) ? $new_instance['post_type_taxonomys'] : array( array( 'post_type' => 'post' ) );
		/* アイキャッチ表示 */
		$instance['show_thumb'] = isset( $new_instance['show_thumb'] ) ? (bool) $new_instance['show_thumb'] : false;

		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>


		<?php
		$post_type_taxonomys = isset( $instance['post_type_taxonomys'] ) ? $instance['post_type_taxonomys'] : array( array( 'post_type' => 'post' ) );
		$show_thumb = isset( $instance['show_thumb'] ) ? (bool) $instance['show_thumb'] : false;
		?>

		<!-- サムネイルの表示可否選択 -->
		<p><input class="checkbox" type="checkbox"<?php checked( $show_thumb ); ?> id="<?php echo $this->get_field_id( 'show_thumb' ); ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_thumb' ); ?>">サムネイル画像を表示しますか？</label></p>

		<hr>

		<!-- 表示する投稿とタクソノミーの選択 -->
		<p>投稿の選択と表示するタクソノミー</p>
		<?php
		$all_post_type = get_all_post_type();
		$count = 0;
		$count2 = 0;
		?>
		<?php foreach ( $all_post_type as $post_type_item ) : ?>
			<?php
			$target_post_type_taxonomy = in_associative_array( $post_type_item->name , $post_type_taxonomys , 'post_type' );
			?>
			<label for="<?php echo $this->get_field_id( 'post_type_taxonomys' ). '['. $count .']' . '[post_type]'; ?>" style="font-weight:bold;"><input class="widefat" id="<?php echo $this->get_field_id( 'post_type_taxonomys' ). '['. $count .']' . '[post_type]'; ?>" name="<?php echo $this->get_field_name( 'post_type_taxonomys' ) . '['. $count .']' . '[post_type]'; ?>" type="checkbox" <?php checked( (bool)$target_post_type_taxonomy ); ?> value="<?php echo $post_type_item->name; ?>" /> <?php echo $post_type_item->labels->name; ?></label><br />
			<ul style="padding-left:21px;">
				<?php foreach ( get_object_taxonomies( $post_type_item->name, 'objects' ) as $post_taxonomy_item ) : ?>
					<li><label for="<?php echo $this->get_field_id( 'post_type_taxonomys' ) . '['. $count .']'. '[post_taxonomy]' . '[' . $count2 . ']'; ?>"><input class="widefat" id="<?php echo $this->get_field_id( 'post_type_taxonomys' ). '['. $count .']'. '[post_taxonomy]' . '[' . $count2 . ']'; ?>" name="<?php echo $this->get_field_name( 'post_type_taxonomys' ). '['. $count .']'. '[post_taxonomy]' . '[]'; ?>" type="checkbox" <?php if(isset( $target_post_type_taxonomy['post_taxonomy']) ){ checked( in_array($post_taxonomy_item->name,$target_post_type_taxonomy['post_taxonomy']) ); } ?> value="<?php echo $post_taxonomy_item->name; ?>" /> <?php echo $post_taxonomy_item->labels->name; ?></label></li>
					<?php $count2++; ?>
				<?php endforeach;?>
			</ul>
			<?php $count++; ?>
		<?php endforeach;?>
<?php
	}
}

/* 全ての投稿タイプ取得 */
if ( ! function_exists( 'get_all_post_type' ) ) :
	function get_all_post_type(){
		$args = array(
			 'public' => true,
		);
		$output = 'objects';
		$operator = 'and';
		return get_post_types( $args, $output, $operator );
	}
endif;

/* 引数の存在確認 */
if ( ! function_exists( 'in_associative_array' ) ) :
	function in_associative_array( $needle, $haystack, $key ){
		foreach( $haystack as $value ){
			if( isset($value[$key]) && $needle == $value[$key] ){
				return $value;
			}
		}
		return false;
	}
endif;

/* 連想配列の配列から特定キーのデータのみ配列として取得 */
if ( ! function_exists( 'get_array_in_keydata' ) ) :
	function get_array_in_keydata( $array, $key ){
		$result = array();
		foreach( $array as $value ){
			if( isset($value[$key]) ){
				$result[] = $value[$key];
			}
		}
		if( count($result) <= 0 ){
			$result = false;
		}
		return $result;
	}
endif;

?>
