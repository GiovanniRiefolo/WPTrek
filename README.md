## WP Trek Requirements
WP Trek requires [Node.js](https://nodejs.org) v 6.9.x or newer. You don't need to understand Node or Gulp, just be sure that a the development tools are installed.

## Getting Started
### Download WP Trek and install dependencies with npm

````bash
$ cd your-project-folder/wp-content-theme/
$ git clone git@github.com:GiovanniRiefolo/WPTrek.git theme-folder
$ cd theme-folder
$ npm install
````

Once you did it, WP Trek should be installed an fully running on your local machine. If you prefer you can manually teleport WP Trek files in your project folder. Be sure you, or Scotty, to run `npm install` once file are 100% moved into the theme folder.

![](https://media1.tenor.com/images/e5acbf1cf1c0ad287cdca3251c384a9f/tenor.gif?itemid=11313969)

### Start theme development

Before to start theme development update `gulpfile.js:18` with your local development URL. 

Once you did it you can run 
````bash
$ npm engage
````
to start watching file changes or 
````bash
$ npm take-us-out
````
to for browser refresh with BrowserSync. 

