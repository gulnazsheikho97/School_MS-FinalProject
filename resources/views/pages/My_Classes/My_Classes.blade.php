@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main-trans.title_Classespage') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main-trans.title_Classespage') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('main-trans.add_class') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('main-trans.Name_class') }}</th>
                            <th>{{ trans('main-trans.Name_Grade') }}</th>
                            <th>{{ trans('main-trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($My_Classes as $My_Class)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $My_Class->name_class}}</td>
                                <td>{{ $My_Class->Grades->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $My_Class->id }}"
                                        title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $My_Class->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                               {{ trans('main-trans.edit_class') }}
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <!-- edit_form -->
                                           <form action="{{route('classrooms.update','test')}}" method="post">
                                               {{ method_field('patch') }}
                                               @csrf
                                               <div class="row">
                                                   <div class="col">
                                                       <label for="Name"
                                                              class="mr-sm-2">{{ trans('main-trans.Name_class') }}
                                                           :</label>
                                                       <input id="Name" type="text" name="Name"
                                                              class="form-control"
                                                              value="{{ $My_Class->getTranslation('name_class', 'ar') }}"
                                                              required>
                                                       <input id="id" type="hidden" name="id" class="form-control"
                                                              value="{{ $My_Class->id }}">
                                                   </div>
                                                   <div class="col">
                                                       <label for="Name_en"
                                                              class="mr-sm-2">{{ trans('main-trans.Name_class_en') }}
                                                           :</label>
                                                       <input type="text" class="form-control"
                                                              value="{{ $My_Class->getTranslation('name_class', 'en') }}"
                                                              name="Name_en" required>
                                                   </div>
                                               </div><br>
                                               <div class="form-group">
                                                   <label
                                                       for="exampleFormControlTextarea1">{{ trans('main-trans.Name_Grade') }}
                                                       :</label>
                                                   <select class="form-control form-control-lg"
                                                           id="exampleFormControlSelect1" name="grade_id">
                                                       <option value="{{ $My_Class->Grades->id }}">
                                                           {{ $My_Class->Grades->name }}
                                                       </option>
                                                       @foreach ($Grades as $Grade)
                                                           <option value="{{ $Grade->id }}">
                                                               {{ $Grade->name }}
                                                           </option>
                                                       @endforeach
                                                   </select>

                                               </div>
                                               <br><br>

                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                   <button type="submit"
                                                           class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                               </div>
                                           </form>

                                       </div>
                                   </div>
                               </div>
                           </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                               {{ trans('main-trans.delete_class') }}
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{route('classrooms.destroy','test')}}" method="post">
                                               {{ method_field('Delete') }}
                                               @csrf
                                               {{ trans('main-trans.Warning_Grade') }}
                                               <input id="id" type="hidden" name="id" class="form-control"
                                                      value="{{ $My_Class->id }}">
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">{{ trans('main-trans.Close') }}</button>
                                                   <button type="submit"
                                                           class="btn btn-danger">{{ trans('main-trans.submit') }}</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>

                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main-trans.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{route('classrooms.store')}}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('main-trans.Name_class') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_class"  />
                                        </div>


                                        <div class="col">
                                            <label for="name"
                                                class="mr-sm-2">{{ trans('main-trans.Name_class_en') }}
                                                :</label>
                                            <input class="form-control" type="text" name="name_class_en" />
                                        </div>


                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('main-trans.Name_Grade') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="grade_id">
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="name_en"
                                                class="mr-sm-2">{{ trans('main-trans.Processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('main-trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('main-trans.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
</div>

</div>

<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
