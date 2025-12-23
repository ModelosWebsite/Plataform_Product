<div wire:ignore.self class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header bg-primary text-white mb-0 p-2">
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
                  <h6 for="category_id" class="form-label">Subcategoria</h6>
                  <select class="form-control form-control-sm shadow-none" wire:model="idsubcat">
                      <option>Selecione a subcategoria</option>
                                @forelse($subcategories as $category)
                                    <option value="{{ $category['reference'] ?? '' }}">{{ $category['subcategory'] ?? '' }}</option>
                                @empty
                                @endforelse
                        </select>
                  @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="category_id" class="form-label">Origem</h6>
                  <select class="form-control form-control-sm shadow-none" wire:model="idorigen">
                      <option>Selecione a origem</option>
                        @forelse($origins as $origin)
                            <option value="{{ $origin['reference'] ?? '' }}">{{ $origin['subcategory'] ?? '' }}</option>
                        @empty
                        @endforelse
                  </select>
                  @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="description" class="form-label">Nome do Produto <span class="text-danger">*</span></h6>
                  <input class="form-control form-control-sm shadow-none" type="text" placeholder="Insira o nome do produto" wire:model="description">
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="longDescription">Descrição</h6>
                  <textarea wire:model="longdescription" class="form-control form-control-sm shadow-none" id="longDescription" cols="30" rows="3"></textarea>
                  @error('longdescription') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="price" class="form-label">Preço <span class="text-danger">*</span></h6>
                  <input class="form-control form-control-sm shadow-none" min="1" type="number" placeholder="Insira o preço" wire:model="price">
                  @error('price') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="form-group">
                  <h6 for="qtd" class="form-label">Quantidade <span class="text-danger">*</span></h6>
                  <input class="form-control form-control-sm shadow-none" min="1" type="number" placeholder="Quantidade" wire:model="qtd">
                  @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                <button wire:click.prevent="{{ $editing ? 'updateItem' : 'createItem' }}"
                    type="button" class="btn btn-primary btn-sm flex items-center justify-center gap-2"
                    wire:loading.attr="disabled">
                    <!-- Ícone de loading visível apenas enquanto o método está a executar -->
                    <span wire:loading wire:target="{{ $editing ? 'updateItem' : 'createItem' }}">
                        <i class="fas fa-spinner fa-spin"></i> A processar
                    </span>

                    <!-- Texto do botão -->
                    <span wire:loading.remove wire:target="{{ $editing ? 'updateItem' : 'createItem' }}">
                        {{ $editing ? 'Salvar Alterações' : 'Salvar' }}
                    </span>
                </button>

          </div>

      </div>
  </div>
</div>