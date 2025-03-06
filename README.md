# Hashtag to Link Converter

A PHP function to convert hashtags in a text into clickable links. This function supports both **Persian** and **English** hashtags and allows for extensive customization of the generated links.

---

## Features

- **Supports Persian and English Hashtags**: Works with Persian, English, numbers, `-`, and `_`.
- **Customizable Links**: Add `class`, `target`, `rel`, `id`, `title`, `data-*`, and `onclick` attributes to the links.
- **Secure**: Uses `htmlspecialchars` and `urlencode` to prevent XSS and ensure proper URL formatting.
- **Flexible**: Easily extendable to support additional attributes or functionality.

---

## Parameters

### `hashtagToLink($text, $baseUrl, $options)`

| Parameter   | Type   | Default Value               | Description                                                                 |
|-------------|--------|-----------------------------|-----------------------------------------------------------------------------|
| `$text`     | string | -                           | The input text containing hashtags.                                         |
| `$baseUrl`  | string | `'https://example.com/tag/'` | The base URL for the hashtag links.                                         |
| `$options`  | array  | `[]`                        | An associative array of additional options for the link attributes.         |

---

### `$options` Array

| Key         | Type   | Default Value | Description                                                                 |
|-------------|--------|---------------|-----------------------------------------------------------------------------|
| `class`     | string | `''`          | CSS class for the links.                                                    |
| `target`    | string | `''`          | Target attribute for the links (e.g., `'_blank'`).                          |
| `rel`       | string | `''`          | Rel attribute for the links (e.g., `'nofollow'`).                           |
| `id`        | string | `''`          | ID attribute for the links.                                                 |
| `title`     | string | `''`          | Title attribute for the links.                                              |
| `data`      | array  | `[]`          | Custom `data-*` attributes for the links.                                   |
| `onclick`   | string | `''`          | Onclick event handler for the links.                                        |

---

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.