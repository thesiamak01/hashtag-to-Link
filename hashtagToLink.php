<?php
/**
 * Convert hashtags in a text to clickable links.
 *
 * @param string $text The input text containing hashtags.
 * @param string $baseUrl The base URL for the hashtag links (default: 'https://example.com/tag/').
 * @param array $options Additional options for the link attributes (e.g., class, target, rel, etc.).
 * @return string The text with hashtags replaced by clickable links.
 */
function hashtagToLink($text, $baseUrl = 'https://example.com/tag/', $options = [])
{
    // Default options for the link attributes
    $defaultOptions = [
        'class' => '', // CSS class for the links
        'target' => '', // Target attribute for the links (e.g., '_blank')
        'rel' => '', // Rel attribute for the links (e.g., 'nofollow')
        'id' => '', // ID attribute for the links
        'title' => '', // Title attribute for the links
        'data' => [], // Custom data-* attributes for the links
        'onclick' => '', // Onclick event handler for the links
    ];

    // Merge user-provided options with default options
    $options = array_merge($defaultOptions, $options);

    // Regex pattern to match hashtags (supports Persian, English, numbers, -, and _)
    $pattern = '/#([\p{L}\d\-_]+)/u';

    // Callback function to replace hashtags with links
    $callback = function($matches) use ($baseUrl, $options)
    {
        $tag = $matches[1]; // Extract the hashtag text (without #)
        $encodedTag = urlencode($tag); // URL-encode the hashtag for use in the URL
        $url = rtrim($baseUrl, '/') . '/' . $encodedTag; // Build the full URL

        // Prepare HTML attributes for the <a> tag
        $attributes = [];
        if (!empty($options['class']))
        {
            $attributes[] = 'class="' . htmlspecialchars($options['class']) . '"';
        }
        if (!empty($options['target']))
        {
            $attributes[] = 'target="' . htmlspecialchars($options['target']) . '"';
        }
        if (!empty($options['rel']))
        {
            $attributes[] = 'rel="' . htmlspecialchars($options['rel']) . '"';
        }
        if (!empty($options['id']))
        {
            $attributes[] = 'id="' . htmlspecialchars($options['id']) . '"';
        }
        if (!empty($options['title']))
        {
            $attributes[] = 'title="' . htmlspecialchars($options['title']) . '"';
        }
        if (!empty($options['onclick']))
        {
            $attributes[] = 'onclick="' . htmlspecialchars($options['onclick']) . '"';
        }
        if (!empty($options['data']) && is_array($options['data']))
        {
            foreach ($options['data'] as $key => $value)
            {
                $attributes[] = 'data-' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
            }
        }

        // Combine all attributes into a single string
        $attributesString = implode(' ', $attributes);

        // Return the <a> tag with the appropriate attributes
        return "<a href='" . htmlspecialchars($url) . "' {$attributesString}>#" . htmlspecialchars($tag) . "</a>";
    };

    // Replace all hashtags in the text with clickable links
    return preg_replace_callback($pattern, $callback, $text);
}
