<?php

namespace App\Observers;

use App\Models\Category;
use Debugbar;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the models category "creating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        $this->setSlug($category);
        $this->setLevel($category);
    }

    /**
     * Handle the models category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the models category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the models category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the models category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the models category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }

    /**
     * @param \App\Models\Category $category
     */
    protected function setSlug(Category $category)
    {
        if (empty($category->slug)){
            $category->slug = Str::slug($category->category_name);
        }
    }

    /**
     * @param \App\Models\Category $category
     */
    public function setLevel(Category $category)
    {
        $parent = $category->parent;
//        Debugbar::info('parent', $parent );
        $level = isset($parent) ? $parent->level + 1 : 1;
        $category->level = $level;
    }
}
