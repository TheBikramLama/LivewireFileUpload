<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;
    public $upload_file;
    public $success_message;

    protected $rules = [
        "upload_file" => "file|max:1024000",  // 1000 MB
    ];

    public function render()
    {
        return view('livewire.file-upload');
    }

    public function uploadFile()
    {
        $this->reset('success_message');
        if ( $this->upload_file ) {
            $this->upload_file->store('files');
            $this->success_message = "File uploaded successfully";
            $this->reset('upload_file');
        }
    }
}
