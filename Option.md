# Options

yii2-sly-slider default options as defined in the source.

```php
'widgetOptions' => [
  'OnePerFrame' => 0,            // One per frame mode.
  
  // Item based navigation
  'itemNav' => 'basic',     // Item navigation type. `basic`, `centered`, `forceCentered`.
  'smart' => 1,             // Repositions the activated item to help with further navigation.
  'activateOn' => 'click',  // Activate an item on this event. Can be: 'click', 'mouseenter', ...
  'activateMiddle' => 0,    // forceCentered only. Always item in the middle of the FRAME.        

  // Scrolling
  'scrollBy' => 1,          // Pixels or items to move per one mouse scroll.
  'scrollHijack' => 300,    // Milliseconds since last wheel event after which it is global scroll.
  'scrollTrap' => 0,        // Don't bubble scrolling when hitting scrolling limits.

  // Dragging
  'mouseDragging' => 1,     // Enable navigation by dragging the SLIDEE with mouse cursor.
  'touchDragging' => 1,     // Enable navigation by dragging the SLIDEE with touch events.
  'releaseSwing' => 1,      // Ease out on dragging swing release.
  'swingSpeed' => 0.2,      // Swing synchronization speed, 1 = instant, 0 = infinite.
  'elasticBounds' => 1,     // Stretch SLIDEE position limits when dragging past FRAME boundaries.

  // Scrollbar
  'dragHandle' => 1,        // Whether the scrollbar handle should be draggable.
  'dynamicHandle' => 1,     // Scrollbar ratio between hidden and visible content.
  'minHandleSize' => 50,    // Minimal height or width of a handle in pixels.
  'clickBar' => 1,          // Enable navigation by clicking on scrollbar.
  'syncSpeed' => 0.5,       // SLIDEE synchronization speed, 1 = instant, 0 = infinite.

  // Pagesbar
  'activatePageOn' => 'click',   // Event used to activate page. Can be' => click, mouseenter, ...

  // Automated cycling
  'cycleBy' => null,        // Enable automatic cycling by 'items' or 'pages'.
  'cycleInterval' => 5000,  // Delay between cycles in milliseconds.
  'pauseOnHover' => 1,      // Pause cycling when mouse hovers over the FRAME.
  'startPaused' => 0,       // Whether to start in paused sate.

  // Mixed options
  'moveBy' => 300,             // Speed in pixels per second used by forward and backward buttons.
  'speed' => 300,              // Animations speed in milliseconds. 0 to disable animations.
  'easing' => 'easeOutExpo',   // Easing for duration based (tweening) animations.
  'startAt' => 0,              // Starting offset in pixels or items.
  'keyboardNavBy' => null,     // Enable keyboard navigation by 'items' or 'pages'.

  // Scroll Bar Navigation
  'scrollBarActive' => 1,        // Slide scroll bar `true` or `false`
  'scrollBarPosition' => 'top',  // Scroll bar position `top` or `bottom`
  'scrollBarClass' => null,      // Add custom class to scroll bar element
        
  // Pages Bar Navigation
  'pagesBarActive' => 1,         // Slide pages bar `true` or `false`
  'pagesBarPosition' => 'bottom',// Pages bar position `top` or `bottom`
  'pagesBarClass' => null,       // Add custom class to pages bar element

  // Controls Navigation
  'controlsActive' => 1,         // Slide controls navigation `true` or `false`
  'controlsType' => 'item',      // Slide navigation mode `item`, `page`, `move`
  'controlsClass' => null,       // Slide navigation custom class
  'controlsPrevText' => '<i class="fa fa-chevron-left"></i>',  // Navigation text label for prev
  'controlsNextText' => '<i class="fa fa-chevron-right"></i>', // Navigation text label for next
];
```