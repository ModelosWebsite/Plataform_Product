<div wire:ignore>
    <div class="col-xl-6">
        <form wire:submit.prevent="storecolor" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">Selecione uma cor Backgroud</label>
                <input type="color" wire:model="codigo" name="codigo" class="form-control form-control-color">
            </div>

            <div class="form-group">
                <label class="form-label">Selecione uma cor Para as letra</label>
                <input type="color" wire:model="letra" name="letra" class="form-control form-control-color">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        </form>
    </div>
</div>