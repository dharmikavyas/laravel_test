<div class="card-body">
    <div class="row">
        <div class="col-3">
            <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label>Name</label>
                {!! Form::text('name', null, ['class' => 'form-control ','required', 'placeholder'=>'Name']) !!}
                {!! $errors->first('name','<p class="text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-4">
           <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label>Name</label>
                {!! Form::text('name', null, ['class' => 'form-control ','required', 'placeholder'=>'Name']) !!}
                {!! $errors->first('name','<p class="text-danger">:message</p>') !!}
            </div>
        </div>
        <div class="col-5">
            <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                <label>Name</label>
                {!! Form::text('name', null, ['class' => 'form-control ','required', 'placeholder'=>'Name']) !!}
                {!! $errors->first('name','<p class="text-danger">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info">Submit</button>
    {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
</div>


