> **ylem** /ˈiːlɛm/ *noun*
>
> (in the Big Bang theory) the primordial matter of the universe, originally conceived as composed of neutrons at high temperature and density.

# ylem
This is an implementation of the TMF632 Party Management API REST Specification in Laravel.  Supporting Individual, Organization, & Organizational Unit relational hierarchies.  

Like the primordial substance from which all matter is formed, this is *intended* as the **core** application fabric for business and consumer interaction.

## Directed Acyclic Graph (DAG)

Topological ordering and [directed acyclic graph](https://en.wikipedia.org/wiki/Directed_acyclic_graph) functions are provided for Laravel Eloquent models by the [`gazsp/baum`](https://packagist.org/packages/gazsp/baum) package.  While some *key* functions will be covered in this document, see the [complete documentation](https://github.com/gazsp/baum) for additional functions.

The use of the Dijkstras algorithm, to determine the shortest path, is **not** a *necessary* consideration of this project.  Dijkstras algorithm functionally is **not** provided by the `gazsp/baum` package *either*.

## Recursive Functions

Recursive functions are **important** for *cyclining* through **all** elements in the tree.  This is because the `depth` of nodes and all decendants **will** be different.  *This is the **advantage** that DAG provides.*

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



