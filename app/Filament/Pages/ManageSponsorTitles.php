<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
class ManageSponsorTitles extends Page
{
    protected static ?string $title = 'Sponsor Sections';

    protected static ?string $navigationLabel = 'Sponsor Sections';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|UnitEnum|null $navigationGroup = 'Website';

    protected static ?int $navigationSort = 3;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'platinum_sponsors_title' => SiteSetting::getValue('platinum_sponsors_title', '💎 Platinum Sponsors'),
            'platinum_sponsors_subtitle' => SiteSetting::getValue('platinum_sponsors_subtitle', 'Our premier partners'),
            'gold_sponsors_title' => SiteSetting::getValue('gold_sponsors_title', '🏆 Gold Sponsors'),
            'gold_sponsors_subtitle' => SiteSetting::getValue('gold_sponsors_subtitle', 'Key strategic partners'),
            'silver_sponsors_title' => SiteSetting::getValue('silver_sponsors_title', '✨ Silver Sponsors'),
            'silver_sponsors_subtitle' => SiteSetting::getValue('silver_sponsors_subtitle', 'Supporting organizations'),
            'bronze_sponsors_title' => SiteSetting::getValue('bronze_sponsors_title', '🤝 Bronze Partners'),
            'bronze_sponsors_subtitle' => SiteSetting::getValue('bronze_sponsors_subtitle', 'Community supporters'),
            'collaborators_title' => SiteSetting::getValue('collaborators_title', 'Collaborators'),
            'collaborators_subtitle' => SiteSetting::getValue('collaborators_subtitle', 'Academic partners'),
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
            ->title('Sponsor section titles saved')
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
                Section::make('Platinum Sponsors')
                    ->schema([
                        TextInput::make('platinum_sponsors_title')
                            ->label('Section title')
                            ->required(),
                        TextInput::make('platinum_sponsors_subtitle')
                            ->label('Subtitle/description')
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Gold Sponsors')
                    ->schema([
                        TextInput::make('gold_sponsors_title')
                            ->label('Section title')
                            ->required(),
                        TextInput::make('gold_sponsors_subtitle')
                            ->label('Subtitle/description')
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Silver Sponsors')
                    ->schema([
                        TextInput::make('silver_sponsors_title')
                            ->label('Section title')
                            ->required(),
                        TextInput::make('silver_sponsors_subtitle')
                            ->label('Subtitle/description')
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Bronze Partners')
                    ->schema([
                        TextInput::make('bronze_sponsors_title')
                            ->label('Section title')
                            ->required(),
                        TextInput::make('bronze_sponsors_subtitle')
                            ->label('Subtitle/description')
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Collaborators')
                    ->schema([
                        TextInput::make('collaborators_title')
                            ->label('Section title')
                            ->required(),
                        TextInput::make('collaborators_subtitle')
                            ->label('Subtitle/description')
                            ->helperText('For academic sponsors'),
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
