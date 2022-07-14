@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('service.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text" id="title"
                                                value="{{ old('name', $edit_service['name']) }}"
                                                class="form-control @error('name') is-invalid @enderror"" name="name"
                                                placeholder="Service Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="text-danger border-bottom col-md-12">Variations</label>
                                    <div class="col-md-12" id="variation-area">
                                        {{-- <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" id="title"
                                                        value=" "
                                                        class="form-control" name="title" placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Charges</label>
                                                    <input type="number" id="charges"
                                                        value="  "
                                                        class="form-control" name="charges" placeholder="Charges">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 pt-30">
                                                <button type="button" class="btn btn-light text-dark"
                                                    data-color="#ffffff"><i class="m-1 fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-dark d-none" data-color="#ffffff"><i
                                                        class="m-1 fa fa-minus"></i></button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="is_edit" value="{{ json_encode($is_edit) }}" />
@endsection
@section('script')
    <script>
        let data ={
            variations:[1,2,3,4],
        }


        function start() {
            let is_edit = JSON.parse($('#is_edit').val());
            if (is_edit) {

            } else {
                RenderAddVariation();
            }
        }


        function RenderAddVariation() {

            data.variations.map(function(item,index){
                let minus_btn = `<button type="button" class="btn btn-dark d-none" data-color="#ffffff"><i
                                        class="m-1 fa fa-minus"></i></button>`;
                let plus_btn = `<button type="button" class="btn btn-light text-dark"
                                    data-color="#ffffff"><i class="m-1 fa fa-plus"></i></button>`;
                let buttons = plus_btn;

                let html = `<div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="title"
                                        value=" "
                                        class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Charges</label>
                                    <input type="number" id="charges"
                                        value="  "
                                        class="form-control" name="charges" placeholder="Charges">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12 pt-30">
                                ${buttons}
                            </div>
                        </div>`;
                    $('#variation-area').append(html);
            });
        }

        function RenderEditVariation() {

        }


        start();
    </script>
@endsection
