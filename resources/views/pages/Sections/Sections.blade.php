@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main-trans.title_Sectionpage') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main-trans.title_Sectionpage') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('main-trans.add_section') }}</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($Grades as $Grade)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('main-trans.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('main-trans.Name_Class') }}</th>
                                                                    <th>{{ trans('main-trans.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->section_name }}</td>
                                                                        <td>{{ $list_Sections->My_classs->name_class }}
                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                               class="btn btn-outline-info btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#edit{{ $list_Sections->id }}">{{ trans('main-trans.Edit') }}</a>
                                                                            <a href="#"
                                                                               class="btn btn-outline-danger btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#delete{{ $list_Sections->id }}">{{ trans('main-trans.Delete') }}</a>
                                                                        </td>
                                                                    </tr>

                                                        <!--Edit Section-->
                                                        <div class="modal fade" id="edit{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                     <div class="modal-header">
                                                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                                                           {{ trans('main-trans.edit_Section') }}
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                     </div>
                                                                    <div class="modal-body">

                                                                      <form action="{{ route('sections.update','test') }}" method="POST">
                                                                          {{ method_field('patch') }}
                                                                          {{ csrf_field() }}
                                                                           <div class="row">
                                                                             <div class="col">
                                                                                <input type="text" name="section_name_Ar" class="form-control" value="{{ $list_Sections->getTranslation('section_name', 'ar') }}">
                                                                             </div>

                                                                              <div class="col">
                                                                                 <input type="text" name="section_name_En" class="form-control" value="{{ $list_Sections->getTranslation('section_name', 'en') }}">
                                                                                  <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_Sections->id }}">
                                                                              </div>

                                                                    </div>
                                                                    <br>
                                                                    <div class="col">
                                                                        <label for="inputName"  class="control-label">{{ trans('main-trans.Name_Grade') }}</label>
                                                                           <select name="grade_id" class="custom-select" >
                                                                              <!--placeholder-->
                                                                                <option value="{{ $Grade->id }}">
                                                                                    {{ $Grade->name }}
                                                                                </option>
                                                                                @foreach ($List_Grades as $list_Grade)
                                                                                 <option value="{{ $list_Grade->id }}">
                                                                                     {{ $list_Grade->name }}
                                                                                 </option>
                                                                                 @endforeach
                                                                            </select>
                                                                    </div>
                                                                    <br>

                                                                    <div class="col">
                                                                    <label for="inputName" class="control-label">{{ trans('main-trans.Name_Class') }}</label>
                                                                        <select name="class_id" class="custom-select">
                                                                            <option value="" >{{ trans('main-trans.Select_Class') }}
                                                                            </option>
                                                                             @foreach ($list_classes as $list_class)
                                                                            <option value="{{ $list_class->id }}"> {{ $list_class->name_class }}
                                                                        </option>
                                                                    @endforeach

                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('main-trans.Close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('main-trans.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                         id="delete{{ $list_Sections->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('main-trans.delete_Section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('sections.destroy','test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('main-trans.Warning_Section') }}
                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{ $list_Sections->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
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
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>

                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('main-trans.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('sections.store')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="section_name_Ar" class="form-control"
                                                       placeholder="{{ trans('main-trans.Section_name_ar') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="section_name_En" class="form-control"
                                                       placeholder="{{ trans('main-trans.Section_name_en') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('main-trans.Name_Grade') }}</label>
                                            <select name="grade_id" class="custom-select">
                                                <!--placeholder  onchange="console.log($(this).val())"-->
                                                <option value="" selected
                                                        disabled>{{ trans('main-trans.Select_Grade') }}
                                                </option>
                                                @foreach ($List_Grades as $list_Grade)
                                                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('main-trans.Name_Class') }}</label>
                                            <select name="class_id" class="custom-select">
                                                <option value="" selected disabled>{{ trans('main-trans.Select_Class') }}
                                                </option>
                                                 @foreach ($list_classes as $list_class)
                                                <option value="{{ $list_class->id }}"> {{ $list_class->name_class }}
                                            </option>
                                        @endforeach
                                            </select>
                                        </div>


                                </div>
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
            </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
            @toastr_js
            @toastr_render
            <!--
                <script>
                $(document).ready(function () {
                    $('select[name="grade_id"]').on('change', function () {
                        var grade_id = $(this).val();
                        if (grade_id) {
                            $.ajax({
                                url: "{{ URL::to('classes') }}/" + grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });

            </script>
         -->

@endsection
