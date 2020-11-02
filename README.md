# WPTrek Guide
WP Trek is an **unconventional theme** for your **unconventional projects**. What does it mean? Usually, a theme gives you a lot of preset in the customization options, **binding your needs to the theme's limit**. When you are looking for extreme flexibility without ties, here it comes WP Trek.

## Table of contents
1. [Requirements](#requirements)
2. [Getting Started](#getting-started)
3. [Features](#features)


## Requirements
WP Trek requires [Node.js](https://nodejs.org) v 12.x or newer. You don't need to understand Node or Gulp, just be sure that the development tools are installed.

## Getting started
### Download WP Trek and install dependencies with npm

````bash
$ cd your-project-folder/wp-content-theme/
$ git clone git@github.com:GiovanniRiefolo/WPTrek.git theme-folder
$ cd theme-folder
$ npm install
````

Once you did it, WP Trek should be installed and fully running on your local machine. If you prefer you can manually teleport WP Trek files to your project folder. Be sure you, or Scotty, to run `npm install` once files are 100% moved into the theme folder.

![](https://media1.tenor.com/images/e5acbf1cf1c0ad287cdca3251c384a9f/tenor.gif?itemid=11313969)

### Start theme development

Before starting theme development update `gulpfile.js:18` with your local development URL. 

Once you did it you can run 
````bash
$ npm engage
````
to start watching file changes or 
````bash
$ npm take-us-out
````
to for browser refresh with Browser-Sync. 

## Features

### The Customizer
The Customizer will give you useful settings for your project. Stop changing colors or fonts (WPTrek suggests good Gutenberg addons) doing builders' job. Let's see what WPTrek offers:
1. Marketing section - Here you can add your custom scripts (Google Tag Manager, Facebook Pixel).
2. Dev Tools - Here you can activate pre-bundled libraries with ready-to-go implementation with Vulcan Blocks and load critical resources.