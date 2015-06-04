@extends('laravel-admin::layout')
@section('title')
    Статические страницы
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Статические страницы</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Страницы
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.page.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить страницу"
                           class="btn btn-default btn-mini"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <!--<th>#</th>  -->
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Содержание</th>
                            <th>Мета тег description</th>
                            <th>Мета тег tags</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ mb_substr($page->article, 0, 100) . "..." }}</td>
                                    <td>{{ mb_substr($page->description, 0, 100) . "..." }}</td>
                                    <td>{{ $page->tags }}</td>
                                    <td>
                                        <a href="{{route('admin.page.edit',['id'=>$page->id])}}"
                                            data-toggle="tooltip"
                                            data-original-title="Редактитровать"
                                            class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['route' => ['admin.page.destroy', $page->id],
                                        'class' => 'form-horizontal confirm',
                                        'role' => 'form', 'method' => 'DELETE']) !!}
                                            <button data-toggle="tooltip"
                                                data-original-title="Удалить"
                                                type="submit" class="btn btn-danger confirm-btn">
                                                    <i class="fa fa-trash-o"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="text-center">{!! $pages->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
