<?php

namespace App\Livewire\projects;

use App\Models\Project;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\View;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Livewire\Component;

class ViewProject extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    public $project; // Declare the $project property

    public function mount($project) // You can use the mount method to initialize the $project property
    {
        $this->project = $project;
    }


    public function projectInfoList(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->project)
            ->schema([
                TextEntry::make('name')
                    ->weight(FontWeight::SemiBold)
                    ->label(''),
                ViewEntry::make('featured_image')
                    ->view('livewire.projects.view-project-image'),
                TextEntry::make('description')
                    ->label(''),
            ]);
    }

    public function render()
    {
        return view('livewire.projects.view-project');
    }
}