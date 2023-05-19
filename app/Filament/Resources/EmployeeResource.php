<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use Domain\Employee\Actions\RestoreEmployeeAction;
use Domain\Employee\Actions\RestoreEmployeeBulkAction;
use Domain\Employee\Actions\DeleteEmployeeAction;
use Domain\Employee\Actions\DeleteEmployeeBulkAction;
use Domain\Employee\Actions\ForceDeleteEmployeeAction;
use Domain\Employee\Actions\ForceDeleteEmployeeBulkAction;
use Domain\Employee\Models\Employee;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    // protected static ?string $recordTitleAttribute = 'first_name';

    protected static ?string $navigationGroup = 'Employee';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('First Name')
                    ->required(),
                Forms\Components\TextInput::make('middle_name')
                    ->label('Middle Name')
                    ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->label('Last Name')
                    ->required(),
                Forms\Components\Select::make('position_id')
                    ->label('Position')
                    ->relationship('position', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('first_name')
                    ->label('First Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Last Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->date('d/m/y')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('last_name', 'asc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->using(fn (Employee $record) => DB::transaction(fn () => app(DeleteEmployeeAction::class)->execute($record))),
                Tables\Actions\RestoreAction::make()
                    ->using(fn (Employee $record) => DB::transaction(fn () => app(RestoreEmployeeAction::class)->execute($record))),
                Tables\Actions\ForceDeleteAction::make()
                    ->using(fn (Employee $record) => DB::transaction(fn () => app(ForceDeleteEmployeeAction::class)->execute($record))),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->using(fn (Collection $records) => $records->each(fn (Employee $record) => DB::transaction(fn () => app(DeleteEmployeeBulkAction::class)->execute($record))))
                    ->authorize('deleteBulkAction'),
                Tables\Actions\ForceDeleteBulkAction::make()
                    ->using(fn (Collection $records) => $records->each(fn (Employee $record) => DB::transaction(fn () => app(ForceDeleteEmployeeBulkAction::class)->execute($record))))
                    ->authorize('forceDeleteBulkAction'),
                Tables\Actions\RestoreBulkAction::make()
                    ->using(fn (Collection $records) => $records->each(fn (Employee $record) => DB::transaction(fn () => app(RestoreEmployeeBulkAction::class)->execute($record))))
                    ->authorize('restoreBulkAction'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
            'view' => Pages\ViewEmployee::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
            // ->when(
            //     ! Filament::auth()->user()->isSuperAdmin(),
            //      fn (Builder $query) => $query->whereBelongsTo(Filament::auth()->user())
            // );
    }

    // protected static function getNavigationBadge(): ?string
    // {
    //     return self::getModel()::count();
    // }
}
