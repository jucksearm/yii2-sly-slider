<?php
 /**
 * yii2 extension for the amazing jQuery Plugin: http://darsa.in/sly/
 * @version 1.0
 * @link https://github.com/jucksearm/yii2-sly-slider
 * @author Jucksearm Boonmor <jucksearm.bkk@gmail.com>
 */

namespace jucksearm\sly;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class Sly extends Widget
{
    /**
     * @var string Unique ID element for create sly slider
     */
    public $id;

    /**
     * @var array list of slides following structure:
     * 'items' => [
     *     'content' => **images tag or html tag**,
     *     ....
     * ]
     */
    public $items = [];

    /**
     * @var array the HTML attributes for the field main container tag.
     * 'htmlOptions' => [
     *     'class' => 'test-slider',
     *     ....
     * ]
    */
    public $htmlOptions = [];

    /**
     * Custom settting widget configuration options
     * @var array all attributes that be accepted by the widget
     * 'widgetOptions' => [
     *     'type' => 'horizontal',
     *     ....
     * ]
     */
    public $widgetOptions = [];

    /**
     * Default settting widget configuration options
     * @var array all attributes that be accepted by the widget
     */
    protected $defaultOptions = [
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
        'moveBy' => 300,          // Speed in pixels per second used by forward and backward buttons.
        'speed' => 300,             // Animations speed in milliseconds. 0 to disable animations.
        'easing' => 'easeOutExpo',      // Easing for duration based (tweening) animations.
        'startAt' => 0,        // Starting offset in pixels or items.
        'keyboardNavBy' => null,  // Enable keyboard navigation by 'items' or 'pages'.

        // Scroll Bar Navigation
        'scrollBarActive' => 1,     // Slide scroll bar `true` or `false`
        'scrollBarPosition' => 'top',  // Scroll bar position `top` or `bottom`
        'scrollBarClass' => null,      // Add custom class to scroll bar element
        
        // Pages Bar Navigation
        'pagesBarActive' => 1,      // Slide pages bar `true` or `false`
        'pagesBarPosition' => 'bottom',// Pages bar position `top` or `bottom`
        'pagesBarClass' => null,       // Add custom class to pages bar element

        // Controls Navigation
        'controlsActive' => 1,      // Slide controls navigation `true` or `false`
        'controlsType' => 'item',      // Slide navigation mode `item`, `page`, `move`
        'controlsClass' => null,       // Slide navigation custom class
        'controlsPrevText' => '<i class="fa fa-chevron-left"></i>',  // Navigation text label for prev
        'controlsNextText' => '<i class="fa fa-chevron-right"></i>', // Navigation text label for next
    ];
    /**
     * Settingn slyOptions
     * 1=true, 0=false
     * @var array all common setting sly attributes
     */
    protected $slyOptions = [
        'slidee' => 'null',       // Selector, DOM element.
        'horizontal' => 1,        // Switch to horizontal mode.
        
        // Item based navigation
        'itemNav' => null,        // Item navigation type. `basic`, `centered`, `forceCentered`.
        'itemSelector' => 'null', // Select only items that match this selector.
        'smart' => 0,             // Repositions the activated item to help with further navigation.
        'activateOn' => null,     // Activate an item on this event. Can be: 'click', 'mouseenter', ...
        'activateMiddle' => 0,    // forceCentered only. Always item in the middle of the FRAME.

        // Scrolling
        'scrollSource' => 'null', // Element for catching the mouse wheel scrolling. Default is FRAME.
        'scrollBy' => 0,          // Pixels or items to move per one mouse scroll.
        'scrollHijack' => 300,    // Milliseconds since last wheel event after which it is global scroll.
        'scrollTrap' => 0,        // Don't bubble scrolling when hitting scrolling limits.

        // Dragging
        'dragSource' => "\$wrap.find('.frame')",    // Selector or DOM element for dragging events.
        'mouseDragging' => 0,     // Enable navigation by dragging the SLIDEE with mouse cursor.
        'touchDragging' => 0,     // Enable navigation by dragging the SLIDEE with touch events.
        'releaseSwing' => 0,      // Ease out on dragging swing release.
        'swingSpeed' => 0.2,      // Swing synchronization speed, 1 = instant, 0 = infinite.
        'elasticBounds' => 0,     // Stretch SLIDEE position limits when dragging past FRAME boundaries.
        'interactive' => 'null',  // Selector for special interactive elements.

        // Scrollbar
        'scrollBar' => "\$wrap.find('.scrollbar')", // Selector or DOM element for scrollbar.
        'dragHandle' => 0,        // Whether the scrollbar handle should be draggable.
        'dynamicHandle' => 0,     // Scrollbar ratio between hidden and visible content.
        'minHandleSize' => 50,    // Minimal height or width of a handle in pixels.
        'clickBar' => 0,          // Enable navigation by clicking on scrollbar.
        'syncSpeed' => 0.5,       // SLIDEE synchronization speed, 1 = instant, 0 = infinite.

        // Pagesbar
        'pagesBar' => "\$wrap.find('.pages')",      // Selector or DOM element for pages bar container.
        'activatePageOn' => null, // Event used to activate page. Can be: click, mouseenter, ...

        // Navigation buttons
        'forward' => "\$wrap.find('.forward')",     // Selector or DOM element for "forward movement".
        'backward' => "\$wrap.find('.backward')",   // Selector or DOM element for "backward movement".
        'prev' => "\$wrap.find('.prev')",           // Selector or DOM element for "previous item".
        'next' => "\$wrap.find('.next')",           // Selector or DOM element for "next item".
        'prevPage' => "\$wrap.find('.prevPage')",   // Selector or DOM element for "previous page".
        'nextPage' => "\$wrap.find('.nextPage')",   // Selector or DOM element for "next page".

        // Automated cycling
        'cycleBy' => null,        // Enable automatic cycling by 'items' or 'pages'.
        'cycleInterval' => 5000,  // Delay between cycles in milliseconds.
        'pauseOnHover' => 0,      // Pause cycling when mouse hovers over the FRAME.
        'startPaused' => 0,       // Whether to start in paused sate.

        // Mixed options
        'moveBy' => 300,          // Speed in pixels per second used by forward and backward buttons.
        'speed' => 0,             // Animations speed in milliseconds. 0 to disable animations.
        'easing' => "'swing'",      // Easing for duration based (tweening) animations.
        'startAt' => null,        // Starting offset in pixels or items.
        'keyboardNavBy' => null,  // Enable keyboard navigation by 'items' or 'pages'.

        // Classes
        'draggedClass' => "'dragged'",   // Class for dragged elements.
        'activeClass' => "'active'",     // Class for active items and pages.
        'disabledClass' => "'disabled'"  // Class for disabled navigation elements.
    ];

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        SlyAsset::register(Yii::$app->view);

