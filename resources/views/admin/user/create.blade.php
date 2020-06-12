@extends('admin.layouts.app')
@section('title','User')
@section('breadcrumb','user dashboard')
@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 add_button"> 
            <div class="btn-group float-sm-right"> 
                <a href="{{ route('user.index') }}" class="btn btn-info"> <i class="fa fa-arrow-circle-left"></i> </i> Back to List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
           <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">User Form</h3>
                </div>
                {!! Form::open(['url' => '/sales','class'=>'property-form','files' => true]) !!} 
                    @include ('admin.user.form')
                {!! Form::close() !!}   
            </div>
        </div>
    </div>
</div>
@endsection