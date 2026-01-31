<?php

namespace Modules\CRM\app\Filament\Resources;

use Modules\CRM\app\Filament\Resources\CustomerResource\Pages;
use Modules\CRM\app\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('company')
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Section::make('Address')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->rows(2),
                        Forms\Components\TextInput::make('city')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('country')
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Sales Information')
                    ->schema([
                        Forms\Components\Select::make('stage')
                            ->options([
                                'lead' => 'Lead',
                                'contacted' => 'Contacted',
                                'qualified' => 'Qualified',
                                'proposal' => 'Proposal Sent',
                                'negotiation' => 'Negotiation',
                                'won' => 'Won',
                                'lost' => 'Lost',
                            ])
                            ->default('lead')
                            ->required(),
                        Forms\Components\Select::make('priority')
                            ->options([
                                1 => 'High',
                                2 => 'Medium',
                                3 => 'Low',
                            ])
                            ->default(3)
                            ->required(),
                        Forms\Components\TextInput::make('source')
                            ->maxLength(255)
                            ->placeholder('e.g., Website, Referral, Cold Call'),
                    ])->columns(3),

                Forms\Components\Section::make('Notes')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->rows(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('stage')
                    ->colors([
                        'gray' => 'lead',
                        'info' => 'contacted',
                        'warning' => 'qualified',
                        'primary' => 'proposal',
                        'secondary' => 'negotiation',
                        'success' => 'won',
                        'danger' => 'lost',
                    ]),
                Tables\Columns\BadgeColumn::make('priority')
                    ->formatStateUsing(fn ($state) => match($state) {
                        1 => 'High',
                        2 => 'Medium',
                        3 => 'Low',
                        default => 'N/A',
                    })
                    ->colors([
                        'danger' => 1,
                        'warning' => 2,
                        'success' => 3,
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('stage')
                    ->options([
                        'lead' => 'Lead',
                        'contacted' => 'Contacted',
                        'qualified' => 'Qualified',
                        'proposal' => 'Proposal Sent',
                        'negotiation' => 'Negotiation',
                        'won' => 'Won',
                        'lost' => 'Lost',
                    ]),
                Tables\Filters\SelectFilter::make('priority')
                    ->options([
                        1 => 'High',
                        2 => 'Medium',
                        3 => 'Low',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            'kanban' => Pages\KanbanCustomers::route('/kanban'),
        ];
    }
}
