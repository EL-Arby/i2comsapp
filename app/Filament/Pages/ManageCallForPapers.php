<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class ManageCallForPapers extends Page
{
    protected static ?string $title = 'Call for Papers';

    protected static ?string $navigationLabel = 'Call for Papers';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Website';

    protected static ?int $navigationSort = 2;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'call_for_papers_title' => SiteSetting::getValue('call_for_papers_title', 'Call for Papers'),
            'call_for_papers_heading' => SiteSetting::getValue('call_for_papers_heading', 'Call for Papers'),
            'call_for_papers_lead' => SiteSetting::getValue('call_for_papers_lead', 'Submit your abstracts and research papers related to AI, digital transformation, ethics, and practical applications in developing nations.'),
            'call_for_papers_abstract_deadline' => SiteSetting::getValue('call_for_papers_abstract_deadline', 'August 31, 2026'),
            'call_for_papers_full_deadline' => SiteSetting::getValue('call_for_papers_full_deadline', 'October 15, 2026'),
            'call_for_papers_notification_deadline' => SiteSetting::getValue('call_for_papers_notification_deadline', 'November 15, 2026'),
            'call_for_papers_brochure_title' => SiteSetting::getValue('call_for_papers_brochure_title', 'Download Conference Brochure'),
            'call_for_papers_brochure_lead' => SiteSetting::getValue('call_for_papers_brochure_lead', 'Get the complete Call for Papers brochure with all information about the conference'),
            'call_for_papers_brochure_label' => SiteSetting::getValue('call_for_papers_brochure_label', 'Download Brochure'),
            'call_for_papers_brochure_path' => SiteSetting::getValue('call_for_papers_brochure_path', 'storage/I2comsapp2024_Call4Papers.pdf'),
            'call_for_papers_guidelines_title' => SiteSetting::getValue('call_for_papers_guidelines_title', 'Submission Guidelines'),
            'call_for_papers_guidelines' => SiteSetting::getValue('call_for_papers_guidelines', "📝 Format: PDF or Word document (max 8 pages)\n📎 Font: Times New Roman, 12pt, 1.5 line spacing\n🏷️ Language: English (abstracts welcome in French or Arabic)\n👥 Authorship: Maximum 5 authors per paper\n📧 Correspondence: Provide email for all co-authors"),
            'call_for_papers_body' => SiteSetting::getValue('call_for_papers_body', ''),
            'call_for_papers_notes_title' => SiteSetting::getValue('call_for_papers_notes_title', '⚠️ Important Submission Notes'),
            'call_for_papers_note_1' => SiteSetting::getValue('call_for_papers_note_1', '✓ Papers must be submitted in PDF format'),
            'call_for_papers_note_2' => SiteSetting::getValue('call_for_papers_note_2', '✓ Use either Word or LaTeX template provided above'),
            'call_for_papers_note_3' => SiteSetting::getValue('call_for_papers_note_3', '✓ Ensure your paper follows the <strong>Springer LNNS formatting guidelines</strong>'),
            'call_for_papers_note_4' => SiteSetting::getValue('call_for_papers_note_4', '✓ Include a <strong>completed title page</strong> with authors\' information'),
            'call_for_papers_note_5' => SiteSetting::getValue('call_for_papers_note_5', '✓ Submit through EasyChair or email to: <strong>i2comsapp2026@email.com</strong>'),
            'call_for_papers_note_6' => SiteSetting::getValue('call_for_papers_note_6', '✓ Late submissions may not be accepted'),
            'call_for_papers_enabled' => SiteSetting::getValue('call_for_papers_enabled', '1'),
            'call_for_papers_force_open' => SiteSetting::getValue('call_for_papers_force_open', '0'),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        if (! empty($data['call_for_papers_brochure_upload'])) {
            $data['call_for_papers_brochure_path'] = 'storage/' . $data['call_for_papers_brochure_upload'];
        }

        unset($data['call_for_papers_brochure_upload']);

        foreach ($data as $key => $value) {
            SiteSetting::setValue($key, $value);
        }

        Notification::make()
            ->success()
            ->title('Call for Papers settings saved')
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
                Section::make('Page header')
                    ->schema([
                        TextInput::make('call_for_papers_title')
                            ->label('Page title')
                            ->required(),
                        TextInput::make('call_for_papers_heading')
                            ->label('Landing heading')
                            ->required(),
                        Textarea::make('call_for_papers_lead')
                            ->label('Header lead text')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Important dates')
                    ->schema([
                        TextInput::make('call_for_papers_abstract_deadline')
                            ->label('Paper submission')
                            ->required(),
                        TextInput::make('call_for_papers_full_deadline')
                            ->label('Camera ready date')
                            ->required(),
                        TextInput::make('call_for_papers_notification_deadline')
                            ->label('Acceptance decision date')
                            ->required(),
                    ])
                    ->columns(3),

                Section::make('Settings')
                    ->schema([
                        Checkbox::make('call_for_papers_enabled')
                            ->label('Enable submissions')
                            ->helperText('When unchecked, the submission link will be hidden on the public page'),

                        Checkbox::make('call_for_papers_force_open')
                            ->label('Force submissions open')
                            ->helperText('Ignore the submission deadline and keep submission link visible'),
                    ])
                    ->columns(1),

                Section::make('Brochure')
                    ->schema([
                        TextInput::make('call_for_papers_brochure_title')
                            ->label('Brochure section title')
                            ->required(),
                        Textarea::make('call_for_papers_brochure_lead')
                            ->label('Brochure lead text')
                            ->rows(2)
                            ->columnSpanFull(),
                        TextInput::make('call_for_papers_brochure_label')
                            ->label('Download button label')
                            ->required(),
                        FileUpload::make('call_for_papers_brochure_upload')
                            ->label('Upload brochure PDF')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->directory('')
                            ->preserveFilenames()
                            ->helperText('Le fichier sera stocké dans public/storage/I2comsapp2024_Call4Papers.pdf')
                            ->getUploadedFileNameForStorageUsing(fn ($file) => 'I2comsapp2024_Call4Papers.pdf')
                            ->columnSpanFull(),
                        TextInput::make('call_for_papers_brochure_path')
                            ->label('Brochure asset path')
                            ->helperText('Relative path inside public/, e.g. storage/I2comsapp2024_Call4Papers.pdf')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Guidelines & body')
                    ->schema([
                        TextInput::make('call_for_papers_guidelines_title')
                            ->label('Guidelines heading')
                            ->required(),
                        Textarea::make('call_for_papers_guidelines')
                            ->label('Guidelines text')
                            ->rows(6)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_body')
                            ->label('Full page HTML body override')
                            ->helperText('If set, this value replaces the default page layout. Use HTML if needed.')
                            ->rows(10)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Submission notes')
                    ->schema([
                        TextInput::make('call_for_papers_notes_title')
                            ->label('Notes section title')
                            ->required(),
                        Textarea::make('call_for_papers_note_1')
                            ->label('Note 1')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_note_2')
                            ->label('Note 2')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_note_3')
                            ->label('Note 3')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_note_4')
                            ->label('Note 4')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_note_5')
                            ->label('Note 5')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('call_for_papers_note_6')
                            ->label('Note 6')
                            ->rows(2)
                            ->columnSpanFull(),
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
