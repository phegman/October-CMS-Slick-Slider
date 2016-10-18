# October CMS Slick Slider Plugin

* [Installation](#installation)
* [Creating a Slider](#creating-a-slider)
* [Settings](#settings)
* [Component](#component)
* [Front-end Examples](#front-end-examples)
* [Built with Slick Slider](#built-with-slick-slider)

## Installation
Create a folder named peterhegman in your /plugins directory. Drop slickslider into this folder. In your terminal run `php artisan october:up`
Note: Make sure the plugin folder is named "slickslider"

## Creating a Slider
After installation choose "Slideshows" from the main menu.
Choose "Create" and then choose a title for the slideshow and add as many slides as you would like. Slides can be added, deleted, and rearranged. Slide description and title can also be added.
![Toggle Options](/assets/screens/slides.png)

## Settings
Settings can be accessed from the "Settings" tab after creating a slider.

A full list and description of settings can be found here: [http://kenwheeler.github.io/slick/](http://kenwheeler.github.io/slick/)

#### Toggle Options Available
![Toggle Options](/assets/screens/toggle-settings.png)

#### Other Options
![Other Options](/assets/screens/options.png)

#### Responsive Breakpoints
![Responsive Breakpoints](/assets/screens/responsive-breakpoints.png)

## Component
Slider component can be dragged into a page from the "CMS" tab. User can then choose what slideshow to display.
![Component](/assets/screens/component.png)

Components can also be added to a page with `{% component 'slider' slide_show_id = id %}` by replacing the "id" with our slideshow ID

Note: The [slider] tag must be in the head of the page for example: 

```
title = "Slide show"
url = "/slide-show"
layout = "default"
is_hidden = 0

[slider]
==
{% component 'slider' slide_show_id = 2 %}
```

## Front-end Examples

#### Full Width Image
![Full Width Image](/assets/screens/single-slide.png)

#### Multiple Images
![Multiple Images](/assets/screens/multiple-slides.png)

#### Grid Mode
![Multiple Images](/assets/screens/grid-mode.png)

#### Mobile
![Multiple Images](/assets/screens/mobile.png)

## Built with Slick Slider
Huge thanks to Ken Wheeler for creating the incredible Slick Slider. Full documentation for slick slider can be found here: [http://kenwheeler.github.io/slick/](http://kenwheeler.github.io/slick/)
