<?php

namespace App\Livewire\Posts;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Component;

class ViewPost extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    public $post; // Declare the $post property

    public function mount($post) // You can use the mount method to initialize the $post property
    {
        $this->post = $post;
    }


    public function postInfoList(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->post)
            ->schema([
                TextEntry::make('title'),
                ViewEntry::make('featured_image')
                    ->view('components.view-featured-image', [
                        'image' => $this->post->media,
                    ]),
                TextEntry::make('body'),

            ]);
    }

    public function render()
    {
        return view('livewire.posts.view-post');
    }
}