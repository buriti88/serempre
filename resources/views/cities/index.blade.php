@extends('layouts.menu')

@section('title', __('base_lang.cities'))

@section('title_page')
<i class="fas fa-user-tie"></i>&nbsp;@lang('base_lang.cities')
@endsection

@section('content_page')

<div class="container-fluid">
    <div class="row">
        <div class="col col-12">@include('layouts.message')</div>
        <div class="col-md-12">

            @permission(['edit_customers', 'view_cities', 'all_customers'])
            <div class="card card-secondary mb-2">
                <div class="d-none d-md-block card-header py-1 px-2">
                    <h3 class="card-title">@lang('base_lang.searching')</h3>
                </div>
                <div class="d-none d-md-block pl-3 pr-3 pt-2 pb-1">
                    @include('cities._search')
                </div>

                <div class="d-blok d-md-none card-header py-1 px-2" data-toggle="collapse" href="#collapseExample"
                    role="button" aria-expanded="false" aria-controls="collapseExample">
                    <h3 class="card-title">@lang('base_lang.searching')</h3>
                    <i class="float-right fas fa-angle-down"></i>
                </div>
                <div class="d-blok d-md-none collapse p-3" id="collapseExample">
                    @include('cities._search')
                </div>
            </div>
            @endpermission

            @permission(['edit_customers', 'all_customers'])
            <div class="button-w-100 pb-1">
                <a href="{{ url('/cities/create') }}" class="btn btn-sm btn-primary mb-1">
                    <i class="fa fa-lg fa-fw fa-plus"></i>&nbsp;@lang('cities.new_city')
                </a>
            </div>
            @endpermission

            @permission(['edit_customers', 'view_cities', 'all_customers'])
            @include('vendor.pagination.record-count',
            ['paginator' => $cities, 'show_more_records' => false])
            <div class="table-responsive pt-2">
                @include('cities._table')
            </div>
            {{$cities->links()}}
            @endpermission
        </div>
    </div>
</div>
@endsection