<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $student;

    
    protected $rules = [
        
    ];

    public function mount(Student $Student){
        $this->student = $Student;
        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Student') ]) ]);
        
        $this->student->update([
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.student.update', [
            'student' => $this->student
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Student') ])]);
    }
}
