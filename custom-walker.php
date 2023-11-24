<?php
// custom-walker.php

class Custom_Walker extends Walker_Nav_Menu {
    private $is_sub_menu = false;

    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0) {
            // Start the submenu
            $output .= '<ul class="sub_list">';
            $this->is_sub_menu = true;
        } elseif ($depth === 1 && $this->is_sub_menu) {
            // Start the sub-submenu
            $output .= '<ul class="sub_sub_list">';
        }
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        if ($depth === 0 && $this->is_sub_menu) {
            // End the submenu
            $output .= '</ul>';
            $this->is_sub_menu = false;
        } elseif ($depth === 1 && $this->is_sub_menu) {
            // End the sub-submenu
            $output .= '</ul>';
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Start a menu item
        $output .= '<li class="list_items">';
        $output .= '<div><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';

        // Check if the menu item has children
        if ($args->walker->has_children) {
            $output .= '<i class="fas fa-chevron-right"></i>';
        }
        $output .= '</div>';
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        // End a menu item
        $output .= '</li>';
    }
}

?>