<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;

class Single extends Component
{

    public $student;

    public function mount(Student $Student){
        $this->student = $Student;
    }

    public function delete()
    {
        $this->student->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Student') ]) ]);
        $this->emit('studentDeleted');
    }

    public function render()
    {
        return view('livewire.admin.student.single')
            ->layout('admin::layouts.app');
    }
}
