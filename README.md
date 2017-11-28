# October CMS Slick Slider Plugin

* [Installation](#installation)
* [Dependencies](#dependencies)
* [Creating a Slider](#creating-a-slider)
* [Settings](#settings)
* [Permissions](#permissions)
* [Component](#component)
* [Front-end Examples](#front-end-examples)
* [Built with Slick Slider](#built-with-slick-slider)

## Installation
Create a folder named peterhegman in your /plugins directory. Drop slickslider into this folder. In your terminal run `php artisan october:up`
Note: Make sure the plugin folder is named "slickslider"

The plugin can also be added to an October CMS project from the plugin repo: [https://octobercms.com/plugin/peterhegman-slickslider](https://octobercms.com/plugin/peterhegman-slickslider)

## Dependencies
This plugin requires jQuery 1.7 +. By default the plugin includes jQuery 3.1.1, but if your theme already include jQuery you may want to turn it off in the settings tab of your slideshow.

This plugin also requires the theme layout being used to have the {%styles%} tag in the head section and the {%scripts%} tag right before closing body tag. See [{%styles%}](https://octobercms.com/docs/markup/tag-styles) and [{%scripts%}](https://octobercms.com/docs/markup/tag-scripts) for more information.

## Creating a Slider
After installation choose "Slideshows" from the main menu.
Choose "Create" and then choose a title for the slideshow and add as many slides as you would like. Slides can be added, deleted, and rearranged. Slide description and title can also be added.
![Toggle Options](/assets/screens/slides.png)

## Settings
Slide show specific settings can be accessed from the "Settings" tab when creating a slider.

Global settings can be set in the October CMS backend Settings panel. These settings will only be used when a user creates a slideshow, but does not have permissions to set slideshow specific settings. This allows an administrator to pre-configure settings so users can create slideshows, but not modify the settings of the slideshows. See [Permissions](#permissions) for more details.

A full list and description of settings can be found here: [http://kenwheeler.github.io/slick/](http://kenwheeler.github.io/slick/)

#### Toggle Options Available
![Toggle Options](/assets/screens/toggle-settings.png)

#### Other Options
![Other Options](/assets/screens/options.png)

#### Responsive Breakpoints
![Responsive Breakpoints](/assets/screens/responsive-breakpoints.png)

## Permissions

Permissions available are as follows:

* peterhegman.slickslider.manage_slide_shows - User can manage all aspects of the slideshows. Create, delete, and modify slideshows and update slideshow settings.

* peterhegman.slickslider.manage_slides - User can only manage slides of already created slideshows. User can add, remove and re-arrange slides on a slideshow.

* peterhegman.slickslider.create_slide_shows - Allows user to create and delete slideshows.

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