        $this->setOptions();
        $this->setSlyOptions();

        $this->htmlOptions['id'] = $this->id;
        $options = ['class' => 'frame'];
        
        if (isset($this->htmlOptions['class'])) Html::addCssClass($options, $this->htmlOptions['class']);
        
        if ($this->defaultOptions['OnePerFrame']) {
            Html::addCssClass($options, 'oneperframe');
            $this->slyOptions['itemNav'] = 'forceCentered';
        }
        
        if ($this->slyOptions['itemNav'] == 'forceCentered') {
            $this->slyOptions['activateMiddle'] = 1;
        }
        
        $this->htmlOptions['class'] = $options;
    }

    /**
     * Renders the widget.
     * @return string|html
     */
    public function run()
    {
        echo Html::beginTag('div', ['class' => 'sly-wrap']) . "\n\r";
            $this->renderScrollBar('top') . "\n\r";
            $this->renderPagesBar('top') . "\n\r";
            echo Html::beginTag('div', $this->htmlOptions) . "\n\r";
                echo $this->renderItems() . "\n\r";
            echo Html::endTag('div') . "\n\r";
            $this->renderScrollBar('bottom')."\n\r";
            $this->renderPagesBar('bottom') . "\n\r";
            $this->renderControls() . "\n\r";
        echo Html::endTag('div') . "\n\r";

        $this->registerPlugin();
    }

    /**
    * Registers a specific yii2sly widget and the related events
    * @param string $name the name of the yii2sly plugin
    */
    protected function registerPlugin()
    {
        $js = "
        (function () {
            var \$frame  = \$('#".$this->htmlOptions['id']."');
            var \$wrap   = \$frame.parent();
            var \$controls = \$wrap.find('.controls');
            var \$button = \$controls.find('.btn');
            var \$framechild = \$frame.children().children();
            var \$avgHeigth = 0;

            // Call Sly on frame
            \$frame.sly({
                slidee: ".$this->slyOptions['slidee'].",
                horizontal: ".$this->slyOptions['horizontal'].",

                itemNav: ".$this->slyOptions['itemNav'].",
                itemSelector: ".$this->slyOptions['itemSelector'].",
                smart: ".$this->slyOptions['smart'].",
                activateOn: ".$this->slyOptions['activateOn'].",
                activateMiddle: ".$this->slyOptions['activateMiddle'].",

                scrollSource: ".$this->slyOptions['scrollSource'].",
                scrollBy: ".$this->slyOptions['scrollBy'].",
                scrollHijack: ".$this->slyOptions['scrollHijack'].",
                scrollTrap: ".$this->slyOptions['scrollTrap'].",

                dragSource: ".$this->slyOptions['dragSource'].",
                mouseDragging: ".$this->slyOptions['mouseDragging'].",
                touchDragging: ".$this->slyOptions['touchDragging'].",
                releaseSwing: ".$this->slyOptions['releaseSwing'].",
                swingSpeed: ".$this->slyOptions['swingSpeed'].",
                elasticBounds: ".$this->slyOptions['elasticBounds'].",
                interactive: ".$this->slyOptions['interactive'].",

                scrollBar: ".$this->slyOptions['scrollBar'].",
                dragHandle: ".$this->slyOptions['dragHandle'].",
                dynamicHandle: ".$this->slyOptions['dynamicHandle'].",
                minHandleSize: ".$this->slyOptions['minHandleSize'].",
                clickBar: ".$this->slyOptions['clickBar'].",
                syncSpeed: ".$this->slyOptions['syncSpeed'].",

                pagesBar: ".$this->slyOptions['pagesBar'].",
                activatePageOn: ".$this->slyOptions['activatePageOn'].",
                pageBuilder: function (index) { return '<li>' + (index + 1) + '</li>';},

                forward: ".$this->slyOptions['forward'].",
                backward: ".$this->slyOptions['backward'].",
                prev: ".$this->slyOptions['prev'].",
                next: ".$this->slyOptions['next'].",
                prevPage: ".$this->slyOptions['prevPage'].",
                nextPage: ".$this->slyOptions['nextPage'].",

                cycleBy: ".$this->slyOptions['cycleBy'].",
                cycleInterval: ".$this->slyOptions['cycleInterval'].",
                pauseOnHover: ".$this->slyOptions['pauseOnHover'].",
                startPaused: ".$this->slyOptions['startPaused'].",

                moveBy: ".$this->slyOptions['moveBy'].",
                speed: ".$this->slyOptions['speed'].", 
                easing: ".$this->slyOptions['easing'].",
                startAt: ".$this->slyOptions['startAt'].",
                keyboardNavBy: ".$this->slyOptions['keyboardNavBy'].",

                draggedClass: ".$this->slyOptions['draggedClass'].",
                activeClass: ".$this->slyOptions['activeClass'].",
                disabledClass: ".$this->slyOptions['disabledClass']."
            });

            \$controls.css({'top': ((\$wrap.outerHeight() - \$button.outerHeight())/2+10)+'px'});
        }());";
        
        Yii::$app->view->registerJs($js, \yii\web\View::POS_END);
    }

    /**
     * Renders slide scroll bar
     * @param  string $position set show slide position `top` or `bottom`
     * @return string|html show scroll bar element
     */
    protected function renderScrollBar($position)
    {
        if (
            $this->defaultOptions['scrollBarActive'] &&
            $this->defaultOptions['scrollBarPosition'] == $position
        ) {
            $options = ['class' => 'scrollbar'];
            $customClass = trim($this->defaultOptions['scrollBarClass']);
            if (!empty($customClass)) Html::addCssClass($options, $customClass);

            echo Html::beginTag('div', $options);
            echo Html::beginTag('div', ['class' => 'handle']);
            echo Html::tag('div', null, ['class' => 'mousearea']);
            echo Html::endTag('div');
            echo Html::endTag('div');
        } else {
            return false;
        }
    }

    /**
     * Renders slide pages bar
     * @param  string $position set show slide position `top` or `bottom`
     * @return string|html show pages bar element
     */
    protected function renderPagesBar($position)
    {
        if (
            $this->defaultOptions['pagesBarActive'] &&
            $this->defaultOptions['pagesBarPosition'] == $position
        ) {
            $options = ['class' => 'pages'];
            $customClass = $this->defaultOptions['pagesBarClass'] !== null ? trim($this->defaultOptions['pagesBarClass']) : null;
            if (!empty($customClass)) Html::addCssClass($options, $customClass);

            echo Html::tag('ul', null, $options);
        } else {
            return false;
        }
    }

    /**
     * Renders previous and next control buttons.
     * @return string|html show controls button element
     */
    protected function renderControls()
    {
        if (!$this->defaultOptions['controlsActive']) return false;

        $options = ['class' => 'controls'];
        $customClass = $this->defaultOptions['controlsClass'] !== null ? trim($this->defaultOptions['controlsClass']) : null;
        if (!empty($customClass)) Html::addCssClass($options, $customClass);

        $type = $this->defaultOptions['controlsType'];
        $buttonClass = [];
        switch ($type) {
            case 'item':
                $buttonClass['prev'] = 'prev';
                $buttonClass['next'] = 'next';
                break;
            case 'page':
                $buttonClass['prev'] = 'prevPage';
                $buttonClass['next'] = 'nextPage';
                break;
            case 'move':
                $buttonClass['prev'] = 'backward';
                $buttonClass['next'] = 'forward';
                break;            
            default:
                $buttonClass['prev'] = 'prev';
                $buttonClass['next'] = 'next';
                break;
        }
        $btnPrevClass = ['class' => 'btn btn-prev-navigation'];
        Html::addCssClass($btnPrevClass, $buttonClass['prev']);
        $btnNextClass = ['class' => 'btn btn-next-navigation'];
        Html::addCssClass($btnNextClass, $buttonClass['next']);
        
        echo Html::beginTag('div', $options);
        echo Html::tag('button', $this->defaultOptions['controlsPrevText'], $btnPrevClass);
        echo Html::tag('button', $this->defaultOptions['controlsNextText'], $btnNextClass);
        echo Html::endTag('div');    
    }

    /**
     * Renders all array of items.
     * @return string render result
     */
    protected function renderItems()
    {
        $items = array();
        
        for ($i = 0; $i < count($this->items); $i++) {
            $items[$i] = $this->renderItem($this->items[$i], $i);
        }
        
        return Html::tag('ul',implode("\n", $items), ['class' => 'clearfix']);
    }

    /**
     * Renders a single item
     * @param string|array $item
     * @param integer $index detect first item should be set to `active`
     * @return string render result
     */
    protected function renderItem($item, $index)
    {
        if (is_string($item)) {
            $content = $item;
        } elseif (isset($item['content'])) {
            $content = trim($item['content']);            
        } else {
            $content = '';
        }

        if ($index === 0) {
            return Html::tag('li', $content, ['class'=>'active']);
        } else {
            return Html::tag('li', $content);
        }        
    }

    /**
     * Setting widget defaultOptions by widgetOptions
     * @return array finaly defaultOptions setting
     */
    protected function setOptions()
    {
        if(!is_array($this->widgetOptions)) return false;

        foreach ($this->defaultOptions as $key => $value) {
            if (!isset($this->widgetOptions[$key])) continue;
            
            if (gettype($this->widgetOptions[$key]) == 'integer')
                $this->defaultOptions[$key] = $this->widgetOptions[$key];
    
                $tmp = $this->widgetOptions[$key] !== null ? trim($this->widgetOptions[$key]) : null;

            if (gettype($this->widgetOptions[$key]) != 'boolean' && empty($tmp)) continue;

            $this->defaultOptions[$key] = $this->widgetOptions[$key] !== null ? trim($this->widgetOptions[$key]) : null;
        }

        return $this->defaultOptions;
    }

    /**
     * Setting slyOptions by defaultOptions
     * @return array finaly slyOptions setting
     */
    protected function setSlyOptions()
    {
        foreach ($this->slyOptions as $key => $value) {
            if ($this->slyOptions[$key] === null)
                $this->slyOptions[$key] = 'null';

            if (!isset($this->defaultOptions[$key])) continue;

            if (gettype($this->defaultOptions[$key]) == 'string') {
                $this->slyOptions[$key] = "'".trim($this->defaultOptions[$key])."'";
            } else {
                $this->slyOptions[$key] = $this->defaultOptions[$key];
            }
        }

        return $this->slyOptions;
    }
}
