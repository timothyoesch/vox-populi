<?php
if (!function_exists('markdown_to_html')) {
    /**
     * Convert Markdown File to HTML.
     *
     * @param string $markdown
     * @return string
     */
    function md_html($file): string
    {
        return '<div class="vapko-markdown">' .
            \Illuminate\Mail\Markdown::parse(
            file_get_contents($file)
            ) .
        '</div>';
    }
}
