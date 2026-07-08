<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageHomeSponsors extends Page
{
    protected static ?string $title = 'Home Sponsors Section';

    protected static ?string $navigationLabel = 'Home Sponsors';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Website';

    protected static ?int $navigationSort = 4;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'home_sponsors_enabled' => SiteSetting::getValue('home_sponsors_enabled', '1'),
            'home_sponsors_title' => SiteSetting::getValue('home_sponsors_title', 'Featured Sponsors'),
            'home_sponsors_subtitle' => SiteSetting::getValue('home_sponsors_subtitle', 'Supporting the advancement of AI innovation'),
            'home_supported_by_label' => SiteSetting::getValue('home_supported_by_label', 'Strategic partners:'),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::setValue($key, $value);
        }

        Notification::make()
            ->success()
            ->title('Home sponsors section saved')
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
                Section::make('Section Settings')
                    ->schema([
                        Toggle::make('home_sponsors_enabled')
                            ->label('Display sponsors section')
                            ->helperText('Show or hide the sponsors section on the home page'),

                        TextInput::make('home_supported_by_label')
                            ->label('Supported by label')
                            ->helperText('Text shown in the supported-by section on the home page')
                            ->required(),

                        TextInput::make('home_sponsors_title')
                            ->label('Section title')
                            ->required(),

                        Textarea::make('home_sponsors_subtitle')
                            ->label('Section subtitle')
                            ->helperText('Brief description of the sponsors section'),
                    ])
                    ->columns(1),
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
                ->label('Save')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }
}
