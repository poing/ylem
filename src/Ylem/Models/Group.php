<?php

namespace Ylem\Models;

use Baum\Node;

class Group extends Node
{
    public function user() {
        return $this->hasOne(User::class);
    }

    public function org() {
        return $this->hasOne(Organization::class);
    }
}
