<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('home'));
});

Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, url('category', $category->slug));
});

Breadcrumbs::register('subcategory', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('category');
    $breadcrumbs->push($category->name, url('sub-category', $category->slug));
});