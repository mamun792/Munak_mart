<?php

use App\Models\Category;

function list_of_category() {
    return Category::latest()->get();
}

?>
