<?php

namespace App\Http\Livewire\Admin\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    
    protected $rules = [
        'name' => 'required',
        'email' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Student') ])]);
        
        Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.student.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Student') ])]);
    }
}
