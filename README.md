![WPTrek License: GNU GPL v3.0](https://img.shields.io/github/license/GiovanniRiefolo/WPTrek)
![WPTrek Current version](https://img.shields.io/github/package-json/v/GiovanniRiefolo/WPTrek)
![WPTrek Total release downloads](https://img.shields.io/github/downloads/GiovanniRiefolo/WPTrek/total)

# WPTrek Guide
WPTrek is an **unconventional theme** for your **unconventional projects**. What does it mean? Usually, a theme has a lot of boundaries in terms of functionality, **binding your needs to the theme's limit**. When you are looking for extreme flexibility without ties, here it comes WPTrek.

WPTrek is also the most agnostic but complete starter theme out there. 

## Table of contents
1. [Requirements](#requirements)
2. [Getting started](#getting-started)   
3. [How it works](#how-it-works)
   1. [Early edits](#early-edits)
   2. [Choose a CSS Framework](#choose-a-css-framework)
   2. [Functions.php](#)
   2. [Test development](#) 
   3. [Production build](#) 
4. [Features](#features)

---

## Requirements
WPTrek requires [Node.js](https://nodejs.org) v12.x or newer. You don't need to understand Node or Gulp, just be sure that the development tools are installed.

---

## Getting started
### Download WPTrek and install dependencies with npm

````bash
$ cd your-wordpress-project-folder/wp-content/themes/
$ git clone git@github.com:GiovanniRiefolo/WPTrek.git wprtek
$ cd wptrek
$ npm install
````

Once you did it, WPTrek should be installed and fully running on your local machine. If you prefer you can manually teleport WPTrek files to your project folder. Be sure you, or Scotty, to run `npm install` once files are 100% moved into the theme folder.

![](https://media1.tenor.com/images/e5acbf1cf1c0ad287cdca3251c384a9f/tenor.gif?itemid=11313969)

---

## Theme Structure
``` markdown
root
|---- assets                           // styles, scripts, images
|    |---- fonts                       // font proprietari o di terze parti
|    |    |---- fa5pro                 // assets di FontAwesome 5 Pro
|    |    |---- slick                  // assets di slick.js
|    |---- images                      // images
|    |    |---- pre                    // images
|    |---- scripts                     // scripts
|    |    |---- libraires              // vendors scripts
|    |    |---- theme.js               // global theme scripts
|    |    |---- vendor.js              // bundle of all scripts inside libraries direcotry
|    |---- styles                      // tutti gli stili del tema (esclusi i blocchi)
|    |    |---- _scss                  // All SCSS files
|    |    |---- admin                  // Styles to be enqueued/registered in WP admin
|    |    |---- editor                 // Default WordPress stlyes  
|    |    |---- framework              // CSS Framework directory
|    |    |---- settings               // Style theme settings
|    |    |---- templates              // Templates dedicated styles
|    |    |---- tipography             // Tipography styling
|    |    |---- utilities              // Styling utilities
|    |    |    |---- normalize.scss    // tutti gli stili dedicati a specifici parziali
|    |    |    |---- _theme.colors.sss // tutti gli stili dedicati a specifici parziali
|---- gulpfiles.js                     // Gulp configuration directory
|    |---- index.js                    // main gulp file
|    |---- paths.json                  // file and directory paths
|    |---- google-font.list            // list file for Google Fonts import
|---- includes                         // customizer, function partials, walker menu partials directory
|    |---- customizer                  // customizer directory
|    |    |---- customizer.php         // customizer file
|    |---- functions                   // partials imported in functions.php
|    |    |---- assets.php
|    |    |---- blocks.php
|    |    |---- color-palette.php
|    |    |---- compatibility.php
|    |    |---- custom-fields.php
|    |    |---- extra.php
|    |    |---- image-sizes.php
|    |    |---- navigation-menus.php
|    |    |---- template-tags.php
|    |    |---- widgets.php
|    |---- walker                   // walker menu partials
|---- partials                      // template partials
|    |---- header                   // header main partials
|    |---- page                     // page partials
|    |---- post                     // post partials
|---- templates                     // template custom
|---- woocommerce                   // templates di woocommerce
|---- .gitignore                    // ignoring files and directory with Git
|---- style.css                     // default style.css file for WordPress                   
|---- screenshot.png                // default theme preview file for WordPress
|---- package.json                  // Gulp packages list                
|---- 404.php                       // 404 default template                     
|---- archive.php                   // archive default template                 
|---- footer.php                    // footer default template                  
|---- front-page.php                // static front page default template              
|---- functions.php                 // default theme functions file               
|---- header.php                    // header default template                  
|---- home.php                      // home for post default template                   
|---- index.php                     // default index.php template
|---- page.php                      // default page template
|---- search.php                    // default search template
|---- searchform.php                // default search form template
```

## How it works
### Early Edits
Before start boldly development of your next WordPress theme, you need to setup three things.

#### :one: BrowserSync setup
Before starting theme development update `gulpfile.js/index.js:22` with your local development URL. 

#### :two: Google Fonts
WPTrek will import your preferred Google Fonts. Just give him the download list by editing `gulpfile.js/google.fonts.list` file like this: 
```
Open+Sans:400,600
Lato:300,300i,900
```
#### :three: Set a textdomain
Text domain will be used everywhere for i18n purpose. Just edit ` ` to get all complete.

### Choose a CSS Framework
WPTrek helps you import the framework you want and automatically loads it. You can also decide to go ahead without any CSS framework, of course. 

All you need to do is to uncomment the `@import` rule for the framework you want `wptrek/assets/_scss/framework/_theme.framework.scss`. For example:
``` scss
// --- tailwind
// @import "tailwind.framework";
// --- foundation
@import "foundation.framework";
// --- bootstrap
// @import "bootstrap.framework";
```
will import the latest version of [ZURB Foundation](https://get.foundation/). You can furthermore import Foundation's components editing `wptrek/assets/_scss/framework/_foundation.framework.scss` 
``` scss
// Foundation
// --- main file
@import 'foundation';
// --- components -> check the full list @https://get.foundation/sites/docs/sass.html
@include foundation-global-styles;
@include foundation-forms;
// --- @include foundation-typography;
@include foundation-xy-grid-classes;
// --- containers
@include foundation-off-canvas;
@include foundation-reveal;
// --- layouts
@include foundation-sticky;
// --- helpers
@include foundation-flex-classes;
@include foundation-visibility-classes;
```

---

## Features

### Custom template tags
WPTrek bundles a bunch of template tags to help you get specific data inside the theme. Here is the tag list:
- `wptrek_fapro`, loads your FontAwesome Kit by adding the kit code.  

### The Customizer
The Customizer will give you useful tools for your project. Let's see what WPTrek offers:
* Theme optimization - here you can manage critical rendering CSS assets.
* Posts - manage post settings like excerpt length


---

## Tools
### A11y
- [WordPress specifications](https://developer.wordpress.org/themes/functionality/accessibility/)

## Plugins
### Gutenberg
- [CoBlocks](https://wordpress.org/plugins/coblocks/)
### Features
- [ACF - Advanced Custom Fields](https://www.advancedcustomfields.com/)