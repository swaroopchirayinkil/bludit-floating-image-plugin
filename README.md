# Bludit Floating Image Plugin

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Bludit](https://img.shields.io/badge/Bludit-3.0%2B-orange)](https://www.bludit.com/)
[![Version](https://img.shields.io/badge/version-1.0-green)](https://github.com/yourusername/bludit-floating-image)

A simple, customizable Bludit CMS plugin that displays a floating image (GIF or PNG) on your website. The image can be positioned anywhere on the page, resized, and closed by double-clicking without blocking content.

## Features

- 🖼️ **Support for GIF and PNG formats** - Display animated or static images
- 📐 **Fully customizable positioning** - Place the image anywhere on your page using percentage-based coordinates
- 🔧 **Adjustable size** - Set custom width (50-500px) with automatic height scaling
- 👆 **Double-click to close** - Visitors can dismiss the image with a simple double-click
- 🎨 **Opacity control** - Set transparency levels (0.1-1.0) to ensure content readability
- 🚫 **Non-blocking** - Uses fixed positioning with high z-index, never interferes with page content
- ⚡ **Lightweight** - Pure JavaScript, no external dependencies
- 💫 **Smooth animations** - Fade-out effect when closing the image
- 🎯 **Hover effect** - Image becomes fully opaque on hover for better visibility

## Requirements

- Bludit CMS 3.0 or higher
- PHP 5.6 or higher
- A theme that supports the `siteBodyEnd` hook

## Installation

### Method 1: Manual Installation

1. Download or clone this repository
2. Extract the `floating-image` folder to your Bludit installation:

/bl-plugins/floating-image/

text
3. Log in to your Bludit admin panel
4. Navigate to **Plugins** in the sidebar
5. Find **Floating Image** in the list
6. Click **Activate**

### Method 2: Direct Download

1. Navigate to your Bludit plugins directory:

cd /path/to/bludit/bl-plugins/

text
2. Clone this repository:

git clone https://github.com/yourusername/bludit-floating-image.git floating-image

text
3. Activate the plugin from your admin panel

## Directory Structure

floating-image/
├── languages/
│ └── en.json # English language file
├── metadata.json # Plugin metadata
├── plugin.php # Main plugin file
└── README.md # This file

text

## Configuration

After activation, click on the plugin name to access settings:

### Settings Options

| Setting | Description | Default | Range |
|---------|-------------|---------|-------|
| **Image URL** | Full URL to your GIF or PNG image | (empty) | Any valid image URL |
| **Image Size** | Width of the image in pixels | 150px | 50-500px |
| **Horizontal Position** | Distance from left edge (percentage) | 10% | 0-100% |
| **Vertical Position** | Distance from top edge (percentage) | 80% | 0-100% |
| **Z-Index** | Layer stacking order | 999 | 1-9999 |
| **Opacity** | Transparency level | 0.9 | 0.1-1.0 |

### Example Configurations

#### Bottom-Left Corner (Default)

Horizontal Position: 10
Vertical Position: 80
Image Size: 150
Opacity: 0.9

text

#### Top-Right Corner

Horizontal Position: 85
Vertical Position: 10
Image Size: 120
Opacity: 0.8

text

#### Center-Bottom

Horizontal Position: 45
Vertical Position: 85
Image Size: 200
Opacity: 1.0

text

## Usage

1. **Add your image URL**: Enter the complete URL of your GIF or PNG file
2. **Adjust position**: Use percentage values to position the image precisely
3. **Set size and opacity**: Configure according to your design preferences
4. **Save settings**: The image will appear immediately on your website
5. **Test functionality**: Double-click the image to verify the close behavior

## Theme Compatibility

Ensure your Bludit theme includes the `siteBodyEnd` hook. Add this line before the closing `</body>` tag in your theme's `index.php` or relevant template files:

<?php Theme::plugins('siteBodyEnd'); ?>

text

## How It Works

The plugin uses the `siteBodyEnd` hook to inject HTML, CSS, and JavaScript at the end of the page body. The image is positioned using CSS `position: fixed`, ensuring it stays in place while scrolling and doesn't interfere with page layout or content flow.

### User Interaction

- **Hover**: Image opacity increases to 100% for better visibility
- **Double-click**: Triggers a fade-out animation (300ms) then hides the element
- **Non-intrusive**: Set lower opacity values to maintain content readability

## Customization

### Adding Custom Styles

You can modify `plugin.php` to add custom CSS styles or animations. Look for the inline styles in the `siteBodyEnd()` method.

### Adding More Languages

Create additional language files in the `languages/` directory following the format of `en.json`:

languages/
├── en.json
├── es.json # Spanish
├── de.json # German
└── fr.json # French

text

## Troubleshooting

### Image Not Appearing

1. Verify the image URL is correct and publicly accessible
2. Check that the plugin is activated
3. Ensure your theme supports the `siteBodyEnd` hook
4. Clear browser cache and reload the page

### Image Blocking Content

- Reduce the **Image Size** setting
- Increase **Opacity** to make it more transparent
- Adjust **Horizontal/Vertical Position** to move it away from content areas
- Lower the **Z-Index** value if needed

### Double-Click Not Working

- Ensure JavaScript is enabled in your browser
- Check browser console for JavaScript errors
- Verify no other scripts are interfering with event handlers

## Browser Support

- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Opera (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Changelog

### Version 1.0 (2025-11-02)
- Initial release
- Basic floating image functionality
- Position and size customization
- Double-click to close
- Opacity control
- Hover effects

## Future Enhancements

- [ ] Drag-and-drop repositioning
- [ ] Multiple image support
- [ ] Animation effects (bounce, fade-in, slide)
- [ ] Cookie/localStorage to remember closed state
- [ ] Image rotation and scaling options
- [ ] Mobile-specific positioning
- [ ] Schedule display (show on specific days/times)

## License

This plugin is open-source software licensed under the [MIT License](LICENSE).

## Author

**Your Name**
- Website: [https://theartistree.in](https://theartistree.in)

## Support

If you encounter any issues or have questions:

- **Issues**: [GitHub Issues](https://github.com/yourusername/bludit-floating-image/issues)
- **Bludit Forum**: [Bludit Community](https://forum.bludit.org/)
- **Documentation**: [Bludit Docs](https://docs.bludit.com/)

## Acknowledgments

- Thanks to the [Bludit CMS](https://www.bludit.com/) team for creating an excellent flat-file CMS
- Inspired by classic web mascots and floating companions

---

**Made with ❤️ for the Bludit community**
