<?php get_header(); ?>

<div class="entry-content">
    <main class="wp-block-group is-style-container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="page-header">
                <svg width="187" height="99" viewBox="0 0 187 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M167.134 21.2801C166.799 21.2801 166.507 21.2001 166.256 21.0401C166.019 20.8641 165.901 20.5921 165.901 20.2241C165.901 19.2641 165.873 18.2081 165.817 17.0561C165.775 15.8881 165.726 14.7281 165.671 13.5761C165.629 12.4081 165.608 11.3521 165.608 10.4081C165.608 9.94409 165.754 9.58409 166.047 9.32809C166.34 9.07209 166.702 8.94409 167.134 8.94409C167.538 8.94409 167.886 9.07209 168.179 9.32809C168.486 9.58409 168.639 9.94409 168.639 10.4081C168.639 11.3521 168.611 12.4081 168.555 13.5761C168.514 14.7281 168.465 15.8881 168.409 17.0561C168.367 18.2081 168.346 19.2641 168.346 20.2241C168.346 20.5921 168.207 20.8641 167.928 21.0401C167.65 21.2001 167.385 21.2801 167.134 21.2801ZM167.155 26.6321C166.695 26.6321 166.312 26.4481 166.005 26.0801C165.698 25.7121 165.545 25.2801 165.545 24.7841C165.545 24.2721 165.698 23.8401 166.005 23.4881C166.312 23.1201 166.695 22.9361 167.155 22.9361C167.587 22.9361 167.956 23.1201 168.263 23.4881C168.583 23.8401 168.744 24.2721 168.744 24.7841C168.744 25.2801 168.583 25.7121 168.263 26.0801C167.956 26.4481 167.587 26.6321 167.155 26.6321Z" fill="#404041" />
                    <path d="M159.019 26.7281C158.113 26.7281 157.277 26.5761 156.51 26.2721C155.744 25.9681 155.13 25.5841 154.671 25.1201C154.211 24.6401 153.981 24.136 153.981 23.608C153.981 23.336 154.043 23.0481 154.169 22.7441C154.294 22.4241 154.462 22.1521 154.671 21.9281C154.894 21.7041 155.137 21.5921 155.402 21.5921C155.653 21.5921 155.883 21.68 156.092 21.8561C156.315 22.0321 156.552 22.2401 156.803 22.4801C157.068 22.7201 157.367 22.928 157.702 23.104C158.05 23.28 158.468 23.368 158.956 23.368C159.277 23.368 159.59 23.3201 159.897 23.2241C160.217 23.1121 160.475 22.9441 160.67 22.7201C160.879 22.4801 160.984 22.168 160.984 21.784C160.984 21.368 160.865 21.0161 160.628 20.7281C160.391 20.4241 160.071 20.1521 159.667 19.9121C159.277 19.6721 158.844 19.432 158.371 19.192C157.911 18.936 157.444 18.664 156.97 18.376C156.496 18.072 156.057 17.72 155.653 17.32C155.263 16.904 154.949 16.408 154.712 15.832C154.475 15.256 154.357 14.568 154.357 13.768C154.357 12.872 154.51 12.112 154.817 11.488C155.123 10.848 155.535 10.336 156.05 9.95205C156.566 9.55205 157.137 9.26405 157.764 9.08805C158.405 8.89605 159.054 8.80005 159.709 8.80005C159.987 8.80005 160.357 8.82405 160.816 8.87205C161.276 8.92005 161.736 9.01605 162.196 9.16005C162.67 9.30405 163.067 9.52005 163.388 9.80805C163.708 10.08 163.869 10.448 163.869 10.912C163.869 11.12 163.82 11.384 163.722 11.704C163.639 12.008 163.499 12.28 163.304 12.52C163.123 12.76 162.879 12.88 162.572 12.88C162.322 12.88 162.085 12.808 161.862 12.664C161.653 12.504 161.381 12.352 161.046 12.208C160.726 12.048 160.28 11.968 159.709 11.968C159.221 11.968 158.817 12.04 158.496 12.184C158.189 12.312 157.966 12.488 157.827 12.712C157.688 12.92 157.618 13.152 157.618 13.4081C157.618 13.744 157.737 14.04 157.973 14.296C158.21 14.536 158.524 14.768 158.914 14.992C159.318 15.2 159.75 15.424 160.21 15.664C160.684 15.888 161.158 16.16 161.632 16.48C162.106 16.784 162.538 17.152 162.928 17.584C163.332 18.016 163.653 18.5441 163.889 19.1681C164.126 19.7921 164.245 20.536 164.245 21.4C164.245 22.552 164.015 23.5281 163.555 24.3281C163.109 25.1121 162.496 25.712 161.715 26.128C160.935 26.528 160.036 26.7281 159.019 26.7281Z" fill="#404041" />
                    <path d="M144.441 26.4881C144.037 26.4881 143.661 26.3921 143.312 26.2001C142.978 26.0081 142.811 25.7201 142.811 25.3361V10.0721C142.811 9.76809 142.922 9.50409 143.145 9.28009C143.368 9.05609 143.661 8.94409 144.023 8.94409H148.35C149.27 8.94409 150.099 9.12809 150.838 9.49609C151.59 9.84809 152.183 10.4321 152.615 11.2481C153.061 12.0481 153.284 13.1201 153.284 14.4641V14.5841C153.284 15.9281 153.054 17.0081 152.594 17.8241C152.148 18.6401 151.535 19.2321 150.754 19.6001C149.974 19.9681 149.103 20.1521 148.141 20.1521H146.072V25.3361C146.072 25.7201 145.897 26.0081 145.549 26.2001C145.215 26.3921 144.845 26.4881 144.441 26.4881ZM146.072 17.2721H148.141C148.727 17.2721 149.186 17.0801 149.521 16.6961C149.855 16.2961 150.023 15.6881 150.023 14.8721V14.6081C150.023 13.7921 149.855 13.1921 149.521 12.8081C149.186 12.4081 148.727 12.2081 148.141 12.2081H146.072V17.2721Z" fill="#404041" />
                    <path d="M135.578 26.6321C134.616 26.6321 133.745 26.4481 132.965 26.0801C132.198 25.7121 131.585 25.1121 131.125 24.2801C130.679 23.4481 130.456 22.3441 130.456 20.9681V14.6081C130.456 13.2321 130.679 12.1281 131.125 11.2961C131.585 10.4641 132.198 9.86409 132.965 9.49609C133.745 9.12809 134.616 8.94409 135.578 8.94409C136.539 8.94409 137.41 9.12809 138.191 9.49609C138.971 9.86409 139.584 10.4641 140.03 11.2961C140.49 12.1281 140.72 13.2321 140.72 14.6081V20.9681C140.72 22.3441 140.49 23.4481 140.03 24.2801C139.584 25.1121 138.971 25.7121 138.191 26.0801C137.41 26.4481 136.539 26.6321 135.578 26.6321ZM135.578 23.3681C136.163 23.3681 136.623 23.1761 136.957 22.7921C137.292 22.4081 137.459 21.8001 137.459 20.9681V14.6081C137.459 13.7761 137.292 13.1681 136.957 12.7841C136.623 12.4001 136.163 12.2081 135.578 12.2081C134.992 12.2081 134.532 12.4001 134.198 12.7841C133.877 13.1681 133.717 13.7761 133.717 14.6081V20.9681C133.717 21.8001 133.877 22.4081 134.198 22.7921C134.532 23.1761 134.992 23.3681 135.578 23.3681Z" fill="#404041" />
                    <path d="M123.39 26.6321C122.429 26.6321 121.558 26.4481 120.777 26.0801C120.011 25.7121 119.397 25.1121 118.937 24.2801C118.492 23.4481 118.269 22.3441 118.269 20.9681V14.6081C118.269 13.2321 118.492 12.1281 118.937 11.2961C119.397 10.4641 120.011 9.86409 120.777 9.49609C121.558 9.12809 122.429 8.94409 123.39 8.94409C124.352 8.94409 125.223 9.12809 126.003 9.49609C126.784 9.86409 127.397 10.4641 127.843 11.2961C128.303 12.1281 128.533 13.2321 128.533 14.6081V20.9681C128.533 22.3441 128.303 23.4481 127.843 24.2801C127.397 25.1121 126.784 25.7121 126.003 26.0801C125.223 26.4481 124.352 26.6321 123.39 26.6321ZM123.39 23.3681C123.975 23.3681 124.435 23.1761 124.77 22.7921C125.104 22.4081 125.272 21.8001 125.272 20.9681V14.6081C125.272 13.7761 125.104 13.1681 124.77 12.7841C124.435 12.4001 123.975 12.2081 123.39 12.2081C122.805 12.2081 122.345 12.4001 122.01 12.7841C121.69 13.1681 121.53 13.7761 121.53 14.6081V20.9681C121.53 21.8001 121.69 22.4081 122.01 22.7921C122.345 23.1761 122.805 23.3681 123.39 23.3681Z" fill="#404041" />
                    <path d="M111.203 26.6321C110.241 26.6321 109.37 26.4481 108.59 26.0801C107.823 25.7121 107.21 25.1121 106.75 24.2801C106.304 23.4481 106.081 22.3441 106.081 20.9681V14.6081C106.081 13.2321 106.304 12.1281 106.75 11.2961C107.21 10.4641 107.823 9.86409 108.59 9.49609C109.37 9.12809 110.241 8.94409 111.203 8.94409C112.164 8.94409 113.035 9.12809 113.816 9.49609C114.596 9.86409 115.209 10.4641 115.655 11.2961C116.115 12.1281 116.345 13.2321 116.345 14.6081V20.9681C116.345 22.3441 116.115 23.4481 115.655 24.2801C115.209 25.1121 114.596 25.7121 113.816 26.0801C113.035 26.4481 112.164 26.6321 111.203 26.6321ZM111.203 23.3681C111.788 23.3681 112.248 23.1761 112.582 22.7921C112.917 22.4081 113.084 21.8001 113.084 20.9681V14.6081C113.084 13.7761 112.917 13.1681 112.582 12.7841C112.248 12.4001 111.788 12.2081 111.203 12.2081C110.617 12.2081 110.157 12.4001 109.823 12.7841C109.502 13.1681 109.342 13.7761 109.342 14.6081V20.9681C109.342 21.8001 109.502 22.4081 109.823 22.7921C110.157 23.1761 110.617 23.3681 111.203 23.3681Z" fill="#404041" />
                    <path d="M180.334 0H97.7769C94.2043 0 91.3075 3 91.211 6.8V10.8L84.1622 15C83.4863 15.4 83.1001 16.1 83.1001 16.9C83.1001 17.7 83.4863 18.4 84.1622 18.8L91.211 23V28.1C91.211 31.8 94.1077 34.8 97.7769 34.9H180.334C183.907 34.9 186.804 31.9 186.9 28.2V6.8C186.9 3.1 184.003 0.1 180.334 0ZM182.555 28.2C182.555 28.8 182.362 29.4 181.879 29.8C181.493 30.2 180.914 30.5 180.334 30.5H97.7769C97.1976 30.5 96.6182 30.3 96.232 29.8C95.8458 29.4 95.5561 28.8 95.5561 28.2V21.8C95.5561 21 95.1699 20.3 94.494 19.9L89.6661 16.9L94.5905 14C95.2664 13.6 95.6527 12.9 95.6527 12.1V6.8C95.6527 6.2 95.8458 5.6 96.3286 5.2C96.7148 4.8 97.2942 4.5 97.8735 4.5H180.431C181.01 4.5 181.589 4.7 181.976 5.2C182.362 5.6 182.652 6.2 182.652 6.8V28.2H182.555Z" fill="#404041" />
                    <path d="M41.3 40.2001C41.3 36.0001 37.8 32.6001 33.6 32.6001C29.4 32.6001 26 36.0001 26 40.2001C26 44.4001 29.4 47.9001 33.6 47.9001C37.8 47.9001 41.3 44.4001 41.3 40.2001Z" fill="#79AD36" />
                    <path d="M65.5 32.6001C61.3 32.6001 57.9 36.0001 57.9 40.2001C57.9 44.4001 61.3 47.9001 65.5 47.9001C69.7 47.9001 73.2 44.4001 73.2 40.2001C73.2 36.0001 69.7 32.6001 65.5 32.6001Z" fill="#79AD36" />
                    <path d="M9.09998 9H74.6C77.1 9 79.1 7 79.1 4.5C79.1 2 77.1 0 74.6 0H0.0999756V72.5C0.0999756 75 2.09998 77 4.59998 77C7.09998 77 9.09998 75 9.09998 72.5V9Z" fill="#79AD36" />
                    <path d="M94.6 44.5C92.1 44.5 90.1 46.5 90.1 49V90H41.7H21.6C19.1 90 17.1 92 17.1 94.5C17.1 97 19.1 99 21.6 99H41.7H99.1V49C99.1 46.5 97.1 44.5 94.6 44.5Z" fill="#79AD36" />
                    <path d="M31.1 69.2001C33 70.7001 35.8 70.4001 37.4 68.5001C37.6 68.3001 38.6 67.2001 40.7 66.2001C42.7 65.2001 45.8 64.2001 50.2 64.2001C54.7 64.2001 58 65.4001 60.2 66.6001C61.3 67.2001 62.1 67.8001 62.6 68.2001C62.9 68.4001 63 68.6001 63.1 68.7001L63.2 68.8001C64.9 70.6001 67.7 70.7001 69.5 69.0001C71.3 67.3001 71.4 64.5001 69.7 62.6001C69.5 62.3001 67.7 60.5001 64.4 58.7001C61.1 56.9001 56.3 55.1001 50.1 55.1001C43.5 55.1001 38.6 56.8001 35.3 58.7001C32.1 60.6001 30.5 62.5001 30.2 62.9001C28.8 64.8001 29.1 67.6001 31.1 69.2001Z" fill="#79AD36" />
                    <path d="M4.59998 99C5.79998 99 6.89997 98.5 7.79997 97.7C8.59997 96.9 9.09998 95.7 9.09998 94.5C9.09998 93.3 8.59997 92.2 7.79997 91.3C6.99997 90.5 5.79998 90 4.59998 90C3.39998 90 2.29998 90.5 1.39998 91.3C0.599979 92.1 0.0999756 93.3 0.0999756 94.5C0.0999756 95.7 0.599979 96.8 1.39998 97.7C2.29998 98.5 3.39998 99 4.59998 99Z" fill="#79AD36" />
                </svg>

                <h1 class="page-title"><?php esc_html_e('Seems like we lost that page!', 'wpgens'); ?></h1>
            </header>

            <div class="page-content">
                <p>
                    <?php
                    $services_link = (get_current_blog_id() === 2) ? site_url('/usluge') : site_url('/services');

                    printf(
                        /* Translators: %1$s is a link to the homepage, %2$s is a link to the services page. */
                        esc_html__('Visit our %1$shomepage%2$s or %3$ssee what we can do for you%4$s.', 'wpgens'),
                        '<a href="' . esc_url(home_url()) . '">',
                        '</a>',
                        '<a href="' . esc_url($services_link) . '">',
                        '</a>'
                    );
                    ?>
                </p>
            </div>
        </article>
    </main>
</div>


<?php
get_footer();
