
<div class="form-group">
    {!! Form::label('title', '', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('title', '', ["class"=>"form-control",'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('article', '', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('article', null, ["class"=>"form-control", "id" => "editor","rows" => 25]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Meta description', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('description', '', ["class"=>"form-control", "rows" => 5]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Meta tags', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('tags', '', ["class"=>"form-control",
            "placeholder"=>'Meta tags', 'data-role' => "tagsinput"]) !!}
    </div>
</div>

<hr/>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('slug', null, ["class"=>"form-control",
            "placeholder"=>'Slug','required', 'pattern' => '^[\w\-]+$' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>