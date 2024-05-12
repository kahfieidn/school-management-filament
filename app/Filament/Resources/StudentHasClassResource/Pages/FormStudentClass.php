<?php

namespace App\Filament\Resources\StudentHasClassResource\Pages;

use App\Models\Periode;
use App\Models\Student;
use App\Models\HomeRoom;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Actions\Concerns\HasForm;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Filament\Resources\StudentHasClassResource;
use App\Models\StudentHasClass;
use Filament\Forms\Contracts\HasForms;

class FormStudentClass extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string $resource = StudentHasClassResource::class;

    protected static string $view = 'filament.resources.student-has-class-resource.pages.form-student-class';

    public $student_id = [];
    public $home_room_id = '';
    public $periode_id = '';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    Select::make('student_id')
                        ->options(Student::all()->pluck('name', 'id'))
                        ->multiple()
                        ->columnSpan(3)
                        ->required(),
                    Select::make('home_room_id')
                        ->options(HomeRoom::all()->pluck('classroom.name', 'id'))
                        ->required(),
                    Select::make('periode_id')
                        ->options(Periode::all()->pluck('name', 'id'))
                        ->required(),
                ])->columns(3)
        ];
    }

    public function save(){
        $student_id = $this->student_id;
        $insert = [];

        foreach($student_id as $row){
            array_push($insert, [
                'student_id' => $row,
                'home_room_id' => $this->home_room_id,
                'periode_id' => $this->periode_id,
                'is_open' => 1
            ]);
        }
        StudentHasClass::insert($insert);

        return redirect()->to('/admin/student-has-classes');
    }
}
