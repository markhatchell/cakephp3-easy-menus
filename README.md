# EasyMenus plugin for CakePHP3
[![Latest Stable Version](https://poser.pugx.org/markhatchell/cakephp3-easy-menus/v/stable)](https://packagist.org/packages/markhatchell/cakephp3-easy-menus) [![Total Downloads](https://poser.pugx.org/markhatchell/cakephp3-easy-menus/downloads)](https://packagist.org/packages/markhatchell/cakephp3-easy-menus) [![Latest Unstable Version](https://poser.pugx.org/markhatchell/cakephp3-easy-menus/v/unstable)](https://packagist.org/packages/markhatchell/cakephp3-easy-menus) [![License](https://poser.pugx.org/markhatchell/cakephp3-easy-menus/license)](https://packagist.org/packages/markhatchell/cakephp3-easy-menus)

## Notice
This plugin is still in a development phase.

If you wish to contribute please let me know.

The plugin should now work pretty well.

The requirements are not included in composer as you should include them directly with composer or a CDN.

### Features
- Store your menu in a database table so that your load-balanced servers can all access and display the same menu without having to update the source.
- Nested menu structure.
- Based on Bootstrap nav.
- Manual or Route based link types.
- Collects all the routes and offers them for you to use them as a menu item.
- Class parameters for the menu to aid with styling.
- Configurable menu display options.

### Upcoming Features
- √ Class parameters for the menu to aid with styling.
- Showing and hiding menu items based on if the user is authenticated.
- Regeneration of static link field in the db based on the route info stored in the params field.
- Role based access, this will require the users of this plugin to have a role field on their user entities.
- Caching for the menus.

### Requirements
- bootstrap - used for form layout and menu display.
- jQuery - used for form layout and menu display.

###With composer:

```
composer require elboletaire/twbs-cake-plugin:~3.0
composer require twbs/bootstrap:~3.0

composer require components/jquery:1.*
#[OR]
composer require components/jquery:2.* #jQuery 2.x (IE <9 not supported)
```

###With CDN:

```
$this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
$this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css');
$this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');

$this->Html->script('http://code.jquery.com/jquery-1.11.3.min.js');
//[OR]
$this->Html->script('http://code.jquery.com/jquery-2.1.4.min.js'); //jQuery 2.x (IE <9 not supported)

```

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require 'markhatchell/cakephp3-easy-menus:dev-master'
```

## Usage

Add this to config/bootstrap.php to activate the plugin:
```
Plugin::load('EasyMenus', ['bootstrap' => false, 'routes' => true]);
```

Install the table for EasyMenus:
```
bin/cake migrations migrate --plugin EasyMenus
```

To display the menu:
Add this to /src/Controller/AppController.php
```
use EasyMenus\Controller\Component\EasyMenusComComponent;
...
    public function initialize()
    {
        parent::initialize();
        ...
        $this->loadComponent('EasyMenus.EasyMenusCom');
    }
```

Add this to src/template/layout/default.ctp:
```
<?=$this->Element('EasyMenus.easymenu')?>
```

To access the menu admin UI navigate to:
```
/admin/EasyMenus
```
