# Openair Malans Theme

## Requirements
1. [Docker](https://www.docker.com/)
2. [NodeJS](http://gulpjs.com/)
3. [NPM](https://www.npmjs.com/)

## Getting Started

### Setup Wordpress
1. `git clone https://github.com/michiwieland/openairmalans-theme.git`
2. `docker-compose up`

### Setup environment
1. Install NodeJS: https://nodejs.org/en/download/
2. Update NPM: `npm install npm@latest -g`
3. Install Gulp: `npm install gulp-cli -g`
4. Change to project directory: `/path/to/openairmalans-theme`
5. Install dependencies: `npm install`
6. Build sources: `gulp`

## Folder structure
- Theme folder: /wp-content/themes/openairmalans/
- Development folder: /wp-content/themes/openairmalans/assets
- Compiled resources: /wp-content/themes/openairmalans/dist

## Install theme
1. Run gulp in the root directory: `gulp`
2. Copy the theme directory except `/assets` to your wordpress `themes` directory.
