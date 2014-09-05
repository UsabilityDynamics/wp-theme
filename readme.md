Wordpress theme bootstrapper.

### Setting Up

Setup for theme development:
```
composer install --prefer-dist
```

Setup for dependency development:
```
composer install --prefer-source
```

### Notes

* All custom LESS, fonts and JavaScript are stored in /static/assets.
* ComposerJS is used to install all dependencies, excluding any development-only Grunt tasks, which are defined in package.json.
* We use component-installer to have ComposerJS install process handle any dependencies that are ComponentJS compliant.
