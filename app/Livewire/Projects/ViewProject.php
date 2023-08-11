<?php

namespace App\Livewire\projects;

use App\Models\Project;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Grid;
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
                Grid::make([
                    TextEntry::make('name')
                        ->weight(FontWeight::SemiBold)
                        ->label(''),
                    // visit page button

                ])
                ,
                ViewEntry::make('featured_image')
                    ->view('components.view-featured-image', [
                        'image' => $this->project->media,
                    ]),
                TextEntry::make('description')
                    ->label(''),
                Actions::make([
                    Action::make('url')
                        ->visible(fn() => $this->project->url)
                        ->label('Visit')
                        ->color('primary')
                        ->openUrlInNewTab()
                        ->icon('heroicon-m-link')
                        ->action(function () {
                            return redirect()->away($this->project->url);
                        }),
                ]),
            ]);
    }

    public function render()
    {
        return view('livewire.projects.view-project');
    }
}