<div  class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
    <div class="modal-dialog" role="document">
        {{ Form::open(array('class' => 'modal-content', 'id' => 'frmRegister')) }}
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-key"></i> Agregar usuario
                </h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="divModalError">
                </div>
                <div class="form-group">
                    {{ Form::label('role', __('Role')) }}
                    {{ Form::select('role', [], '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('name', __('Name')) }}
                    {{ Form::text('name', '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', __('Email')) }}
                    {{ Form::text('email', '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('campus', __('Campus')) }}
                    {{ Form::select('campus', [], '', array('class' => 'form-control', 'required' => 'required')) }}
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit(__('Save'), array('class' => 'btn btn-primary')) }}
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Cancelar
                </button>
            </div>
        {{ Form::close() }}
    </div>
</div>
