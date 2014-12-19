_sBS - Based on underscore and bootstrap WordPress theme
===

Hi. I'm a starter theme called `_sBS`, or `underscores Bootstrap`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* [Bootstrap](getbootstrap.com) version 3.3.1 included
* [FontAwesome](fontawesome.io) version 4.2.0 included
* [WP Bootstrap Navwalker](twittem.github.io/wp-bootstrap-navwalker) included with some customization
* [SmartMenus](www.smartmenus.org) version 0.9.7
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in `inc/custom-header.php` that can be activated by uncommenting one line in `functions.php` and adding the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/extras.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.


Getting Started
---------------

After download this theme, the first thing you want to do is copy the `_sBS` directory and change the name to something else (like, say, `megatherium`), and then you'll need to do a five-step find and replace with the name in all the templates

1. Search for `'_sBS'` (inside single quotations) to capture the text domain.
2. Search for `_sBS_` to capture all the function names.
3. Search for `Text Domain: _sBS` in style.css.
4. Search for <code>&nbsp;_sBS</code> (with a space before it) to capture DocBlocks.
5. Search for `_sBS-` to capture prefixed handles.

OR

* Search for: `'_sBS'` and replace with: `'megatherium'`
* Search for: `_sBS_` and replace with: `megatherium_`
* Search for: `Text Domain: _sBS` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp;_sBS</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `_sBS-` and replace with: `megatherium-`

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

This theme based on [underscores](https://github.com/Automattic/_s)

Good luck!