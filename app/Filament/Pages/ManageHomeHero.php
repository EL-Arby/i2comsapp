<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use App\Support\HeroBackground;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageHomeHero extends Page
{
    protected static ?string $title = 'Home hero';

    protected static ?string $navigationLabel = 'Home hero';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup = 'Website';

    protected static ?int $navigationSort = 0;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'hero_display_mode' => SiteSetting::getValue('hero_display_mode', 'single'),
            'hero_single_image' => SiteSetting::getValue('hero_single_image', 'maurit_2024'),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        SiteSetting::setValue('hero_display_mode', $data['hero_display_mode']);
        SiteSetting::setValue('hero_single_image', $data['hero_single_image'] ?? 'maurit_2024');

        Notification::make()
            ->success()
            ->title(__('Hero settings saved'))
            ->send();
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Radio::make('hero_display_mode')
                    ->label(__('Display mode'))
                    ->options([
                        'single' => __('Single image — pick one of the three assets below'),
                        'carousel' => __('Carousel — fade between hero-1, hero-2, and the current header image'),
                    ])
                    ->required()
                    ->inline()
                    ->live(),
                Select::make('hero_single_image')
                    ->label(__('Image when using single mode'))
                    ->options(HeroBackground::adminOptions())
                    ->required(fn (Get $get): bool => $get('hero_display_mode') === 'single')
                    ->visible(fn (Get $get): bool => $get('hero_display_mode') === 'single'),
                Placeholder::make('paths')
                    ->label(__('Asset paths (public/)'))
                    ->content(implode("\n", [
                        'images/hero-1.jpg',
                        'images/hero-2.jpg',
                        'images/heroimg.png',
                    ])),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    public function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions())
                    ->alignment($this->getFormActionsAlignment())
                    ->fullWidth($this->hasFullWidthFormActions())
                    ->key('form-actions'),
            ]);
    }

    /**
     * @return array<Action>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save'))
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }
}
