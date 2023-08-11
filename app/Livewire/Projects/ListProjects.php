<?php

namespace App\Livewire\Projects;

use App\Models\Post;
use App\Models\Project;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ListProjects extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;



    public function table(Table $table): Table
    {
        return $table
            ->query(Project::query())
            ->striped()
            ->paginated(false)
            ->columns([
                Stack::make([

                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        ->weight(FontWeight::SemiBold)
                        ->extraAttributes([
                            'class' => 'mb-1',
                        ]),
                    Tables\Columns\TextColumn::make('description')
                        // ->searchable()
                        ->words(50)
                        ->wrap()
                ])
            ])
            ->recordUrl(
                fn(Model $record): string => route('project.show', ['project' => $record]),
            )
            ->defaultGroup('status');
    }

    public function render(): View
    {
        return view('livewire.projects.list-projects');
    }
}