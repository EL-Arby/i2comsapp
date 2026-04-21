# Hero Carousel Images Setup

The hero section of the welcome page now features an automatic image carousel with interactive navigation dots.

## Required Images

Place the following 4 images in this directory (`public/images/`):

1. **hero-1.jpg** - First hero image
2. **hero-2.jpg** - Second hero image  
3. **hero-3.jpg** - Third hero image
4. **hero-4.jpg** - Fourth hero image

## Specifications

- **Format**: JPG or PNG
- **Recommended Size**: 1920x800 pixels (or similar 16:9 aspect ratio)
- **File Size**: Optimize to < 500KB per image for best performance

## Carousel Features

- **Auto-rotation**: Images change every 5 seconds
- **Navigation Dots**: Click on dots at the bottom to jump to a specific image
- **Pause on Hover**: Carousel pauses when you hover over it
- **Responsive**: Adapts to mobile and desktop screens
- **Smooth Transitions**: Cross-fade effect between images

## Implementation Details

The carousel is implemented in `resources/views/welcome.blade.php` with:
- CSS styling for the carousel container and slides
- JavaScript for auto-play and navigation functionality
- Overlay gradient for text visibility over images

To modify the carousel rotation time, edit the JavaScript interval in the view (currently set to 5000ms/5 seconds).
