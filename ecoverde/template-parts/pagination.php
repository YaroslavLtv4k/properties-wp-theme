<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <!-- <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul> -->
              <ul>
                <?php 
                $paginateLinks = paginate_links([ 
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'array',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', '<' ),
                'next_text'    => sprintf( '%1$s <i></i>', '>' ),
                'add_args'     => false,
                'add_fragment' => '',
                  ]);
                if ($paginateLinks) {
                  foreach ( $paginateLinks as $page ) {
                        echo "<li>$page</li>";
                   }
                }
              
                ?>
              </ul>
            </div>
          </div>
        </div>