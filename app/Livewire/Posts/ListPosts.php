<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;


class ListPosts extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Post::query())
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                // TextColumn::make('excerpt')
                // TextColumn::make('author.name')
                //     ->label('Author')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make()
                    ->size(ActionSize::Small)
                    ->url(fn(Post $record): string => route('post.show', $record))

            ])
            ->bulkActions([
                // ...
            ]);
        // ->defaultGroup('category');

    }

    public function render()
    {
        return view('livewire.posts.list-posts');
    }
}