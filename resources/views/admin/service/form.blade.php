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
                    <form action="{{ $route }}" method="POST" id="service-form">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text"
                                                value="{{ old('name', $edit_service['name']) }}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Service Name" id="name" form="service-form">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" id="category_id"  form="service-form" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                                                <option value="">Select Categroy</option>
                                                @foreach ($categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label class="text-danger border-bottom col-md-12">Variations</label>
                                    <button type="button" class="btn btn-light text-dark"  onclick="addVariant()" data-color="#ffffff"><i
                                            class="m-1 fa fa-plus"></i></button>
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
                                    <div class="col-md-12 mt-30">
                                        <button type="submit" form="service-form" class="btn btn-primary">{{$button}}</button>
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
        let data = {
            name:'',
            category_id:'',
            is_active:0,
            variations: [],
            variations_count: 0,
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

                let html = `<div class="row variant_row_${item.id}">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" id="title"
                                        value="${item.title}"  form="service-form"
                                        class="form-control" name="title[]" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 ">
                                <div class="form-group">
                                    <label>Charges</label>
                                    <input type="number" min="0" id="charges"
                                        value="${item.price}"  form="service-form"
                                        class="form-control" name="charges[]" placeholder="Charges">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-12 pt-30">
                               <button type="button" class="btn btn-dark" onclick="RemoveVariant(${item})" data-color="#ffffff"><i
                                        class="m-1 fa fa-minus"></i></button>
                            </div>
                        </div>`;
                $('#variation-area').append(html);
            });
        }

        function RenderEditVariation() {

        }

        function addVariant() {
            // data.variations =[];
             $('#variation-area').html('');
            data.variations.push({
                id: data.variations_count++,
                title:'',
                price:0
            });
            data.variations_count++,
            RenderAddVariation();
            console.log(data.variations);
        }
        function RemoveVariant(row_index) {
            console.log(row_index);
             data.variations.slice(drow_index);
            data.variations_count--,
            RenderAddVariation();
        }




        start();



        $(function () {
            $('#service-form').submit(function () {
                // if ($(this)[0].checkValidity()) {
                    data.category_id = $('#category_id').val();
                    data.name = $('#name').val();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: {
                            _token: "{{ csrf_token() }}",
                            data:data,
                        },
                        success: function (response) {

                        },
                    });
                // }
                return false;
            });
            });
    </script>
@endsection
