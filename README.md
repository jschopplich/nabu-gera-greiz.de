<p align="center">
  <a href="https://nabu-gera-greiz.de">
    <img src="public/assets/img/logo.svg" alt="Logo of NABU Gera-Greiz e.V." width="144" height="144">
  </a>
</p>

<h3 align="center">NABU Kreisverband Gera-Greiz e.V.</h3>

<p align="center">
  Source code & starterkit for other NABU district association websites
  <br>
  <a href="https://nabu-gera-greiz.de"><strong>Visit the website (German) »</strong></a>
  <br>
</p>

<br>

# NABU Gera-Greiz e.V.

This repository contains the complete source code of the website for the NABU (*Nature and Biodiversity Conservation Union*) district association Gera-Greiz.

Apart from being used for our NGO, you may use this setup and create a website for your local association. The content structure is kept generic and every bit is editable. So you and can adapt it for your own use with ease!

## Prerequisites

- Node.js with npm (only required to build the CSS & JS assets)
- PHP 7.4+

> Kirby is not a free software. You can try it for free on your local machine but in order to run Kirby on a public server you must purchase a [valid license](https://getkirby.com/buy).

## Setup

1. Duplicate the [`.env.example`](.env.example) as `.env` and optionally adapt its values depending on your environment (see below):

```bash
cp .env.example .env
```

2. Install npm dependencies:

```bash
npm install
```

**Note**: Composer dependencies are tracked in this repository by default. Running `composer install` isn't necessary.

## Usage

### Development

1. Perform development-related configuration changes to your `.env` file: 
   - `KIRBY_DEBUG` to `true`
   - `KIRBY_PANEL_INSTALL` to `true`

2. Build assets and watch for changes accordingly:

```bash
npm run dev
```

3. Run the PHP built-in web server for local development (requires composer to be installed) or serve the backend by a web server of your choice, like Valet.

```bash
composer serve
```

### Production

Build the frontend assets (CSS & JS files) to `public/assets`:

```bash
npm run build
```

If you have caching enabled, make sure to whipe the cache after each build:

```bash
rm -rf storage/cache/[folder-name-of-your-instance]
```

### Deployment

1. Clone the whole repository on your server:
   - `git clone git@github.com:johannschopplich/nabu-gera-greiz.de.git`
2. Duplicate [`.env.example`](.env.example) as `.env`:
   - `cp .env.example .env`
3. Adapt the following variables in your `.env`:
   - `KIRBY_CACHE` to `true` (recommended)
4. Install npm dependencies and build assets:
   - `npm i && npm run build`
5. Point your web server to the `public` folder.
6. For Apache web servers: Some hosting environments require to uncomment `RewriteBase /` in [`.htaccess`](public/.htaccess) to make site links work.
