<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;

class Families extends Component
{
    use WithFileUploads;

    #[Rule('required|min:1|max:10|numeric')]
    public int $families_count = 7;

    #[Rule('required|min:2|max:10|numeric')]
    public int $members_per_family = 6;

    public array $families = [];
    public array $family_members = [];
    public array $family_member = [];
    public string $verso_text = '';

    #[Rule('image|max:1024')]
    public $photo;

    public function mount()
    {

    }

    public function generate() {
        dd($this->families);
    }

    public function updated( $name, $value ) {

        // $this->families[] = $this->family;
        // $this->family[] = $this->family_member;

    }

    public function render()
    {
        return view('livewire.families');
    }
}
