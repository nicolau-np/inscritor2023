{{Form::select('id_curso', $cursos->pluck('curso', 'id'), null, ['placeholder'=>"Curso", 'class'=>"form-control"])}}
