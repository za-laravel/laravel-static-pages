@extends('laravel-admin::layout')

@section('title')
    Создать страницу
@stop

@section('js')
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
             tinymce.init({
                selector: 'textarea',
                plugin: 'a_tinymce_plugin',
                a_plugin_option: true,
                a_configuration_option: 400
            });
            $('#tags').tagsinput();
            $('#article, #description').autogrow();
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать страницу</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Статическая страница
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('laravel-static-pages::errorBasic')

                            {!! Form::model($page, ['route'=>['admin.page.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('laravel-static-pages::_form')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
