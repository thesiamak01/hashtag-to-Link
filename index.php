<?php

include_once ("hashtagToLink.php");

$text = "This is a test text #example #test_tag and #another-tag.";

$linkedText = hashtagToLink($text, 'https://example.com/tag/', [
    'class' => 'hashtag-link',
    'target' => '_blank',
    'rel' => 'nofollow',
    'id' => 'hashtag-link-1',
    'title' => 'Go to hashtag page',
    'data' => [
        'tag' => 'example',
        'type' => 'hashtag',
    ],
    'onclick' => 'alert("Hashtag clicked!");',
]);

echo $linkedText;