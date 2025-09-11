<div wire:ignore.self class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white mb-0">
              <h5 class="modal-title mb-0" id="exampleModalLabel">
                  {{ $editing ? 'Editar Produto' : 'Cadastrar Produto' }}
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span>&times;</span>
              </button>
          </div>

          <div class="modal-body">
              <div class="form-group">
                  <h6 for="image" class="form-label">Imagem</h6>
                  <input class="form-control form-control-sm shadow-none" type="file" wire:model="image">
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="category_id" class="form-label">Categoria</h6>
                  <select class="form-control form-control-sm shadow-none" wire:model="category_id">
                      <option>Selecione a categoria</option>
                      @if (isset($categories) and count($categories) > 0)
                        @foreach ($categories as $category)
                            <option value="{{ $category['category'] ?? '' }}">{{ $category['category'] ?? '' }}</option>
                        @endforeach
                      @endif
                  </select>
                  @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="description" class="form-label">Nome do Produto</h6>
                  <input class="form-control form-control-sm shadow-none" type="text" placeholder="Insira o nome do produto" wire:model="description">
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="longDescription">Descrição</h6>
                  <textarea wire:model="longdescription" class="form-control form-control-sm shadow-none" id="longDescription" cols="30" rows="3"></textarea>
                  @error('longdescription') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="price" class="form-label">Preço</h6>
                  <input class="form-control form-control-sm shadow-none" min="1" type="number" placeholder="Insira o preço" wire:model="price">
                  @error('price') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="qtd" class="form-label">Quantidade</h6>
                  <input class="form-control form-control-sm shadow-none" min="1" type="number" placeholder="Quantidade" wire:model="qtd">
                  @error('qtd') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
              <button wire:click.prevent="{{ $editing ? 'updateItem' : 'createItem' }}" type="button" class="btn btn-primary btn-sm">
                  {{ $editing ? 'Salvar Alterações' : 'Salvar' }}
              </button>
          </div>

      </div>
  </div>
</div>