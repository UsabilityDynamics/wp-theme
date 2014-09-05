Wordpress theme bootstrapper.

### Setting Up

Setup using Composer:

```
composer create-project \
  --stability=dev \
  --repository-url=http://repository.usabilitydynamics.com \
  UsabilityDynamics/wp-theme ./my-awesome-theme
```

After creating the project you could change the Git origin to your origin:
```
cd my-awesome-theme
git remote rename origin source
git remote add origin https://github.com/YourOrganization/my-awesome-theme.git
git push origin master
```

Or, duplicate repository:

```
mkdir my-awesome-theme
my-awesome-theme
git init
git remote add origin https://github.com/YourOrganization/my-awesome-theme.git
git remote add source https://github.com/usabilitydynamics/wp-theme.git
git fetch source
git pull source master
git push origin master
```

Or, fork this repository and then clone it locally
```
git clone git@github.com:YourOrganization/wp-theme.git
composer install --prefer-source
```

### Notes

* All custom LESS, fonts and JavaScript are stored in /static/assets.
* ComposerJS is used to install all dependencies, excluding any development-only Grunt tasks, which are defined in package.json.
* We use component-installer to have ComposerJS install process handle any dependencies that are ComponentJS compliant.
