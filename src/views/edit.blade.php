@extends('laravel-admin::layout')

@section('title')
    Редактировать страницу
@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#article, #description').autogrow();

            CKEDITOR.replace( 'editor' );

            var page;
            var id = $('#form-edit').data('id');
            $.get('/page-translations/'+id, function(data){
                page = data;
            });

            $('#lang').change(function(){
                var lang = $(this).val();
                $('#title').val(page[lang].title);
                $('#article').val(page[lang].article);
                $('#description').val(page[lang].description);

                $('#tags').tagsinput('removeAll');
                $('#tags').tagsinput('add', page[lang].tags);
            });

            $('#title, #article, #description').keyup(function(){
                lang = $('#lang').val();
                field = $(this).attr('id');
                page[lang][field] = $(this).val();
            });

            /* Need to be debugged
             $('#tags').on('itemAdded', function(event) {
             lang = $('#lang').val();
             field = $(this).attr('id');
             page[lang][field] = $(this).val();
             });
             */
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать страницу</h1>
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

                            {!! Form::model($page, ['route'=>['admin.page.update', $page->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form', 'id'=>'form-edit', 'data-id' => $page->id]) !!}
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
