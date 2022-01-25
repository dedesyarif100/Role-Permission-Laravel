@extends('layouts.app')
<style>
    table, tr, td {
        border: 1px solid black;
    }
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>
                    @can('create posts')
                        <a href="">Create</a>
                    @endcan
                    <table class="table">
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                            <td>1. </td>
                            <td>Dede</td>
                            <td>
                                @can('view posts')
                                    <a href="">VIEW</a> |
                                @endcan
                                @can('edit posts')
                                    <a href="">EDIT</a> |
                                @endcan
                                @can('delete posts')
                                    <a href="">DELETE</a> |
                                @endcan
                                @can('publish posts')
                                    <a href="">PUBLISH</a> |
                                @endcan
                                @can('unpublish posts')
                                    <a href="">UNPUBLISH</a>
                                @endcan
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
