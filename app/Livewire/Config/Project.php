<?php

namespace App\Livewire\Config;

use App\Models\Project as ModelsProject;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Project extends Component
{
    use LivewireAlert, WithFileUploads;

    public $title, $image, $getproject, $projectId = null;

    public function mount()
    {
        $this->getProjects();
    }

    public function render()
    {
        return view('livewire.config.project', [
            'projects' => $this->getproject,
        ]);
    }

    private function handleFileUpload(): ?string
    {
        if ($this->image && !is_string($this->image)) {
            $fileName = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs("arquivos", $fileName);
            return $fileName;
        }

        return is_string($this->image) ? $this->image : null;
    }

    private function showAlert(string $type, string $title): void
    {
        $this->alert($type, strtoupper($title), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => false,
            'confirmButtonText' => 'OK',
        ]);
    }

    public function storeOrUpdateProject()
    {
        $this->validate([
            'title' => 'required|string|max:255',
        ]);

        $fileName = $this->handleFileUpload();

        if ($this->projectId) {
            // Atualizar
            $project = ModelsProject::findOrFail($this->projectId);
            $project->update([
                'title' => $this->title,
                'image' => $fileName,
            ]);

            $this->showAlert('success', 'Atualizado');
        } else {
            // Criar
            ModelsProject::create([
                'title' => $this->title,
                'company_id' => auth()->user()->company_id,
                'image' => $fileName,
            ]);

            $this->showAlert('success', 'Sucesso');
        }

        $this->reset(['title', 'image', 'projectId']);
        $this->getProjects();
    }

    public function edit($id)
    {
        $project = ModelsProject::find($id);
        if ($project) {
            $this->projectId = $project->id;
            $this->title     = $project->title;
            $this->image     = $project->image;
        }
    }

    public function getProjects()
    {
        $this->getproject = ModelsProject::where("company_id", auth()->user()->company_id)->get();
    }

    public function deleteProject($id)
    {
        ModelsProject::find($id)->delete();

        $this->showAlert('success', 'Eliminado');
        $this->getProjects();
    }
}