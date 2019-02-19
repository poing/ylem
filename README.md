![](https://gitlab.com/poing/ylem/badges/master/coverage.svg)
![](https://gitlab.com/poing/ylem/badges/master/build.svg)

[![Coverage](https://gitlab.com/<namespace>/<project>/badges/<branch>/coverage.svg)](https://gitlab.com/<namespace>/<project>/)

> **ylem** /ˈiːlɛm/ *noun*
>
> (in the Big Bang theory) the primordial matter of the universe, originally conceived as composed of neutrons at high temperature and density.

# ylem
This is an implementation of the TMF632 Party Management API REST Specification in Laravel.  Supporting Individual, Organization, & Organizational Unit relational hierarchies.  

* [Quick Start](#quick-start)
```
composer require poing/ylem
php artisan ylem:seed
```


Like the primordial substance from which all matter is formed, this is *intended* as the **core** application fabric for business and consumer interaction.

## Directed Acyclic Graph (DAG)

Topological ordering and [directed acyclic graph](https://en.wikipedia.org/wiki/Directed_acyclic_graph) functions are provided for Laravel Eloquent models by the [`gazsp/baum`](https://packagist.org/packages/gazsp/baum) package.  *`baum/baum` is no longer maintained.*  While some *key* functions will be covered in this document, see the [complete documentation](https://github.com/gazsp/baum) for additional functions.

The use of the Dijkstras algorithm, to determine the shortest path, is **not** a *necessary* consideration of this project.  Dijkstras algorithm functionally is **not** provided by the `gazsp/baum` package *anyway*.

[Package discovery](https://laravel.com/docs/5.7/packages#package-discovery) for `gazsp/baum` is handled by the extra section of **this** packages `composer.json` file.  *Just to make it easier to use.*

## Recursive Functions

Recursive functions are **important** for *cyclining* through **all** elements in the tree.  This is because the `depth` of nodes and all decendants **will** be different.  *This is the **advantage** that DAG provides, you're not locked into a strict level of hierarchies.*

```
.
├── alpha
│   └── bravo
│       └── charlie
└── one
    └── two
        └── three
            └── four
                └── five
                    └── six
                        └── seven
                            └── eight
                                └── nine
                                    └── ten
                                        └── eleven
                                            └── twelve
```

### Blade

Below is an *example* of *recursive* iteration using the Blade templating engine provided with Laravel.  *Recursive iteration can be acheived with `PHP` and other languages **too**.*  Generating an unordered list output, *similar* to the tree *shown above*.

```php
    function getBlade()  // Function or Route
    {
        $roots = \App\DirectedAcyclicGraph::roots()->get();
        return view('roots', compact('roots'));
    }
```
```html
<!-- roots.blade.php -->
<ul>
    @foreach ($roots as $item)
        <li>{{ $item->someValue }}</li>
        @include('nodes', array('items' => $item->getImmediateDescendants()))
    @endforeach
</ul>
```
```html
<!-- nodes.blade.php -->
</ul>
    @foreach ($items as $item)
        <li>{{ $item->someValue }}</li>
        @include('nodes', array('items' => $item->getImmediateDescendants()))
    @endforeach
</ul>
```

## Quick Start

1. Create a Laravel Project

```bash
laravel new project_name
 -or-
composer create-project --prefer-dist laravel/laravel project_name
```

2. `cd project_name`
3. `composer require poing/ylem`
4. Publish the Laravel package
```
php artisan vendor:publish --provider Ylem\\Providers\\YlemServiceProvider
```
5. `php artisan migrate`
6. Seed the demo table *This could take a while, builds `10` root nodes with random nested itmes.*
```
php artisan db:seed --class=Ylem\\Database\\Seeds\\StubSeeder
```
7. Open `/ylem` in a browser.

### Stub Model and Data

You will see the random data *associated* to `Ylem\Models\Stub`.  This is simply a test table, once *seeded*, it can be used to *examine* the relationships.  Faker is used to create: Company Name, JOB TITLE, and People Name.

```php
$faker->company
└── strtoupper($faker->jobTitle)
    └── $faker->name
```

### php artisan tinker
Here are some `tinker` commands to check out:

```php
$node = Ylem\Models\Stub::find(50);
$node->isRoot();            // Checks if root node
$node->getRoot();           // Gets the root node
$node->parent()->get();     // Gets parent node, if not root
$node->siblings()->get();   // Gets siblings, sharing the same parent
$node->children()->get();   // Gets any children for this node
```
