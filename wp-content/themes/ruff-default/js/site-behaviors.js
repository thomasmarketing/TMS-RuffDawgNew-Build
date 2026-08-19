(function ($) {
    'use strict';

    $(document).ready(function () {
        var $siteNav = $('.site-nav');
        var isKeyboardNavigation = false;

        if (!$siteNav.length) {
            return;
        }

        /**
         * Detect keyboard navigation.
         */
        $(document).on('keydown', function (event) {
            if ('Tab' === event.key) {
                isKeyboardNavigation = true;
            }
        });

        /**
         * Switch back to pointer navigation.
         */
        $(document).on('mousedown touchstart', function () {
            isKeyboardNavigation = false;

            /*
             * Remove styles added by keyboard navigation,
             * allowing the existing mobile menu behavior to take control.
             */
            $siteNav
                .find('li.mega-menu > .sn-level-2')
                .each(function () {
                    this.style.removeProperty('display');
                });
        });

        /**
         * ADA: Keep mega menu open while navigating with keyboard.
         */
        $siteNav.on('focusin', 'li.mega-menu', function () {
            var submenu;

            if (!isKeyboardNavigation) {
                return;
            }

            submenu = $(this).children('.sn-level-2').get(0);

            if (submenu) {
                submenu.style.setProperty('display', 'flex', 'important');
            }
        });

        $siteNav.on('focusout', 'li.mega-menu', function () {
            var $item = $(this);

            setTimeout(function () {
                if (!$item.find(':focus').length) {
                    var submenu = $item.children('.sn-level-2').get(0);

                    if (submenu) {
                        submenu.style.removeProperty('display');
                    }
                }
            }, 0);
        });

        /**
         * Mobile menu accordion.
         */
        $siteNav.on('click', '.m-subnav-arrow', function () {
            var $arrow = $(this);
            var $item  = $arrow.parent('.menu-item-has-children');

            /*
             * Delay until the existing main.js click handler has finished.
             * Then close other menu items at the same level.
             */
            setTimeout(function () {
                if (!$item.hasClass('active')) {
                    return;
                }

                var $siblings = $item.siblings('.menu-item-has-children');

                $siblings.each(function () {
                    var $sibling = $(this);

                    $sibling.removeClass('active');

                    $sibling
                        .children('.m-subnav-arrow')
                        .removeClass('active');

                    $sibling
                        .children('.sub-menu')
                        .removeClass('active');

                    /*
                     * Reset any opened child menus inside
                     * the closed item.
                     */
                    $sibling
                        .find('.menu-item-has-children')
                        .removeClass('active');

                    $sibling
                        .find('.m-subnav-arrow')
                        .removeClass('active');

                    $sibling
                        .find('.sub-menu')
                        .removeClass('active');
                });
            }, 0);
        });

        $siteNav.on('click', '.menu-item-has-children > .sn-menu-link', function (event) {
            var $link = $(this);
            var href  = ($link.attr('href') || '').trim().toLowerCase();

            if ('' === href || '#' === href || 0 === href.indexOf('javascript:')) {
                event.preventDefault();

                $link
                    .siblings('.m-subnav-arrow')
                    .first()
                    .trigger('click');
            }
        });
    });

})(jQuery);