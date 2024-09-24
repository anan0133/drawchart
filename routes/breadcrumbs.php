<?php

/** Dashboard */
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push(__('text.hdr.dashboard'), route('admin.home.index'));
});

/** chart */
Breadcrumbs::register('chart', function($breadcrumbs) {
    $header = __('text.hdr.list_chart');
    $route = route('admin.chart.index');
    
    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_chart', function($breadcrumbs) {
    $header = __('text.hdr.create_chart');
    $route = route('admin.chart.create');
    
    $breadcrumbs->parent('chart');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_chart', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_chart');
    $route = route('admin.chart.edit', $id);

    $breadcrumbs->parent('chart');
    $breadcrumbs->push($header, $route);
});

/** Type */
Breadcrumbs::register('type', function($breadcrumbs) {
    $header = __('text.hdr.list_type');
    $route = route('admin.type.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_type', function($breadcrumbs) {
    $header = __('text.hdr.create_type');
    $route = route('admin.type.create');

    $breadcrumbs->parent('type');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_type', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_type');
    $route = route('admin.type.edit', $id);

    $breadcrumbs->parent('type');
    $breadcrumbs->push($header, $route);
});


/** FAQ */
Breadcrumbs::register('faq', function($breadcrumbs) {
    $header = __('text.hdr.list_faq');
    $route = route('admin.faq.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});

Breadcrumbs::register('edit_faq', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_faq');
    $route = route('admin.faq.edit', $id);

    $breadcrumbs->parent('faq');
    $breadcrumbs->push($header, $route);
});

/** Advertisement */
Breadcrumbs::register('advertisement', function($breadcrumbs) {
    $header = __('text.hdr.list_advertisement');
    $route = route('admin.advertisement.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_advertisement', function($breadcrumbs) {
    $header = __('text.hdr.create_advertisement');
    $route = route('admin.advertisement.create');

    $breadcrumbs->parent('advertisement');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_advertisement', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_advertisement');
    $route = route('admin.advertisement.edit', $id);

    $breadcrumbs->parent('advertisement');
    $breadcrumbs->push($header, $route);
});

/** Advertisement position */
Breadcrumbs::register('adv_position', function($breadcrumbs) {
    $header = __('text.hdr.list_adv_position');
    $route = route('admin.adv_position.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_adv_position', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_adv_position');
    $route = route('admin.adv_position.edit', $id);

    $breadcrumbs->parent('adv_position');
    $breadcrumbs->push($header, $route);
});

/** User */
Breadcrumbs::register('user', function($breadcrumbs) {
    $header = __('text.hdr.list_user');
    $route = route('admin.user.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_user', function($breadcrumbs) {
    $header = __('text.hdr.create_user');
    $route = route('admin.user.create');

    $breadcrumbs->parent('user');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_user', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_user');
    $route = route('admin.user.edit', $id);

    $breadcrumbs->parent('user');
    $breadcrumbs->push($header, $route);
});

/** Role */
Breadcrumbs::register('role', function($breadcrumbs) {
    $header = __('text.hdr.list_role');
    $route = route('admin.role.index');
    
    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_role', function($breadcrumbs) {
    $header = __('text.hdr.create_role');
    $route = route('admin.role.create');
    
    $breadcrumbs->parent('role');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_role', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_role');
    $route = route('admin.role.edit', $id);

    $breadcrumbs->parent('role');
    $breadcrumbs->push($header, $route);
});

/** Settings */
Breadcrumbs::register('setting', function($breadcrumbs) {
    $header = __('text.hdr.list_setting');
    $route = route('admin.setting.index');

    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_setting', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_setting');
    $route = route('admin.setting.edit', $id);

    $breadcrumbs->parent('setting');
    $breadcrumbs->push($header, $route);
});

/** Comment */
Breadcrumbs::register('comment', function($breadcrumbs) {
    $header = __('text.hdr.list_comment');
    $route = route('admin.comment.index');
    
    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_comment', function($breadcrumbs) {
    $header = __('text.hdr.create_comment');
    $route = route('admin.comment.create');
    
    $breadcrumbs->parent('role');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_comment', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_comment');
    $route = route('admin.comment.edit', $id);

    $breadcrumbs->parent('comment');
    $breadcrumbs->push($header, $route);
});

/** Menu item */
Breadcrumbs::register('menu_item', function($breadcrumbs) {
    $header = __('text.hdr.list_menu_item');
    $route = route('admin.menu_item.index');
    
    $breadcrumbs->parent('home');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('create_menu_item', function($breadcrumbs) {
    $header = __('text.hdr.create_menu_item');
    $route = route('admin.menu_item.create');
    
    $breadcrumbs->parent('menu_item');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('edit_menu_item', function($breadcrumbs, $id) {
    $header = __('text.hdr.edit_menu_item');
    $route = route('admin.menu_item.edit', $id);

    $breadcrumbs->parent('menu_item');
    $breadcrumbs->push($header, $route);
});
Breadcrumbs::register('order_menu_item', function($breadcrumbs) {
    $header = __('text.hdr.order_menu_item');
    $route = route('admin.menu_item.order');

    $breadcrumbs->parent('menu_item');
    $breadcrumbs->push($header, $route);
});