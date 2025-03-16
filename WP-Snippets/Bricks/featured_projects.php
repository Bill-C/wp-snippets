<?php
function get_featured_projects() {
    if (!function_exists('have_rows') || !have_rows('projects')) {
        return '<p>No featured projects.</p>';
    }
    $output = '<div class="featured-projects">';
    while (have_rows('projects')) {
        the_row();
        if (get_sub_field('is_featured')) {
            $output .= '<div class="project-card core-card">';
            $output .= '<h3>' . esc_html(get_sub_field('project_title')) . '</h3>';
            $output .= '</div>';
        }
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('projects', 'get_featured_projects');
