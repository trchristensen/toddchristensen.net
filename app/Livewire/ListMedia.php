<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\GenericMediaHolder;
use Illuminate\Support\Facades\Storage;

class ListMedia extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    // protected static string $resource = Media::class;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('media')
                    // ->model(GenericMediaHolder::class)
                    ->disk('spaces')
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $attachment = array_values($this->data['media'])[0] ?? null;

        if ($attachment) {
            // Store the file in a temporary location
            $path = $attachment->store('temp', 'local');

            $mediaHolder = new GenericMediaHolder();
            $mediaItem = $mediaHolder
                ->addMediaFromDisk($path, 'local') // Add the file from the temporary location
                ->toMediaCollection('default', 'spaces');

            // Optionally, you can delete the temporary file if you don't need it anymore
            Storage::disk('local')->delete($path);
        }
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Media::query())
            ->columns([
                ViewColumn::make('image')->view('components.media-table-image')->label('Image'),
                TextColumn::make('id')->label('ID'),
                TextColumn::make('name')->label('Name'),
                TextColumn::make('collection_name')->label('Collection Name'),
                TextColumn::make('file_name')->label('File Name'),
                TextColumn::make('model_type')->label('Model Type'),
                TextColumn::make('model_id')->label('Model ID'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // delete
                Action::make('delete')
                    ->requiresConfirmation()
                    ->action(fn(Media $record) => $record->delete())
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.list-media');
    }
}